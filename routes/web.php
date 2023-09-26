<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\SubCategoriasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/subCategoriasView', [SubCategoriasController::class, 'irVistaSubCategorias'])->name('subCtegoriasView');
Route::get('/subCategoriasProductos/{categoria}/{sub_categoria}', [SubCategoriasController::class, 'mostrarProductoSubCategoria'])->name('subCtegoriasProductos');
Route::get('/iniciar-sesion', [LoginController::class, 'loginView'])->name('login');
Route::get('/registrarse', [LoginController::class, 'registrarseView'])->name('registrarse');
Route::get('/categorias', [WelcomeController::class, 'categoriasView'])->name('categorias');

Route::get('/producto', function () {
    return view('producto');
});
