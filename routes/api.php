<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CustomerController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Sanctum autentication routes
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);


Route::middleware('auth:sanctum')->post('clientes/salvar', [CustomerController::class, 'store']);
Route::middleware('auth:sanctum')->get('clientes/listar', [CustomerController::class, 'list']);
Route::middleware('auth:sanctum')->put('clientes/{id}', [CustomerController::class, 'update']);