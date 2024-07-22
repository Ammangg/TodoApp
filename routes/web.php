<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::get('/', [Controllers\TodoController::class, 'index'])->name('app.index');

Route::resource('app', Controllers\TodoController::class)->except('index');

Route::get('/app', [Controllers\TodoController::class, 'search'])->name('app.search');
