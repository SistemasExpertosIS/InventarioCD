<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Branch
 * @package App\Models
 * @version April 10, 2019, 1:52 am UTC
 *
 * @property \App\Models\User iduser
 * @property \Illuminate\Database\Eloquent\Collection inventories
 * @property \Illuminate\Database\Eloquent\Collection transferms
 * @property \Illuminate\Database\Eloquent\Collection transferms
 * @property string Name
 * @property string City
 * @property string Abv
 * @property integer idUser
 */
class Branch extends Model
{
    use SoftDeletes;

    public $table = 'branch';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'Name',
        'City',
        'Abv',
        'idUser'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Name' => 'string',
        'City' => 'string',
        'Abv' => 'string',
        'idUser' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'idUser' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function iduser()
    {
        return $this->belongsTo(\App\Models\User::class, 'idUser');
    }

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
