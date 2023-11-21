<?php

use App\Http\Controllers\AdministrarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\WelcomeController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    //inicio de rutas de login
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('register', [AuthController::class, 'register']);
    //fin de rutas de login

    //inicio de rutas de carrito
    Route::get('/infoProductoCarrito/{id}', [ProductoController::class, 'mostrarParaCarrito']);
    Route::post('/añadirProductoCarrito', [ProductoController::class, 'agregarAlCarrito']);
    Route::get('/productosEnCarrito', [ProductoController::class, 'mostrarProductosEnCarrito']);
    Route::get('/contarProductosEnCarrito', [ProductoController::class, 'contarProductosCarrito']);
    Route::post('/eliminarProductoCarrito/{id}', [ProductoController::class, 'eliminarProductoCarrito']);
    //fin de rutas de carrito

    //inicio de rutas de administracion de usuarios
    Route::get('/administrar', [WelcomeController::class, 'mostrarMenu']); // se usa para mostrar le menu de administracion.
    Route::get('/adminUsuarios', [AdministrarController::class, 'irVistaUsuarios'])->name('vistaUsuarios');
    Route::get('/obtenerRoles', [AdministrarController::class, 'obtenerRoles']);
    Route::get('/obtenerUsuarios', [AdministrarController::class, 'obtenerUsuarios']);
    Route::get('/obtenerUsuario/{id}', [AdministrarController::class, 'obtenerUsuario']);
    Route::post('/guardarUsuario', [AdministrarController::class, 'guardarUsuario']);
    Route::post('/editarUsuario', [AdministrarController::class, 'editarUsuario']);
    Route::post('/eliminarUsuario/{id}', [AdministrarController::class, 'eliminarUsuario']);
    Route::post('/cambiarEstado', [AdministrarController::class, 'cambiarEstado']);
    //FIN de rutas de administracion de usuarios

    //inicio de rutas de administracion de productos
    Route::get('/adminProductos', [AdministrarController::class, 'irVistaProductos'])->name('vistaProductos');
    Route::get('/obtenerProductos', [AdministrarController::class, 'obtenerProductos']);
    Route::get('/listarCatYsubCat', [AdministrarController::class, 'listarCategoriasSubCategorias']);
    Route::get('/obtenerProducto/{id}', [AdministrarController::class, 'obtenerProducto']);
    Route::post('/editarProducto/{id}', [AdministrarController::class, 'editarProducto']);
    Route::post('/guardarProducto', [AdministrarController::class, 'guardarProducto']);
    Route::post('/eliminarProducto/{id}', [AdministrarController::class, 'eliminarProducto']);
    //fin de rutas de administracion de productos

    //Inicio de rutas de pago
    Route::post('/comprarAhora', [PagoController::class,'obtenerComprarAhora']);
    //Fin de rutas de pago
});
