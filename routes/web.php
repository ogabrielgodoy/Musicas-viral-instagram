<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpotifyController;

Route::get('/', [SpotifyController::class, 'index'])->name('welcome');

