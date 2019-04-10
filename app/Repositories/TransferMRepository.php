<?php

namespace App\Repositories;

use App\Models\TransferM;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TransferMRepository
 * @package App\Repositories
 * @version April 10, 2019, 2:06 am UTC
 *
 * @method TransferM findWithoutFail($id, $columns = ['*'])
 * @method TransferM find($id, $columns = ['*'])
 * @method TransferM first($columns = ['*'])
*/
class TransferMRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Description',
        'idMovementType',
        'idUserReceives',
        'idUserSends',
        'idBranchReceives',
        'idBranchSends',
        'idTransport'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TransferM::class;
    }
}
