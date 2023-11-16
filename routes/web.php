<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\SubCategoriasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ejemplo', function () {
    return view('ejemploWelcome');
});

Route::get('/ejemploSub', function () {
    return view('ejemploSubCategorias');
});

Route::get('/subCategoriasEjem', [SubCategoriasController::class, 'irVistaSubCategorias'])->name('subCtegoriasEjem');

//vista principal, categorias y sub categorias
Route::get('/inicio', [WelcomeController::class, 'inicioView'])->name('inicio');
Route::get('/subCategoriasView', [SubCategoriasController::class, 'irVistaSubCategorias'])->name('subCtegoriasView');
Route::get('/subCategoriasProductos/{categoria}/{sub_categoria}', [SubCategoriasController::class, 'mostrarProductoSubCategoria'])->name('subCtegoriasProductos');
Route::get('/iniciar-sesion', [LoginController::class, 'loginView'])->name('login');
Route::get('/registrarse', [LoginController::class, 'registrarseView'])->name('registrarse');
Route::get('/categorias', [WelcomeController::class, 'categoriasView'])->name('categorias');
Route::get('/productosPorCategoria/{categoria}', [SubCategoriasController::class, 'mostrarProductoPorCategoriaSeleccionada']);

//productos
Route::get('/producto', function () {
    return view('producto');
});
Route::get('/infoProducto/{id}', [ProductoController::class, 'obteniendoInfoProducto']);
Route::post('/buscarProducto', [ProductoController::class, 'buscarProducto']);
Route::post('/cambiarInfo', [ProductoController::class, 'cambiarProducto']);
Route::post('/cambiarInfoTalla', [ProductoController::class, 'cambiarProductoTalla']);

//registros
Route::post('/registroNewUser', [LoginController::class, 'registrarUsuario']);

//facturacion y pagos
Route::get('/facturacion', function () {
    return view('facturacion');
});

//pagos
Route::get('/obtenerIdentificacion', [PagoController::class, 'obtenerTiposIdentificacion']);
Route::get('/obtenerAgencias', [PagoController::class, 'obtenerAgencias']);
Route::get('/infoAgencias/{id}', [PagoController::class, 'infoAgencias']);

//wompi
Route::post('/token', [PagoController::class,'token']);
Route::post('/transaccionCompra', [PagoController::class,'realizarCompra']);
