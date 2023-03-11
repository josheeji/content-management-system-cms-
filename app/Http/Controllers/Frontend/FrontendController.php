<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // public function index(){
    //     $menu = Menu::all();
    //     return view('pages.frontend.page', compact('menu'));
    // }



    public function index($menu_slug)
    {
        $menu = Menu::where('menu_slug', $menu_slug)->first();
        // dd($menu);
        // dd($menu->post->banner->bannerItems);
        $bannerItems = $menu->post?->banner?->bannerItems;

        return view('pages.frontend.page', compact('menu', 'bannerItems'));
    }

    public function view()
    {
    }
}
