<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TransferD
 * @package App\Models
 * @version April 10, 2019, 2:13 am UTC
 *
 * @property \App\Models\Box idbox
 * @property \App\Models\Product idproduct
 * @property \App\Models\Transferm idtransferm
 * @property string Quantity
 * @property string State
 * @property integer idTransferM
 * @property integer idBox
 * @property integer idProduct
 */
class TransferD extends Model
{
    use SoftDeletes;

    public $table = 'transferd';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'Quantity',
        'State',
        'idTransferM',
        'idBox',
        'idProduct'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Quantity' => 'string',
        'State' => 'string',
        'idTransferM' => 'integer',
        'idBox' => 'integer',
        'idProduct' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'idTransferM' => 'required',
        'idBox' => 'required',
        'idProduct' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idbox()
    {
        return $this->belongsTo(\App\Models\Box::class, 'idBox');
    }

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
    public function idtransferm()
    {
        return $this->belongsTo(\App\Models\Transferm::class, 'idTransferM');
    }
}
