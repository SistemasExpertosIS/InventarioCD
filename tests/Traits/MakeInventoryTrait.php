<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\Inventory;
use App\Repositories\InventoryRepository;

trait MakeInventoryTrait
{
    /**
     * Create fake instance of Inventory and save it in database
     *
     * @param array $inventoryFields
     * @return Inventory
     */
    public function makeInventory($inventoryFields = [])
    {
        /** @var InventoryRepository $inventoryRepo */
        $inventoryRepo = \App::make(InventoryRepository::class);
        $theme = $this->fakeInventoryData($inventoryFields);
        return $inventoryRepo->create($theme);
    }

    /**
     * Get fake instance of Inventory
     *
     * @param array $inventoryFields
     * @return Inventory
     */
    public function fakeInventory($inventoryFields = [])
    {
        return new Inventory($this->fakeInventoryData($inventoryFields));
    }

    /**
     * Get fake data of Inventory
     *
     * @param array $inventoryFields
     * @return array
     */
    public function fakeInventoryData($inventoryFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Quantity' => $fake->randomDigitNotNull,
            'idBranch' => $fake->randomDigitNotNull,
            'idProduct' => $fake->randomDigitNotNull,
            'idMovementtype' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $inventoryFields);
    }
}
