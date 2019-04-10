<?php

namespace App\Repositories;

use App\Models\TransferD;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TransferDRepository
 * @package App\Repositories
 * @version April 10, 2019, 2:13 am UTC
 *
 * @method TransferD findWithoutFail($id, $columns = ['*'])
 * @method TransferD find($id, $columns = ['*'])
 * @method TransferD first($columns = ['*'])
*/
class TransferDRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Quantity',
        'State',
        'idTransferM',
        'idBox',
        'idProduct'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TransferD::class;
    }
}
