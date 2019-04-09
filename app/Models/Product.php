<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 * @version April 9, 2019, 11:42 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection inventories
 * @property \Illuminate\Database\Eloquent\Collection transferds
 * @property string Name
 * @property string Code
 * @property string Description
 * @property string State
 */
class Product extends Model
{
    use SoftDeletes;

    public $table = 'product';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'Name',
        'Code',
        'Description',
        'State'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Name' => 'string',
        'Code' => 'string',
        'Description' => 'string',
        'State' => 'string'
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
    public function transferds()
    {
        return $this->hasMany(\App\Models\Transferd::class);
    }
}
