<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Contact;
use Mail;
use App\Mail\ContactMessage;



class FrontendController extends Controller
{
    function contact(){
      return view('contact');
    }

    function about(){
      return view('about');
    }

    function index(){
      //return view('welcome');

      $all_products = product::all();
      $categories = Category::all();

      return view('welcome',compact('all_products','categories'));


    }
    function detailproduct($product_id){
    //  echo "$product_id";
    //  return view('product/edit');

  $all_products =  Product::find($product_id);
  $related_products =  Product::where("id","!=",$product_id)->where('category_id',$all_products->category_id)->get();

  return view('frontend_view/product_details',compact('all_products','related_products'));


    }


    function categorywiseproduct($category_id)
    {
    $display_products =  Product::where('category_id',$category_id)->get();
      return view('frontend_view/categorywiseproductview',compact('display_products'));
    }

    function contactinsert(Request $request)
    {
     Contact::insert($request->except('_token'));
     Mail::to('razwanshahriorrahin@gmail.com')->send(new ContactMessage());
     return back();
    }
}
