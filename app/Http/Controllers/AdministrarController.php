<?php

namespace App\Http\Controllers;

use App\Helpers\Http;
use App\Models\Carrito;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Roles;
use App\Models\SubCategoria;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdministrarController extends Controller
{
    public function irVistaUsuarios()
    {
        return view('usuarios');
    }

    public function obtenerUsuarios(){
        $usuarios = DB::table("usuarios AS u")
                   ->join("roles AS r", "u.id_rol", "=", "r.id")
                   ->select("u.id", "u.nombres", "u.apellidos", "u.correo", "u.password", "u.sexo", "r.rol", "u.estado")
                   ->get();

        if ($usuarios->isEmpty()) {
            return Http::respuesta(http::retNotFound, "No hay usuarios listados");
        }

        // Deshasha la contraseña antes de devolverla
        foreach ($usuarios as $usuario) {
            $usuario->password = bcrypt($usuario->password);
        }

        return http::respuesta(http::retOK, $usuarios);
    }

    public function obtenerUsuario($id){
        $usuario = DB::table("usuarios AS u")
                   ->join("roles AS r", "u.id_rol", "=", "r.id")
                   ->select("u.id", "u.nombres", "u.apellidos", "u.correo", "u.sexo", "r.id AS id_rol", "r.rol")
                   ->where('u.id', $id)
                   ->get();

        if (!$usuario) {
            return http::respuesta(http::retNotFound, "No se encontró el usuario");
        }
        return http::respuesta(http::retOK, $usuario);
    }

    public function guardarUsuario(Request $request){
        $validator = Validator::make($request->all(), [
            'nombres'   => 'required|string',
            'apellidos' => 'required|string',
            'correo'    => 'required|email',
            'pass'      => 'required|string',
            'sexo'      => 'required|string',
            'rol'       => 'required|int'
        ]);

        if ($validator->fails()) {
            return http::respuesta(http::retUnprocessable, $validator->fails());
        }

        DB::beginTransaction();
        try {
            $ultimoId = Usuario::max('id');
            $id = $ultimoId + 1;

            $usuario = new Usuario();
            $usuario->id        = $id;
            $usuario->nombres   = $request->nombres;
            $usuario->correo    = $request->correo;
            $usuario->password  = Hash::make($request->pass);
            $usuario->apellidos = $request->apellidos;
            $usuario->sexo      = $request->sexo;
            $usuario->id_rol    = $request->rol;
            $usuario->save();

            $user = new User();
            $user->name       = $usuario->nombres . $usuario->apellidos;
            $user->email      = $usuario->correo;
            $user->password   = $usuario->password;
            $user->usuario_id = $id;
            $user->rol_id     = $usuario->id_rol;
            $user->save();
        } catch (\Throwable $th) {
            DB::rollBack();
            return http::respuesta(http::retError, $th->getMessage());
        }
        DB::commit();
        return http::respuesta(http::retOK, "usuario guardado con exito");
    }

    public function editarUsuario(Request $request){
        $user = Auth::user();

        if (!$user) {
            return http::respuesta(http::retError, "Usuario no autenticado");
        }

        $validator = Validator::make($request->all(), [
            'id'        => 'required|int',
            'nombres'   => 'required|string',
            'apellidos' => 'required|string',
            'correo'    => 'required|email',
            'sexo'      => 'required|string',
            'rol'       => 'required|int'
        ]);

        if ($validator->fails()) {
            return http::respuesta(http::retUnprocessable, $validator->errors());
        }

        $usuario = Usuario::find($request->id);
        $usuario2 = User::where('usuario_id', $usuario->id)->first();
        if (!$usuario) {
            return http::respuesta(http::retNotFound, "Usuario no encontrado");
        }

        DB::beginTransaction();
        try {
            $usuario->nombres   = $request->nombres;
            $usuario->apellidos = $request->apellidos;
            $usuario->correo    = $request->correo;
            $usuario->sexo      = $request->sexo;
            $usuario->id_rol    = $request->rol;
            $usuario->save();

            $usuario2->name       = $usuario->nombres . ' ' . $usuario->apellidos;
            $usuario2->email      = $usuario->correo;
            $usuario2->usuario_id = $usuario->id;
            $usuario2->rol_id     = $usuario->rol;
            $usuario2->save();
        } catch (\Throwable $th) {
            DB::rollBack();
            return http::respuesta(http::retError, $th->getMessage());
        }
        DB::commit();
        return http::respuesta(http::retOK, "Usuario editado con éxito");
    }


    public function eliminarUsuario(Request $request){
        $user = Auth::user();
        $usuario = Usuario::find($request->id);
        $usuarioDos = User::where('usuario_id', $usuario->id)->first();
        if (!$usuario) {
            return http::respuesta(http::retNotFound, "no se encontro el usuario");
        }
        //$carrito->delete();
        $usuarioDos->delete();
        $usuario->delete();
        return http::respuesta(http::retOK, "eliminados correctamente");
    }

    public function obtenerRoles()
    {
        $roles = Roles::all();
        return $roles;
    }

    public function cambiarEstado(Request $request)
    {
        $usuario = Usuario::find($request->id);
        $usuarioDos = User::where('usuario_id', $usuario->id)->first();
        if (!$usuario) {
            return http::respuesta(http::retNotFound, "No se encontro el usuario");
        }

        if ($usuario->estado === 'ACTIVO') {
            $usuario->estado = 'INACTIVO';
            $usuario->save();

            $usuarioDos->estado = 'INACTIVO';
            $usuarioDos->save();
        } elseif($usuario->estado === 'INACTIVO'){
            $usuario->estado = 'ACTIVO';
            $usuario->save();

            $usuarioDos->estado = 'ACTIVO';
            $usuarioDos->save();
        }

        return http::respuesta(http::retOK, "usuario cambiado con exito");
    }

    //aministracion de productos
    public function irVistaProductos()
    {
        return view('adminProductos');
    }

    public function obtenerProductos(){
        $productos = DB::table('productos AS p')
                     ->join('categorias AS c', 'p.categoria_id', '=', 'c.id')
                     ->join('sub_categorias AS sc', 'p.sub_categoria_id', '=', 'sc.id')
                     ->select('p.id', 'p.nombre_producto', 'p.imagen', 'p.precio_1', 'p.existencia', 'p.estilo', 'p.detalles', 'p.escote', 'p.longitud_manga', 'p.tejido', 'p.composicion', 'p.instrucciones_cuidado', 'p.sku', 'c.nombre_categoria AS categoria', 'sc.nombre_sub_categoria AS sub_categoria')
                     ->get();

        if ($productos->isEmpty()) {
            return Http::respuesta(http::retNotFound, "No hay productos listados");
        }

        return http::respuesta(http::retOK, $productos);
    }

    public function listarCategoriasSubCategorias()
    {
        $categorias = Categoria::all();
        $subCategorias = SubCategoria::all();
        return http::respuesta(http::retOK, ['categorias' => $categorias,
                                            'sub'         => $subCategorias]);
    }

    public function obtenerProducto($id)
    {
        $productos = DB::table('productos AS p')
                     ->join('categorias AS c', 'p.categoria_id', '=', 'c.id')
                     ->join('sub_categorias AS sc', 'p.sub_categoria_id', '=', 'sc.id')
                     ->select('p.id', 'p.nombre_producto', 'p.imagen', 'p.precio_1', 'p.precio_2', 'p.precio_3', 'p.precio_4', 'p.existencia', 'p.precio_1', 'p.estilo', 'p.detalles', 'p.escote', 'p.longitud_manga', 'p.tejido', 'p.composicion', 'p.instrucciones_cuidado', 'p.sku', 'c.id AS idCat', 'c.nombre_categoria', 'sc.id AS subCat', 'sc.nombre_sub_categoria')
                     ->where('p.id', $id)
                     ->first();
        return http::respuesta(http::retOK, $productos);
    }

    public function editarProducto(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'nombre_producto'       => 'required|string',
            'precio_1'              => 'required|numeric',
            'precio_2'              => 'required|numeric',
            'precio_3'              => 'required|numeric',
            'precio_4'              => 'required|numeric',
            'existencia'            => 'required|int',
            'estilo'                => 'required|string',
            'detalles'              => 'required|string',
            'escote'                => 'required|string',
            'longitud_manga'        => 'required|string',
            'tejido'                => 'required|string',
            'instrucciones_cuidado' => 'required|string',
            'SKU'                   => 'required|string',
            'categoria'             => 'required|int',
            'sub_categoria'         => 'required|int',
            'imagen'                => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);

        if ($validator->fails()) {
            return http::respuesta(http::retUnprocessable, $validator->errors());
        }

        $producto = Producto::where('id', $id)->first();
        if (!$producto) {
            return http::respuesta(http::retNotFound, "Usuario no encontrado");
        }

        DB::beginTransaction();
        try {
            $producto->nombre_producto       = $request->nombre_producto;
            $producto->existencia            = $request->existencia;
            $producto->precio_1              = $request->precio_1;
            $producto->precio_2              = $request->precio_2;
            $producto->precio_3              = $request->precio_3;
            $producto->precio_4              = $request->precio_4;
            $producto->estilo                = $request->estilo;
            $producto->detalles              = $request->detalles;
            $producto->escote                = $request->escote;
            $producto->longitud_manga        = $request->longitud_manga;
            $producto->tejido                = $request->tejido;
            $producto->instrucciones_cuidado = $request->instrucciones_cuidado;
            $producto->sku                   = $request->SKU;
            $producto->categoria_id          = $request->categoria;
            $producto->sub_categoria_id      = $request->sub_categoria;
            $imagePath = $request->file('imagen')->store('public/imagenes');
            $imageUrl = asset('storage/' . str_replace('public/', '', $imagePath));
            $producto->imagen                = $imageUrl;
            $producto->save();
        } catch (\Throwable $th) {
            DB::rollBack();
            return http::respuesta(http::retError, $th->getMessage());
        }
        DB::commit();
        return http::respuesta(http::retOK, "Usuario editado con éxito");
    }

    public function guardarProducto(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre_producto'       => 'required|string',
            'precio_1'              => 'required|numeric',
            'precio_2'              => 'required|numeric',
            'precio_3'              => 'required|numeric',
            'precio_4'              => 'required|numeric',
            'existencia'            => 'required|int',
            'estilo'                => 'required|string',
            'detalles'              => 'required|string',
            'escote'                => 'required|string',
            'longitud_manga'        => 'required|string',
            'tejido'                => 'required|string',
            'composicion'           => 'required|string',
            'instrucciones_cuidado' => 'required|string',
            'SKU'                   => 'required|string',
            'categoria'             => 'required|int',
            'sub_categoria'         => 'required|int',
            'imagen'                => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);

        if ($validator->fails()) {
            return http::respuesta(http::retUnprocessable, $validator->errors());
        }

        DB::beginTransaction();
        try {
            $ultimoId = Producto::max('id');
            $id = $ultimoId + 1;

            $producto = new Producto();
            $producto->id = $id;
            $producto->nombre_producto       = $request->nombre_producto;
            $producto->existencia            = $request->existencia;
            $producto->precio_1              = $request->precio_1;
            $producto->precio_2              = $request->precio_2;
            $producto->precio_3              = $request->precio_3;
            $producto->precio_4              = $request->precio_4;
            $producto->estilo                = $request->estilo;
            $producto->detalles              = $request->detalles;
            $producto->escote                = $request->escote;
            $producto->longitud_manga        = $request->longitud_manga;
            $producto->tejido                = $request->tejido;
            $producto->composicion           = $request->composicion;
            $producto->instrucciones_cuidado = $request->instrucciones_cuidado;
            $producto->sku                   = $request->SKU;
            $producto->categoria_id          = $request->categoria;
            $producto->sub_categoria_id      = $request->sub_categoria;
            $imagePath = $request->file('imagen')->store('public/imagenes');
            $imageUrl = asset('storage/' . str_replace('public/', '', $imagePath));
            $producto->imagen                = $imageUrl;
            $producto->save();
        } catch (\Throwable $th) {
            DB::rollBack();
            return http::respuesta(http::retError, $th->getMessage());
        }
        DB::commit();
        return http::respuesta(http::retOK, "Usuario guardado con éxito");
    }

    public function eliminarProducto($id)
    {
        $producto = Producto::find($id);
        if (!$producto) {
            return http::respuesta(http::retNotFound, "no se encontro el producto");
        }
        $producto->delete();
        return http::respuesta(http::retOK, "eliminado con exito");
    }
}
