<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use SKAgarwal\GoogleApi\PlacesApi;

class GooglePlaceService
{
    public function __construct()
    {
        $apiKey = Config::get("google.api_key");
        $this->googlePlace = new PlacesApi($apiKey);
    }

    public function textSearch($term, $types = ['restaurant'])
    {
        $res = $this->googlePlace->textSearch($term, $types);
        return $res['results'];
    }

    public function getSuggestPlaces($term, $types = ['restaurant'])
    {
        $res = $this->googlePlace->placeAutocomplete($term, ['types'=>'restaurant']);
        return $res;
    }
}
