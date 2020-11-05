<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\SearchStringAPIRequest;
use App\Http\Requests\API\SearchIdAPIRequest;
use App\Http\Controllers\AppBaseController;
use App\Services\PunkApiService;
use App\Services\FilterProductService;
use Illuminate\Http\Request;
use Response;

/**
 * Class SearchStringController
 * @package App\Http\Controllers\API
 */

class SearchBeerAPIController extends AppBaseController
{
    /** @var  Punk Api Service */
    private $apiService;

    /** @var  Filter Service */
    private $filterService;

    public function __construct(PunkApiService $apiService, FilterProductService $filterService)
    {
        $this->apiService = $apiService;
        $this->filterService = $filterService;
    }

    /**
     * Display results of the word search.
     * GET|HEAD /search/match/{word}
     *
     * @param Request $request
     * @return Response
     */
    public function searchByPhrase(SearchStringAPIRequest $request)
    {   
        $response = $this->apiService->searchBeersByWord($request->word);

        $filteredResult = $this->filterService->showSummaryDetail($response->getArrayModel());

        return $this->send($filteredResult, $response->getCode());
    }
    

    /**
     * Display result of id search.
     * GET|HEAD /get/id/{id}
     *
     * @param Request $request
     * @return Response
     */
    public function searchById(SearchIdAPIRequest $request)
    {   
        $response = $this->apiService->getBeerById($request->id);
        
        $filteredResult = $this->filterService->showSummaryDetail($response->getArrayModel());

        return $this->send($filteredResult, $response->getCode());
    }
}
