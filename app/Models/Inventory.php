<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Inventory
 * @package App\Models
 * @version April 10, 2019, 2:18 am UTC
 *
 * @property \App\Models\Product idproduct
 * @property \App\Models\Branch idbranch
 * @property \App\Models\Movementtype idmovementtype
 * @property integer Quantity
 * @property integer idBranch
 * @property integer idProduct
 * @property integer idMovementtype
 */
class Inventory extends Model
{
    use SoftDeletes;

    public $table = 'inventory';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'Quantity',
        'idBranch',
        'idProduct',
        'idMovementtype'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Quantity' => 'integer',
        'idBranch' => 'integer',
        'idProduct' => 'integer',
        'idMovementtype' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'idBranch' => 'required',
        'idProduct' => 'required',
        'idMovementtype' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idproduct()
    {
        return $this->belongsTo(\App\Models\Product::class, 'idProduct');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idbranch()
    {
        return $this->belongsTo(\App\Models\Branch::class, 'idBranch');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idmovementtype()
    {
        return $this->belongsTo(\App\Models\Movementtype::class, 'idMovementtype');
    }
}
