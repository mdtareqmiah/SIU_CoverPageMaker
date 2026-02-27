<?php

//use Illuminate\Support\Facades\Route;
use App\Http\Controllers\coverpagemakerController;



// ওয়েবসাইট ওপেন করলেই যেন ফর্মটি দেখায়
//Route::get('/', [coverpagemakerController::class, 'index']);

// ফর্ম সাবমিট করার পর যেন PDF জেনারেট হয়
//Route::post('/generate-pdf', [coverpagemakerController::class, 'generatePDF'])->name('generate.pdf');

//f<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
})->name('layout');
// web.php


// ফর্ম পেজটি দেখানোর জন্য রুট
Route::get('/form-page', function () {
    return view('form'); // এখানে 'form' হলো আপনার form.blade.php এর নাম
})->name('show.form');//

// ফর্ম সাবমিট করার পর যেন PDF জেনারেট হয়
Route::post('/generate-pdf', [coverpagemakerController::class, 'generatePDF'])->name('generate.pdf');