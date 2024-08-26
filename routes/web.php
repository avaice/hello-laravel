<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;

Route::get('/', [TopController::class, 'index']);

Route::post('/ashiatos', [TopController::class, 'store']);