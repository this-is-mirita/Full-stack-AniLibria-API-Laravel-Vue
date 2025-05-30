<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AnilibriaService
{
    protected $baseUrl = 'https://api.anilibria.tv/v3/';

    public function get(string $endpoint, array $params = [])
    {

        $result = Http::get($this->baseUrl . $endpoint, $params);

        if ($result->successful()) {
            $json = $result->json();

            //            $data = [
//                'id' => $jsonResult['id'] ?? null,
//                'code' => $jsonResult['code'] ?? null,
//                'name_ru' => $jsonResult['names']['ru'] ?? null,
//                'name_en' => $jsonResult['names']['en'] ?? null,
//                'name_alt' => $jsonResult['names']['alternative'] ?? null,
//                'status' => $jsonResult['status']['string'] ?? null, // если есть
//
//                //posters
//                'postersSmall' => $jsonResult['posters']['small']['url'] ?? null, // если есть
//                'postersMedium' => $jsonResult['posters']['medium']['url'] ?? null, // если есть
//                'postersOriginal' => $jsonResult['posters']['original']['url'] ?? null, // если есть
//                //end posters
//
//                //type
//                'typeCode' => $jsonResult['type']['code'] ?? null, // если есть
//                'typeString' => $jsonResult['type']['string'] ?? null, // если есть
//                'typeEpisodes' => $jsonResult['type']['episodes'] ?? null, // если есть
//                'typeLength' => $jsonResult['type']['length'] ?? null, // если есть
//                //end type
//                'season' => $jsonResult['season']['string'] ?? null, // если есть
//                'description' => $jsonResult['description'] ?? null, // если есть
//                'in_favorites' => $jsonResult['in_favorites'] ?? null, // если есть
//            ];

            $data = [];
            $simpleKeys = [
                'id',
                'code',
                'in_favorites',
                'updated',
                'description',
                'last_change',
                'in_favorites',
            ];
            // не вложенные элементы
            foreach ($simpleKeys as $key) {
                $data[$key] = $json[$key] ?? null;
            }
            // статус вышел или не вышел из окна нахуй
            $data['status'] = $json['status']['string'] ?? null;
            // сезон
            $data['season'] = $json['season']['string'] ?? null;

            // имя на ру и ен
            foreach (['ru', 'en', 'alternative'] as $lang) {
                $data["name_$lang"] = $json['names'][$lang] ?? null;
            }
            // posters
            foreach (['small', 'medium', 'original'] as $size) {
                $data["posters" . ucfirst($size)] = $json['posters'][$size]['url'] ?? null;
            }
            // длина кол во эпизовод и кол во серий
            foreach (['code', 'string', 'episodes', 'length'] as $typeField) {
                $data["type" . ucfirst($typeField)] = $json['type'][$typeField] ?? null;
            }
            // жанр genres
            foreach ($json['genres'] as $type => $value) {
                $data["genres_" . $type] = $value;
            }
            foreach (['alternative_player', 'host', 'is_rutube'] as $key) {
                $player[$key] = $json['player'][$key] ?? null;
            }
            return response()->json([
                $data
            ]);
        }


        //error
        return [
            'error' => 'Anilibria error',
            'status' => $result->status(),
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
