<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OfflineSyncController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\AuthController;

Route::post('/pedidos/sincronizar', [OfflineSyncController::class, 'sync']);
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::post('/checkout/procesar', [CheckoutController::class, 'store']);
Route::get('/history', [HistoryController::class, 'index'])->name('history');
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('Carritos', function () {
    return view('cart');
})->name('cart');
Route::get('/orders', function () {
    return view('orders');
})->name('orders');

Route::get('ticket', function () {
    return view('emails.ticket');
})->name('ticket');