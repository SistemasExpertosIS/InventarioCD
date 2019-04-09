<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeTransportTrait;
use Tests\ApiTestTrait;

class TransportApiTest extends TestCase
{
    use MakeTransportTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_transport()
    {
        $transport = $this->fakeTransportData();
        $this->response = $this->json('POST', '/api/transports', $transport);

        $this->assertApiResponse($transport);
    }

    /**
     * @test
     */
    public function test_read_transport()
    {
        $transport = $this->makeTransport();
        $this->response = $this->json('GET', '/api/transports/'.$transport->id);

        $this->assertApiResponse($transport->toArray());
    }

    /**
     * @test
     */
    public function test_update_transport()
    {
        $transport = $this->makeTransport();
        $editedTransport = $this->fakeTransportData();

        $this->response = $this->json('PUT', '/api/transports/'.$transport->id, $editedTransport);

        $this->assertApiResponse($editedTransport);
    }

    /**
     * @test
     */
    public function test_delete_transport()
    {
        $transport = $this->makeTransport();
        $this->response = $this->json('DELETE', '/api/transports/'.$transport->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/transports/'.$transport->id);

        $this->response->assertStatus(404);
    }
}
