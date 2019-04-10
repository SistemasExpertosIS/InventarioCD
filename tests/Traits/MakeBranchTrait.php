<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\Branch;
use App\Repositories\BranchRepository;

trait MakeBranchTrait
{
    /**
     * Create fake instance of Branch and save it in database
     *
     * @param array $branchFields
     * @return Branch
     */
    public function makeBranch($branchFields = [])
    {
        /** @var BranchRepository $branchRepo */
        $branchRepo = \App::make(BranchRepository::class);
        $theme = $this->fakeBranchData($branchFields);
        return $branchRepo->create($theme);
    }

    /**
     * Get fake instance of Branch
     *
     * @param array $branchFields
     * @return Branch
     */
    public function fakeBranch($branchFields = [])
    {
        return new Branch($this->fakeBranchData($branchFields));
    }

    /**
     * Get fake data of Branch
     *
     * @param array $branchFields
     * @return array
     */
    public function fakeBranchData($branchFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Name' => $fake->word,
            'City' => $fake->word,
            'Abv' => $fake->word,
            'idUser' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $branchFields);
    }
}
