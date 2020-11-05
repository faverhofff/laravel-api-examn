<?php

namespace App\Services;

use GuzzleHttp\Client;
use App\Models\PunkApiResponse;
use Illuminate\Support\ServiceProvider;

class PunkApiService { 

    /** @var Guzzle Client */
    private $guzzleClient;

    public function __construct(Client $client)
    {
        $this->guzzleClient = $client;
    }
    
    /**
     * 	Returns all beers matching the supplied food string, 
     * this performs a fuzzy match, if you need to add spaces 
     * just add an underscore (_).
     */
    public function searchByWord(string $word = null)
    {
        $url = env("PUNKAPI_URL") . '?food='. $word;

        $response = $this->guzzleClient->request('GET', $url);
        
        return new PunkApiResponse(intval($response->getStatusCode()), $response->getBody());
    }

}