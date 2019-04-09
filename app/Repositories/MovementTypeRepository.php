<?php

namespace App\Repositories;

use App\Models\MovementType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MovementTypeRepository
 * @package App\Repositories
 * @version April 9, 2019, 12:30 pm UTC
 *
 * @method MovementType findWithoutFail($id, $columns = ['*'])
 * @method MovementType find($id, $columns = ['*'])
 * @method MovementType first($columns = ['*'])
*/
class MovementTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Name',
        'Abv',
        'Entry'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return MovementType::class;
    }
}
