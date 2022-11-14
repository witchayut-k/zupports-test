<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\GooglePlaceService;

class RestuarantAPIController extends Controller
{

    public function __construct(
        GooglePlaceService $googlePlaceService
    )
    {
        $this->googlePlaceService = $googlePlaceService;
    }

    // public function search(Request $req)
    // {
    //     // \Log::debug($apiKey);

    //     $client = new \GuzzleHttp\Client();
    //     $uri = "https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=Museum%20of%20Contemporary%20Art%20Australia&inputtype=textquery&fields=formatted_address%2Cname%2Crating%2Copening_hours%2Cgeometry&key=$this->apiKey";

    //     // \Log::debug($uri);

    //     $res = $client->request('GET', $uri, [
    //         'http_errors' => true,
    //     ]);

    //     $output = [
    //         'status_code' => $res->getStatusCode(),
    //         'body' => json_decode($res->getBody()->getContents())
    //     ];

    //     return response()->json($output);
    // }

    public function search(Request $req)
    {
        $res = $this->googlePlaceService->textSearch($req->q);
        return response()->json($res);
    }

    // private function nearbySearch()
    // {
    //     $googlePlaces = new PlacesApi($this->apiKey);
    //     $res = $googlePlaces->nearbySearch($location, $radius = null, $params = []);
    //     return response()->json($res);
    // }

    public function suggest(Request $req)
    {
        $res = $this->googlePlaceService->getSuggestPlaces($req->q);
        return response()->json($res);
    }
}
