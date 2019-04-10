<?php

namespace App\Repositories;

use App\Models\Inventory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class InventoryRepository
 * @package App\Repositories
 * @version April 10, 2019, 2:18 am UTC
 *
 * @method Inventory findWithoutFail($id, $columns = ['*'])
 * @method Inventory find($id, $columns = ['*'])
 * @method Inventory first($columns = ['*'])
*/
class InventoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Quantity',
        'idBranch',
        'idProduct',
        'idMovementtype'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Inventory::class;
    }
}
