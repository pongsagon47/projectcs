<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = ['order_id','product_id','product_qty','role_employee_id','status','product_total_price'];

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function role_employee()
    {
        return $this->belongsTo(RoleEmployee::class,'role_employee_id');
    }
}
