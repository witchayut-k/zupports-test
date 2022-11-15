<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\IServices\ISearchService;

class SearchAPIController extends Controller
{

    protected $searchService;

    public function __construct(ISearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    /**
     * Response an object of text search from google place api.
     * Note: The results may cached by middleware route (routes/api.php)
     *
     * @param  string  $type Eg. restaurant or use '|' between types for multiple eg. restaurant|hospital|hotel
     * @param  string  $nextPageToken ~ token text to get next 20 results for google place api (optional)
     * @param  string  $q ~ text query for searching
     * @return json
     */
    public function search(Request $req)
    {
        $params = ['type' => $req->type, 'pagetoken' => $req->nextPageToken];

        $res = $this->searchService->Search($req->q, $params);
        return response()->json($res);

    }
    
    /**
     * Response an object of near by places from google place api.
     * Note: The results may cached by middleware route (routes/api.php)
     *
     * @param  string  $type Eg. restaurant or use '|' between types for multiple eg. restaurant|hospital|hotel
     * @param  string  $nextPageToken ~ token text to get next 20 results for google place api (optional)
     * @param  string  $q ~ text query for searching
     * @return json
     */
    public function suggest(Request $req)
    {
        $params = ['type' => $req->type, 'pagetoken' => $req->nextPageToken];
        $res = $this->searchService->SuggestPlaces($req->q, $params);
        return response()->json($res);
    }
}
