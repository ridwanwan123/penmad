@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
@endpush

@section('content')
    <section class="hero-section">
        <div class="container-fluid px-lg-5 px-3">
            <!-- HEADER -->
            <div class="hero-header mb-4">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="hero-title-wrapper">
                            <span class="hero-badge">
                                <i class="bi bi-stars"></i>
                                Pendidikan Madrasah DKI Jakarta
                            </span>

                            <h1 class="hero-title mt-4">
                                Portal Informasi & Layanan
                                <span>Pendidikan Madrasah DKI Jakarta</span>
                            </h1>

                            <p class="hero-description">
                                Sistem informasi terintegrasi yang menyajikan profil Bidang Pendidikan Madrasah,
                                Data madrasah, struktur organisasi, serta berbagai aplikasi layanan pendidikan
                                di lingkungan Kanwil Kementerian Agama Provinsi DKI Jakarta.
                            </p>
                        </div>
                    </div>

                    {{-- <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="top-stat-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h3 id="totalMadrasah">0</h3>
                                    <p>Total Madrasah</p>
                                </div>
                                <div class="stat-icon">
                                    <i class="bi bi-mortarboard-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>

            <!-- CONTENT -->
            <div class="row g-4 align-items-start">
                <!-- MAP -->
                <div class="col-lg-7 d-flex">
                    <div class="map-card position-relative overflow-hidden h-100 w-100">
                        <div class="map-overlay-pattern"></div>

                        <!-- SEARCH -->
                        <div class="map-search-box custom-glass-control">
                            <i class="bi bi-search"></i>
                            <input type="text" id="searchSchool" placeholder="Cari madrasah..." />
                        </div>

                        <!-- LEGEND -->
                        <div class="map-legend">
                            <h6>Jenjang Madrasah</h6>
                            <div class="legend-item">
                                <span class="legend-color man"></span>
                                MAN
                            </div>

                            <div class="legend-item">
                                <span class="legend-color min"></span>
                                MIN
                            </div>

                            <div class="legend-item">
                                <span class="legend-color mtsn"></span>
                                MTsN
                            </div>
                        </div>

                        <div id="map"></div>
                    </div>
                </div>

                <!-- SIDEBAR -->
                <div class="col-lg-5">
                    <div class="info-card sticky-top">
                        <!-- HEADER -->
                        <div class="school-header">
                            <!-- LOGO -->
                            <div class="school-logo-wrapper">
                                <img src="{{ asset('assets/images/logo.png') }}" class="school-logo" alt="logo" />
                            </div>

                            <!-- INFO -->
                            <div class="school-info">
                                <h3 id="schoolName">MAN 4 Jakarta</h3>

                                <div class="school-location">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    Jakarta Timur
                                </div>

                                <p class="school-address">
                                    Jl. Raya Pondok Gede No. 4, Kec. Duren Sawit, Jakarta Timur
                                </p>
                            </div>
                        </div>

                        <!-- BADGE -->
                        <div class="badge-wrapper">
                            <span class="custom-badge badge-success">
                                <i class="bi bi-check-circle-fill"></i>
                                Aktif
                            </span>

                            <span class="custom-badge badge-gold">
                                <i class="bi bi-star-fill"></i>
                                Unggul
                            </span>

                            <span class="custom-badge badge-primary">
                                <i class="bi bi-trophy-fill"></i>
                                Berprestasi
                            </span>
                        </div>

                        <!-- BIODATA -->
                        <div class="sidebar-section">
                            <h5 class="section-title">Biodata Madrasah</h5>

                            <div class="biodata-table">
                                <!-- ITEM -->
                                <div class="biodata-row">
                                    <div class="biodata-label">
                                        <div class="biodata-icon">
                                            <i class="bi bi-person-vcard-fill"></i>
                                        </div>

                                        <span>NPSN</span>
                                    </div>

                                    <div class="biodata-value">20103359</div>
                                </div>

                                <!-- ITEM -->
                                <div class="biodata-row">
                                    <div class="biodata-label">
                                        <div class="biodata-icon">
                                            <i class="bi bi-building-fill-check"></i>
                                        </div>

                                        <span>Status Madrasah</span>
                                    </div>

                                    <div class="biodata-value">Negeri</div>
                                </div>

                                <!-- ITEM -->
                                <div class="biodata-row">
                                    <div class="biodata-label">
                                        <div class="biodata-icon">
                                            <i class="bi bi-person-badge-fill"></i>
                                        </div>

                                        <span>Kepala Madrasah</span>
                                    </div>

                                    <div class="biodata-value">Drs. H. Abdul Rahman Hidayat</Table>, M.Pd.</div>
                                </div>

                                <!-- ITEM -->
                                <div class="biodata-row">
                                    <div class="biodata-label">
                                        <div class="biodata-icon">
                                            <i class="bi bi-briefcase-fill"></i>
                                        </div>

                                        <span>Kepala Urusan Tata Usaha</span>
                                    </div>

                                    <div class="biodata-value">Siti Nurhasanah, S.E.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/landing.js') }}"></script>
@endpush
