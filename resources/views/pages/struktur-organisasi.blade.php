@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/struktural.css') }}">
@endpush

@section('content')
    <section class="org-section mt-5">
        <div class="container-fluid px-lg-4">
            <!-- TITLE -->
            <div class="section-title text-center">
                <div class="title-ornament">
                    <span class="line"></span>
                    <i class="bi bi-star-fill"></i>
                    <span class="line"></span>
                </div>

                <h1>Struktur Organisasi</h1>

                <p>
                    <b>Bidang Pendidikan Madrasah </b><br />Kanwil Kementerian Agama
                    Provinsi DKI Jakarta
                </p>
            </div>

            <!-- WRAPPER -->
            <div class="org-wrapper">
                <!-- KEPALA -->
                <div class="kepala-wrapper">
                    <div class="jabatan-label">KEPALA BIDANG</div>

                    <div class="kepala-card">
                        <img src="assets/images/avatar.png" alt="" />

                        <div>
                            <h3>Hj. Viola Cempaka, S.Pd., M.Pd.</h3>

                            <p>Kepala Bidang Pendidikan Madrasah</p>

                            <span class="status-badge">
                                <i class="bi bi-check-circle-fill"></i>
                                Aktif
                            </span>
                        </div>
                    </div>
                </div>

                <!-- CONNECTOR -->
                <div class="connector-wrapper">
                    <div class="vertical-line"></div>
                    <div class="main-horizontal-line"></div>
                </div>

                <!-- GRID -->
                <div class="ketimker-grid">
                    <!-- ITEM -->
                    <!-- 1 -->
                    <div class="ketimker-column">
                        <div class="mini-vertical-line"></div>

                        <div class="org-card">
                            <div class="jabatan-label">KETIMKER 1</div>

                            <img src="assets/images/avatar.png" alt="" />

                            <h5>Drs. Ahmad Fauzi, M.Pd.</h5>

                            <p>Ketua Tim Kerja Kurikulum</p>

                            <div class="icon-circle">
                                <i class="bi bi-journal-bookmark-fill"></i>
                            </div>
                        </div>

                        <div class="staff-connector"></div>

                        <div class="staff-card">
                            <div class="staff-title">STAFF</div>

                            <div class="staff-item">
                                <img src="assets/images/avatar.png" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">Siti Rahmawati</div>
                                    <div class="staff-position">Operator Data Pendidikan</div>
                                    <div class="staff-nip">NIP. 198707182011012003</div>
                                </div>
                            </div>
                            <div class="staff-item">
                                <img src="assets/images/avatar.png" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">Siti Rahmawati</div>
                                    <div class="staff-position">Operator Data Pendidikan</div>
                                    <div class="staff-nip">NIP. 198707182011012003</div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="assets/images/avatar.png" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">Siti Rahmawati</div>
                                    <div class="staff-position">Operator Data Pendidikan</div>
                                    <div class="staff-nip">NIP. 198707182011012003</div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="assets/images/avatar.png" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">Siti Rahmawati</div>
                                    <div class="staff-position">Operator Data Pendidikan</div>
                                    <div class="staff-nip">NIP. 198707182011012003</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 2 -->
                    <div class="ketimker-column">
                        <div class="mini-vertical-line"></div>

                        <div class="org-card">
                            <div class="jabatan-label">KETIMKER 2</div>

                            <img src="assets/images/avatar.png" alt="" />

                            <h5>Siti Nurazizah, M.Pd.</h5>

                            <p>Ketua Tim Kerja Kesiswaan</p>

                            <div class="icon-circle gold">
                                <i class="bi bi-trophy-fill"></i>
                            </div>
                        </div>

                        <div class="staff-connector"></div>

                        <div class="staff-card">
                            <div class="staff-title">STAFF</div>

                            <div class="staff-item">
                                <img src="assets/images/avatar.png" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">Siti Rahmawati</div>
                                    <div class="staff-position">Operator Data Pendidikan</div>
                                    <div class="staff-nip">NIP. 198707182011012003</div>
                                </div>
                            </div>
                            <div class="staff-item">
                                <img src="assets/images/avatar.png" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">Siti Rahmawati</div>
                                    <div class="staff-position">Operator Data Pendidikan</div>
                                    <div class="staff-nip">NIP. 198707182011012003</div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="assets/images/avatar.png" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">Siti Rahmawati</div>
                                    <div class="staff-position">Operator Data Pendidikan</div>
                                    <div class="staff-nip">NIP. 198707182011012003</div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="assets/images/avatar.png" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">Siti Rahmawati</div>
                                    <div class="staff-position">Operator Data Pendidikan</div>
                                    <div class="staff-nip">NIP. 198707182011012003</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 3 -->
                    <div class="ketimker-column">
                        <div class="mini-vertical-line"></div>

                        <div class="org-card">
                            <div class="jabatan-label">KETIMKER 3</div>

                            <img src="assets/images/avatar.png" alt="" />

                            <h5>Faizal Rahman, M.Pd.</h5>

                            <p>Ketua Tim Kerja Sarana & Prasarana</p>

                            <div class="icon-circle blue">
                                <i class="bi bi-building-fill"></i>
                            </div>
                        </div>

                        <div class="staff-connector"></div>

                        <div class="staff-card">
                            <div class="staff-title">STAFF</div>

                            <div class="staff-item">
                                <img src="assets/images/avatar.png" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">Siti Rahmawati</div>
                                    <div class="staff-position">
                                        Pranata Komputer Ahli Pertama
                                    </div>
                                    <div class="staff-nip">NIP. 198707182011012003</div>
                                </div>
                            </div>
                            <div class="staff-item">
                                <img src="assets/images/avatar.png" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">Siti Rahmawati</div>
                                    <div class="staff-position">Staff Sarana & Prasarana</div>
                                    <div class="staff-nip">NIP. 198707182011012003</div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="assets/images/avatar.png" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">Siti Rahmawati</div>
                                    <div class="staff-position">Staff Sarana & Prasarana</div>
                                    <div class="staff-nip">NIP. 198707182011012003</div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="assets/images/avatar.png" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">Siti Rahmawati</div>
                                    <div class="staff-position">Staff Sarana & Prasarana</div>
                                    <div class="staff-nip">NIP. 198707182011012003</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 4 -->
                    <div class="ketimker-column">
                        <div class="mini-vertical-line"></div>

                        <div class="org-card">
                            <div class="jabatan-label">KETIMKER 4</div>

                            <img src="assets/images/avatar.png" alt="" />

                            <h5>Dewi Khairunnisa, M.Pd.</h5>

                            <p>Ketua Tim Kerja Guru</p>

                            <div class="icon-circle">
                                <i class="bi bi-mortarboard-fill"></i>
                            </div>
                        </div>

                        <div class="staff-connector"></div>

                        <div class="staff-card">
                            <div class="staff-title">STAFF</div>

                            <div class="staff-item">
                                <img src="assets/images/avatar.png" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">Siti Rahmawati</div>
                                    <div class="staff-position">Operator Data Pendidikan</div>
                                    <div class="staff-nip">NIP. 198707182011012003</div>
                                </div>
                            </div>
                            <div class="staff-item">
                                <img src="assets/images/avatar.png" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">Siti Rahmawati</div>
                                    <div class="staff-position">Operator Data Pendidikan</div>
                                    <div class="staff-nip">NIP. 198707182011012003</div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="assets/images/avatar.png" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">Siti Rahmawati</div>
                                    <div class="staff-position">Operator Data Pendidikan</div>
                                    <div class="staff-nip">NIP. 198707182011012003</div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="assets/images/avatar.png" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">Siti Rahmawati</div>
                                    <div class="staff-position">Operator Data Pendidikan</div>
                                    <div class="staff-nip">NIP. 198707182011012003</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 5 -->
                    <div class="ketimker-column">
                        <div class="mini-vertical-line"></div>

                        <div class="org-card">
                            <div class="jabatan-label">KETIMKER 5</div>

                            <img src="assets/images/avatar.png" alt="" />

                            <h5>Rizki Maulana, M.Pd.</h5>

                            <p>Ketua Tim Kerja Tenaga Pendidikan</p>

                            <div class="icon-circle gold">
                                <i class="bi bi-people-fill"></i>
                            </div>
                        </div>

                        <div class="staff-connector"></div>

                        <div class="staff-card">
                            <div class="staff-title">STAFF</div>

                            <div class="staff-item">
                                <img src="assets/images/avatar.png" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">Siti Rahmawati</div>
                                    <div class="staff-position">Operator Data Pendidikan</div>
                                    <div class="staff-nip">NIP. 198707182011012003</div>
                                </div>
                            </div>
                            <div class="staff-item">
                                <img src="assets/images/avatar.png" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">Siti Rahmawati</div>
                                    <div class="staff-position">Operator Data Pendidikan</div>
                                    <div class="staff-nip">NIP. 198707182011012003</div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="assets/images/avatar.png" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">Siti Rahmawati</div>
                                    <div class="staff-position">Operator Data Pendidikan</div>
                                    <div class="staff-nip">NIP. 198707182011012003</div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="assets/images/avatar.png" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">Siti Rahmawati</div>
                                    <div class="staff-position">Operator Data Pendidikan</div>
                                    <div class="staff-nip">NIP. 198707182011012003</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 6 -->
                    <div class="ketimker-column">
                        <div class="mini-vertical-line"></div>

                        <div class="org-card">
                            <div class="jabatan-label">KETIMKER 6</div>

                            <img src="assets/images/avatar.png" alt="" />

                            <h5>Nadia Putri, M.Pd.</h5>

                            <p>Ketua Tim Kerja Informasi & Kelembagaan</p>

                            <div class="icon-circle blue">
                                <i class="bi bi-diagram-3-fill"></i>
                            </div>
                        </div>

                        <div class="staff-connector"></div>

                        <div class="staff-card">
                            <div class="staff-title">STAFF</div>

                            <div class="staff-item">
                                <img src="assets/images/avatar.png" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">Siti Rahmawati</div>
                                    <div class="staff-position">Operator Data Pendidikan</div>
                                    <div class="staff-nip">NIP. 198707182011012003</div>
                                </div>
                            </div>
                            <div class="staff-item">
                                <img src="assets/images/avatar.png" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">Siti Rahmawati</div>
                                    <div class="staff-position">Operator Data Pendidikan</div>
                                    <div class="staff-nip">NIP. 198707182011012003</div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="assets/images/avatar.png" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">Siti Rahmawati</div>
                                    <div class="staff-position">Operator Data Pendidikan</div>
                                    <div class="staff-nip">NIP. 198707182011012003</div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="assets/images/avatar.png" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">Siti Rahmawati</div>
                                    <div class="staff-position">Operator Data Pendidikan</div>
                                    <div class="staff-nip">NIP. 198707182011012003</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="scroll-hint">
                ← Geser ke samping untuk melihat struktur →
            </div>

            <div class="rotate-hint">
                <i class="bi bi-phone"></i>
                <h4>Rotasikan perangkat Anda</h4>
                <p>Gunakan mode landscape untuk tampilan struktur yang lebih jelas</p>
            </div>
            <!-- STAT CARDS -->
            <div class="stats-grid">
                <!-- KETIMKER -->
                <div class="stat-card">
                    <div class="stat-icon green">
                        <i class="bi bi-diagram-3-fill"></i>
                    </div>

                    <div class="stat-info">
                        <h3>6</h3>
                        <p>Ketua Tim Kerja</p>
                    </div>
                </div>

                <!-- STAFF -->
                <div class="stat-card">
                    <div class="stat-icon blue">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <div class="stat-info">
                        <h3>24</h3>
                        <p>Staff</p>
                    </div>
                </div>

                <!-- OB -->
                <div class="stat-card">
                    <div class="stat-icon gold">
                        <i class="bi bi-person-workspace"></i>
                    </div>

                    <div class="stat-info">
                        <h3>1</h3>
                        <p>Office Boy</p>
                    </div>
                </div>

                <!-- TOTAL -->
                <div class="stat-card total-card">
                    <div class="stat-icon dark">
                        <i class="bi bi-bar-chart-fill"></i>
                    </div>

                    <div class="stat-info">
                        <h3>32</h3>
                        <p>Total Pegawai</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/struktural.js') }}"></script>
@endpush
