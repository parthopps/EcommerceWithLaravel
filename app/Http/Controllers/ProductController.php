<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Image;


class ProductController extends Controller
{
    //


    function addproductview(){
      //return view('product/view');
      $all_products = product::paginate(5);
     $Deleted_products=  product::onlyTrashed()->get();
     $categories =  Category::all();
      return view('product/view',compact('all_products','Deleted_products','categories'));


    }
    function addproductinsert(Request $request)
    {

    //  return $request;


      $request->validate([

         "category_id"=>"required",
         "product_name"=>"required",
          "product_description"=>"required",
          "product_price"=>"required|numeric",
          "product_quentity"=>"required|numeric",
          "quentity_alert"=>"required|numeric",

      ]);
      $last_inserted_id = Product::insertGetId([
       "category_id"=>$request->category_id,
        "product_name"=> $request->product_name,
        "product_description"=>$request->product_description,
         "product_price"=>$request->product_price,
         "product_quentity"=>$request->product_quentity,
         "quentity_alert"=>$request->quentity_alert,
      ]);
      if($request->hasFile('product_image'))
      {
        $photo_to_upload = $request->product_image;
        $filename = $last_inserted_id.".".$photo_to_upload->getClientOriginalExtension();
       Image::make($photo_to_upload)->resize(400, 450)->save(base_path('public/uploads/product_photos/'.$filename));
      //  print_r($filename);
      Product::find($last_inserted_id)->update([

        'product_image' => $filename
      ]);

      }
   return back()->with('status','Product Inserted successfully Bro');
    }

    function deleteproduct($product_id)
    {
        //echo $product_id;
        //  Product::find ($product_id)->delete(); jakon id primary key thekba!
        Product::where('id',$product_id)->delete();

        return back()->with('deletestatus','Product Deleted successfully Bro');

    }



    function editproduct($product_id){
    //  echo "$product_id";
    //  return view('product/edit');

  $single_product_info =  Product::findOrFail($product_id);
  return view('product/edit',compact('single_product_info'));

    }
    function editproductinsert(Request $request)
    {
      if($request->hasFile('product_image'))
      {
        if( Product::find($request->product_id)->product_image == 'defualt.jpg')
        {
          $photo_to_upload = $request->product_image;
          $filename = $request->product_id.".".$photo_to_upload->getClientOriginalExtension();
         Image::make($photo_to_upload)->resize(400, 450)->save(base_path('public/uploads/product_photos/'.$filename));
        //  print_r($filename);
        Product::find($request->product_id)->update([

          'product_image' => $filename
        ]);
        }
        else{
          $delete_this_file=Product::find($request->product_id)->product_image;
          unlink(base_path('public/uploads/product_photos/'.$delete_this_file));

            $photo_to_upload = $request->product_image;
            $filename = $request->product_id.".".$photo_to_upload->getClientOriginalExtension();
           Image::make($photo_to_upload)->resize(400, 450)->save(base_path('public/uploads/product_photos/'.$filename));
          //  print_r($filename);
          Product::find($request->product_id)->update([

            'product_image' => $filename
          ]);
        }
      }

         Product::find($request->product_id)->update([

        "product_name"=> $request->product_name,
        "product_description"=>$request->product_description,
         "product_price"=>$request->product_price,
         "product_quentity"=>$request->product_quentity,
         "quentity_alert"=>$request->quentity_alert,
    ]);
    return back()->with('status','Product Updated successfully Bro');
    }


    function restoreproduct($product_id)
    {
      Product::onlyTrashed()->where('id',$product_id)->restore();
      return back();
    }
    function forcedeletedproduct($product_id)
    {
      $delete_this_file=Product::onlyTrashed()->find($product_id)->product_image;
      unlink(base_path('public/uploads/product_photos/'.$delete_this_file));
      Product::onlyTrashed()->find($product_id)->forcedelete();
      return back();

      //return back()->with('status','Product Edited successfully Bro');;
    }
}
