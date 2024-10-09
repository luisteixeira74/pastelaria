<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Mail\PedidoEmail;
use Illuminate\Support\Facades\Mail;

Route::get('/', function() {
    return 'chegou na raiz';
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('clientes/', [ClienteController::class, 'index']);
Route::put('clientes/{id}', [ClienteController::class, 'update']);
Route::get('clientes/{id}', [ClienteController::class, 'show']);
Route::post('clientes', [ClienteController::class, 'store']);
Route::delete('clientes/{id}', [ClienteController::class, 'destroy']);

Route::any('send-test-email', function (Request $request) {
    Mail::to($request->email)->queue(new PedidoEmail);

    return response()->json();
});