<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * @package App\Models
 * @version April 7, 2019, 12:00 am UTC
 *
 * @property string Name
 * @property string Email
 * @property string Pass
 * @property string State
 * @property string Rol
 * @property string|\Carbon\Carbon create_time
 * @property string|\Carbon\Carbon update_time
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
        'Rol',
        'create_time',
        'update_time'
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

    
}
