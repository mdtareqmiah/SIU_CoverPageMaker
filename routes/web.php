<?php

use App\Http\Controllers\CoverPageMakerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/form-page', [CoverPageMakerController::class, 'index'])
    ->name('show.form');

Route::post('/generate-pdf', [CoverPageMakerController::class, 'generatePDF'])
    ->name('generate.pdf');

