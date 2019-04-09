<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\MovementType;
use App\Repositories\MovementTypeRepository;

trait MakeMovementTypeTrait
{
    /**
     * Create fake instance of MovementType and save it in database
     *
     * @param array $movementTypeFields
     * @return MovementType
     */
    public function makeMovementType($movementTypeFields = [])
    {
        /** @var MovementTypeRepository $movementTypeRepo */
        $movementTypeRepo = \App::make(MovementTypeRepository::class);
        $theme = $this->fakeMovementTypeData($movementTypeFields);
        return $movementTypeRepo->create($theme);
    }

    /**
     * Get fake instance of MovementType
     *
     * @param array $movementTypeFields
     * @return MovementType
     */
    public function fakeMovementType($movementTypeFields = [])
    {
        return new MovementType($this->fakeMovementTypeData($movementTypeFields));
    }

    /**
     * Get fake data of MovementType
     *
     * @param array $movementTypeFields
     * @return array
     */
    public function fakeMovementTypeData($movementTypeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Name' => $fake->word,
            'Abv' => $fake->word,
            'Entry' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $movementTypeFields);
    }
}
