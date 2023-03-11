<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class MenuItem extends Model
{
    use HasFactory;

    protected  $table = 'menu_items';

    protected $fillable = [
        'menu_id',
        'menu_item_name',
        'menu_item_slug',
        'description',
        'sort',
        'parent_id'

    ];


   


    // public function parent()
    // {
    //     return $this->belongsTo(Menu::class, 'parent_id');
    // }

    // public function children()
    // {
    //     return $this->hasMany(Menu::class, 'parent_id');
    // }



    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    











    // public function menuItems()
    // {
    //     return $this->hasMany(MenuItem::class)->orderBy('order');
    // }


    // public function children()
    // {
    //     return $this->hasMany(MenuItem::class, 'parent_id');
    // }
    //     function renderMenuItem($menu)
    // {
    //     echo "<li><a href='{$menu->url}'>{$menu->name}</a>";
    //     if ($menu->children->count() > 0) {
    //         echo "<ul>";
    //         foreach ($menu->children as $childMenu) {
    //             renderMenuItem($childMenu);
    //         }
    //         echo "</ul>";
    //     }
    //     echo "</li>";
    // }

    // echo "<ul>";
    // foreach ($menus as $menu) {
    //     render



}
