<?php

namespace App\Repositories;

use App\Models\Transport;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TransportRepository
 * @package App\Repositories
 * @version April 9, 2019, 12:09 pm UTC
 *
 * @method Transport findWithoutFail($id, $columns = ['*'])
 * @method Transport find($id, $columns = ['*'])
 * @method Transport first($columns = ['*'])
*/
class TransportRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Plate',
        'Drivername',
        'DriverIdentity'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Transport::class;
    }
}
