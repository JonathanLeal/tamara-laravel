<?php

namespace App\Http\Controllers;

use App\Helpers\Http;
use App\Models\ProductoImagenes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function obteniendoInfoProducto($id)
    {
        $imagenes = ProductoImagenes::where('producto_id', $id)->get();

        $miniDetalles = DB::table('productos AS p')
                        ->select('p.id', 'p.nombre_producto', 'p.detalles', 'p.precio_1', 'p.imagen', 'p.sku')
                        ->where('p.id', $id)
                        ->get();

        $colores = DB::table('producto_colores AS pc')
                   ->join('colores AS c', 'pc.colores_id', '=', 'c.id')
                   ->select('pc.id', 'c.nombre_color')
                   ->where('pc.producto_id', $id)
                   ->get();

        return Http::respuesta(http::retOK, ['imagenes' => $imagenes,
                                             'miniDetalles' => $miniDetalles,
                                            'colores' => $colores]);
    }
}
