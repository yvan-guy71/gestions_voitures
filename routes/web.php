<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculesController;
use App\Http\Controllers\ReparationsController;
use App\Http\Controllers\TechniciensController;
use App\Http\Controllers\WelcomeController;


Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::resource('vehicules', VehiculesController::class);
Route::resource('reparations', ReparationsController::class);
Route::resource('techniciens', TechniciensController::class);