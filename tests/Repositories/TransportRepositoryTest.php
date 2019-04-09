<?php namespace Tests\Repositories;

use App\Models\Transport;
use App\Repositories\TransportRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeTransportTrait;
use Tests\ApiTestTrait;

class TransportRepositoryTest extends TestCase
{
    use MakeTransportTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TransportRepository
     */
    protected $transportRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->transportRepo = \App::make(TransportRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_transport()
    {
        $transport = $this->fakeTransportData();
        $createdTransport = $this->transportRepo->create($transport);
        $createdTransport = $createdTransport->toArray();
        $this->assertArrayHasKey('id', $createdTransport);
        $this->assertNotNull($createdTransport['id'], 'Created Transport must have id specified');
        $this->assertNotNull(Transport::find($createdTransport['id']), 'Transport with given id must be in DB');
        $this->assertModelData($transport, $createdTransport);
    }

    /**
     * @test read
     */
    public function test_read_transport()
    {
        $transport = $this->makeTransport();
        $dbTransport = $this->transportRepo->find($transport->id);
        $dbTransport = $dbTransport->toArray();
        $this->assertModelData($transport->toArray(), $dbTransport);
    }

    /**
     * @test update
     */
    public function test_update_transport()
    {
        $transport = $this->makeTransport();
        $fakeTransport = $this->fakeTransportData();
        $updatedTransport = $this->transportRepo->update($fakeTransport, $transport->id);
        $this->assertModelData($fakeTransport, $updatedTransport->toArray());
        $dbTransport = $this->transportRepo->find($transport->id);
        $this->assertModelData($fakeTransport, $dbTransport->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_transport()
    {
        $transport = $this->makeTransport();
        $resp = $this->transportRepo->delete($transport->id);
        $this->assertTrue($resp);
        $this->assertNull(Transport::find($transport->id), 'Transport should not exist in DB');
    }
}
