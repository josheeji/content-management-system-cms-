<?php

namespace App\Http\Controllers;

use App\Models\BannerItem;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Module;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index($id)
    {

        $menus = Menu::findOrFail($id);
        

        $menuItems = MenuItem::where('menu_id', '=', $id)->get();
        return view('pages.backend.menuItem.index', compact('menuItems', 'menus'));
    }

    public function create($id)
    {
        $menu = Menu::findOrFail($id);

        return view('pages.backend.menuitem.create', compact('menu'));
    }

    public function store(Request $request, $id)
    {
        

        $input = $request->only('menu_id', 'menu_item_name', 'menu_item_slug', 'sort', 'parent_id');
        $menuItem = MenuItem::create($input, $id);
        $menuItem->save();

        return redirect('/auth/menus/' . $id . '/menu-items')->with('message', 'menu ');
    }
    public function edit(Request $request, $id, $itemId)
    {
        $menu = Menu::findOrFail($id);
        $menuItem = MenuItem::findOrFail($itemId);

        return view('pages.backend.menuItem.edit', compact('menuItem', 'menu'));
    }
    public function update(Request $request, $id, $itemId)
    {
        $menuItem = MenuItem::findOrFail($itemId);

        $menuItem->menu_item_name = $request->menu_item_name;
        $menuItem->menu_item_slug = $request->menu_item_slug;
        $menuItem->parent_id = $request->parent_id;
        $menuItem->update();
        return redirect('/auth/menus/' . $id . '/menu-items')->with('message', 'Menu Item     updated successfully');
    }
}
