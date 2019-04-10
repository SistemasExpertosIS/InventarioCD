<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeTransferMTrait;
use Tests\ApiTestTrait;

class TransferMApiTest extends TestCase
{
    use MakeTransferMTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_transfer_m()
    {
        $transferM = $this->fakeTransferMData();
        $this->response = $this->json('POST', '/api/transferMs', $transferM);

        $this->assertApiResponse($transferM);
    }

    /**
     * @test
     */
    public function test_read_transfer_m()
    {
        $transferM = $this->makeTransferM();
        $this->response = $this->json('GET', '/api/transferMs/'.$transferM->id);

        $this->assertApiResponse($transferM->toArray());
    }

    /**
     * @test
     */
    public function test_update_transfer_m()
    {
        $transferM = $this->makeTransferM();
        $editedTransferM = $this->fakeTransferMData();

        $this->response = $this->json('PUT', '/api/transferMs/'.$transferM->id, $editedTransferM);

        $this->assertApiResponse($editedTransferM);
    }

    /**
     * @test
     */
    public function test_delete_transfer_m()
    {
        $transferM = $this->makeTransferM();
        $this->response = $this->json('DELETE', '/api/transferMs/'.$transferM->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/transferMs/'.$transferM->id);

        $this->response->assertStatus(404);
    }
}
