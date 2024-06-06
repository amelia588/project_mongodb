<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

// Ruta de búsqueda específica, definida antes del recurso
Route::post('productos/search', [ProductoController::class, 'search'])->name('productos.search');

// Rutas del recurso para productos
Route::resource('productos', ProductoController::class);
