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
}
