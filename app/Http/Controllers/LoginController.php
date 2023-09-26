<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
