<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'role_employee_id', 'description', 'image',];

    public function role_employee()
    {
        return $this->belongsTo(RoleEmployee::class);
    }
}
