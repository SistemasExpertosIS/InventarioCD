<?php namespace Tests\Repositories;

use App\Models\Box;
use App\Repositories\BoxRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeBoxTrait;
use Tests\ApiTestTrait;

class BoxRepositoryTest extends TestCase
{
    use MakeBoxTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var BoxRepository
     */
    protected $boxRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->boxRepo = \App::make(BoxRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_box()
    {
        $box = $this->fakeBoxData();
        $createdBox = $this->boxRepo->create($box);
        $createdBox = $createdBox->toArray();
        $this->assertArrayHasKey('id', $createdBox);
        $this->assertNotNull($createdBox['id'], 'Created Box must have id specified');
        $this->assertNotNull(Box::find($createdBox['id']), 'Box with given id must be in DB');
        $this->assertModelData($box, $createdBox);
    }

    /**
     * @test read
     */
    public function test_read_box()
    {
        $box = $this->makeBox();
        $dbBox = $this->boxRepo->find($box->id);
        $dbBox = $dbBox->toArray();
        $this->assertModelData($box->toArray(), $dbBox);
    }

    /**
     * @test update
     */
    public function test_update_box()
    {
        $box = $this->makeBox();
        $fakeBox = $this->fakeBoxData();
        $updatedBox = $this->boxRepo->update($fakeBox, $box->id);
        $this->assertModelData($fakeBox, $updatedBox->toArray());
        $dbBox = $this->boxRepo->find($box->id);
        $this->assertModelData($fakeBox, $dbBox->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_box()
    {
        $box = $this->makeBox();
        $resp = $this->boxRepo->delete($box->id);
        $this->assertTrue($resp);
        $this->assertNull(Box::find($box->id), 'Box should not exist in DB');
    }
}
