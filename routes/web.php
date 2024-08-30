<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OngkirController;

Route::get('ongkir', [OngkirController::class, 'index']);
Route::post('cek-ongkir', [OngkirController::class, 'checkOngkir'])->name('cek-ongkir');
Route::post('get-cities', [OngkirController::class, 'getCities'])->name('get-cities');