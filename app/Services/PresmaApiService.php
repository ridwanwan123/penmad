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
            ]);
    }

    public function madrasahs()
    {
        return $this->client()
            ->get($this->url.'/madrasahs')
            ->throw()
            ->json();
    }

    public function madrasah($id)
    {
        return $this->client()
            ->get($this->url.'/madrasahs/'.$id)
            ->throw()
            ->json();
    }
}