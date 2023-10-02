<?php

namespace App\Http\Controllers;

use App\Helpers\Http;
use App\Models\User;
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

        $correoEncontrado = User::where('email', $request->email)->first();
        if ($correoEncontrado){
            return http::respuesta(http::retBadRequest, "El correo electronico ya esta registrado");
        }

        if($request->contraConfirm != $request->password){
            return http::respuesta(http::retUnauthorized, "Las contraseñas no coinciden");
        }

        DB::beginTransaction();
        try {
           // $ultimoId = User::max('id');
            $user = new User();
            $user->name      = $request->name;
            $user->email     = $request->email;
            $user->password  = Hash::make($request->password);
            $user->apellidos = $request->apellidos;
            $user->sexo      = $request->sexo;
            $user->rol_id    = 4;
            $user->save();
        } catch (\Throwable $th) {
            DB::rollBack();
            return http::respuesta(http::retError, $th->getMessage());
        }
        DB::commit();
        return http::respuesta(http::retOK, "Usuario registrado con exito");
    }
}
