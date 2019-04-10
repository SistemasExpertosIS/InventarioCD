<?php namespace Tests\Repositories;

use App\Models\Branch;
use App\Repositories\BranchRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeBranchTrait;
use Tests\ApiTestTrait;

class BranchRepositoryTest extends TestCase
{
    use MakeBranchTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var BranchRepository
     */
    protected $branchRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->branchRepo = \App::make(BranchRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_branch()
    {
        $branch = $this->fakeBranchData();
        $createdBranch = $this->branchRepo->create($branch);
        $createdBranch = $createdBranch->toArray();
        $this->assertArrayHasKey('id', $createdBranch);
        $this->assertNotNull($createdBranch['id'], 'Created Branch must have id specified');
        $this->assertNotNull(Branch::find($createdBranch['id']), 'Branch with given id must be in DB');
        $this->assertModelData($branch, $createdBranch);
    }

    /**
     * @test read
     */
    public function test_read_branch()
    {
        $branch = $this->makeBranch();
        $dbBranch = $this->branchRepo->find($branch->id);
        $dbBranch = $dbBranch->toArray();
        $this->assertModelData($branch->toArray(), $dbBranch);
    }

    /**
     * @test update
     */
    public function test_update_branch()
    {
        $branch = $this->makeBranch();
        $fakeBranch = $this->fakeBranchData();
        $updatedBranch = $this->branchRepo->update($fakeBranch, $branch->id);
        $this->assertModelData($fakeBranch, $updatedBranch->toArray());
        $dbBranch = $this->branchRepo->find($branch->id);
        $this->assertModelData($fakeBranch, $dbBranch->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_branch()
    {
        $branch = $this->makeBranch();
        $resp = $this->branchRepo->delete($branch->id);
        $this->assertTrue($resp);
        $this->assertNull(Branch::find($branch->id), 'Branch should not exist in DB');
    }
}
