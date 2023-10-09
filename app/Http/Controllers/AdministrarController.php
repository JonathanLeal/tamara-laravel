<?php

namespace App\Http\Controllers;

use App\Helpers\Http;
use App\Models\Carrito;
use App\Models\Roles;
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

    public function irVistaProductosAdmin()
    {
        return view('productosAdmin');
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
}
