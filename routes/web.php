<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('home');
});

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CreditoController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ReporteController;

Route::resource('clientes', ClienteController::class);
Route::resource('creditos', CreditoController::class);
Route::resource('pagos', PagoController::class);
Route::resource('reportes', ReporteController::class);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
