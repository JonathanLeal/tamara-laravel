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
            'correo'        => 'required|email',
            'nombres'       => 'required|string',
            'apellidos'     => 'required|string',
            'contra'        => 'required|string',
            'contraConfirm' => 'required|string'
        ]);

        if ($validator->fails()){
            return Http::respuesta(http::retUnprocessable, $validator->errors());
        }

        $correoEncontrado = User::where('correo', $request->correo)->first();
        if ($correoEncontrado){
            return http::respuesta(http::retBadRequest, "El correo electronico ya esta registrado");
        }

        if($request->contraConfirm != $request->contra){
            return http::respuesta(http::retUnauthorized, "Las contraseñas no coinciden");
        }

        DB::beginTransaction();
        try {
            $ultimoId = User::max('id');

            $user = new User();
            $user->id         = $ultimoId + 1;
            $user->correo     = $request->correo;
            $user->nombres    = $request->nombres;
            $user->apellidos  = $request->apellidos;
            $user->password   = Hash::make($request->password);
            $user->sexo       = $request->sexo;
            $user->id_rol     = 4;
            $user->save();
        } catch (\Throwable $th) {
            DB::rollBack();
            return http::respuesta(http::retError, $th->getMessage());
        }
        DB::commit();
        return http::respuesta(http::retOK, "Usuario registrado con exito");
    }
}
