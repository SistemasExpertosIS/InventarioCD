<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TransferM
 * @package App\Models
 * @version April 10, 2019, 2:06 am UTC
 *
 * @property \App\Models\Branch idbranchreceives
 * @property \App\Models\Branch idbranchsends
 * @property \App\Models\Movementtype idmovementtype
 * @property \App\Models\Transport idtransport
 * @property \App\Models\User iduserreceives
 * @property \App\Models\User idusersends
 * @property \Illuminate\Database\Eloquent\Collection transferds
 * @property string Description
 * @property integer idMovementType
 * @property integer idUserReceives
 * @property integer idUserSends
 * @property integer idBranchReceives
 * @property integer idBranchSends
 * @property integer idTransport
 */
class TransferM extends Model
{
    use SoftDeletes;

    public $table = 'transferm';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'Description',
        'idMovementType',
        'idUserReceives',
        'idUserSends',
        'State',
        'idBranchReceives',
        'idBranchSends',
        'idTransport'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Description' => 'string',
        'idMovementType' => 'integer',
        'idUserReceives' => 'integer',        
        'State' => 'string',
        'idUserSends' => 'integer',
        'idBranchReceives' => 'integer',
        'idBranchSends' => 'integer',
        'idTransport' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'idMovementType' => 'required',
        'idUserReceives' => 'required',
        'idUserSends' => 'required',
        'idBranchReceives' => 'required',
        'idBranchSends' => 'required',
        'idTransport' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idbranchreceives()
    {
        return $this->belongsTo(\App\Models\Branch::class, 'idBranchReceives');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idbranchsends()
    {
        return $this->belongsTo(\App\Models\Branch::class, 'idBranchSends');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idmovementtype()
    {
        return $this->belongsTo(\App\Models\Movementtype::class, 'idMovementType');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idtransport()
    {
        return $this->belongsTo(\App\Models\Transport::class, 'idTransport');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function iduserreceives()
    {
        return $this->belongsTo(\App\Models\User::class, 'idUserReceives');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idusersends()
    {
        return $this->belongsTo(\App\Models\User::class, 'idUserSends');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function transferds()
    {
        return $this->hasMany(\App\Models\Transferd::class);
    }
}
