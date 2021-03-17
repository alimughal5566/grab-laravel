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
use App\User;
use Cart;
use Session;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
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


	public function addToCart(Request $request)
	{
		$productId=$request->ProductId;
		$productById=FoodItems::where('id',$productId)->first();

		$d=Cart::add([
			'id'=>$productId,
			'name'=>$productById->food_name,
			'price'=>$productById->food_price,
			'options' => array('image' => $request->image),
			'attributes' => array('product_type' => 'product'),
			'quantity'=>$request->qty,
		]);

		return redirect('/menu');
	}

	 public function checkout()
    {

    	 if (Auth::guard('frontend')->check()){
          $cartProducts=Cart::getContent();
         return view('user.pages.checkout',compact('cartProducts'));
        }
      	return view('user.pages.login');
		}


		public function checkoutFinal()
    	{
    	 if (Auth::guard('frontend')->check()){
         return view('user.pages.thank');
        }
      	return view('user.pages.login');
		}


	public function statusUpdate(Request $request)
    {
        $id=$request->input('id');
        $status=$request->input('status');
        $result=Order::where('id', $id)->update(['status' =>$status]);
        if($result)
        {
            echo "yes";
        }
        else{
            echo "no";
        }

    }


		public function userDashboard()
		{

		 if (Auth::guard('frontend')->check()){
          $id=Auth::guard('frontend')->user()->id;

          $user=DB::select("SELECT users.id,users.name,users.ul_name,users.email,users.phone FROM users WHERE users.id='$id'");

            $order=DB::select("SELECT orders.id as oid,orders.c_quantity,orders.price,orders.users_id as uid,orders.created_at,orders.c_payment,orders.status FROM `orders` WHERE users_id='$id'");
		  return view('user.pages.account',compact('user','order'));

        }
      	return view('user.pages.login');
		}


		public function ordersDetails($id)
		{

		if (Auth::guard('frontend')->check()){
          $id=Auth::guard('users')->user()->id;
         $details=DB::select("SELECT * FROM `customers` WHERE users_id='$id'");
		  return view('user.pages.account',compact('details'));

        }
      	return view('user.pages.login');
		}



		public function cartShow()
		{

			$cartProducts=Cart::getContent();
			 return view('user.pages.cart',compact('cartProducts'));
		}

		public function removeCartProduct($id)
		{

			Cart::remove($id);
			return redirect('/cart');
		}

		public function update(Request $request)
		{
			Cart::remove($request->newQty);
			$qty=$request->newQty;
			$rowid=$request->rowID;

			$r=Cart::update($rowid,[
			'quantity' => $qty
			]);

			echo "Cart updated Successfully";
		}

		public function clear()
		{
			Cart::clear();
		}



	public function cart()
	{
		if(!Session::has('cart'))
		{
			 return view('user.pages.cart');
		}
		$cart=Session::get('cart');
		return view('user.pages.cart',compact('cart'));
	}

}

