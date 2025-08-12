<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::resource('productos', ProductoController::class);

// Redirección de la raíz (/) al listado de productos
Route::get('/', function () {
    return redirect()->route('productos.index');
});

// Rutas CRUD para productos
Route::resource('productos', ProductoController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
