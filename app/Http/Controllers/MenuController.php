<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuCreateRequest;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class MenuController extends Controller
{

    public function index()
    {
        $menus = Menu::all();
        $post = Post::all();

        // print_r($post);
        // dd($post);
        return view('pages.backend.menu.index', compact('menus', 'post'));
    }

    public function create()
    {
        $menus = Menu::all();
        $posts = Post::all();

        return view('pages.backend.menu.create', compact('menus', 'posts'));
    }

    public function store(Request $request)
    {
        $menu = new Menu;
        $menu->menu_name = $request->menu_name;
        $menu->menu_slug = Str::slug($request->menu_slug);
        $menu->post_id = $request->post_id;

        $menu->status = $request->status == true ? '1' : '0';

        // it is uesd to return the value 
        // return $request->post();
        // dd($request->all());

        // $input = $request->only('menu_name', 'menu_slug');

        // $menu = Menu::create($input);
        $menu->save();

        return redirect('/auth/menus')->with('message', 'Menu created successfully..');
    }
    public function edit($id)
    {

        $posts = Post::all();
        $menu = Menu::findOrFail($id);
        return view('pages.backend.menu.edit', compact('menu', 'posts'));
    }
    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $menu->menu_name = $request->menu_name;
        $menu->menu_slug = Str::slug($request->menu_slug);
        $menu->post_id = $request->post_id;
        $menu->status = $request->status == true ? '1' : '0';


        $menu->update();


        return redirect('/auth/menus')->with('message', 'menu updated successfully..');
    }

    public function destroy(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect('/auth/menus', compact('menu'))->with('message', 'Menu Deleted successfully..');
    }
}
