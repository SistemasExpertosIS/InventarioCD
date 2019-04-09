<?php

namespace App\Repositories;

use App\Models\Box;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BoxRepository
 * @package App\Repositories
 * @version April 9, 2019, 11:41 am UTC
 *
 * @method Box findWithoutFail($id, $columns = ['*'])
 * @method Box find($id, $columns = ['*'])
 * @method Box first($columns = ['*'])
*/
class BoxRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Quantity',
        'Description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Box::class;
    }
}
