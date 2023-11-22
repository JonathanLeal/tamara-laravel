<?php

namespace App\Http\Controllers;

use App\Helpers\Http;
use App\Helpers\WompiHelper;
use App\Models\Agencia;
use App\Models\Facturacion;
use App\Models\Producto;
use App\Models\TipoIdentificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http as H;

class PagoController extends Controller
{
    public function obtenerTiposIdentificacion()
    {
        $identificacion = TipoIdentificacion::all();
        return Http::respuesta(http::retOK, $identificacion);
    }

    public function obtenerProducto($id)
    {
        $producto = Producto::where('id', $id)->first();
        return http::respuesta(http::retOK, $producto);
    }

    public function token()
    {
        $accessTokenInfo = WompiHelper::getToken();
        if ($accessTokenInfo) {
            $accessToken = $accessTokenInfo['access_token'];
            $expiresIn = $accessTokenInfo['expires_in'];
            $tokenType = $accessTokenInfo['token_type'];
            $scope = $accessTokenInfo['scope'];

            // Puedes hacer lo que necesites con estos valores
            return http::respuesta(http::retOK, $accessTokenInfo);
        }
    }

    public function realizarCompra(Request $request)
    {
        $user = Auth::user();
        $token = WompiHelper::getToken();

        if (!$token) {
            return http::respuesta(http::retDenyBot, 'No está el token de wompi');
        }

        $validator = Validator::make($request->all(), [
            'tarjetaCreditoDebido'                 => 'array',
            'tarjetaCreditoDebido.numeroTarjeta'   => 'string',
            'tarjetaCreditoDebido.cvv'             => 'string',
            'tarjetaCreditoDebido.mesVencimiento'  => 'integer',
            'tarjetaCreditoDebido.anioVencimiento' => 'integer',
            'monto'         => 'numeric',
            'emailCliente'  => 'email',
            'nombreCliente' => 'string',
            'formaPago'     => 'string',
            'configuracion' => 'array',
            'configuracion.emailsNotificacion'    => 'email',
            'configuracion.urlWebhook'            => 'url',
            'configuracion.telefonosNotificacion' => 'string',
            //'configuracion.notificarTransaccionCliente' => 'required|boolean',
            'datosAdicionales' => 'array',
            //'datosAdicionales.nombreProducto' => 'required|string',
            // Agrega validaciones para otros campos adicionales si es necesario
            'nombres'               => 'required|string',
            'apellidos'             => 'required|string',
            'correo'                => 'required|string',
            'telefono'              => 'required|string',
            'whatsApp'              => 'required|string',
            'tipo_doc'              => 'required|integer',
            'num_doc'               => 'required|string',
            'pais'                  => 'required|string',
            'depa'                  => 'required|string',
            'ciudad'                => 'required|string',
            'direc_fac'             => 'required|string',
            'entrega'               => 'required|string',
            'entregaMismaDireccion' => 'boolean',
            'pais_fac'              => 'string',
            'depa_fac'              => 'string',
            'ciudad_fac'            => 'string',
            'direc_factura'         => 'string',
            'agencias'              => 'integer',
            'metodo'                => 'string',
        ]);

        if ($validator->fails()) {
            return http::respuesta(http::retUnprocessable, $validator->errors());
        }

        $carritoUsuario = DB::table('carrito')
                        ->where('user_id', $user->usuario_id)
                        ->get();

        $wompiData = $request->all();

        // Realizar la solicitud POST a la API de Wompi
        $response = H::withToken($token['access_token'])
            ->post('https://api.wompi.sv/transaccionCompra', $wompiData);

        if ($response->successful()) {
            $wompiResponse = $response->json();
            foreach ($carritoUsuario as $car) {
                if ($request->entregaMismaDireccion == true) {
                    $facturacion = new Facturacion();
                    $facturacion->nombres               = $request->nombres;
                    $facturacion->apellidos             = $request->apellidos;
                    $facturacion->correo                = $request->emailCliente;
                    $facturacion->id_identificacion     = $request->tipo_doc;
                    $facturacion->num_identificacion    = $request->num_doc;
                    $facturacion->pais                  = $request->pais;
                    $facturacion->departamento          = $request->depa;
                    $facturacion->ciudad                = $request->ciudad;
                    $facturacion->direccion_facturacion = $request->direc_fac;
                    $facturacion->telefono              = $request->telefono;
                    $facturacion->celular               = $request->whastApp;
                    $facturacion->pago_id               = $request->metodo;
                    $facturacion->pais_entrega          = $request->pais;
                    $facturacion->departamento_entrega  = $request->depa;
                    $facturacion->ciudad_entrega        = $request->ciudad;
                    $facturacion->direccion_entrega     = $request->direc_fac;
                    $facturacion->gran_total            = $request->monto;
                    $facturacion->carrito_id            = $car->id;
                    $facturacion->save();
                } else {
                    $facturacion = new Facturacion();
                    $facturacion->nombres               = $request->nombres;
                    $facturacion->apellidos             = $request->apellidos;
                    $facturacion->correo                = $request->emailCliente;
                    $facturacion->id_identificacion     = $request->tipo_doc;
                    $facturacion->num_identificacion    = $request->num_doc;
                    $facturacion->pais                  = $request->pais;
                    $facturacion->departamento          = $request->depa;
                    $facturacion->ciudad                = $request->ciudad;
                    $facturacion->direccion_facturacion = $request->direc_fac;
                    $facturacion->telefono              = $request->telefono;
                    $facturacion->celular               = $request->whastApp;
                    $facturacion->pago_id               = $request->metodo;
                    $facturacion->pais_entrega          = $request->pais_fac;
                    $facturacion->departamento_entrega  = $request->depa_entrega;
                    $facturacion->ciudad_entrega        = $request->ciudad_fac;
                    $facturacion->direccion_entrega     = $request->direc_factura;
                    $facturacion->gran_total            = $request->monto;
                    $facturacion->carrito_id            = $car->id;
                    $facturacion->save();
                }
            }
            return http::respuesta(http::retOK, 'Enlace de pago creado con éxito', $wompiResponse);
        } else {
            return http::respuesta(http::retError, 'Error al crear el enlace de pago');
        }
    }

    public function obtenerAgencias()
    {
        $agencias = Agencia::all();
        return http::respuesta(http::retOK, $agencias);
    }

    public function infoAgencias($id)
    {
        $info = Agencia::where('id', $id)->first();
        return http::respuesta(http::retOK, $info);
    }

    public function obtenerComprarAhora(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return http::respuesta(http::retUnauthorized, "Debe autorizarse");
        }

        $validator = Validator::make($request->all(), [
            'talla'    => 'required|integer',
            'color'    => 'required|integer',
            'cantidad' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return http::respuesta(http::retUnprocessable, $validator->errors());
        }

        $producto = DB::table('existencias_disponibles_producto AS edp')
                    ->join('productos AS p', 'edp.producto_id', '=', 'p.id')
                    ->join('tallas AS t', 'edp.talla_id', '=', 't.id')
                    ->join('colores AS c', 'edp.color_id', '=', 'c.id')
                    ->where('edp.talla_id', $request->talla)
                    ->where('edp.color_id', $request->color)
                    ->select('edp.id', 'p.nombre_producto', 'p.imagen', 't.nombre_talla', 'c.nombre_color', 'edp.existencia')
                    ->get();

        foreach ($producto as $pro) {
            if ($request->cantidad > $pro->existencia) {
                return http::respuesta(http::retBadRequest, "cantidad mayor a la existencia");
            }
        }
        
        return http::respuesta(http::retOK, $producto);
    }

    public function listarUnSoloProducto($id)
    {
        $user = Auth::user();
        if (!$user) {
            return http::respuesta(http::retUnauthorized,"debe autorizarse");
        }

        $pro = DB::table("existencias_disponibles_producto AS edp")
            ->where("edp.id", $id)
            ->first();

        $producto = DB::table('existencias_disponibles_producto AS edp')
                    ->join('productos AS p', 'edp.producto_id', '=', 'p.id')
                    ->join('tallas AS t', 'edp.talla_id', '=', 't.id')
                    ->join('colores AS c', 'edp.color_id', '=', 'c.id')
                    ->where('edp.talla_id', $pro->talla_id)
                    ->where('edp.color_id', $pro->color_id)
                    ->select('edp.id', 'p.nombre_producto', 'p.imagen', 't.nombre_talla', 'c.nombre_color', 'edp.existencia', 'edp.precio')
                    ->get();

        return http::respuesta(http::retOK, $producto);
    }
}