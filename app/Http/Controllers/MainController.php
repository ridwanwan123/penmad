<?php

namespace App\Http\Controllers;

use App\Services\PresmaApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class MainController extends Controller
{
    public function index()
    {
        return view('pages.landing');
    }

    /**
     * Endpoint internal yang di-fetch oleh landing.js.
     * Proxy ke PRESMA API supaya X-API-KEY tidak pernah tampil di browser,
     * dan hasilnya di-mapping ke field yang dipakai landing.js (jenjang, status, kamad, katu, dll).
     */
    public function madrasahsData(PresmaApiService $presma)
    {
        try {
            // Cek cache dulu secara manual (bukan pakai Cache::remember) supaya kita
            // bisa memutuskan sendiri: hasil kosong TIDAK disimpan ke cache, jadi
            // request berikutnya akan coba lagi ke API alih-alih nunggu 10 menit
            // hanya karena API sempat balikin data kosong/rusak.
            $cached = Cache::get('landing.madrasahs');

            if ($cached !== null) {
                return response()->json($cached);
            }

            $response = $presma->madrasahs();

            $items = $response['data'] ?? [];

            $mapped = collect($items)
                ->filter(fn ($item) => !empty($item['latitude']) && !empty($item['longitude']))
                ->map(function ($item) {
                    return [
                        'id'             => $item['id'] ?? null,
                        'jenjang'        => $item['jenjang_madrasah'] ?? null,
                        'status'         => $item['status_madrasah'] ?? null,
                        'nama_madrasah'  => $item['nama_madrasah'] ?? null,
                        'npsn'           => $item['npsn'] ?? null,
                        'kota'           => $item['kota'] ?? null,
                        'kecamatan'      => $item['kecamatan'] ?? null,
                        'kelurahan'      => $item['kelurahan'] ?? null,
                        'latitude'       => $item['latitude'] ?? null,
                        'longitude'      => $item['longitude'] ?? null,
                        'kamad'          => $item['nama_kepala_madrasah'] ?? null,
                        'katu'           => $item['nama_kepala_urusan_tata_usaha'] ?? null,
                    ];
                })
                ->values();

            // Hanya cache kalau benar-benar dapat data. Kalau kosong (API lagi
            // maintenance/balikin data rusak), jangan cache — biar request
            // berikutnya coba lagi, bukan nunggu 10 menit dengan cache kosong.
            if ($mapped->isNotEmpty()) {
                Cache::put('landing.madrasahs', $mapped, now()->addMinutes(10));
            }

            return response()->json($mapped);
        } catch (\Throwable $e) {
            Log::error('Gagal mengambil data madrasah dari PRESMA API: '.$e->getMessage());

            // Balikin array kosong (bukan error 500) supaya peta di landing tetap
            // render normal walau API-nya lagi down, cuma datanya kosong.
            // TIDAK di-cache, supaya request berikutnya coba lagi ke API.
            return response()->json([]);
        }
    }
}