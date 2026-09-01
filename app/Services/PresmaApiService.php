<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PresmaApiService
{
    protected $url;
    protected $key;

    public function __construct()
    {
        $this->url = config('services.presma.url');
        $this->key = config('services.presma.key');
    }

    protected function client()
    {
        return Http::acceptJson()
            ->withHeaders([
                'X-API-KEY' => $this->key,
            ])
            // Timeout dipangkas dari default Laravel (30s) karena endpoint ini
            // di-fetch synchronous saat halaman map dibuka — kalau PRESMA API
            // butuh lebih dari ini, lebih baik gagal cepat & tunjukkan error
            // ke user daripada bikin dia nunggu lama.
            ->timeout(8)
            ->connectTimeout(5)
            // Retry 2x dengan jeda 200ms — cuma buat nutup transient failure
            // (network blip, server restart sesaat). Laravel secara default
            // hanya retry untuk error koneksi/server (5xx), BUKAN untuk 4xx
            // (401/403/404 dsb), karena error itu biasanya masalah konfigurasi
            // yang tidak akan sembuh walau dicoba ulang.
            ->retry(2, 200);
    }

    public function madrasahs()
    {
        $data = $this->client()
            ->get($this->url.'/madrasahs')
            ->throw()
            ->json();

        // ->json() tidak throw kalau body-nya bukan JSON valid (misal HTML
        // error page yang lolos ->throw() karena status-nya 200) — dia cuma
        // balikin null diam-diam. Kita lempar sendiri di sini supaya
        // caller (MainController) konsisten menangkapnya sebagai kegagalan,
        // bukan kejadian "sukses tapi kosong" yang bikin warning array
        // offset di pemanggil.
        if ($data === null) {
            throw new \RuntimeException('Response PRESMA API bukan JSON yang valid.');
        }

        return $data;
    }

    public function madrasah($id)
    {
        $data = $this->client()
            ->get($this->url.'/madrasahs/'.$id)
            ->throw()
            ->json();

        if ($data === null) {
            throw new \RuntimeException('Response PRESMA API bukan JSON yang valid.');
        }

        return $data;
    }
}