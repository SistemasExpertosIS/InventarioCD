<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeBranchTrait;
use Tests\ApiTestTrait;

class BranchApiTest extends TestCase
{
    use MakeBranchTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_branch()
    {
        $branch = $this->fakeBranchData();
        $this->response = $this->json('POST', '/api/branches', $branch);

        $this->assertApiResponse($branch);
    }

    /**
     * @test
     */
    public function test_read_branch()
    {
        $branch = $this->makeBranch();
        $this->response = $this->json('GET', '/api/branches/'.$branch->id);

        $this->assertApiResponse($branch->toArray());
    }

    /**
     * @test
     */
    public function test_update_branch()
    {
        $branch = $this->makeBranch();
        $editedBranch = $this->fakeBranchData();

        $this->response = $this->json('PUT', '/api/branches/'.$branch->id, $editedBranch);

        $this->assertApiResponse($editedBranch);
    }

    /**
     * @test
     */
    public function test_delete_branch()
    {
        $branch = $this->makeBranch();
        $this->response = $this->json('DELETE', '/api/branches/'.$branch->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/branches/'.$branch->id);

        $this->response->assertStatus(404);
    }
}
