<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\DvdController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Sanctum autentication routes
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);


Route::prefix('clientes')->middleware('auth:sanctum')->group(function () {
    Route::post('/salvar', [CustomerController::class, 'store']);
    Route::get('/listar', [CustomerController::class, 'list']);
    Route::put('/{id}', [CustomerController::class, 'update']);
    Route::delete('/{id}', [CustomerController::class, 'delete']);
});

Route::prefix('dvds')->middleware('auth:sanctum')->group(function () {
    Route::post('/salvar', [DvdController::class, 'store']);
    Route::get('/listar', [DvdController::class, 'list']);
    Route::put('/{id}', [DvdController::class, 'update']);
    Route::delete('/{id}', [DvdController::class, 'delete']);
    Route::post('/locacao', [DvdController::class, 'updateAvailable']);
    Route::post('/devolucao', [DvdController::class, 'restitution']);
});
