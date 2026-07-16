<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

Route::get('/', function () {
    return redirect()->route('menu');
});

Route::get('/Menu',[MenuController::class, 'index' ])->name('menu');

Route::get('Carritos', function () {
    return view('cart');
})->name('cart');
Route::get('Mis Pedidos', function(){
    return view ('orders');
})->name('orders');