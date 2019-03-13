<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleProduction extends Model
{
    protected $table='role_productions';

    protected $fillable = ['name'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

}
