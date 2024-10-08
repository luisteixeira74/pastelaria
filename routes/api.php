<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('clientes/', [ClienteController::class, 'index']);
Route::put('clientes/{id}', [ClienteController::class, 'update']);
Route::get('clientes/{id}', [ClienteController::class, 'show']);
Route::post('clientes', [ClienteController::class, 'store']);
    