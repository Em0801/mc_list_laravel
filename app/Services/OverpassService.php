<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OverpassService
{
    public function fetchRestaurants()
    {
        $url = 'https://overpass-api.de/api/interpreter';

        $query = '[out:json][timeout:25];area(id:3600349053)->.searchArea;nwr["amenity"="fast_food"]["name"="McDonald\'s"](area.searchArea);out geom;';

        $response = Http::withHeaders([
            'User-Agent' => 'Mi servicio',
            'Content-Type' => 'application/x-www-form-urlencoded; charset=UTF-8'
        ])->asForm()->post($url, ['data' => $query]);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('Error fetching restaurants from Overpass API');
    }
}
