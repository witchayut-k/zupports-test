<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\IServices\ISearchService;
use SKAgarwal\GoogleApi\PlacesApi; 

/**
 * This service is using google place api package from https://github.com/SachinAgarwal1337/google-places-api
 */

class GooglePlaceService implements ISearchService
{

    protected $apiKey;
    protected $googlePlace;

    public function __construct()
    {
        $this->apiKey = Config::get("google.api_key");
        $this->googlePlace = new PlacesApi($this->apiKey);
    }

    public function Search($term, $params)
    {
        $res = $this->googlePlace->textSearch($term, $params);
        return $res;
    }

    public function SuggestPlaces($term, $params)
    {
        $res = $this->googlePlace->placeAutocomplete($term, $params);
        return $res;
    }
}
