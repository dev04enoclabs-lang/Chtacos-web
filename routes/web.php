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
use \App\Http\Controllers\Auth\ForgotPasswordController;

// sin proteccion, es route publica 
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetCode'])->name('password.email');

Route::get('/reset-password', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset.form');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);


Route::post('/pedidos/sincronizar', [OfflineSyncController::class, 'sync']);

Route::middleware(['auth', CheckSessionTimeout::class])->group(function () {

    Route::get('/menu', [MenuController::class, 'index'])->name('menu');
    Route::post('/checkout/procesar', [CheckoutController::class, 'store'])->middleware('auth');
    Route::get('/history', [HistoryController::class, 'index'])->name('history');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/sales', [SalesController::class, 'index'])->name('sales');

    // view of create users the route 
    Route::get('/users/create', [AuthController::class, 'create'])->name('users.create');
    Route::post('/users', [AuthController::class, 'store'])->name('users.store');

    // Route Qr para WhatsApp
    Route::get('/codeQr', function () {
        $phone = config('app.whatsapp_number', '7721043761');
        $text = "¡Hola! 👋 Te saluda el equipo de *Ch'Tacos* 🌮🔥\n\n"
            . "Te comparto nuestra *CLABE interbancaria / datos de transferencia* de Mercado Pago para realizar tu depósito: 💳✨\n\n"
            . "📌 *CLABE:* [AQUÍ_TU_CLABE]\n"
            . "📌 *Banco:* Mercado Pago\n"
            . "📌 *Beneficiario:* Ch'Tacos\n\n"
            . "Por favor, envíame la captura del comprobante por este medio una vez realizado el pago. 🙌";
        $message = urlencode($text);
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

Route::get('orden-customer', function (){
    return view('customer-order.orden-customer');
})->name('orden-customer');