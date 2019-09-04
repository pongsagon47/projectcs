<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable= [
        'title',
        'employee_id',
        'news_category_id',
        'short_description',
        'description',
        'status',
        'cover_image',
        'thumbnail_image',

    ];

    public function news_category()
    {
        return $this->belongsTo(NewsCategory::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}
