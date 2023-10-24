<?php

namespace App\Http\Controllers;

use App\Helpers\Http;
use App\Helpers\WompiHelper;
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
            'validationCustom01' => 'required|string',
            'validationCustom02' => 'required|string',
            'validationCustomUsername' => 'required|email',
            'validationCustom07'=> 'required|string',
            'validationCustom08' => 'required|string',
            'validationCustom04' => 'required|string',
            'validationCustomUsername16' => 'required|int',
            'validationCustom05' => 'required|string',
            'validationCustom03' => 'required|string',
            'validationCustom4' => 'required|string',
            'validationCustom06'=> 'required|string',
            'entregaDomicilio' => 'required|int',
            'entregaPunto' => 'required|int',
            'validationCustom010'=> 'required|string',
            'validationCustom011'=> 'required|string',
            'validationCustom012'=> 'required|string',
            'validationCustom013'=> 'required|string',
            'pagoTarjeta' => 'required|int',
            'pagoEfectivo'=> 'required|int',
            'titularTarjeta' => 'required|string',
            'numeroTarjeta'=> 'required|string',
            'mesVencimiento' => 'required|string',
            'anoVencimiento' => 'required|string',
            'cvc' => 'required|string',
        ]);

        if ($validator->fails()) {
            return http::respuesta(http::retUnprocessable, $validator->errors());
        }

        DB::beginTransaction();
        try {

        } catch (\Throwable $th) {
            DB::rollBack();
            return http::respuesta(http::retError, $th->getMessage());
        }
    }
}
