<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use auth;
use Carbon\Carbon;

class CategoryController extends Controller
{
    function addcategory(){
      $categories = Category::all();
      $onlyTrashed = Category::onlyTrashed()->get();
      return view('admin.category.index',compact('categories', 'onlyTrashed'));
    }
    function addcategorypost(Request $request){
      $request->validate(['category_name' => 'required|unique:categories,category_name'],
      [
        'category_name.required' =>'Please Add YOur category',
        'category_name.unique' =>'Category Name alredy added'
    ]);

      Category::insert([
        'category_name' => $request->category_name,
        'user_id' => Auth::user()->id,
        'created_at' => Carbon::now()
      ]);
      return back()->with('add_category', 'Category Add Successfully!');
    }
    function addcategoryupdate($category_id){
      $category = Category::find($category_id)->category_name;
      return view('admin.category.update', compact('category', 'category_id'));
    }
    function addcategoryupdatepost(Request $request){
      Category::find($request->category_id)->update([
        'category_name' => $request->category_name
      ]);
    return redirect('add/category')->with('update_status', 'Category Update Successfully!');
    }
    function categorydelete($category_id){
      Category::find($category_id)->delete();
      return back();
    }
    function categoryrestore($category_id){
      Category::withTrashed()->find($category_id)->restore();
      return back();
    }
    function categoryforcedeletes($category_id){
      Category::onlyTrashed()->find($category_id)->forceDelete();
      return back();
    }

}
