<?php

namespace App\Http\Controllers;

use App\Helpers\Http;
use App\Helpers\WompiHelper;
use App\Models\Producto;
use App\Models\TipoIdentificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
