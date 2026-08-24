<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portal | Penmad</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/kemenag.png') }}" />
    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    @stack('styles')
</head>

<body>
    <!-- LOADER -->
    <div class="loader-wrapper" id="loader">
        <div class="loader-circle"></div>
    </div>

    <!-- FLOATING GLOW -->
    <div class="glow glow-1"></div>
    <div class="glow glow-2"></div>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top custom-navbar mb-5">
        <div class="container-fluid px-lg-5 px-5">
            <a class="navbar-brand d-flex align-items-center gap-3" href="#">
                <img src="{{ asset('assets/images/kemenag.png') }}" alt="logo" class="navbar-logo" />
                <div>
                    <h5 class="mb-0 fw-bold">Bidang Pendidikan Madrasah</h5>
                    <small class="text-muted">Kanwil Kemenag Prov. DKI Jakarta</small>
                </div>
            </a>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span><i class="bi bi-list fs-1"></i></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto gap-lg-3 mt-4 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active-link' : '' }}" href="{{ url('/') }}">
                            Beranda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('struktur-organisasi') ? 'active-link' : '' }}"
                            href="{{ url('/struktur-organisasi') }}">
                            Struktur Organisasi
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('layanan-digitalisasi') ? 'active-link' : '' }}"
                            href="{{ url('/layanan-digitalisasi') }}">
                            Pusat Aplikasi
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('jmc-2026') ? 'active-link' : '' }}"
                            href="{{ url('/jmc-2026') }}">
                            JMC 2026
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('kontak') ? 'active-link' : '' }}"
                            href="{{ url('/kontak') }}">
                            Kontak
                        </a>
                    </li>
                </ul>

                <div class="mt-4 mt-lg-0">
                    <img src="{{ asset('assets/images/penmad.png') }}" alt="Logo Penmad" class="penmad-logo">
                </div>
            </div>
        </div>
    </nav>

    <!-- KONTENT -->
    @yield('content')

    <!-- FOOTER -->
    <footer class="footer-section">
        <div class="container-fluid px-lg-5 px-5">
            <div class="row g-5">

                <!-- BRAND -->
                <div class="col-lg-4">
                    <div class="footer-brand">

                        <!-- TITLE -->
                        <h5 class="footer-title">
                            BIDANG PENDIDIKAN MADRASAH
                        </h5>

                        <p class="footer-desc">
                            Sistem informasi terintegrasi yang menyajikan profil
                            Bidang Pendidikan Madrasah, struktur organisasi,
                            serta berbagai aplikasi layanan pendidikan.
                        </p>

                        <!-- LOGO PENMAD -->
                        <div class="footer-penmad-logo-wrapper">
                            <img src="{{ asset('assets/images/penmad.png') }}" alt="Logo Penmad"
                                class="footer-penmad-logo">
                        </div>

                    </div>
                </div>

                <!-- APLIKASI -->
                <div class="col-lg-4">
                    <h6 class="footer-heading">
                        <i class="bi bi-grid-3x3-gap-fill me-2"></i>
                        Pusat Aplikasi
                    </h6>

                    <ul class="footer-list">
                        <li>
                            <i class="bi bi-app-indicator"></i>
                            SIJAMAD
                        </li>

                        <li>
                            <i class="bi bi-mortarboard-fill"></i>
                            UMP GTK
                        </li>

                        <li>
                            <i class="bi bi-bar-chart-line-fill"></i>
                            SIPRESMA
                        </li>
                    </ul>
                </div>

                <!-- KONTAK -->
                <div class="col-lg-4">
                    <!-- LOGO KEMENAG -->
                    <div class="footer-kemenag">
                        <img src="{{ asset('assets/images/kemenag.png') }}" alt="Logo Kemenag"
                            class="footer-kemenag-logo">

                        <div>
                            <h6 class="footer-office-title">
                                Kanwil Kementerian Agama
                            </h6>

                            <small>Provinsi DKI Jakarta</small>
                        </div>
                    </div>

                    <p class="footer-address">
                        Jalan D.I. Panjaitan Nomor 10,
                        Cipinang Cempedak, Jatinegara,
                        Jakarta Timur, DKI Jakarta (13340)
                    </p>

                    <div class="footer-social">
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>

                    <div class="footer-social-text">
                        <small>@penmad_kanwil</small>
                    </div>
                </div>

            </div>

            <!-- BOTTOM -->
            <div class="footer-bottom mt-4">
                <p class="mb-0">
                    © 2026 Bidang Pendidikan Madrasah Kanwil Kemenag Prov. DKI Jakarta
                </p>
            </div>
        </div>
    </footer>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @stack('scripts')
</body>

</html>
