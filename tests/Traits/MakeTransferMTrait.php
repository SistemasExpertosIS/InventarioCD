<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\TransferM;
use App\Repositories\TransferMRepository;

trait MakeTransferMTrait
{
    /**
     * Create fake instance of TransferM and save it in database
     *
     * @param array $transferMFields
     * @return TransferM
     */
    public function makeTransferM($transferMFields = [])
    {
        /** @var TransferMRepository $transferMRepo */
        $transferMRepo = \App::make(TransferMRepository::class);
        $theme = $this->fakeTransferMData($transferMFields);
        return $transferMRepo->create($theme);
    }

    /**
     * Get fake instance of TransferM
     *
     * @param array $transferMFields
     * @return TransferM
     */
    public function fakeTransferM($transferMFields = [])
    {
        return new TransferM($this->fakeTransferMData($transferMFields));
    }

    /**
     * Get fake data of TransferM
     *
     * @param array $transferMFields
     * @return array
     */
    public function fakeTransferMData($transferMFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Description' => $fake->word,
            'idMovementType' => $fake->randomDigitNotNull,
            'idUserReceives' => $fake->randomDigitNotNull,
            'idUserSends' => $fake->randomDigitNotNull,
            'idBranchReceives' => $fake->randomDigitNotNull,
            'idBranchSends' => $fake->randomDigitNotNull,
            'idTransport' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $transferMFields);
    }
}
