@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/layanan-digitalisasi.css') }}">
@endpush

@section('content')
    <section class="hero-section">

        <!-- TITLE -->
        <div class="container-fluid px-lg-5 px-4">

            <div class="hero-header text-center">

                <span class="hero-subtitle">
                    <i class="bi bi-envelope-paper-fill me-2"></i>
                    Hubungi Kami
                </span>

                <div class="title-ornament">
                    <span class="line"></span>

                    <i class="bi bi-telephone-fill"></i>

                    <span class="line"></span>
                </div>

                <h1 class="hero-title">
                    Kontak Bidang Pendidikan Madrasah
                </h1>

                <p class="contact-subtitle">
                    Silakan hubungi kami untuk informasi layanan pendidikan madrasah,
                    pusat aplikasi, maupun kebutuhan administrasi lainnya
                    di lingkungan Kanwil Kementerian Agama Provinsi DKI Jakarta.
                </p>

            </div>

            <!-- APPLICATIONS -->
            <div class="apps-wrapper">

                <!-- APP 1 -->
                <div class="app-card green-card">
                    <div class="app-number">01</div>

                    <div class="app-icon">
                        <i class="bi bi-diagram-3-fill"></i>
                    </div>

                    <h3>
                        Sistem Jabatan Madrasah
                    </h3>

                    <p>
                        Sistem informasi untuk pengelolaan data jabatan
                        dan struktur kepegawaian di lingkungan madrasah.
                    </p>

                    <a href="{{ url('coming-soon') }}" class="app-button">
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <!-- APP 2 -->
                <div class="app-card gold-card active-card">
                    <div class="app-number">02</div>

                    <div class="app-icon">
                        <i class="bi bi-wallet2"></i>
                    </div>

                    <h3>
                        Sistem Honorarium GTK Non ASN
                    </h3>

                    <p>
                        Sistem informasi untuk pengelolaan honorarium
                        Guru dan Tenaga Kependidikan Non ASN secara transparan.
                    </p>

                    <a href="https://ump-gtk.penmad-dki.org/login" target="_blank" rel="noopener noreferrer"
                        class="app-button">

                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <!-- APP 3 -->
                <div class="app-card blue-card">
                    <div class="app-number">03</div>

                    <div class="app-icon">
                        <i class="bi bi-trophy-fill"></i>
                    </div>

                    <h3>
                        Sistem Prestasi Madrasah (SIPRESMA)
                    </h3>

                    <p>
                        Sistem informasi untuk pendataan, monitoring,
                        dan publikasi prestasi madrasah secara digital.
                    </p>

                    <a href="{{ url('coming-soon') }}" class="app-button">
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

            </div>

            <!-- STATISTICS -->
            {{-- <div class="stats-wrapper">

                <div class="stat-box">
                    <i class="bi bi-building"></i>

                    <div>
                        <h4>1.248</h4>
                        <p>Madrasah Terdaftar</p>
                    </div>
                </div>

                <div class="stat-box">
                    <i class="bi bi-people-fill"></i>

                    <div>
                        <h4>2.562</h4>
                        <p>GTK Non ASN</p>
                    </div>
                </div>

                <div class="stat-box">
                    <i class="bi bi-trophy-fill"></i>

                    <div>
                        <h4>3.456</h4>
                        <p>Prestasi Madrasah</p>
                    </div>
                </div>

                <div class="stat-box">
                    <i class="bi bi-graph-up-arrow"></i>

                    <div>
                        <h4>5.892</h4>
                        <p>Pengguna Aktif</p>
                    </div>
                </div>

            </div> --}}

            <!-- FEATURES -->
            <div class="feature-wrapper">

                <div class="feature-item">
                    <i class="bi bi-shield-check"></i>

                    <div>
                        <h5>Terintegrasi</h5>
                        <p>Data terhubung dalam satu ekosistem</p>
                    </div>
                </div>

                <div class="feature-item">
                    <i class="bi bi-lock-fill"></i>

                    <div>
                        <h5>Transparan</h5>
                        <p>Pengelolaan data yang terbuka dan akuntabel</p>
                    </div>
                </div>

                <div class="feature-item">
                    <i class="bi bi-award-fill"></i>

                    <div>
                        <h5>Berkualitas</h5>
                        <p>Mendukung madrasah unggul dan berprestasi</p>
                    </div>
                </div>

                <div class="feature-item">
                    <i class="bi bi-cloud-fill"></i>

                    <div>
                        <h5>Digital & Modern</h5>
                        <p>Sistem berbasis teknologi terkini dan aman</p>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
