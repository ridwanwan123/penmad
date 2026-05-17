<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.landing');
});

Route::get('/struktur-organisasi', function () {
    return view('pages.struktur-organisasi');
});
