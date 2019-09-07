<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = ['promotion_name','promotion_description','promotion_discount'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}


