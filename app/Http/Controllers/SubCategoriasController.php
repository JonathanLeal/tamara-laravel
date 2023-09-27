<?php

namespace App\Http\Controllers;

use App\Helpers\Http;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoriasController extends Controller
{
    public function irVistaSubCategorias(){
        return view('subCategorias');
    }

    public function mostrarProductoSubCategoria($categoria, $sub_categoria){
        $productos = DB::table('productos AS p')
                    ->where('categoria_id', '=', $categoria)
                    ->where('sub_categoria_id', '=', $sub_categoria)
                    ->get();
        if($productos->isEmpty()){
            return http::respuesta(http::retNotFound, "Lo sentimos esta seccion de momento no tiene articulos");
        }
        return http::respuesta(http::retOK, $productos);
    }

    public function mostrarProductoPorCategoriaSeleccionada($categoria)
    {
        $productosCategoria = DB::table('productos AS p')
                              ->join('categorias AS c', 'p.categoria_id', '=', 'c.id')
                              ->join('sub_categorias AS sc', 'p.sub_categoria_id', '=', 'sc.id')
                              ->where('p.categoria_id', $categoria)
                              ->select('p.id', 'p.nombre_producto', 'p.imagen', 'p.existencia', 'p.precio_1', 'c.nombre_categoria', 'sc.nombre_sub_categoria')
                              ->get();
        if ($productosCategoria->isEmpty()) {
            return http::respuesta(http::retNotFound, "No se encontraron productos con esa categoria");
        }

        return http::respuesta(http::retOK, $productosCategoria);
    }
}
