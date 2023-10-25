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
        $user = Auth::user();

        if (!$token) {
            return http::respuesta(http::retDenyBot,'No esta el token de wompi');
        } elseif (!$user) {
            return http::respuesta(http::retDenyBot,'No esta logueado el usuario');
        }

        $validator = Validator::make($request->all(), [
            'nombres'               => 'required|string',
            'apellidos'             => 'required|string',
            'correo'                => 'required|email|unique:facturacion,correo',
            'telefono'              => 'required|string|unique:facturacion,telefono',
            'whatsApp'              => 'required|string|unique:facturacion,celular',
            'tipo_doc'              => 'required|string',
            'num_doc'               => 'required|int|unique:facturacion,num_identificacion',
            'pais'                  => 'required|string',
            'depa'                  => 'required|string',
            'ciudad'                => 'required|string',
            'direc_fac'             => 'required|string',
            'entregaDomicilio'      => 'required|int',
            'entregaPunto'          => 'required|int',
            'entregaMismaDireccion' => 'required|int',
            'pais_fac'              => 'required|string',
            'depa_fac'              => 'required|string',
            'ciudad_fac'            => 'required|string',
            'direc_factura'         => 'required|string',
            'pagoTarjeta'           => 'required|int',
            'pagoEfectivo'          => 'required|int',
            'titularTarjeta'        => 'required|string',
            'numeroTarjeta'         => 'required|string',
            'mesVencimiento'        => 'required|string',
            'anoVencimiento'        => 'required|string',
            'cvc'                   => 'required|string',
            'monto'                 => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return http::respuesta(http::retUnprocessable, $validator->errors());
        }

        DB::beginTransaction();
        try {
            $data = [
                'tarjetaCreditoDebido' => [
                    'numeroTarjeta'    => $request->numeroTarjeta,
                    'cvv'              => $request->cvc,
                    'mesVencimiento'   => $request->mesVencimiento,
                    'anioVencimiento'  => $request->anoVencimiento,
                ],
                'monto'         => $request->monto,
                'emailCliente'  => $request->correo,
                'nombreCliente' => $request->nombres . '' . $request->apellidos,
                'formaPago'     => $request->formaPago,
                'configuracion'                   => [
                    'emailsNotificacion'          => $request->emailsNotificacion,
                    'urlWebhook'                  => $request->urlWebhook,
                    'telefonosNotificacion'       => $request->telefonosNotificacion,
                    'notificarTransaccionCliente' => $request->notificarTransaccionCliente,
                ],
                'datosAdicionales' => [

                ]
            ];
        } catch (\Throwable $th) {
            DB::rollBack();
            return http::respuesta(http::retError, $th->getMessage());
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
}
