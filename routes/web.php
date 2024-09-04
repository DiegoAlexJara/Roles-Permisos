<?php

use App\Http\Controllers\PermisosController;
use App\Http\Controllers\RolController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('index'); })
    ->name('Inicio');

Route::resource('Roles', RolController::class)
    ->names('Roles');


Route::resource('Permisos', PermisosController::class)
    ->names('Permisos');
