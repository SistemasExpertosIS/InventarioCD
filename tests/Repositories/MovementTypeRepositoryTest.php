<?php namespace Tests\Repositories;

use App\Models\MovementType;
use App\Repositories\MovementTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeMovementTypeTrait;
use Tests\ApiTestTrait;

class MovementTypeRepositoryTest extends TestCase
{
    use MakeMovementTypeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var MovementTypeRepository
     */
    protected $movementTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->movementTypeRepo = \App::make(MovementTypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_movement_type()
    {
        $movementType = $this->fakeMovementTypeData();
        $createdMovementType = $this->movementTypeRepo->create($movementType);
        $createdMovementType = $createdMovementType->toArray();
        $this->assertArrayHasKey('id', $createdMovementType);
        $this->assertNotNull($createdMovementType['id'], 'Created MovementType must have id specified');
        $this->assertNotNull(MovementType::find($createdMovementType['id']), 'MovementType with given id must be in DB');
        $this->assertModelData($movementType, $createdMovementType);
    }

    /**
     * @test read
     */
    public function test_read_movement_type()
    {
        $movementType = $this->makeMovementType();
        $dbMovementType = $this->movementTypeRepo->find($movementType->id);
        $dbMovementType = $dbMovementType->toArray();
        $this->assertModelData($movementType->toArray(), $dbMovementType);
    }

    /**
     * @test update
     */
    public function test_update_movement_type()
    {
        $movementType = $this->makeMovementType();
        $fakeMovementType = $this->fakeMovementTypeData();
        $updatedMovementType = $this->movementTypeRepo->update($fakeMovementType, $movementType->id);
        $this->assertModelData($fakeMovementType, $updatedMovementType->toArray());
        $dbMovementType = $this->movementTypeRepo->find($movementType->id);
        $this->assertModelData($fakeMovementType, $dbMovementType->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_movement_type()
    {
        $movementType = $this->makeMovementType();
        $resp = $this->movementTypeRepo->delete($movementType->id);
        $this->assertTrue($resp);
        $this->assertNull(MovementType::find($movementType->id), 'MovementType should not exist in DB');
    }
}
