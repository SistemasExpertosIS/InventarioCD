<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeTransferDTrait;
use Tests\ApiTestTrait;

class TransferDApiTest extends TestCase
{
    use MakeTransferDTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_transfer_d()
    {
        $transferD = $this->fakeTransferDData();
        $this->response = $this->json('POST', '/api/transferDs', $transferD);

        $this->assertApiResponse($transferD);
    }

    /**
     * @test
     */
    public function test_read_transfer_d()
    {
        $transferD = $this->makeTransferD();
        $this->response = $this->json('GET', '/api/transferDs/'.$transferD->id);

        $this->assertApiResponse($transferD->toArray());
    }

    /**
     * @test
     */
    public function test_update_transfer_d()
    {
        $transferD = $this->makeTransferD();
        $editedTransferD = $this->fakeTransferDData();

        $this->response = $this->json('PUT', '/api/transferDs/'.$transferD->id, $editedTransferD);

        $this->assertApiResponse($editedTransferD);
    }

    /**
     * @test
     */
    public function test_delete_transfer_d()
    {
        $transferD = $this->makeTransferD();
        $this->response = $this->json('DELETE', '/api/transferDs/'.$transferD->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/transferDs/'.$transferD->id);

        $this->response->assertStatus(404);
    }
}
