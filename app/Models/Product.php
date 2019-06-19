<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'product_category_id', 'description', 'image',];

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
