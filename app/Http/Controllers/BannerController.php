<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Files;
use Illuminate\Support\Str;

class BannerController extends Controller
{

    public function index()
    {
        $banners = Banner::all();
        return view('pages.backend.banner.index', compact('banners'));
    }


    public function create()
    {
        return view('pages.backend.banner.create');
    }


    public function store(BannerRequest $request)
    {
        $input = $request->only('title');
        
        $content = Banner::create($input);
        $content->save();
        return redirect('auth/banners')->with('message', 'Banner created successfully..');
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('pages.backend.banner.edit', compact('banner'));
    }

    public function update(Request $request, $id){
        $banner= Banner::findOrFail($id);
  
        $banner->title = $request->title;
        $banner->update();
        return redirect('/auth/banners')->with('message', 'banner updated successfully');
  
     }

     public function destroy($id){

     }
}
