<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * @package App\Models
 * @version April 6, 2019, 2:24 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection branches
 * @property \Illuminate\Database\Eloquent\Collection transferms
 * @property \Illuminate\Database\Eloquent\Collection transferms
 * @property string Name
 * @property string Email
 * @property string Pass
 * @property string State
 * @property string Rol
 */
class User extends Model
{
    use SoftDeletes;

    public $table = 'user';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'Name',
        'Email',
        'Pass',
        'State',
        'Rol'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idUser' => 'integer',
        'Name' => 'string',
        'Email' => 'string',
        'Pass' => 'string',
        'State' => 'string',
        'Rol' => 'string'
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function branches()
    {
        return $this->hasMany(\App\Models\Branch::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function transferms()
    {
        return $this->hasMany(\App\Models\Transferm::class);
    }


}
