<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'user_id',
        'employee_id',
        'promotion_id',
        'total_price',
        'total_price_discounted',
        'total_qty',
        'order_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id');
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class,'promotion_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function productionStatus()
    {
        return $this->hasOne(ProductionStatus::class);
    }


}
