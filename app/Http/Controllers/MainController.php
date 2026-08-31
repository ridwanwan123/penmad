<?php

namespace App\Http\Controllers;

use App\Services\PresmaApiService;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('pages.landing');
    }
}
