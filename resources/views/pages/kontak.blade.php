@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/kontak.css') }}">
@endpush

@section('content')
    <section class="contact-section">
        <div class="container-fluid px-lg-5 px-4">

            <!-- TITLE -->
            <div class="hero-header text-center">

                <div class="title-ornament">
                    <span class="line"></span>

                    <i class="bi bi-telephone-fill"></i>

                    <span class="line"></span>
                </div>
                
                <span class="hero-subtitle">
                    <i class="bi bi-envelope-paper-fill me-2"></i>
                    Hubungi Kami
                </span>

                <h1 class="hero-title">
                    Kontak Bidang Pendidikan Madrasah
                </h1>

                <p class="contact-subtitle">
                    Silakan hubungi kami untuk informasi layanan pendidikan madrasah,
                    pusat aplikasi, maupun kebutuhan administrasi lainnya
                    di lingkungan Kanwil Kementerian Agama Provinsi DKI Jakarta.
                </p>

            </div>

            <!-- GRID -->
            <div class="contact-wrapper">
                <div class="row g-4 align-items-stretch">

                    <!-- MAP -->
                    <div class="col-lg-6">
                        <div class="contact-card map-wrapper">

                            <iframe
                                src="https://www.google.com/maps?q=Kanwil%20Kementerian%20Agama%20Provinsi%20DKI%20Jakarta&output=embed"
                                allowfullscreen="" loading="lazy">
                            </iframe>

                            <div class="map-overlay">
                                <h5>
                                    Kanwil Kementerian Agama Provinsi DKI Jakarta
                                </h5>

                                <p>
                                    Jalan D.I. Panjaitan Nomor 10,
                                    Cipinang Cempedak, Jatinegara,
                                    Jakarta Timur, DKI Jakarta 13340
                                </p>
                            </div>

                        </div>
                    </div>

                    <!-- FORM -->
                    <div class="col-lg-6">
                        <div class="contact-card form-wrapper">

                            <h3 class="contact-heading">
                                Kirim Pesan
                            </h3>

                            <p class="contact-text">
                                Isi formulir berikut untuk menghubungi tim
                                Bidang Pendidikan Madrasah.
                            </p>

                            <form action="#" method="POST">
                                @csrf

                                <div class="mb-4">
                                    <label class="form-label">
                                        Nama Lengkap
                                    </label>

                                    <input type="text" class="form-control custom-input"
                                        placeholder="Masukkan nama lengkap">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">
                                        Email
                                    </label>

                                    <input type="email" class="form-control custom-input"
                                        placeholder="Masukkan alamat email">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">
                                        Subjek
                                    </label>

                                    <input type="text" class="form-control custom-input"
                                        placeholder="Masukkan subjek pesan">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">
                                        Pesan
                                    </label>

                                    <textarea rows="5" class="form-control custom-input" placeholder="Tulis pesan anda..."></textarea>
                                </div>

                                <button type="submit" class="contact-btn">
                                    <i class="bi bi-send-fill me-2"></i>
                                    Kirim Pesan
                                </button>
                            </form>

                            <!-- INFO -->
                            <div class="contact-info">

                                <div class="contact-info-item">
                                    <div class="contact-info-icon">
                                        <i class="bi bi-geo-alt-fill"></i>
                                    </div>

                                    <div>
                                        <h6>Alamat Kantor</h6>

                                        <p>
                                            Jl. D.I. Panjaitan No.10,
                                            Jakarta Timur, DKI Jakarta
                                        </p>
                                    </div>
                                </div>

                                <div class="contact-info-item">
                                    <div class="contact-info-icon">
                                        <i class="bi bi-envelope-fill"></i>
                                    </div>

                                    <div>
                                        <h6>Email</h6>

                                        <p>
                                            penmad.dki@kemenag.go.id
                                        </p>
                                    </div>
                                </div>

                                <div class="contact-info-item">
                                    <div class="contact-info-icon">
                                        <i class="bi bi-telephone-fill"></i>
                                    </div>

                                    <div>
                                        <h6>Telepon</h6>

                                        <p>
                                            (021) 8197484
                                        </p>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection
