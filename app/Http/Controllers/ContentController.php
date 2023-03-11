<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Menu;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index(){
        $contents = Content::all();
      
        return view('pages.backend.content.index', compact('contents'));
    }

    public function create(){
        $contents = Content::all();
        $menus = Menu::all();
        return view('pages.backend.content.create', compact('contents', 'menus'));
    }   

    public function store(Request $request){

        $input = $request->only('title', 'description', 'parent_id', 'is_active');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = microtime() . '.' . $extension;
            $file->move(public_path('/backend_assets/images/contents'), $filename);
            $input['image'] = $filename;
        }
        $content = Content::create($input);
        $content->save();
        return redirect('auth/contents')->with('message', 'Content created successfully..');

    }

    public function edit($id){
        $content = Content::findOrFail($id);
        $menu = Menu::findOrFail($id);

        return view('pages.backend.content.edit', compact('content', 'menu'));
    }
    public function update(Request $request, $id){

        

    }
}
