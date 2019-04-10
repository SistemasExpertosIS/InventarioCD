<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\TransferD;
use App\Repositories\TransferDRepository;

trait MakeTransferDTrait
{
    /**
     * Create fake instance of TransferD and save it in database
     *
     * @param array $transferDFields
     * @return TransferD
     */
    public function makeTransferD($transferDFields = [])
    {
        /** @var TransferDRepository $transferDRepo */
        $transferDRepo = \App::make(TransferDRepository::class);
        $theme = $this->fakeTransferDData($transferDFields);
        return $transferDRepo->create($theme);
    }

    /**
     * Get fake instance of TransferD
     *
     * @param array $transferDFields
     * @return TransferD
     */
    public function fakeTransferD($transferDFields = [])
    {
        return new TransferD($this->fakeTransferDData($transferDFields));
    }

    /**
     * Get fake data of TransferD
     *
     * @param array $transferDFields
     * @return array
     */
    public function fakeTransferDData($transferDFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Quantity' => $fake->word,
            'State' => $fake->word,
            'idTransferM' => $fake->randomDigitNotNull,
            'idBox' => $fake->randomDigitNotNull,
            'idProduct' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $transferDFields);
    }
}
