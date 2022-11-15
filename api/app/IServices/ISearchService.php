<?php

namespace App\IServices;

interface ISearchService {
    public function Search($terms, $params);
    public function SuggestPlaces($terms, $params);
}