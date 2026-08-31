<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', function () {
    return view('pages.landing');
});

Route::get('/struktur-organisasi', function () {
    return view('pages.struktur-organisasi');
});

Route::get('/layanan-digitalisasi', function () {
    return view('pages.layanan-digitalisasi');
});

Route::get('/kontak', function () {
    return view('pages.kontak');
});

Route::get('/404', function () {
    return view('pages.404');
});

Route::get('/coming-soon', function () {
    return view('pages.comingsoon');
});

Route::get('/jmc-2026', function () {
    return view('pages.jmc');
});

Route::get('/data/madrasahs', [MainController::class, 'madrasahsData'])->name('landing.madrasahs');
