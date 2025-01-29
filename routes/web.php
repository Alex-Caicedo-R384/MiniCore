<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\GastoController;

Route::get('/', function () {
    return view('welcome'); // Página principal (welcome)
});

// Rutas para el CRUD de Empleados
Route::resource('empleados', EmpleadoController::class);

// Rutas para el CRUD de Departamentos
Route::resource('departamentos', DepartamentoController::class);

// Rutas para el CRUD de Gastos
Route::resource('gastos', GastoController::class);
