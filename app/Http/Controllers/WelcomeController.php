<?php

namespace App\Http\Controllers;

use App\Helpers\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function categoriasView()
    {
        return View('categorias.categorias');
    }

    public function inicioView()
    {
        return View('welcome');
    }

    public function mostrarMenu()
    {
        $userRole = Auth::user()->rol_id ?? 0;
        return Http::respuesta(http::retOK, $userRole);
    }
}
