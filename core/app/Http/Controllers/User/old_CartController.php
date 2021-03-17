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
use App\Mealplan;
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

	public function clearmealcard()
	{
		$wholecartitems=Cart::getContent();
		if(sizeof($wholecartitems) > 0)
		{
			foreach ($wholecartitems as $key => $value)
			{
			   if($value->attributes->product_type == 'meal')
				{
					Cart::remove($value->id);
				}
			}
		}
		return redirect('/meal');
	}


	public function addCart(Request $request)
	{
		$rec=DB::select("SELECT id FROM mealhelps ORDER BY id DESC LIMIT 1");
		$dummy_Id=$rec[0]->id;
		$dummy_productId=$dummy_Id+1;
		DB::update("UPDATE mealhelps set id=$dummy_productId WHERE id=$dummy_Id");

		$productId=$request->ProductId;
		$foodid=$request->foodtypeid;
		$dayid=$request->dayid;
		$weekno=$request->weekno;
		$productById=FoodItems::where('id',$productId)->first();

		$wholecartitems=Cart::getContent();
		if(sizeof($wholecartitems) > 0)
		{
			foreach ($wholecartitems as $key => $value)
			{
			   if($value->attributes->dayid == $dayid && $value->attributes->foodtypeid == $foodid && $value->attributes->weekno == $weekno )
				{
					Cart::remove($value->id);
				}
			}
		}

		$d=Cart::add([
			'id'=>$dummy_productId,
			'name'=>$productById->food_name,
			'price'=>$productById->food_price,
			'attributes' => array('pro_id' => $productId,'dayid' => $dayid,'foodtypeid' =>$foodid,'weekno' =>$weekno,'product_type' =>'meal','image' =>$productById->food_image),
			'quantity'=>$request->qty,
		]);


		return redirect('/meal');
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
			'attributes' => array('product_type' => 'product','sumprice'=>$productById->food_price,'addonsize'=>0),
			'quantity'=>$request->qty,
		]);

		return redirect('/menu');
	}

    public function checkout()
    {
    	 if (Auth::guard('frontend')->check()){



    	 	$sum=0;
			$cartProducts=Cart::getContent();

			foreach ($cartProducts as  $value) {
				if($value->attributes->product_type=='product')
				{
					if($value->attributes->addonsize!=0)
					{
						$sum=$sum+$value->attributes->addonprice;
					}
					$sum=$sum+($value->price*$value->quantity);
					//$sum=$sum+$value->attributes->sumprice;
				}
				else{
					$sum=$sum+($value->price*$value->quantity);
				}
			}
         return view('user.pages.checkout',compact('cartProducts','sum'));
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


		public function userDashboard()
		{

		 if (Auth::guard('frontend')->check()){
          $id=Auth::guard('frontend')->user()->id;
          $user=DB::select("SELECT users.id,users.name,users.ul_name,users.email,users.phone FROM users WHERE users.id='$id'");

          $order= DB::select("SELECT food_items.food_name,users.*,orders.* FROM orders JOIN food_items ON orders.food_id=food_items.id JOIN users ON orders.users_id=users.id  WHERE orders.users_id='$id' AND orders.product_type='product'");

          $planorders=DB::select("SELECT foodplans.plan_name,users.id as userid,users.ul_name,users.name,users.email,users.phone,orders.* FROM orders JOIN foodplans ON orders.food_id=foodplans.id JOIN users ON orders.users_id=users.id WHERE orders.product_type='plan' AND orders.users_id='$id'");

		  return view('user.pages.account',compact('user','order','planorders'));

        }
      	return view('user.pages.login');
		}


		public function ordersDetails($id)
		{


		if (Auth::guard('frontend')->check()){
           $id1=Auth::guard('frontend')->user()->id;
 		$user=DB::select("SELECT users.id,users.name,users.ul_name,users.email,users.phone FROM users WHERE users.id='$id1'");

        $orders = DB::select("SELECT food_items.food_name,users.*,orders.*,food_categories.food_category_name FROM orders JOIN food_items ON orders.food_id=food_items.id JOIN users ON orders.users_id=users.id JOIN food_categories ON food_items.food_category_id=food_categories.id WHERE orders.id='$id'");
		  return view('user.pages.accountdetails',compact('orders','user'));

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


        public function cartShow()
		{
			$sum=0;
			$cartProducts=Cart::getContent();

			foreach ($cartProducts as  $value) {
				if($value->attributes->product_type=='product')
				{
					if($value->attributes->addonsize!=0)
					{
						$sum=$sum+$value->attributes->addonprice;
					}
					$sum=$sum+($value->price*$value->quantity);
				}
				else{
					$sum=$sum+($value->price*$value->quantity);
				}
			}
			 return view('user.pages.cart',compact('cartProducts','sum'));
		}


		public function removeCartProduct($id)
		{

			Cart::remove($id);
			return redirect('/cart');
		}

		public function update(Request $request)
		{
			//Cart::remove($request->newQty);
			$val = Cart::get($request->rowID);
			$oldVal = $val->quantity;

			$qty= $request->newQty - $oldVal;
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

    	public function handlemealcart(Request $request)
    	{
    		$cartProducts=Cart::getContent();
    		$v=0;

			foreach ($cartProducts as $key => $cartProduct)
			{
			   if($cartProduct->attributes->product_type == 'meal')
				{
					$v=$v+1;
				}
			}

    		if($v==0)
    		{
    			return redirect()->route('user.meal')->with('error_meal','Please select your meal first!');
    		}

    		$starting_date='';
	        $adate=date('l');
	        if($adate=='Monday')
	        {
	        	$starting_date=date('Y-m-d');
	        }
	        else
	        {
	        	$nextMonday = strtotime('next monday');
	        	$starting_date=date('Y-m-d',$nextMonday);
	        }
	        $mealplan = new Mealplan();
	        $mealplan->meal_name = $request->meal_name;
	        $mealplan->meal_days = $request->meal_days;
	        $mealplan->starting_date = $starting_date;
	        $mealplan->save();

	            Session()->flash('success', 'Your Own Created Meal Created Successfully!');
	            return redirect('/cart');
    	}

		public function showupdatedstatus(Request $request)
		{

			if (Auth::guard('frontend')->check())
			{
				$order_id=$request->orderid;
				$result=DB::select("SELECT foodplans.plan_name, orderplans.order_status, orderplans.day_id, orderplans.food_type_id, food_items.food_name, food_items.food_price FROM orderplans LEFT JOIN foodplans ON orderplans.plan_id=foodplans.id LEFT JOIN food_items ON orderplans.food_item_id=food_items.id WHERE orderplans.order_id='$order_id' ORDER BY orderplans.day_id ASC, orderplans.food_item_id ASC");

				return response()->json(['daysorderslist'=>$result]);
			}
			else
			{
				return view('user.pages.login');
			}


		}


    public function detailaddToCart(Request $request)
	{


		$productId=$request->ProductId;
		if($request->addonsize!=0)
		{




		if(isset($request->addon))
		{

					$addonid=$request->addon;
					$idi = implode(',',$addonid);
					$addonsize=sizeof($addonid);
		$ids = join("','",$addonid);
		$res = DB::select("SELECT * FROM addons WHERE id IN ('$ids')");



		$ad=array();
		$sumaddon = DB::select("SELECT addon_name FROM addons WHERE id IN ('$ids')");
		foreach($sumaddon as  $value) {
			array_push($ad,$value->addon_name);
		}


		$sumaddoncomma=implode(', ', $ad);

		$productById=FoodItems::where('id',$productId)->first();
		$sumpric = DB::select("SELECT sum(price) as totalamount FROM addons WHERE id IN ('$ids')")[0];
		$addonsumpric=$sumpric->totalamount*$request->qty;
		$sumprice=$sumpric->totalamount+$productById->food_price;



		$d=Cart::add([
			'id'=>$productId,
			'name'=>$productById->food_name,
			'price'=>$productById->food_price,
	'attributes' => array('product_type' => 'product','addonid'=>$idi,'sumprice'=>$sumprice,'addonname'=>$sumaddoncomma,'addonprice'=>$addonsumpric,'addonsize'=>$addonsize),
			'quantity'=>$request->qty,
		]);

		}
		else
		{
			$this->addToCart($request);
		}

		}
		else{
			$this->addToCart($request);
		}


		return redirect('/cart');
	}



}

