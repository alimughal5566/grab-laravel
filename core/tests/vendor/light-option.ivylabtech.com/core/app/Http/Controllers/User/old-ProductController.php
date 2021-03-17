<?php

namespace App\Http\Controllers\User;

use App\AboutSetting;
use App\BlogCategory;
use App\BlogPost;
use App\Contact;
use App\Counter;
use App\Events;
use App\FoodCategory;
use App\FoodGallery;
use App\FoodItems;
use App\GeneralSetting;
use App\Language;
use App\OurChef;
use App\Reservation;
use App\Testimonial;
use App\Order;
use App\Cart;
use Session;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

	public function __construct()
    {
        view()->share([
            'aboutSetting' => AboutSetting::first(),
            'events' => Events::orderBy('created_at', 'desc')->paginate(6),
            'counter' => Counter::all(),
            'foodCategories' => FoodCategory::all(),
            'foodItems' => FoodItems::orderBy('created_at', 'desc')->paginate(6),
            'foodGallery' => FoodGallery::all(),
            'testimonials' => Testimonial::all(),
            'chefs' => OurChef::all(),
            'posts' => BlogPost::all(),
            'contacts' => Contact::first(),
            'blogs' => BlogPost::orderBy('created_at', 'desc')->paginate(6),
            'blogCategories' => BlogCategory::orderBy('created_at', 'desc')->get(),

        ]);
    }


	public function addToCart(FoodItems $FoodItems,Request $request)
	{
		// $oldCart=Session::has('cart') ? Session::get('cart') :null;
		// $qty=$request->qty ? $request->qty : 1;
		// $cart=new Cart($oldCart);
		// $cart->addProduct($FoodItems,$qty);
		// Session::put('cart',$cart);
		// return back()->with('message', "Product $FoodItems->food_name has been Successfully Added To Cart"); 
	}

	// public function cart()
	// {
	// 	// dd(Session::get('cart'));
	// 	if(!Session::has('cart'))
	// 	{
	// 		 return view('user.pages.cart');
	// 	}
	// 	$cart=Session::get('cart');
	// 	// dd($cart);
	// 	return view('user.pages.cart',compact('cart'));
	// }

}