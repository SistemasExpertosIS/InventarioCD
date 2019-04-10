<?php namespace Tests\Repositories;

use App\Models\TransferM;
use App\Repositories\TransferMRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeTransferMTrait;
use Tests\ApiTestTrait;

class TransferMRepositoryTest extends TestCase
{
    use MakeTransferMTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TransferMRepository
     */
    protected $transferMRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->transferMRepo = \App::make(TransferMRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_transfer_m()
    {
        $transferM = $this->fakeTransferMData();
        $createdTransferM = $this->transferMRepo->create($transferM);
        $createdTransferM = $createdTransferM->toArray();
        $this->assertArrayHasKey('id', $createdTransferM);
        $this->assertNotNull($createdTransferM['id'], 'Created TransferM must have id specified');
        $this->assertNotNull(TransferM::find($createdTransferM['id']), 'TransferM with given id must be in DB');
        $this->assertModelData($transferM, $createdTransferM);
    }

    /**
     * @test read
     */
    public function test_read_transfer_m()
    {
        $transferM = $this->makeTransferM();
        $dbTransferM = $this->transferMRepo->find($transferM->id);
        $dbTransferM = $dbTransferM->toArray();
        $this->assertModelData($transferM->toArray(), $dbTransferM);
    }

    /**
     * @test update
     */
    public function test_update_transfer_m()
    {
        $transferM = $this->makeTransferM();
        $fakeTransferM = $this->fakeTransferMData();
        $updatedTransferM = $this->transferMRepo->update($fakeTransferM, $transferM->id);
        $this->assertModelData($fakeTransferM, $updatedTransferM->toArray());
        $dbTransferM = $this->transferMRepo->find($transferM->id);
        $this->assertModelData($fakeTransferM, $dbTransferM->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_transfer_m()
    {
        $transferM = $this->makeTransferM();
        $resp = $this->transferMRepo->delete($transferM->id);
        $this->assertTrue($resp);
        $this->assertNull(TransferM::find($transferM->id), 'TransferM should not exist in DB');
    }
}
