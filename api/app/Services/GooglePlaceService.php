<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use SKAgarwal\GoogleApi\PlacesApi;

class GooglePlaceService
{
    public function __construct()
    {
        $this->apiKey = Config::get("google.api_key");
        $this->googlePlace = new PlacesApi($this->apiKey);
    }

    public function textSearch($term)
    {
        $searchType = "restaurant"; // 

        $params = ['type' => $searchType];

        $res = $this->googlePlace->textSearch($term, $params);

        return $res['results'];

    }

    public function getSuggestPlaces($term)
    {

        $searchType = "restaurant"; // 

        $params = ['types' => $searchType];

        $res = $this->googlePlace->placeAutocomplete($term, $params);
        return $res;
    }
}
