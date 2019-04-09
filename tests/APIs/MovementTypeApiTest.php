<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeMovementTypeTrait;
use Tests\ApiTestTrait;

class MovementTypeApiTest extends TestCase
{
    use MakeMovementTypeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_movement_type()
    {
        $movementType = $this->fakeMovementTypeData();
        $this->response = $this->json('POST', '/api/movementTypes', $movementType);

        $this->assertApiResponse($movementType);
    }

    /**
     * @test
     */
    public function test_read_movement_type()
    {
        $movementType = $this->makeMovementType();
        $this->response = $this->json('GET', '/api/movementTypes/'.$movementType->id);

        $this->assertApiResponse($movementType->toArray());
    }

    /**
     * @test
     */
    public function test_update_movement_type()
    {
        $movementType = $this->makeMovementType();
        $editedMovementType = $this->fakeMovementTypeData();

        $this->response = $this->json('PUT', '/api/movementTypes/'.$movementType->id, $editedMovementType);

        $this->assertApiResponse($editedMovementType);
    }

    /**
     * @test
     */
    public function test_delete_movement_type()
    {
        $movementType = $this->makeMovementType();
        $this->response = $this->json('DELETE', '/api/movementTypes/'.$movementType->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/movementTypes/'.$movementType->id);

        $this->response->assertStatus(404);
    }
}
