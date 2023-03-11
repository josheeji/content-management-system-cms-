<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostRequest;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class PostController extends Controller
{
   public function index()
   {
      // $menu = Menu::all();

      $category = Category::all();

      // $posts = Post::where('category_id', '=', $category->id)->get();
      $posts = Post::all();
      $banner = Banner::all();
      // dd($banner);

      return view('pages.backend.post.index', compact('posts', 'banner'));
   }
   public function create(Request $request)
   {
      $categories = Category::all();
      $menus = Menu::all();
      $banners = Banner::all();
      // $category = Category::where('ststus', '0')->get();
      return view('pages.backend.post.create', compact('categories', 'menus', 'banners'));
   }

   public function store(Request $request)
   {
      // dd($request->all());
      // it is uesd to return the value 
      //   return $request->post();

      // $data = $request->validated();
      // $post = new Post;
      // $post->title = $data['title'];
      // $post->sub_title = $data['sub_title'];
      // $post->category_id = $data['category_id'];
      // $post->slug = $data['slug'];

      // $post->content = $data['content'];
      // $post->navbar_status = $request->navbar_status == true ? '1' : '0';
      // $post->status = $request->status == true ? '1' : '0';
      // $post->meta_keys = $data['meta_keys'];
      // $post->meta_desc = $data['meta_desc'];


      $post = new Post;
      $post->title = $request->title;
      $post->sub_title = $request->sub_title;
      // $post->category_id = $request->category_id;
      $post->slug = Str::slug($request->slug);
      $post->description = $request->description;
      $post->status = $request->status == true ? '1' : '0';

      $post->meta_keys = $request->meta_keys;
      $post->meta_desc = $request->meta_desc;
      $post->banner_id = $request->banner_id;
      // $post->menu_id = $request->menu_id;


      // $input = $request->only('title', 'sub_title', 'category_id', 'menu_id', 'slug', 'status', 'description', 'meta_title', 'meta_keys', 'meta_desc', 'banner_id');

      // if($request->has('status')){
      //    $status = $request->only($request->status == true ? '1' : '0');

      //    $input['ststus'] = $status;
      // }

      if ($request->hasFile('image')) {
         $file = $request->file('image');
         $extension = $file->getClientOriginalExtension();
         $filename = microtime() . '.' . $extension;
         $file->move(public_path('/backend_assets/images/posts'), $filename);
         $input['image'] = $filename;
      }

      $post->save();

      return redirect('auth/posts')->with('message', 'post created successfully');
   }


   public function edit($id)
   {
      $menus = Menu::all();
      $categories = Category::all();
      $banners = Banner::all();

      $post = Post::findOrFail($id);
      return view('pages.backend.post.edit', compact('post', 'categories', 'menus', 'banners'));
   }

   public function update(Request $request, $id)
   {
      $post = Post::findOrFail($id);

      $post->title = $request->title;
      $post->sub_title = $request->sub_title;

      // $post->category_id = $request->category_id;
      // $post->menu_id = $request->menu_id;

      $post->slug = Str::slug($request->slug);
      // $post->navbar_status = $request->navbar_status == true ? '1' : '0';
      // $post->status = $request->status == true ? '1' : '0';

      $post->status = $request->status == true ? '1' : '0';


      $post->description = $request->description;
      $post->meta_title = $request->meta_title;
      $post->meta_keys = $request->meta_keys;
      $post->meta_desc = $request->meta_desc;
      $post->banner_id = $request->banner_id;


      if ($request->hasFile('image')) {
         $destination = 'backend_assets/images/posts/' . $post->image;
         if (File::exists($destination)) {
            File::delete($destination);
         }
         $file = $request->file('image');
         $extension = $file->getClientOriginalExtension();
         $filename = microtime() . '.' . $extension;
         $file->move(public_path('/backend_assets/images/posts'), $filename);
         $post->image = $filename;
      }
      $post->update();
      return redirect('admin/event-templates')->with('message', 'Event Template Updated Successfully');
   }
   public function destroy($id)
   {
      $post = Post::findOrFail($id);
      $post->delete();
      return redirect('auth/posts')->with('message', 'post deleted successfully');
   }
}
