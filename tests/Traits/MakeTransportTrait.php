<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\Transport;
use App\Repositories\TransportRepository;

trait MakeTransportTrait
{
    /**
     * Create fake instance of Transport and save it in database
     *
     * @param array $transportFields
     * @return Transport
     */
    public function makeTransport($transportFields = [])
    {
        /** @var TransportRepository $transportRepo */
        $transportRepo = \App::make(TransportRepository::class);
        $theme = $this->fakeTransportData($transportFields);
        return $transportRepo->create($theme);
    }

    /**
     * Get fake instance of Transport
     *
     * @param array $transportFields
     * @return Transport
     */
    public function fakeTransport($transportFields = [])
    {
        return new Transport($this->fakeTransportData($transportFields));
    }

    /**
     * Get fake data of Transport
     *
     * @param array $transportFields
     * @return array
     */
    public function fakeTransportData($transportFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Plate' => $fake->word,
            'Drivername' => $fake->word,
            'DriverIdentity' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $transportFields);
    }
}
