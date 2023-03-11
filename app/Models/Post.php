<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'sub_title',

        // 'category_id',

        'image',
        'slug',
        'status',

        'description',

        'meta_keys',
        'meta_desc',
        'meta_title',
        'banner_id'


    ];
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function banner(){
        return $this->belongsTo(Banner::class);
    }



//     public function post()
// {
//     return $this->belongsTo(Post::class);
// }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
