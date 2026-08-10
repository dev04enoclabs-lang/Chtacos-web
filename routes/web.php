<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OfflineSyncController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Middleware\CheckSessionTimeout;
use App\Http\Controllers\SalesController;

// sin proteccion, es route publica 
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);


Route::post('/pedidos/sincronizar', [OfflineSyncController::class, 'sync']);

Route::middleware(['auth', CheckSessionTimeout::class])->group(function () {

    Route::get('/menu', [MenuController::class, 'index'])->name('menu');
    Route::post('/checkout/procesar', [CheckoutController::class, 'store']);
    Route::get('/history', [HistoryController::class, 'index'])->name('history');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/sales', [SalesController::class, 'index'])->name('sales');

    // Route Qr para WhatsApp
    Route::get('/codeQr', function () {
        $phone = config('app.whatsapp_number', '7721043761'); 
        $message = urlencode("¡Hola bienvenido a Ch'Tacos! Gusta realizar un pedido.");
        $whatsappUrl = "https://wa.me/{$phone}?text={$message}";

        return view('codeQr', compact('whatsappUrl'));
    })->name('codeQr');

    Route::get('Carritos', function () {
        return view('cart');
    })->name('cart');

    Route::get('/orders', function () {
        return view('orders');
    })->name('orders');

    Route::get('ticket', function () {
        return view('emails.ticket');
    })->name('ticket');

});