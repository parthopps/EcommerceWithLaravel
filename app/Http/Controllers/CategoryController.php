<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{
  function addcategoryview()
{
  $categories =  Category::all();
     return view('Category/view',compact("categories"));
}
   function  addcategoryinsert(Request $request){

     // print_r($request->all());
     $request->validate([

      "category_name"=>"required |unique:categories,category_name",
     ]);
     if($request->menu_status == 1){

       Category::insert([
       "category_name"=> $request->category_name,
       "menu_status"=>true,
       "created_at"=>Carbon::now()

       ]);
     }
     else {
       Category::insert([
       "category_name"=> $request->category_name,
       "menu_status"=>false,
       "created_at"=>Carbon::now()
          ]);
     }
     return back();

}

    function deletecategory($category_id)
    {
           Category::where('id',$category_id)->delete();

            return back()->with('deletestatus','Product Deleted successfully Bro');
    }

    function editcategory($category_id)
    {
      $categories_info = Category::findOrFail($category_id);
      return view('Category/edit',compact('categories_info') );
    }
  function  editCategoryinsert(Request $request){
  //  print_r($request->all());

    Category::find($request->category_id)->update([

     "category_name"=> $request->category_name,
     "menu_status"=>$request->menu_status,

 ]);
 return back()->with('status','Product Updated successfully Bro');
  }

}
