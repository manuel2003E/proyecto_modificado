<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CreditoController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ReporteController;

// Ruta de inicio
Route::get('/', function () {
    return view('home');
});

// Rutas para Clientes
Route::resource('clientes', ClienteController::class);

// Rutas para Créditos
Route::resource('creditos', CreditoController::class);

// Rutas para Pagos
Route::resource('pagos', PagoController::class);



Route::get('/clientes/pdf', [ClienteController::class, 'generatePDF'])->name('clientes.pdf');
