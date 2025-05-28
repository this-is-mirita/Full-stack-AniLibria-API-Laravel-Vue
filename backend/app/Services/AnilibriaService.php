<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AnilibriaService
{
    protected $baseUrl = 'https://api.anilibria.tv/v3/';
    public function get(string $endpoint, array $params = []){

        $res = Http::get($this->baseUrl . $endpoint, $params);

        if($res->successful()){
            return $res->json();
        }

        return [
            'error' => 'Anilibria error',
            'status' => $res->status(),
        ];
    }

    public function post(string $endpoint, array $data = [])
    {
        $response = Http::post($this->baseUrl . $endpoint, $data);

        if ($response->successful()) {
            return $response->json();
        }

        return [
            'error' => 'Anilibria error',
            'status' => $response->status(),
        ];
    }

    public function put(string $endpoint, array $data = [])
    {
        return Http::put($this->baseUrl . $endpoint, $data);
    }

    public function delete(string $endpoint, array $data = [])
    {
        return Http::delete($this->baseUrl . $endpoint, $data);
    }



}
