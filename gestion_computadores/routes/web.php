<?php

use App\Http\Controllers\TipoComputadorController;
use App\Http\Controllers\ComputadorController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// ------------------------------
//  LOGIN
// ------------------------------
Route::get('/', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ------------------------------
//  RUTAS PROTEGIDAS
// ------------------------------
Route::middleware('auth')->group(function () {

    // Redirección después del login
    Route::get('/dashboard', function () {
        return redirect()->route('computadores.index');
    })->name('dashboard');

    Route::resource('computadores', ComputadorController::class)
         ->parameters(['computadores' => 'computador']);

 Route::resource('tipos', TipoComputadorController::class)
        ->parameters(['tipos' => 'tipo']);});
