<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductionStatus extends Model
{
    protected $fillable = ['order_id','thai_dessert','role_dessert','brownie_dessert','cake_dessert','cookie_dessert'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
