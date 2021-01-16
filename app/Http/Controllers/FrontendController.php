<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Brand;
use App\Category;
use App\Subcategory;
use App\Order;
use Auth;

class FrontendController extends Controller
{
    public function index($value='')
   {
   	$items=Item::all();
   	$brands=Brand::all();
   	$categories=Category::all();
   	$subcategories=Subcategory::all();
    return view('frontend.index',compact('items','brands','categories','subcategories'));
   }

    public function frontendlogin($value='')
   {
    return view('frontend.frontendlogin');
   }

    public function shoppingcart($value='')
   {
    return view('frontend.shoppingcart');
   }

    public function frontendregister($value='')
   {
    return view('frontend.frontendregister');
   }

    public function orderhistory($value='')
   {
    $orders =Order::where('user_id',Auth::id())->orderBy('id','desc')->get();
    return view('frontend.orderhistory',compact('orders'));
   }

    public function promotion($value='')
   {
    $items=Item::all();
    return view('frontend.promotion',compact('items'));
   }

    public function frontendbrand($value='')
   {
    $brands=Brand::all();
    return view('frontend.frontendbrand',compact('brands'));
   }

    public function categoriesitem($id)
   { 

     $category=Category::find($id);

     return view('frontend.categoriesitem',compact('category'));
   }



}
