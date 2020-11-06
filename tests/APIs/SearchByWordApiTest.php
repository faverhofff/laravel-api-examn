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
            '/api/get/id/1'
        );

        $this->assertApiResponse($this->response["data"]);
    }
    
    /**
     * @test request validation in search beer by id
     */
    public function test_request_validation_search_by_id()
    {
        $this->response = $this->json(
            'GET',
            '/api/get/id/aaaa'
        );

        $this->response->assertStatus(422);
        $this->assertEquals($this->response->getContent(), '{"success":false,"message":{"id":["The id must be a number."]}}');

        $this->response = $this->json(
            'GET',
            '/api/get/id/'
        );

        $this->response->assertStatus(404);
    }

    /**
     * @test request validation in search beer by phrase
     */
    public function test_request_validation_search_by_word()
    {
        $this->response = $this->json(
            'GET',
            '/api/search/'
        );

        $this->response->assertStatus(404);
    }    

}
