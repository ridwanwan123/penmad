@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/404.css') }}">
@endpush

@section('content')
    <div class="hero">

        <div class="overlay"></div>

        <div class="content">
            <h1>404</h1>
            <p>Halaman tidak ditemukan</p>
            <a href="{{ url('/') }}" class="btn">Kembali ke Beranda</a>
        </div>

    </div>
@endsection
