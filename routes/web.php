<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'index'])->name('main.index');
Route::get('fotografia/{id}', [ImageController::class, 'view'])->name('fotografia.view');

Route::resource('alumno', AlumnoController::class);