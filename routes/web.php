<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AcaraController;
use App\Models\Acara;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/acara', [AcaraController::class, 'index'])->name('acara.index');

Route::get('/acara/{id}', [AcaraController::class, 'show'])->name('acara.show');




