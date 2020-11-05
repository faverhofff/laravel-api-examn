<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\SearchStringAPIRequest;
use App\Http\Controllers\AppBaseController;
use App\Services\PunkApiService;
use Illuminate\Http\Request;
use Response;

/**
 * Class SearchStringController
 * @package App\Http\Controllers\API
 */

class SearchStringAPIController extends AppBaseController
{
    /** @var  Punk Api Service */
    private $apiService;

    public function __construct(PunkApiService $apiService)
    {
        $this->apiService = $apiService;
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
        $response = $this->apiService->searchByWord($request->word);
        
        return $this->send($response->getBodyContent(), $response->getCode());
    }
    
}
