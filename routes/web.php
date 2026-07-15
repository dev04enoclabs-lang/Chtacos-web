<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('menu');
});

Route::get('/Menu', function () {
    return view('menu');
})->name('menu');

Route::get('Carritos', function () {
    return view('cart');
})->name('cart');
Route::get('Mis Pedidos', function(){
    return view ('orders');
})->name('orders');