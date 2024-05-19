<?php

use App\Http\Controllers\api\LibroController;
use App\Http\Controllers\api\VentaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas para Libros
Route::post('/libros', [LibroController::class, 'store'])->name('libros.store');
Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
Route::get('/libros/{libro}', [LibroController::class, 'show'])->name('libros.show');
Route::put('/libros/{libro}', [LibroController::class, 'update'])->name('libros.update');
Route::delete('/libros/{libro}', [LibroController::class, 'destroy'])->name('libros.destroy');

// Rutas para Ventas
Route::post('/ventas', [VentaController::class, 'store'])->name('ventas.store');
Route::get('/ventas', [VentaController::class, 'index'])->name('ventas.index');
Route::get('/ventas/{venta}', [VentaController::class, 'show'])->name('ventas.show');
Route::put('/ventas/{venta}', [VentaController::class, 'update'])->name('ventas.update');
Route::delete('/ventas/{venta}', [VentaController::class, 'destroy'])->name('ventas.destroy');
