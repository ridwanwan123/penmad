@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.5.3/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.5.3/dist/MarkerCluster.Default.css" />

    <style>
        /* MAP LOADING OVERLAY */
        .map-loading-overlay {
            position: absolute;
            inset: 0;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 14px;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(2px);
            -webkit-backdrop-filter: blur(2px);
            transition: opacity 0.35s ease;
            opacity: 1;
            pointer-events: all;
        }

        .map-loading-overlay.is-hidden {
            opacity: 0;
            pointer-events: none;
        }

        .map-loading-spinner {
            width: 42px;
            height: 42px;
            border: 4px solid rgba(16, 185, 129, 0.2);
            border-top-color: #10b981;
            border-radius: 50%;
            animation: map-spin 0.8s linear infinite;
        }

        .map-loading-text {
            font-size: 0.875rem;
            font-weight: 600;
            color: #334155;
        }

        @keyframes map-spin {
            to { transform: rotate(360deg); }
        }
    </style>
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
                                <span class="legend-color ma"></span>
                                MA
                            </div>

                            <div class="legend-item">
                                <span class="legend-color mts"></span>
                                MTs
                            </div>

                            <div class="legend-item">
                                <span class="legend-color mi"></span>
                                MI
                            </div>

                            <div class="legend-item">
                                <span class="legend-color ra"></span>
                                RA
                            </div>
                        </div>

                        <div id="map"
                            data-geojson-url="{{ asset('geojson/dki-jakarta.json') }}"
                            data-madrasah-url="{{ route('landing.madrasahs') }}">
                        </div>

                        <!-- LOADING OVERLAY -->
                        <div class="map-loading-overlay" id="mapLoadingOverlay">
                            <div class="map-loading-spinner"></div>
                            <span class="map-loading-text">Memuat data madrasah...</span>
                        </div>
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
                                <h3 id="schoolName">-</h3>

                                <div class="school-location" id="schoolLocation">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    -
                                </div>

                                <p class="school-address" id="schoolAddress">
                                    -
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

                                    <div class="biodata-value" id="schoolNpsn">-</div>
                                </div>

                                <!-- ITEM -->
                                <div class="biodata-row">
                                    <div class="biodata-label">
                                        <div class="biodata-icon">
                                            <i class="bi bi-building-fill-check"></i>
                                        </div>

                                        <span>Status Madrasah</span>
                                    </div>

                                    <div class="biodata-value" id="schoolStatus">-</div>
                                </div>

                                <!-- ITEM -->
                                <div class="biodata-row">
                                    <div class="biodata-label">
                                        <div class="biodata-icon">
                                            <i class="bi bi-person-badge-fill"></i>
                                        </div>

                                        <span>Kepala Madrasah</span>
                                    </div>

                                    <div class="biodata-value" id="schoolKamad">-</div>
                                </div>

                                <!-- ITEM -->
                                <div class="biodata-row">
                                    <div class="biodata-label">
                                        <div class="biodata-icon">
                                            <i class="bi bi-briefcase-fill"></i>
                                        </div>

                                        <span>Kepala Urusan Tata Usaha</span>
                                    </div>

                                    <div class="biodata-value" id="schoolKatu">-</div>
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
    <script src="https://unpkg.com/leaflet.markercluster@1.5.3/dist/leaflet.markercluster.js"></script>
    <script src="{{ asset('assets/js/landing.js') }}"></script>
@endpush