<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Menu extends Model
{
    use HasFactory;


    protected $fillable = [
        'menu_name', 'menu_slug', 'status', 'post_id'

    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }





    //     public function menus()
    // {
    //     return $this->hasMany(Menu::class);
    // }



    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }
}
