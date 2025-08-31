<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('resume', function () {
    return view('pages.resume');
});

Route::get('projects', function () {
    return view('pages.projects');
});

Route::get('contact', function () {
    return view('pages.contact');
});


Route::get('/form', [ContactController::class, 'showForm'])->name('form.form');
Route::post('/form', [ContactController::class, 'submitForm'])->name('form.submit');
Route::get('/form/confirmation', [ContactController::class, 'confirmation'])->name('form.confirmation');
