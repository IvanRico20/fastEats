<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GustoController;
use App\Http\Controllers\RecomendacionController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\CarritoController;

Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Gusto (requiere autenticación)
Route::get('/gustos', [GustoController::class, 'create'])->middleware('auth')->name('gustos.create');
Route::post('/gustos', [GustoController::class, 'store'])->middleware('auth')->name('gustos.store');

// Recomendaciones (requiere autenticación)
Route::get('/recomendaciones', [RecomendacionController::class, 'index'])
    ->middleware('auth')
    ->name('recomendaciones');

// Locales (requiere autenticación)
Route::get('/locales', [LocalController::class, 'index'])->middleware('auth')->name('locales.recomendados');
Route::get('/locales/{id}/menu', [LocalController::class, 'showMenu'])->middleware('auth')->name('local.menu');

// Carrito (sin middleware 'auth')
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{platoId}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::post('/carrito/actualizar/{platoId}', [CarritoController::class, 'actualizar'])->name('carrito.actualizar');
Route::post('/carrito/eliminar/{platoId}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/checkout', [CarritoController::class, 'checkout'])->name('carrito.checkout');
Route::post('/carrito/procesar', [CarritoController::class, 'procesarPedido'])->name('carrito.procesar');
