<?php

namespace App\Http\Controllers;

use App\Helpers\Http;
use App\Models\User;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function loginView()
    {
        return view('Login');
    }

    public function registrarseView()
    {
        return view('registro');
    }

    public function registrarUsuario(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'         => 'required|email',
            'name'          => 'required|string',
            'password'      => 'required|string',
            'contraConfirm' => 'required|string',
            'apellidos'     => 'required|string',
            'sexo'          => 'required|string'
        ]);

        if ($validator->fails()){
            return Http::respuesta(http::retUnprocessable, $validator->errors());
        }

        $correoEncontrado = Usuario::where('correo', $request->email)->first();
        if ($correoEncontrado){
            return http::respuesta(http::retBadRequest, "El correo electronico ya esta registrado");
        }

        if($request->contraConfirm != $request->password){
            return http::respuesta(http::retUnauthorized, "Las contraseñas no coinciden");
        }

        DB::beginTransaction();
        try {
            $ultimoId = Usuario::max('id');
            $id = $ultimoId + 1;

            $usuario = new Usuario();
            $usuario->id        = $id;
            $usuario->nombres   = $request->name;
            $usuario->correo    = $request->email;
            $usuario->password  = Hash::make($request->password);
            $usuario->apellidos = $request->apellidos;
            $usuario->sexo      = $request->sexo;
            $usuario->id_rol    = 4;
            $usuario->save();

            $user = new User();
            $user->name       = $usuario->nombres . $usuario->apellidos;
            $user->email      = $usuario->correo;
            $user->password   = $usuario->password;
            $user->usuario_id = $id;
            $user->save();
        } catch (\Throwable $th) {
            DB::rollBack();
            return http::respuesta(http::retError, $th->getMessage());
        }
        DB::commit();
        return http::respuesta(http::retOK, "Usuario registrado con exito");
    }
}
