<?php

namespace App\Http\Controllers;

use App\Helpers\Http;
use App\Models\Producto;
use App\Models\ProductoImagenes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function obteniendoInfoProducto($id)
    {
        $imagenes = DB::table('producto_imagenes AS pi')
                    ->join('productos AS p', 'pi.producto_id', '=', 'p.id')
                    ->select('pi.id', 'pi.imagen', 'p.imagen AS imagenP')
                    ->where('pi.producto_id', $id)
                    ->get();

        $miniDetalles = DB::table('productos AS p')
                        ->select('p.id', 'p.nombre_producto', 'p.detalles', 'p.precio_1', 'p.imagen', 'p.sku', 'p.existencia')
                        ->where('p.id', $id)
                        ->get();

        $colores = DB::table('producto_colores AS pc')
                   ->join('colores AS c', 'pc.colores_id', '=', 'c.id')
                   ->select('pc.id', 'c.nombre_color', 'c.color_fondo')
                   ->where('pc.producto_id', $id)
                   ->get();

        $tallas = DB::table('productos_tallas AS pt')
                    ->join('tallas AS t', 'pt.tallas_id', '=', 't.id')
                    ->select('pt.id', 't.nombre_talla')
                    ->where('pt.producto_id', $id)
                    ->get();

        $productos = DB::table('productos AS p')
                     ->select('p.id', 'p.estilo', 'p.detalles', 'p.escote', 'p.longitud_manga', 'p.tejido', 'p.composicion', 'p.instrucciones_cuidado')
                     ->where('p.id', $id)
                     ->get();

        $dimensiones = DB::table('dimensiones AS d')
                       ->join('tallas AS t', 'd.talla_id', '=', 't.id')
                       ->select('d.id', 't.nombre_talla', 'd.pecho', 'd.largo', 'd.hombro')
                       ->where('d.producto_id', $id)
                       ->get();

        return Http::respuesta(http::retOK, ['imagenes' => $imagenes,
                                             'miniDetalles' => $miniDetalles,
                                            'colores' => $colores,
                                            'tallas' => $tallas,
                                            'producto' => $productos,
                                            'dimensiones' => $dimensiones]);
    }
}
