<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpotifyController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/generate', function () {
    return view('generetetoken');
})->name('generetetoken');

Route::post('/spotify/accesstoken', [SpotifyController::class, 'getAccessToken'])->name('spotify.accesstoken');
