<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'price',
        'category_id',
        'description',
        'cover_image',
        'slug'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
