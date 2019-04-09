<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Box
 * @package App\Models
 * @version April 9, 2019, 11:41 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection transferds
 * @property integer Quantity
 * @property string Description
 */
class Box extends Model
{
    use SoftDeletes;

    public $table = 'box';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'Quantity',
        'Description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Quantity' => 'integer',
        'Description' => 'string'
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
    public function transferds()
    {
        return $this->hasMany(\App\Models\Transferd::class);
    }
}
