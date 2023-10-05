<?php

namespace App\Http\Controllers;

use App\Helpers\Http;
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
}
