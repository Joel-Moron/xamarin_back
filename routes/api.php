<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\PaqueteController;
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/entradas', [EntradaController::class, 'index']);
Route::post('/selectEntrada', [EntradaController::class, 'selectEntrada']);
Route::get('/paquetes', [PaqueteController::class, 'selectPaquete']);
Route::post('/comprarEntrada', [EntradaController::class, 'comprarEntrada']);
Route::post('/getEntradasCompradas', [EntradaController::class, 'selectUsuarioEntradas']);