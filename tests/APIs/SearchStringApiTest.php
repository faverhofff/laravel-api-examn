<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SearchStringApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_read_search_string()
    {
        $searchString = "food";

        $this->response = $this->json(
            'GET',
            '/api/search_strings/?word='.$searchString
        );

        $this->assertApiResponse([]);
    }
    
}
