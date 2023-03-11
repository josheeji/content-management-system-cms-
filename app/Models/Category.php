<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name', 'slug',
        'description', 'image',
        'navbar_status', 'status',
        'meta_title', 'meta_description', 'meta_keyword',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
