<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    protected $table = 'product_categories';

    use SoftDeletes;

    protected $fillable = ['title'];

    protected $dates = ['deleted_at'];

    public function products()
    {
        return$this->hasmany(Product::class);
    }
}
