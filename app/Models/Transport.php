<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Transport
 * @package App\Models
 * @version April 9, 2019, 12:09 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection transferms
 * @property string Plate
 * @property string Drivername
 * @property string DriverIdentity
 */
class Transport extends Model
{
    use SoftDeletes;

    public $table = 'transport';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'Plate',
        'Drivername',
        'DriverIdentity'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Plate' => 'string',
        'Drivername' => 'string',
        'DriverIdentity' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function transferms()
    {
        return $this->hasMany(\App\Models\Transferm::class);
    }
}
