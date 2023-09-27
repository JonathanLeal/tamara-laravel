<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
