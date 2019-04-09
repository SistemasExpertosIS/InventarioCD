<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeBoxTrait;
use Tests\ApiTestTrait;

class BoxApiTest extends TestCase
{
    use MakeBoxTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_box()
    {
        $box = $this->fakeBoxData();
        $this->response = $this->json('POST', '/api/boxes', $box);

        $this->assertApiResponse($box);
    }

    /**
     * @test
     */
    public function test_read_box()
    {
        $box = $this->makeBox();
        $this->response = $this->json('GET', '/api/boxes/'.$box->id);

        $this->assertApiResponse($box->toArray());
    }

    /**
     * @test
     */
    public function test_update_box()
    {
        $box = $this->makeBox();
        $editedBox = $this->fakeBoxData();

        $this->response = $this->json('PUT', '/api/boxes/'.$box->id, $editedBox);

        $this->assertApiResponse($editedBox);
    }

    /**
     * @test
     */
    public function test_delete_box()
    {
        $box = $this->makeBox();
        $this->response = $this->json('DELETE', '/api/boxes/'.$box->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/boxes/'.$box->id);

        $this->response->assertStatus(404);
    }
}
