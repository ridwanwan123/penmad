@extends('layouts.app')

@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet">
    <style>
    :root {
        --space-deep: #0a0d24;
        --space-mid: #12173d;
        --nebula-purple: #8b6fd6;
        --star-gold: #f0b429;
        --star-teal: #4fd1c5;
        --star-white: #f5f5f7;
        --text-dim: #a9aecb;
    }

    .jmc-stage {
        position: relative;
        z-index: 1;
        min-height: 900px;
        background:
            radial-gradient(ellipse at 20% 15%, rgba(139, 111, 214, 0.35), transparent 45%),
            radial-gradient(ellipse at 85% 75%, rgba(79, 209, 197, 0.18), transparent 50%),
            linear-gradient(180deg, var(--space-deep) 0%, var(--space-mid) 55%, var(--space-deep) 100%);
        padding: 160px 0 90px;
        color: var(--star-white);
        overflow: hidden;
    }

    #jmc-stars {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
    }

    .jmc-hero-row {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 36px;
        max-width: 900px;
        margin: 0 auto 70px;
    }

    .jmc-hero-logo {
        flex-shrink: 0;
        width: 108px;
        height: auto;
        object-fit: contain;
        filter: drop-shadow(0 0 20px rgba(139, 111, 214, 0.5));
    }

    .jmc-hero-logo.jmc-logo-kanan {
        width: 160px;
        filter: drop-shadow(0 0 22px rgba(240, 180, 41, 0.45));
    }

    .jmc-hero {
        position: relative;
        text-align: center;
        max-width: 560px;
        margin: 0;
    }

    .jmc-eyebrow {
        font-family: 'JetBrains Mono', monospace;
        font-size: 12px;
        letter-spacing: 2px;
        color: var(--star-gold);
        text-transform: uppercase;
        display: inline-block;
        padding: 6px 16px;
        border: 1px solid rgba(240, 180, 41, 0.4);
        border-radius: 999px;
        background: rgba(240, 180, 41, 0.08);
        margin-bottom: 22px;
    }

    .jmc-hero h1 {
        font-family: 'Space Grotesk', sans-serif;
        font-weight: 700;
        font-size: clamp(30px, 4.4vw, 48px);
        line-height: 1.14;
        letter-spacing: -0.01em;
        background: linear-gradient(90deg, #fff, #cfc8ff 60%, var(--star-teal));
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 0 0 46px rgba(139, 111, 214, 0.55);
        margin-bottom: 6px;
    }

    .jmc-hero h1 .jmc-year {
        display: block;
        margin-top: 6px;
        font-size: 0.62em;
        letter-spacing: 0.12em;
        background: linear-gradient(90deg, var(--star-gold), #f7d178);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 0 0 30px rgba(240, 180, 41, 0.5);
    }

    .jmc-divider {
        width: 84px;
        height: 2px;
        margin: 22px auto 24px;
        background: linear-gradient(90deg, transparent, var(--star-gold), transparent);
    }

    .jmc-hero p {
        color: var(--text-dim);
        font-size: 16px;
        line-height: 1.7;
        max-width: 520px;
        margin: 0 auto;
    }

    .jmc-grid-row1,
    .jmc-grid-row2 {
        position: relative;
        display: grid;
        gap: 24px;
        max-width: 1200px;
        margin: 0 auto 24px;
    }

    .jmc-grid-row2 {
        margin-bottom: 0;
    }

    .jmc-grid-row1 {
        grid-template-columns: repeat(3, 1fr);
    }

    .jmc-grid-row2 {
        grid-template-columns: repeat(4, 1fr);
    }

    @media (max-width: 991.98px) {
        .jmc-grid-row1,
        .jmc-grid-row2 {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 640px) {
        .jmc-grid-row1,
        .jmc-grid-row2 {
            grid-template-columns: 1fr;
        }
    }

    .jmc-card {
        position: relative;
        background: linear-gradient(160deg, rgba(255, 255, 255, 0.06), rgba(255, 255, 255, 0.015));
        border: 1px solid rgba(255, 255, 255, 0.09);
        border-radius: 18px;
        padding: 36px 30px 32px;
        backdrop-filter: blur(6px);
        transition: transform 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease;
        overflow: hidden;
    }

    .jmc-card::before {
        content: "";
        position: absolute;
        inset: -1px;
        border-radius: 18px;
        padding: 1px;
        background: linear-gradient(140deg, var(--ring-color, var(--nebula-purple)), transparent 40%);
        -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        opacity: 0.7;
        pointer-events: none;
    }

    .jmc-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 40px -12px rgba(139, 111, 214, 0.45);
        border-color: rgba(255, 255, 255, 0.22);
    }

    .jmc-icon-orb {
        width: 62px;
        height: 62px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: radial-gradient(circle at 30% 30%, var(--ring-color, var(--nebula-purple)), rgba(0, 0, 0, 0));
        border: 1px solid rgba(255, 255, 255, 0.25);
        margin-bottom: 20px;
        font-size: 26px;
    }

    .jmc-card h3 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .jmc-card p.jmc-desc {
        color: var(--text-dim);
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 22px;
        min-height: 42px;
    }

    .jmc-card a {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        font-weight: 600;
        color: var(--space-deep);
        background: linear-gradient(90deg, var(--star-gold), #f7d178);
        padding: 12px 18px;
        border-radius: 10px;
        text-decoration: none;
        width: 100%;
        justify-content: center;
        transition: filter 0.2s ease;
    }

    .jmc-card a:hover {
        filter: brightness(1.08);
    }

    .jmc-card a:focus-visible,
    .jmc-card:has(a:focus-visible) {
        outline: 2px solid var(--star-teal);
        outline-offset: 3px;
    }

    .jmc-badge {
        position: absolute;
        top: 22px;
        right: 22px;
        font-family: 'JetBrains Mono', monospace;
        font-size: 10px;
        color: var(--text-dim);
        letter-spacing: 1px;
    }

    @media (max-width: 991.98px) {
        .jmc-stage {
            padding-top: 130px;
        }

        .jmc-hero-row {
            gap: 16px;
        }

        .jmc-hero-logo {
            width: 64px;
        }

        .jmc-hero-logo.jmc-logo-kanan {
            width: 96px;
        }
    }

    @media (max-width: 640px) {
        .jmc-hero-row {
            flex-direction: column;
            gap: 18px;
        }

        .jmc-hero-logo {
            width: 70px;
        }

        .jmc-hero-logo.jmc-logo-kanan {
            width: 110px;
        }

        .jmc-hero {
            margin-bottom: 0;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .jmc-card {
            transition: none;
        }
    }

    .footer-section {
        margin-top: 0;
    }
    </style>
@endpush

@section('content')

<div class="jmc-stage">
    <canvas id="jmc-stars"></canvas>

    <div class="container-fluid px-lg-5 px-5">

        <div class="jmc-hero-row">
            <img src="{{ asset('assets/images/jmc-kiri.png') }}" alt="Logo JMC" class="jmc-hero-logo">

            <div class="jmc-hero">
                <span class="jmc-eyebrow">Pendaftaran dibuka</span>
                <h1>Jakarta Madrasah<span class="jmc-year">Competition 2026</span></h1>
                <div class="jmc-divider"></div>
                <p>Pilih bidang lomba yang kamu minati, lalu daftar langsung lewat formulir resmi tiap bidang.</p>
            </div>

            <img src="{{ asset('assets/images/jmc-kanan.png') }}" alt="Logo JMC" class="jmc-hero-logo jmc-logo-kanan">
        </div>

        <div class="jmc-grid-row1">

            <div class="jmc-card" style="--ring-color:#8b6fd6">
                <span class="jmc-badge">01</span>
                <div class="jmc-icon-orb"><i class="bi bi-moon-stars-fill"></i></div>
                <h3>Keagamaan</h3>
                <p class="jmc-desc">Lomba bidang keagamaan madrasah.</p>
                <a href="https://forms.gle/SUAFnT591WTUBCu67" target="_blank" rel="noopener">
                    Daftar sekarang <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="jmc-card" style="--ring-color:#4fd1c5">
                <span class="jmc-badge">02</span>
                <div class="jmc-icon-orb"><i class="bi bi-eyedropper"></i></div>
                <h3>Sains</h3>
                <p class="jmc-desc">Kompetisi sains dan eksperimen.</p>
                <a href="https://forms.gle/BhvWnEv8wR9PtgWW7" target="_blank" rel="noopener">
                    Daftar sekarang <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="jmc-card" style="--ring-color:#f0b429">
                <span class="jmc-badge">03</span>
                <div class="jmc-icon-orb"><i class="bi bi-trophy-fill"></i></div>
                <h3>Olahraga</h3>
                <p class="jmc-desc">Cabang lomba olahraga madrasah.</p>
                <a href="https://forms.gle/AQPm5drV4QoJ5kJ78" target="_blank" rel="noopener">
                    Daftar sekarang <i class="bi bi-arrow-right"></i>
                </a>
            </div>

        </div>

        <div class="jmc-grid-row2">

            <div class="jmc-card" style="--ring-color:#e07be0">
                <span class="jmc-badge">04</span>
                <div class="jmc-icon-orb"><i class="bi bi-palette-fill"></i></div>
                <h3>Seni</h3>
                <p class="jmc-desc">Kompetisi seni dan kreativitas.</p>
                <a href="https://forms.gle/gpVFAphuLHNUnZpV6" target="_blank" rel="noopener">
                    Daftar sekarang <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="jmc-card" style="--ring-color:#6fa8ff">
                <span class="jmc-badge">05</span>
                <div class="jmc-icon-orb"><i class="bi bi-binoculars-fill"></i></div>
                <h3>Riset</h3>
                <p class="jmc-desc">Lomba karya riset siswa.</p>
                <a href="https://forms.gle/CnfoYqLf9YpESvg17" target="_blank" rel="noopener">
                    Daftar sekarang <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="jmc-card" style="--ring-color:#ff8a5c">
                <span class="jmc-badge">06</span>
                <div class="jmc-icon-orb"><i class="bi bi-robot"></i></div>
                <h3>Robotik</h3>
                <p class="jmc-desc">Kompetisi robotik madrasah.</p>
                <a href="https://forms.gle/VmiKko8YBu3L62Dy5" target="_blank" rel="noopener">
                    Daftar sekarang <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="jmc-card" style="--ring-color:#7cd992">
                <span class="jmc-badge">07</span>
                <div class="jmc-icon-orb"><i class="bi bi-mortarboard-fill"></i></div>
                <h3>GTK</h3>
                <p class="jmc-desc">Lomba untuk Guru dan Tenaga Kependidikan.</p>
                <a href="https://forms.gle/7Tw1PpzqLjZRgyDV9" target="_blank" rel="noopener">
                    Daftar sekarang <i class="bi bi-arrow-right"></i>
                </a>
            </div>

        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    (function () {
        const canvas = document.getElementById('jmc-stars');
        const ctx = canvas.getContext('2d');
        const stage = canvas.parentElement;

        function resize() {
            canvas.width = stage.offsetWidth;
            canvas.height = stage.offsetHeight;
        }
        resize();
        window.addEventListener('resize', resize);

        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        const stars = Array.from({ length: 140 }, () => ({
            x: Math.random(),
            y: Math.random(),
            r: Math.random() * 1.4 + 0.3,
            speed: Math.random() * 0.02 + 0.005,
            phase: Math.random() * Math.PI * 2
        }));

        function draw(t) {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            stars.forEach(s => {
                const alpha = prefersReducedMotion
                    ? 0.7
                    : 0.4 + 0.6 * Math.sin(t * s.speed + s.phase);
                ctx.beginPath();
                ctx.arc(s.x * canvas.width, s.y * canvas.height, s.r, 0, Math.PI * 2);
                ctx.fillStyle = `rgba(255,255,255,${Math.max(0, alpha)})`;
                ctx.fill();
            });
            if (!prefersReducedMotion) {
                requestAnimationFrame(draw);
            }
        }
        requestAnimationFrame(draw);
    })();
</script>
@endpush