<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;

Route::get('/', [AppController::class, 'index']);
Route::get('/create', [AppController::class, 'create']);
Route::get('/contact', [AppController::class, 'contact']);