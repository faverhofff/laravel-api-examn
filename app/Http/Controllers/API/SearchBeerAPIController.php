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
 * @OA\get(
 * path="/api/search/{word}",
 * summary="Search by word",
 * description="Search beer that match with word",
 * operationId="search",
 * tags={"search"},
 *      @OA\Parameter(
 *          name="word",
 *          in="path",
 *          required=true, 
 *      ),* 
 * @OA\Response(
 *    response=422,
 *    description="Invalid phrase",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="")
 *        )
 *     )
 * )
 * 
 * @OA\get(
 * path="/api/get/id/{id}",
 * summary="Get beer by id",
 * description="Search beer that match with id request",
 * operationId="search",
 * tags={"search"},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true, 
 *      ),* 
 * @OA\Response(
 *    response=422,
 *    description="Invalid id",
 *    @OA\JsonContent(
 *       @OA\Property(property="sucess", type="boolean", example="false") ,
 *       @OA\Property(property="message", type="string", example="{ id: [The id must be a number.] }") 
 *        )
 *     )
 * )
 */

/**
 * SearchBeerAPIController: endpoint to access Punk api
 *
 * @category Exam
 * @package  App_Http_Controllers_API
 * @author   Frank A.R <festgarcia2018@gmail.com.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
class SearchBeerAPIController extends AppBaseController
{
    /**
     * Instance to PunkApiServer class
     *
     * @var Punk Api Service 
     */
    private $_apiService;

    /**
     * Instance to FilterProductService class
     *
     * @var Filter Service 
     */
    private $_filterService;

    /**
     * Constructor class
     *
     * @param PunkApiService $apiService Instance of PunkApiServer class
     * @param FilterProductService $filterService Instance of FilterProductService class
     */
    public function __construct(PunkApiService $apiService, FilterProductService $filterService)
    {
        $this->_apiService = $apiService;
        $this->_filterService = $filterService;
    }

    /**
     * Display beer results according to word search.
     * GET|HEAD /search/{word}
     *
     * @param  SearchStringAPIRequest $request Request validation 
     * @return Response
     */
    public function searchByPhrase(SearchStringAPIRequest $request)
    {   
        $response = $this->_apiService->searchBeersByWord($request->word);

        $filteredResult = $this->_filterService
            ->getSummary($response->getArrayModel());

        return $this->send($filteredResult, $response->getCode());
    }
    
    /**
     * Display beer result by id search
     * GET|HEAD /get/id/{id}
     *
     * @param  SearchIdAPIRequest $request Request validation  
     * @return Response 
     */
    public function searchById(SearchIdAPIRequest $request)
    {   
        $response = $this->_apiService->getBeerById($request->id);
        
        $filteredResult = $this->_filterService
            ->getDetail($response->getArrayModel());

        return $this->send($filteredResult, $response->getCode());
    }
}
