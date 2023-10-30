<?php

namespace App\Http\Controllers;

use App\Helpers\Http;
use App\Helpers\WompiHelper;
use App\Models\Agencia;
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
    $token = WompiHelper::getToken();

    if (!$token) {
        return http::respuesta(http::retDenyBot, 'No está el token de wompi');
    }

    $validator = Validator::make($request->all(), [
        'tarjetaCreditoDebido' => 'required|array',
        'tarjetaCreditoDebido.numeroTarjeta' => 'required|string',
        'tarjetaCreditoDebido.cvv' => 'required|string',
        'tarjetaCreditoDebido.mesVencimiento' => 'required|integer',
        'tarjetaCreditoDebido.anioVencimiento' => 'required|integer',
        'monto' => 'required|numeric',
        'emailCliente' => 'required|email',
        'nombreCliente' => 'required|string',
        'formaPago' => 'required|string',
        'configuracion' => 'required|array',
        'configuracion.emailsNotificacion' => 'required|email',
        'configuracion.urlWebhook' => 'required|url',
        'configuracion.telefonosNotificacion' => 'required|string',
        //'configuracion.notificarTransaccionCliente' => 'required|boolean',
        'datosAdicionales' => 'required|array',
        //'datosAdicionales.nombreProducto' => 'required|string',
        // Agrega validaciones para otros campos adicionales si es necesario
    ]);

    if ($validator->fails()) {
        return http::respuesta(http::retUnprocessable, $validator->errors());
    }

    $wompiData = $request->all();

    // Realizar la solicitud POST a la API de Wompi
    $response = H::withToken($token['access_token'])
        ->post('https://api.wompi.sv/transaccionCompra', $wompiData);

    if ($response->successful()) {
        $wompiResponse = $response->json();
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

    // 'nombres'               => 'required|string',
            // 'apellidos'             => 'required|string',
            // 'correo'                => 'required|email|unique:facturacion,correo',
            // 'telefono'              => 'required|string|unique:facturacion,telefono',
            // 'whatsApp'              => 'required|string|unique:facturacion,celular',
            // 'tipo_doc'              => 'required|string',
            // 'num_doc'               => 'required|int|unique:facturacion,num_identificacion',
            // 'pais'                  => 'required|string',
            // 'depa'                  => 'required|string',
            // 'ciudad'                => 'required|string',
            // 'direc_fac'             => 'required|string',
            // 'entregaDomicilio'      => 'required|int',
            // 'entregaPunto'          => 'required|int',
            // 'entregaMismaDireccion' => 'required|int',
            // 'pais_fac'              => 'required|string',
            // 'depa_fac'              => 'required|string',
            // 'ciudad_fac'            => 'required|string',
            // 'direc_factura'         => 'required|string',
            // 'pagoTarjeta'           => 'required|int',
            // 'pagoEfectivo'          => 'required|int',
            // 'titularTarjeta'        => 'required|string',
            // 'numeroTarjeta'         => 'required|string',
            // 'mesVencimiento'        => 'required|int',
            // 'anoVencimiento'        => 'required|int',
            // 'cvc'                   => 'required|string',
            // 'monto'                 => 'required|numeric',
            // 'productos'             => 'required|string',
}
