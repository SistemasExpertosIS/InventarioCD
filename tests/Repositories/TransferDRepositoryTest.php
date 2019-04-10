<?php namespace Tests\Repositories;

use App\Models\TransferD;
use App\Repositories\TransferDRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeTransferDTrait;
use Tests\ApiTestTrait;

class TransferDRepositoryTest extends TestCase
{
    use MakeTransferDTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TransferDRepository
     */
    protected $transferDRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->transferDRepo = \App::make(TransferDRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_transfer_d()
    {
        $transferD = $this->fakeTransferDData();
        $createdTransferD = $this->transferDRepo->create($transferD);
        $createdTransferD = $createdTransferD->toArray();
        $this->assertArrayHasKey('id', $createdTransferD);
        $this->assertNotNull($createdTransferD['id'], 'Created TransferD must have id specified');
        $this->assertNotNull(TransferD::find($createdTransferD['id']), 'TransferD with given id must be in DB');
        $this->assertModelData($transferD, $createdTransferD);
    }

    /**
     * @test read
     */
    public function test_read_transfer_d()
    {
        $transferD = $this->makeTransferD();
        $dbTransferD = $this->transferDRepo->find($transferD->id);
        $dbTransferD = $dbTransferD->toArray();
        $this->assertModelData($transferD->toArray(), $dbTransferD);
    }

    /**
     * @test update
     */
    public function test_update_transfer_d()
    {
        $transferD = $this->makeTransferD();
        $fakeTransferD = $this->fakeTransferDData();
        $updatedTransferD = $this->transferDRepo->update($fakeTransferD, $transferD->id);
        $this->assertModelData($fakeTransferD, $updatedTransferD->toArray());
        $dbTransferD = $this->transferDRepo->find($transferD->id);
        $this->assertModelData($fakeTransferD, $dbTransferD->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_transfer_d()
    {
        $transferD = $this->makeTransferD();
        $resp = $this->transferDRepo->delete($transferD->id);
        $this->assertTrue($resp);
        $this->assertNull(TransferD::find($transferD->id), 'TransferD should not exist in DB');
    }
}
