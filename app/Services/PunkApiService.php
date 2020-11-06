<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use App\Models\PunkApiResponse;
use Illuminate\Support\ServiceProvider;

class PunkApiService
{
    /**
     * 
     *
     * @var Guzzle Client 
     */
    private $guzzleClient;

    public function __construct(Client $client)
    {
        $this->guzzleClient = $client;
    }
    
    /**
     *     Returns all beers matching the supplied food string, 
     * this performs a fuzzy match, if you need to add spaces 
     * just add an underscore (_).
     */
    public function searchBeersByWord(string $word = null): PunkApiResponse
    {
        $response = $this->invokeCall('GET', '?food='. $word);
        
        return new PunkApiResponse(intval($response->getStatusCode()), $response->getBody());
    }

    /**
     * Returns all beers matching the supplied ID
     */
    public function getBeerById(int $id): PunkApiResponse
    {
        $response = $this->invokeCall('GET', '?ids='. $id);

        return new PunkApiResponse(intval($response->getStatusCode()), $response->getBody());
    }

    /**
     * Common endpoint call
     */
    private function invokeCall(string $method, string $urlParameters): Response
    {
        $url = env("PUNKAPI_URL") . $urlParameters;

        return $this->guzzleClient->request($method, $url);
    }
}
