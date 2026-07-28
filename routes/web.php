<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OfflineSyncController;
use App\Http\Controllers\HistoryController;

Route::post('/pedidos/sincronizar', [OfflineSyncController::class, 'sync']);
Route::get('/history', [HistoryController::class, 'index'])->name('history');

Route::get('/', function () {
    return redirect()->route('menu');
});

Route::get('/menu', [MenuController::class, 'index'])->name('menu');

Route::post('/checkout/procesar', [CheckoutController::class, 'store']);

Route::get('Carritos', function () {
    return view('cart');
})->name('cart');
Route::get('/orders', function () {
    return view('orders');
})->name('orders');

Route::get('ticket', function () {
    return view('emails.ticket');
})->name('ticket');