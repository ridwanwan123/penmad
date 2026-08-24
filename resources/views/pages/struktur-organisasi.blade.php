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
                    <div class="jabatan-label-bidang">KEPALA BIDANG</div>

                    <div class="kepala-card">
                        <img src="{{ asset('assets/images/profile/kabid.jpg') }}" alt="" />

                        <div>
                            <h5 style="font-size: 1.2rem;">
                                <b>Viola Cempaka, S.E., M.Pd.</b>
                            </h5>

                            <p>Kepala Bidang <br /> Pendidikan Madrasah</p>

                            <div class="kepala-nip">
                                <i class="bi bi-card-text"></i>
                                <span>NIP. 198006142003122002</span>
                            </div>

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
                    <!-- 1 -->
                    <div class="ketimker-column">
                        <div class="mini-vertical-line"></div>

                        <div class="org-card">
                            <div class="jabatan-label">KETIMKER 1</div>

                            <img src="{{ asset('assets/images/profile/saepul.jpeg') }}" alt="" />

                            <h5>Saepul, S.Pd., M.M.</h5>

                            <div class="team-badge">
                                <span class="team-badge-icon"><i class="bi bi-journal-bookmark-fill"></i></span>
                                <span class="team-badge-text">Tim Kerja Kurikulum</span>
                            </div>

                            <div class="ketimker-nip">
                                <i class="bi bi-card-text"></i>
                                <span>NIP. 198105072007101002</span>
                            </div>
                        </div>

                        <div class="staff-connector"></div>

                        <div class="staff-card">
                            <div class="staff-title">STAFF TIM</div>

                            <div class="staff-item">
                                <img src="{{ asset('assets/images/profile/arif.jpg') }}" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">Moch. Arief Hidayat, M.Pd.</div>
                                    <div class="staff-position">Anggota</div>
                                    <div class="staff-nip">
                                        NIP. 197809232005011002
                                    </div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="{{ asset('assets/images/profile/umam.jpg') }}" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">
                                        Khairul Umam I.A
                                    </div>
                                    <div class="staff-position">Anggota</div>
                                    <div class="staff-nip">
                                        NIP. 198405292009011009
                                    </div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="{{ asset('assets/images/profile/hanum.JPG') }}" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">
                                        Fitriani Dewi Hanum, S.E.
                                    </div>
                                    <div class="staff-position">Anggota</div>
                                    <div class="staff-nip">NIP. 199009252025052002</div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- 2 -->
                    <div class="ketimker-column">
                        <div class="mini-vertical-line"></div>

                        <div class="org-card">
                            <div class="jabatan-label">KETIMKER 2</div>

                            <img src="{{ asset('assets/images/profile/hery.jpg') }}" alt="" />

                            <h5>A. Hery Fathurrochman, M.A.</h5>

                            <div class="team-badge blue">
                                <span class="team-badge-icon"><i class="bi bi-diagram-3-fill"></i></span>
                                <span class="team-badge-text">Tim Kelembagaan & Sistem Informasi Madrasah</span>
                            </div>

                            <div class="ketimker-nip">
                                <i class="bi bi-card-text"></i>
                                <span>NIP. 197612132006041006</span>
                            </div>
                        </div>

                        <div class="staff-connector"></div>

                        <div class="staff-card">
                            <div class="staff-title">STAFF TIM</div>

                            <div class="staff-item">
                                <img src="{{ asset('assets/images/profile/rofiq.JPG') }}" class="staff-avatar" />
                                <div class="staff-info">
                                    <div class="staff-name">
                                        M. Rofiq Burhani, S.Pd.I.
                                    </div>
                                    <div class="staff-position">Anggota</div>
                                    <div class="staff-nip">
                                        NIP. 198101292024211005
                                    </div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="{{ asset('assets/images/profile/nova.jpg') }}" class="staff-avatar" />
                                <div class="staff-info">
                                    <div class="staff-name">
                                        Novaliza, S.E.
                                    </div>
                                    <div class="staff-position">Anggota</div>
                                    <div class="staff-nip">
                                        NIP. 198211022009012007
                                    </div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="{{ asset('assets/images/profile/fitri.jpg') }}" class="staff-avatar" />
                                <div class="staff-info">
                                    <div class="staff-name">Fitri Rochmah, S.E.</div>
                                    <div class="staff-position">Anggota</div>
                                    <div class="staff-nip">
                                        NIP. 198307122003122001
                                    </div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="{{ asset('assets/images/profile/supri.jpg') }}" class="staff-avatar" />
                                <div class="staff-info">
                                    <div class="staff-name">Supriyanto, S.E.</div>
                                    <div class="staff-position">Anggota</div>
                                    <div class="staff-nip">
                                        NIP. 198004182009011012
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 3 -->
                    <div class="ketimker-column">
                        <div class="mini-vertical-line"></div>

                        <div class="org-card">
                            <div class="jabatan-label">KETIMKER 3</div>

                            <img src="{{ asset('assets/images/profile/rizqi.jpg') }}" alt="" />

                            <h5 style="font-size: 0.78rem;">
                                Rizqi Fardiansyah, S.Pd., M.A.P.
                            </h5>

                            <div class="team-badge gold">
                                <span class="team-badge-icon"><i class="bi bi-trophy-fill"></i></span>
                                <span class="team-badge-text">Tim Kerja Kesiswaan</span>
                            </div>

                            <div class="ketimker-nip">
                                <i class="bi bi-card-text"></i>
                                <span>NIP. 198603162005011001</span>
                            </div>
                        </div>

                        <div class="staff-connector"></div>

                        <div class="staff-card">
                            <div class="staff-title">STAFF TIM</div>

                            <div class="staff-item">
                                <img src="{{ asset('assets/images/profile/apris.jpg') }}" class="staff-avatar" />
                                <div class="staff-info">
                                    <div class="staff-name">Apris Hidayat, S.T.</div>
                                    <div class="staff-position">Anggota</div>
                                    <div class="staff-nip">
                                        NIP. 198102032008011010
                                    </div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="{{ asset('assets/images/profile/rifa.JPG') }}" class="staff-avatar" />
                                <div class="staff-info">
                                    <div class="staff-name">
                                        Siti Ri’atul Adawiyah, S.E.
                                    </div>
                                    <div class="staff-position">Anggota</div>
                                    <div class="staff-nip">
                                        NIP. 199301062025052001
                                    </div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="{{ asset('assets/images/profile/faqih.jpeg') }}" class="staff-avatar" />
                                <div class="staff-info">
                                    <div class="staff-name">Faqih Khairul Fikri, S.Psi.</div>
                                    <div class="staff-position">Anggota</div>
                                    <div class="staff-nip">
                                        NIP. 198608072006041005
                                    </div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="{{ asset('assets/images/profile/sahrul.JPG') }}" class="staff-avatar" />
                                <div class="staff-info">
                                    <div class="staff-name">Sahrul Muit, S.H.</div>
                                    <div class="staff-position">Anggota</div>
                                    <div class="staff-nip">
                                        NIP. -
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <!-- 4 -->
                    <div class="ketimker-column">
                        <div class="mini-vertical-line"></div>

                        <div class="org-card">
                            <div class="jabatan-label">KETIMKER 4</div>

                            <img src="{{ asset('assets/images/profile/pur.jpg') }}" alt="" />

                            <h5>Sri Purnomowati, S.E., M.M.</h5>

                            <div class="team-badge blue">
                                <span class="team-badge-icon"><i class="bi bi-building-fill"></i></span>
                                <span class="team-badge-text">Tim Kerja Sarana & Prasarana</span>
                            </div>

                            <div class="ketimker-nip">
                                <i class="bi bi-card-text"></i>
                                <span>NIP. 197510162009012003</span>
                            </div>
                        </div>

                        <div class="staff-connector"></div>

                        <div class="staff-card">
                            <div class="staff-title">STAFF TIM</div>

                            <div class="staff-item">
                                <img src="{{ asset('assets/images/profile/ratri.jpg') }}" class="staff-avatar" />
                                <div class="staff-info">
                                    <div class="staff-name">Ratri Kiswandari</div>
                                    <div class="staff-position">Anggota</div>
                                    <div class="staff-nip">
                                        NIP. 196811251989032003
                                    </div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="{{ asset('assets/images/profile/alfi.jpg') }}" class="staff-avatar" />
                                <div class="staff-info">
                                    <div class="staff-name">Alfi Fadlil, S.E.</div>
                                    <div class="staff-position">Anggota</div>
                                    <div class="staff-nip">
                                        NIP. 199309142023211027
                                    </div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="{{ asset('assets/images/profile/syifa.jpg') }}" class="staff-avatar" />
                                <div class="staff-info">
                                    <div class="staff-name">Syifa Ardiansyah, S.M.</div>
                                    <div class="staff-position">Anggota</div>
                                    <div class="staff-nip">
                                        NIP. 199909162025211023
                                    </div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="{{ asset('assets/images/profile/rian.JPG') }}" class="staff-avatar" />
                                <div class="staff-info">
                                    <div class="staff-name">
                                        Rian Tri Prasetio, S.Kom.
                                    </div>
                                    <div class="staff-position">Anggota</div>
                                    <div class="staff-nip">
                                        NIP. 199512142025051003
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 5 -->
                    <div class="ketimker-column">
                        <div class="mini-vertical-line"></div>

                        <div class="org-card">
                            <div class="jabatan-label">KETIMKER 5</div>

                            <img src="{{ asset('assets/images/profile/anang.jpg') }}" alt="" />

                            <h5>Anang Setiawan, S.T., M.A.P.</h5>

                            <div class="team-badge">
                                <span class="team-badge-icon"><i class="bi bi-mortarboard-fill"></i></span>
                                <span class="team-badge-text">Tim Kerja Guru</span>
                            </div>

                            <div class="ketimker-nip">
                                <i class="bi bi-card-text"></i>
                                <span>NIP. 19712142009011001</span>
                            </div>
                        </div>

                        <div class="staff-connector"></div>

                        <div class="staff-card">
                            <div class="staff-title">STAFF TIM</div>

                            <div class="staff-item">
                                <img src="{{ asset('assets/images/profile/riki.jpg') }}" class="staff-avatar" />
                                <div class="staff-info">
                                    <div class="staff-name">
                                        Riki Rochmilaningsih, S.E.
                                    </div>
                                    <div class="staff-position">Anggota</div>
                                    <div class="staff-nip">
                                        NIP. 198105132006042023
                                    </div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="{{ asset('assets/images/profile/dini.JPG') }}" class="staff-avatar" />
                                <div class="staff-info">
                                    <div class="staff-name">Dini Dinahastuti, S.Ak.</div>
                                    <div class="staff-position">Anggota</div>
                                    <div class="staff-nip">
                                        NIP. 199710202025052005
                                    </div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="{{ asset('assets/images/profile/farel.JPG') }}" class="staff-avatar" />
                                <div class="staff-info">
                                    <div class="staff-name">Moh. Farel Ardana, S.T.</div>
                                    <div class="staff-position">Anggota</div>
                                    <div class="staff-nip">
                                        NIP. 200108292025051006
                                    </div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="{{ asset('assets/images/profile/ama.jpeg') }}" class="staff-avatar" />
                                <div class="staff-info">
                                    <div class="staff-name">Ama Gusti Azir, S.Pd.</div>
                                    <div class="staff-position">Anggota</div>
                                    <div class="staff-nip">
                                        NIP. 199303132025211054
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- 6 -->
                    <div class="ketimker-column">
                        <div class="mini-vertical-line"></div>

                        <div class="org-card">
                            <div class="jabatan-label">KETIMKER 6</div>

                            <img src="{{ asset('assets/images/profile/jiat.jpg') }}" alt="" />

                            <h5>Jiat Munjat, S.Pd.I.</h5>

                            <div class="team-badge gold">
                                <span class="team-badge-icon"><i class="bi bi-people-fill"></i></span>
                                <span class="team-badge-text">Tim Kerja Tenaga Kependidikan</span>
                            </div>

                            <div class="ketimker-nip">
                                <i class="bi bi-card-text"></i>
                                <span>NIP. 198212232005011002</span>
                            </div>
                        </div>

                        <div class="staff-connector"></div>

                        <div class="staff-card">
                            <div class="staff-title">STAFF TIM</div>

                            <div class="staff-item">
                                <img src="{{ asset('assets/images/profile/salam.jpg') }}" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">Abdus Salam, S.E., M.M.</div>
                                    <div class="staff-position">Anggota</div>
                                    <div class="staff-nip">
                                        NIP. 198602022009101001
                                    </div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="{{ asset('assets/images/profile/ridwan.JPG') }}" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">
                                        Muhamad Ridwan, S.Tr.Kom.
                                    </div>
                                    <div class="staff-position">Anggota</div>
                                    <div class="staff-nip">
                                        NIP. 200104102025051007
                                    </div>
                                </div>
                            </div>

                            <div class="staff-item">
                                <img src="{{ asset('assets/images/profile/elen.jpg') }}" class="staff-avatar" />

                                <div class="staff-info">
                                    <div class="staff-name">
                                        Eilien Dwi Khairina, S.Tr.Li.
                                    </div>
                                    <div class="staff-position">Anggota</div>
                                    <div class="staff-nip">NIP. -</div>
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
                        <h3>22</h3>
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
                        <h3>30</h3>
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