<?php

use App\Http\Controllers\InsomniaScreeningController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/masalah-medis', [InsomniaScreeningController::class, 'medical'])->name('medical');
Route::view('/tentang', 'pages.about')->name('about');
Route::get('/screening-insomnia-remaja', [InsomniaScreeningController::class, 'teen'])->name('screening');
Route::view('/kontak', 'pages.contact')->name('contact');

Route::post('/screening-insomnia-remaja', [InsomniaScreeningController::class, 'storeTeen'])->name('screening.store');
Route::post('/masalah-medis/screening', [InsomniaScreeningController::class, 'storeMedical'])->name('medical.screening.store');
