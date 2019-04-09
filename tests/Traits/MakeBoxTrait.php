<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\Box;
use App\Repositories\BoxRepository;

trait MakeBoxTrait
{
    /**
     * Create fake instance of Box and save it in database
     *
     * @param array $boxFields
     * @return Box
     */
    public function makeBox($boxFields = [])
    {
        /** @var BoxRepository $boxRepo */
        $boxRepo = \App::make(BoxRepository::class);
        $theme = $this->fakeBoxData($boxFields);
        return $boxRepo->create($theme);
    }

    /**
     * Get fake instance of Box
     *
     * @param array $boxFields
     * @return Box
     */
    public function fakeBox($boxFields = [])
    {
        return new Box($this->fakeBoxData($boxFields));
    }

    /**
     * Get fake data of Box
     *
     * @param array $boxFields
     * @return array
     */
    public function fakeBoxData($boxFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Quantity' => $fake->randomDigitNotNull,
            'Description' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $boxFields);
    }
}
