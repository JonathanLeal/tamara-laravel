<?php

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
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('register', [AuthController::class, 'register']);
    Route::get('/infoProductoCarrito/{id}', [ProductoController::class, 'mostrarParaCarrito']);
    Route::post('/añadirProductoCarrito', [ProductoController::class, 'agregarAlCarrito']);
    Route::get('/productosEnCarrito', [ProductoController::class, 'mostrarProductosEnCarrito']);
    Route::get('/contarProductosEnCarrito', [ProductoController::class, 'contarProductosCarrito']);
    Route::post('/eliminarProductoCarrito/{id}', [ProductoController::class, 'eliminarProductoCarrito']);
    Route::get('/administrar', [WelcomeController::class, 'mostrarMenu']);
});
