<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * @package App\Models
 * @version April 9, 2019, 10:59 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection branches
 * @property \Illuminate\Database\Eloquent\Collection transferms
 * @property \Illuminate\Database\Eloquent\Collection transferms
 * @property string Name
 * @property string email
 * @property string password
 * @property string State
 * @property string Rol
 */
class User extends Authenticatable
{
    use SoftDeletes;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'Name',
        'email',
        'password',
        'State',
        'Rol'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'State' => 'string',
        'Rol' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'State' => 'required',
        'Rol' => 'required'
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
