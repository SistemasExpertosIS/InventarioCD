<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MovementType
 * @package App\Models
 * @version April 9, 2019, 12:30 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection inventories
 * @property \Illuminate\Database\Eloquent\Collection transferms
 * @property string Name
 * @property string Abv
 * @property string Entry
 */
class MovementType extends Model
{
    use SoftDeletes;

    public $table = 'movementtype';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'Name',
        'Abv',
        'Entry'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Name' => 'string',
        'Abv' => 'string',
        'Entry' => 'string'
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
    public function inventories()
    {
        return $this->hasMany(\App\Models\Inventory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function transferms()
    {
        return $this->hasMany(\App\Models\Transferm::class);
    }
}
