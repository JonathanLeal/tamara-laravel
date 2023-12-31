<?php

namespace App\Http\Controllers;

use App\Helpers\Http;
use App\Models\Carrito;
use App\Models\ExistenciaProductoColor;
use App\Models\Producto;
use App\Models\ProductoImagenes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
                   ->select('c.id', 'c.nombre_color', 'c.color_fondo')
                   ->where('pc.producto_id', $id)
                   ->get();

        $tallas = DB::table('existencias_disponibles_producto AS edp')
                    ->join('tallas AS t', 'edp.talla_id', '=', 't.id')
                    ->select('t.id', 't.nombre_talla')
                    ->where('edp.producto_id', $id)
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

    public function mostrarParaCarrito($id)
    {
        if (Auth::check()) {
            $colores = DB::table('producto_colores AS pc')
                   ->join('colores AS c', 'pc.colores_id', '=', 'c.id')
                   ->select('pc.id', 'c.nombre_color')
                   ->where('pc.producto_id', $id)
                   ->get();

            $tallas = DB::table('productos_tallas AS pt')
                        ->join('tallas AS t', 'pt.tallas_id', '=', 't.id')
                        ->select('pt.id', 't.nombre_talla')
                        ->where('pt.producto_id', $id)
                        ->get();

            $miniDetalles = DB::table('productos AS p')
                            ->select('p.id', 'p.nombre_producto', 'p.detalles', 'p.precio_1', 'p.imagen', 'p.sku', 'p.existencia')
                            ->where('p.id', $id)
                            ->get();

            return http::respuesta(http::retOK, ['colores' => $colores,
                                                'tallas'   => $tallas,
                                                'producto' => $miniDetalles]);
            } else {
                return http::respuesta(http::retUnauthorized, "Debe autorizarse");
            }
    }

    public function agregarAlCarrito(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return http::respuesta(http::retUnauthorized,"Debe autorizarse");
        }

        $validator = Validator::make($request->all(), [
            'producto' => 'required|int',
            'talla' => 'required|int',
            'color' => 'required|int',
            'cantidad' => 'required|int',
        ]);

        if ($validator->fails()) {
            return http::respuesta(http::retUnprocessable, $validator->errors());
        }

        $producto = Producto::where('id', $request->producto)->first();

        $existencia = DB::table('existencias_disponibles_producto AS edp')
                      ->select('edp.id', 'edp.existencia', 'edp.precio')
                      ->where('edp.producto_id', $producto->id)
                      ->where('edp.talla_id', $request->talla)
                      ->where('edp.color_id', $request->color)
                      ->first();

        if ($request->cantidad > $existencia->existencia) {
            return http::respuesta(http::retDenyBot, "No puede comprar una cantidad mayor a la existencia actual del producto");
        }

        $ultimoId = Carrito::max('id');
        $id = $ultimoId + 1;

        DB::beginTransaction();
        try {
            $carrito = new Carrito();
            $carrito->id          = $id;
            $carrito->producto_id = $request->producto;
            $carrito->talla_id    = $request->talla;
            $carrito->color_id    = $request->color;
            $carrito->cantidad    = $request->cantidad;
            $carrito->total       = $existencia->precio * $request->cantidad;
            $carrito->user_id     = $user->usuario_id;
            $carrito->save();

            $productoDisponible = ExistenciaProductoColor::where('id', $existencia->id)->first();
            $productoDisponible->existencia = $productoDisponible->existencia - $request->cantidad;
            $productoDisponible->save();

            // $producto->existencia = $producto->existencia - $request->cantidad;
            // $producto->save();
        } catch (\Throwable $th) {
            DB::rollBack();
            return http::respuesta(http::retError, $th->getMessage());
        }
        DB::commit();
        return http::respuesta(http::retOK, "Añadido al carrito correctamente");
    }

    public function mostrarProductosEnCarrito()
    {
        $user = Auth::user();
        if (Auth::check()) {
            $carrito = DB::table('carrito AS ct')
                       ->join('colores AS c', 'ct.color_id', '=', 'c.id')
                       ->join('productos AS p', 'ct.producto_id', '=', 'p.id')
                       ->join('tallas AS t', 'ct.talla_id', '=', 't.id')
                       ->select('ct.id', 'p.nombre_producto', 'p.imagen', 'ct.cantidad', 't.nombre_talla', 'c.nombre_color', 'ct.total')
                       ->where('ct.user_id', $user->usuario_id)
                       ->get();
            if ($carrito->isEmpty()) {
                return http::respuesta(http::retNotFound, "No tiene productos comprados");
            }
            return http::respuesta(http::retOK, $carrito);
        } else {
            return http::respuesta(http::retUnauthorized, "debe autorizarse");
        }
    }

    public function contarProductosCarrito()
    {
        $user = Auth::user();
        $productosCarrito = Carrito::where('user_id', $user->usuario_id)->sum('cantidad');
        return http::respuesta(http::retOK, $productosCarrito);
    }

    public function eliminarProductoCarrito($id)
    {
        $productosCarrito = Carrito::find($id);
        $talla = $productosCarrito->talla_id;
        $color = $productosCarrito->color_id;
        if (!$productosCarrito) {
            return http::respuesta(http::retNotFound, "No se encontro el producto que desea eliminar");
        }

        DB::beginTransaction();
        try {
            $producto = ExistenciaProductoColor::where('producto_id', $productosCarrito->producto_id)->where('color_id', $color)->where('talla_id', $talla)->first();
            $producto->existencia = $producto->existencia + $productosCarrito->cantidad;
            $producto->save();

            $productosCarrito->delete();
        } catch (\Throwable $th) {
            DB::rollBack();
            return http::respuesta(http::retError, $th->getMessage());
        }
        DB::commit();
        return http::respuesta(http::retOK, $producto->id);
    }

    public function buscarProducto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre_producto' => 'required|string'
        ]);

        if ($validator->fails()) {
            return http::respuesta(http::retUnprocessable, $validator->errors());
        }

        $producto = Producto::where('nombre_producto', $request->nombre_producto)->first();
        if (!$producto) {
            return http::respuesta(http::retNotFound, "no se encontro el producto");
        }

        return http::respuesta(http::retOK, $producto->id);
    }

    public function cambiarProducto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'producto' => 'required|integer',
            'color'    => 'required|integer'
        ]);

        if ($validator->fails()) {
            return http::respuesta(http::retUnprocessable, $validator->errors());
        }

        $cambio = DB::table('existencias_disponibles_producto AS edp')
                ->join('productos AS p', 'edp.producto_id', '=', 'p.id')
                ->join('tallas AS t', 'edp.talla_id', '=', 't.id') 
                ->select('edp.id', 'edp.existencia', 't.id AS talla_id', 't.nombre_talla', 'edp.precio')
                ->where('edp.color_id', $request->color)
                ->where('edp.producto_id', $request->producto)
                ->get();

        foreach ($cambio as $producto) {
            if ($producto->existencia === 0) {
                return http::respuesta(http::retNotFound, "agotado");
            }
        }

        return http::respuesta(http::retOK, $cambio);
    }

    public function cambiarProductoTalla(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'producto' => 'required|integer',
            'color'    => 'required|integer',
            'talla'    => 'required|integer'
        ]);

        if ($validator->fails()) {
            return http::respuesta(http::retUnprocessable, $validator->errors());
        }

        $cambio = DB::table('existencias_disponibles_producto AS edp')
                ->select('edp.id', 'edp.precio', 'edp.existencia')
                ->where('edp.color_id', $request->color)
                ->where('edp.producto_id', $request->producto)
                ->where('edp.talla_id', $request->talla)
                ->get();

        return http::respuesta(http::retOK, $cambio);
    }
}
