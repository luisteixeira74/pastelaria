<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProdutoController;

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

Route::get('produtos/', [ProdutoController::class, 'index']);
Route::put('produtos/{id}', [ProdutoController::class, 'update']);
Route::get('produtos/{id}', [ProdutoController::class, 'show']);
Route::post('produtos', [ProdutoController::class, 'store']);
Route::delete('produtos/{id}', [ProdutoController::class, 'destroy']);

// Efetuar pedido
Route::post('pedidos', [PedidoController::class, 'store']);


// Envia o email com o pedido
// Route::any('send-test-email', function (Request $request) {
//     Mail::to($request->email)->queue(new PedidoEmail);

//     return response()->json();
// });