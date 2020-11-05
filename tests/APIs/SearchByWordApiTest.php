<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SearchByApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test search beer by match string
     */
    public function test_search_by_string()
    {
        $searchString = "food";

        $this->response = $this->json(
            'GET',
            '/api/search/'.$searchString
        );

        $this->assertApiResponse($this->response["data"]);
    }

    /**
     * @test search beer by id
     */
    public function test_search_by_id()
    {
        $this->response = $this->json(
            'GET',
            '/api/get/id/=1'
        );

        $this->assertApiResponse($this->response["data"]);
    }
    
}
