<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.landing');
});

Route::get('/struktur-organisasi', function () {
    return view('pages.struktur-organisasi');
});

Route::get('/404', function () {
    return view('pages.404');
});

Route::get('/coming-soon', function () {
    return view('pages.comingsoon');
});
