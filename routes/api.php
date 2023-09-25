<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\VueloController;
use App\Http\Controllers\DetallevueloController;
use App\Http\Controllers\PaisController;

//REGISTRO E INICIO DE SESION
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//CONSULTAR
Route::get('/vuelos', [VueloController::class, 'getVuelos']);
Route::get('/paquetes', [PaqueteController::class, 'getPaquetes']);
Route::get('/paises', [PaisController::class, 'getPaises']);
Route::post('/historial/{id}', [DetallevueloController::class, 'Historial']);
Route::post('/historialprueba/{id}', [DetallevueloController::class, 'HistorialPrueba']);
Route::post('/vuelos/pais/{id}', [VueloController::class, 'getVuelosPais']);
Route::post('/paquetes/pais/{id}', [PaqueteController::class, 'getPaquetesPais']);

//COMPRAR
Route::post('/comprar', [DetallevueloController::class, 'ComprarServicio']);
