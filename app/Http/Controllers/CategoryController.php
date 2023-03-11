<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
   public function index()
   {

      $categories = Category::all();

      return view('pages.backend.category.index', compact('categories'));
   }

   public function create()
   {
      return view('pages.backend.category.create');
   }

   public function store(CategoryCreateRequest $request)
   {

      // $data = $request->validated();

      $category = new Category;
      $category->category_name = $request['category_name'];
      $category->slug = $request['slug'];
      $category->description = $request['description'];

      $category->navbar_status = $request->navbar_status == true ? '1' : '0';
      $category->status = $request->status == true ? '1' : '0';


      $category->meta_title = $request['meta_title'];
      $category->meta_description = $request['meta_description'];
      $category->meta_keyword = $request['meta_keyword'];


      // $input = $request->navbar_status == true ? '1': '0';
      // $input = $request->status == true ? '1': '0';
      // $input = $request->only('category_name', 'slug', 'description', 'image', 'meta_title', 'meta_description', 'meta_keyword', 'navbar_status', 'status');

      if ($request->hasFile('image')) {
         $file = $request->file('image');
         $extension = $file->getClientOriginalExtension();
         $filename = microtime() . '.' . $extension;
         $file->move(public_path('/backend_assets/images/category'), $filename);
         $category->image = $filename;
      }
     
      // $category = Category::create($input);
      $category->save();
      return redirect('/auth/categories')->with('message', 'Category created successfullyy..');
   }

   public function edit($id)
   {
      $category = Category::findOrFail($id);
      return view('pages.backend.category.edit', compact('category'));
   }
   public function update(CategoryUpdateRequest $request, $id)
   {
      $category = Category::findOrFail($id);
      $category->category_name = $request->category_name;
      $category->description = $request->description;
      $category->slug = $request->slug;
      $category->meta_title = $request->meta_title;
      $category->meta_description = $request->meta_description;
      $category->meta_keyword = $request->meta_keyword;
      $category->navbar_status = $request->navbar_status == true ? '1' : '0';
      $category->status = $request->status == true ? '1' : '0';


      if ($request->hasFile('image')) {
         $destination = 'backend_assets/images/category/' . $category->image;
         if (File::exists($destination)) {
            File::delete($destination);
         }
         $file = $request->file('image');
         $extension = $file->getClientOriginalExtension();
         $filename = microtime() . '.' . $extension;
         $file->move(public_path('/backend_assets/images/category'), $filename);
         $category->image = $filename;
      }
      $category->update();
      return redirect('auth/categories')->with('message', 'Category Updated Successfully..');
   }


   public function destroy($id)
   {
      $category = Category::findOrFail($id);
      if($category){

            $destination = 'backend_assets/images/category/' . $category->image;
            if (File::exists($destination)) {
               File::delete($destination);
            }

         $category->delete();
         return redirect('auth/categories')->with('message', 'Category Deleted Successfully..');
         
      }else{
      return redirect('auth/categories')->with('message', 'Category ID did not found');
      }

   }
}

