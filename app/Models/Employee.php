<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'first_name',
        'last_name',
        'gender',
        'address',
        'phone_number',
        'role_position_id',
        'nickname',
        'id_card',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roleEmployee()
    {
        return $this->belongsTo(RoleEmployee::class);
    }
    public function roleProduct()
    {
        return $this->belongsTo(RoleProduction::class);
    }
}
