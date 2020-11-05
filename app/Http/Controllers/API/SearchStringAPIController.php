<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\SearchStringAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Response;

/**
 * Class SearchStringController
 * @package App\Http\Controllers\API
 */

class SearchStringAPIController extends AppBaseController
{
    /** @var  Guzzle Client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Display result of the word search.
     * GET|HEAD /searchStrings
     *
     * @param Request $request
     * @return Response
     */
    public function index(SearchStringAPIRequest $request)
    {
        return $this->sendResponse([], '');
    }
    
}
