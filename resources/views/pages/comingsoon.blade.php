@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/comingsoon.css') }}">
@endpush

@section('content')
    <div class="coming">

        <div class="glow"></div>

        <div class="content">
            <h1>Coming Soon</h1>
            <p>Halaman ini sedang dalam pengembangan</p>

            <div class="progress-wrap">
                <div class="progress-label">
                    <span>Progress Pengembangan</span>
                    <span>65%</span>
                </div>

                <div class="progress-bar">
                    <div class="progress-fill"></div>
                </div>
            </div>

            <a href="{{ url('/') }}" class="btn">Kembali ke Beranda</a>
        </div>

    </div>
@endsection
