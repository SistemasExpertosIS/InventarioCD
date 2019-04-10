<?php

namespace App\Repositories;

use App\Models\Branch;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BranchRepository
 * @package App\Repositories
 * @version April 10, 2019, 1:52 am UTC
 *
 * @method Branch findWithoutFail($id, $columns = ['*'])
 * @method Branch find($id, $columns = ['*'])
 * @method Branch first($columns = ['*'])
*/
class BranchRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Name',
        'City',
        'Abv',
        'idUser'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Branch::class;
    }
}
