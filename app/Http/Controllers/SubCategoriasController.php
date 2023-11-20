<?php

namespace App\Http\Controllers;

use App\Helpers\Http;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoriasController extends Controller
{
    public function irVistaSubCategorias(){
        return view('EjemploSubCategorias');
    }

    public function mostrarProductoSubCategoria($categoria, $sub_categoria){
        $colores = DB::table('colores as c')
                    ->select('c.id', 'c.nombre_color', 'c.color_fondo', 'p.nombre_producto')
                    ->join('producto_colores as pc', 'pc.colores_id', '=', 'c.id')
                    ->join('productos as p', 'pc.producto_id', '=', 'p.id')
                    ->where('p.categoria_id', '=', $categoria)
                    ->where('p.sub_categoria_id', '=', $sub_categoria)
                    ->get();

        $productos = DB::table('productos AS p')
                    ->where('categoria_id', '=', $categoria)
                    ->where('sub_categoria_id', '=', $sub_categoria)
                    ->get();
        if($productos->isEmpty()){
            return http::respuesta(http::retNotFound, "Lo sentimos esta seccion de momento no tiene articulos");
        }
        return http::respuesta(http::retOK, ['producto' => $productos, 'colores' => $colores]);
    }

    public function mostrarProductoPorCategoriaSeleccionada($categoria)
    {
        $colores = DB::table('colores as c')
                    ->select('c.id', 'c.nombre_color', 'c.color_fondo', 'p.nombre_producto')
                    ->join('producto_colores as pc', 'pc.colores_id', '=', 'c.id')
                    ->join('productos as p', 'pc.producto_id', '=', 'p.id')
                    ->where('p.categoria_id', '=', $categoria)
                    ->get();

        $productosCategoria = DB::table('productos AS p')
                              ->join('categorias AS c', 'p.categoria_id', '=', 'c.id')
                              ->join('sub_categorias AS sc', 'p.sub_categoria_id', '=', 'sc.id')
                              ->where('p.categoria_id', $categoria)
                              ->select('p.id', 'p.nombre_producto', 'p.imagen', 'p.existencia', 'p.precio_1', 'c.nombre_categoria', 'sc.nombre_sub_categoria', 'p.sku', 'p.estilo')
                              ->get();
        if ($productosCategoria->isEmpty()) {
            return http::respuesta(http::retNotFound, "No se encontraron productos con esa categoria");
        }

        return http::respuesta(http::retOK, ['productosCat' => $productosCategoria, 'colores' => $colores]);
    }
}
