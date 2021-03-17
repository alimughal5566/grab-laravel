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
use App\FrontEndSetting;
use App\Mealdetail;
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
            'foodItems' => FoodItems::orderBy('created_at', 'desc')->paginate(6),
            'foodGallery' => FoodGallery::all(),
            'testimonials' => Testimonial::all(),
            'chefs' => OurChef::all(),
            'foodCategories' => FoodCategory::where('status','=',1)->get(),
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
		$sel_week=7;
		session(['ml_weekno' => $sel_week]);
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
				if($value->attributes->product_type=='meal')
				{
				   	if($value->attributes->dayid == $dayid && $value->attributes->foodtypeid == $foodid && $value->attributes->weekno == $weekno)
					{
						Cart::remove($value->id);
					}
				}
			}
		}

		$d=Cart::add([
			'id'=>$dummy_productId,
			'name'=>$productById->food_name,
			'price'=>$productById->food_price,
			'attributes' => array('pro_id' => $productId,'dayid' => $dayid,'foodtypeid' =>$foodid, 'weekno'=>$weekno, 'product_type' =>'meal','image' =>$productById->food_image, 'anothermyom'=>'notdone'),
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
			$delivercharges=FrontEndSetting::select('deliverycharges')->get();

			foreach ($cartProducts as  $value) {
				if($value->attributes->product_type=='product')
				{
					if($value->attributes->addonsize!=0)
					{
						$sum=$sum+$value->attributes->addonprice;
					}

					$sum=$sum+($value->price*$value->quantity);
					$sum=number_format($sum,3);
				}
				else{
					$sum=$sum+($value->price*$value->quantity);
					$sum=number_format($sum,3);
				}
			}
         return view('user.pages.checkout',compact('cartProducts','sum','delivercharges'));
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
          $user=DB::select("SELECT users.id,users.name,users.ul_name,users.email,users.phone,users.shipping_address,users.billing_address,users.city,users.postcode FROM users WHERE users.id='$id'");

          $order= DB::select("SELECT food_items.food_name,users.*,orders.* FROM orders JOIN food_items ON orders.food_id=food_items.id JOIN users ON orders.users_id=users.id  WHERE orders.users_id='$id' AND orders.product_type='product'");

          $planorders=DB::select("SELECT foodplans.plan_name,users.id as userid,users.ul_name,users.name,users.email,users.phone,orders.* FROM orders JOIN foodplans ON orders.food_id=foodplans.id JOIN users ON orders.users_id=users.id WHERE orders.product_type='plan' AND orders.users_id='$id'");

            $planoption = DB::select("SELECT planoptions.plan_name,users.id as userid,users.ul_name,users.name,users.email,users.phone,orders.* FROM orders JOIN planoptions ON orders.planoption_id=planoptions.id JOIN users ON orders.users_id=users.id WHERE orders.product_type='plan_option' AND orders.users_id='$id'");

            $mommeals = DB::select("SELECT * FROM orders WHERE orders.product_type='meal' AND orders.users_id='$id'");

		  return view('user.pages.account',compact('user','order','planorders','planoption','mommeals'));

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
			   if($cartProduct->attributes->product_type == 'meal' && $cartProduct->attributes->anothermyom=='notdone')
				{
					$v=$v+1;
					break;
				}
			}

    		if($v==0)
    		{
    			return redirect()->route('user.meal')->with('error_meal','Please select your meal first!');
    		}


	        $nextMonday = strtotime('next monday');
	        $starting_date=date('Y-m-d',$nextMonday);

	        $mealplan = new Mealplan();
	        $mealplan->meal_days = $request->meal_days;
	        $mealplan->starting_date = $starting_date;
	        $created_mealid=$mealplan->save();

	        $cre_mealId = DB::getPDO()->lastInsertId();

	        $cre_meal_days='';
	        if($request->meal_days==7)
	        {
	        	$cre_meal_days='7 days meal plan';
	        }
	        if($request->meal_days==14)
	        {
	        	$cre_meal_days='14 days meal plan';
	        }
	        if($request->meal_days==21)
	        {
	        	$cre_meal_days='21 days meal plan';
	        }
	        if($request->meal_days==28)
	        {
	        	$cre_meal_days='28 days meal plan';
	        }



	        $totalprice=0;
            foreach ($cartProducts as $key => $cartProduct)
			{
			   if($cartProduct->attributes->anothermyom=='notdone' && $cartProduct->attributes->product_type == 'meal')
				{
					$fooditemorderdate='';

					if($cartProduct->attributes->weekno==1)
					{
						if($cartProduct->attributes->dayid==1)
						{
							$fooditemorderdate=$starting_date;
						}
						elseif($cartProduct->attributes->dayid==2)
						{
							$fooditemorderdate=date('Y-m-d', strtotime($starting_date. ' + 1 days'));
						}
						elseif($cartProduct->attributes->dayid==3)
						{
							$fooditemorderdate=date('Y-m-d', strtotime($starting_date. ' + 2 days'));
						}
						elseif($cartProduct->attributes->dayid==4)
						{
							$fooditemorderdate=date('Y-m-d', strtotime($starting_date. ' + 3 days'));
						}
						elseif($cartProduct->attributes->dayid==5)
						{
							$fooditemorderdate=date('Y-m-d', strtotime($starting_date. ' + 4 days'));
						}
						elseif($cartProduct->attributes->dayid==6)
						{
							$fooditemorderdate=date('Y-m-d', strtotime($starting_date. ' + 5 days'));
						}
						elseif($cartProduct->attributes->dayid==7)
						{
							$fooditemorderdate=date('Y-m-d', strtotime($starting_date. ' + 6 days'));
						}
					}
					elseif($cartProduct->attributes->weekno==2)
					{
						if($cartProduct->attributes->dayid==1)
						{
							$fooditemorderdate=date('Y-m-d', strtotime($starting_date. ' + 7 days'));
						}
						elseif($cartProduct->attributes->dayid==2)
						{
							$fooditemorderdate=date('Y-m-d', strtotime($starting_date. ' + 8 days'));
						}
						elseif($cartProduct->attributes->dayid==3)
						{
							$fooditemorderdate=date('Y-m-d', strtotime($starting_date. ' + 9 days'));
						}
						elseif($cartProduct->attributes->dayid==4)
						{
							$fooditemorderdate=date('Y-m-d', strtotime($starting_date. ' + 10 days'));
						}
						elseif($cartProduct->attributes->dayid==5)
						{
							$fooditemorderdate=date('Y-m-d', strtotime($starting_date. ' + 11 days'));
						}
						elseif($cartProduct->attributes->dayid==6)
						{
							$fooditemorderdate=date('Y-m-d', strtotime($starting_date. ' + 12 days'));
						}
						elseif($cartProduct->attributes->dayid==7)
						{
							$fooditemorderdate=date('Y-m-d', strtotime($starting_date. ' + 13 days'));
						}
					}
					elseif($cartProduct->attributes->weekno==3)
					{
						if($cartProduct->attributes->dayid==1)
						{
							$fooditemorderdate=date('Y-m-d', strtotime($starting_date. ' + 14 days'));
						}
						elseif($cartProduct->attributes->dayid==2)
						{
							$fooditemorderdate=date('Y-m-d', strtotime($starting_date. ' + 15 days'));
						}
						elseif($cartProduct->attributes->dayid==3)
						{
							$fooditemorderdate=date('Y-m-d', strtotime($starting_date. ' + 16 days'));
						}
						elseif($cartProduct->attributes->dayid==4)
						{
							$fooditemorderdate=date('Y-m-d', strtotime($starting_date. ' + 17 days'));
						}
						elseif($cartProduct->attributes->dayid==5)
						{
							$fooditemorderdate=date('Y-m-d', strtotime($starting_date. ' + 18 days'));
						}
						elseif($cartProduct->attributes->dayid==6)
						{
							$fooditemorderdate=date('Y-m-d', strtotime($starting_date. ' + 19 days'));
						}
						elseif($cartProduct->attributes->dayid==7)
						{
							$fooditemorderdate=date('Y-m-d', strtotime($starting_date. ' + 20 days'));
						}
					}
					elseif($cartProduct->attributes->weekno==4)
					{
						if($cartProduct->attributes->dayid==1)
						{
							$fooditemorderdate=date('Y-m-d', strtotime($starting_date. ' + 21 days'));
						}
						elseif($cartProduct->attributes->dayid==2)
						{
							$fooditemorderdate=date('Y-m-d', strtotime($starting_date. ' + 22 days'));
						}
						elseif($cartProduct->attributes->dayid==3)
						{
							$fooditemorderdate=date('Y-m-d', strtotime($starting_date. ' + 23 days'));
						}
						elseif($cartProduct->attributes->dayid==4)
						{
							$fooditemorderdate=date('Y-m-d', strtotime($starting_date. ' + 24 days'));
						}
						elseif($cartProduct->attributes->dayid==5)
						{
							$fooditemorderdate=date('Y-m-d', strtotime($starting_date. ' + 25 days'));
						}
						elseif($cartProduct->attributes->dayid==6)
						{
							$fooditemorderdate=date('Y-m-d', strtotime($starting_date. ' + 26 days'));
						}
						elseif($cartProduct->attributes->dayid==7)
						{
							$fooditemorderdate=date('Y-m-d', strtotime($starting_date. ' + 27 days'));
						}
					}

					$selected_price=FoodItems::select('food_price')->where('id',$cartProduct->attributes->pro_id)->get();
                	$totalprice=$totalprice+$selected_price[0]->food_price;

					$mealdetail = new Mealdetail();
	                $mealdetail->meal_id=$cre_mealId;
	                $mealdetail->day_id=$cartProduct->attributes->dayid;
	                $mealdetail->food_id=$cartProduct->attributes->pro_id;
	                $mealdetail->food_name=$cartProduct->name;
	                $mealdetail->food_type=$cartProduct->attributes->foodtypeid;
	                $mealdetail->weekno=$cartProduct->attributes->weekno;
	                $mealdetail->order_date=$fooditemorderdate;
	                $mealdetail->save();
				}

            }

            foreach ($cartProducts as $key => $cartProduct)
			{
			   if($cartProduct->attributes->product_type == 'meal' && $cartProduct->attributes->anothermyom=='notdone')
				{
					Cart::remove($cartProduct->id);
				}
			}


			$rec=DB::select("SELECT id FROM mealhelps ORDER BY id DESC LIMIT 1");
			$dummy_Id=$rec[0]->id;
			$dummy_productId=$dummy_Id+1;
			DB::update("UPDATE mealhelps set id=$dummy_productId WHERE id=$dummy_Id");

	            Cart::add([
	                'id'=>$dummy_productId,
	                'name'=>$cre_meal_days,
	                'price'=>$totalprice,
	                'attributes' => array('image' => '', 'product_type' => 'meal', 'pro_id' => $cre_mealId, 'anothermyom' => 'done'),
	                'quantity'=>1,
	            ]);

	            Session()->flash('success', 'Make Your Own Meal Created Successfully!');
	            return redirect('/cart');
    	}

        public function showupdatedstatus(Request $request)
		{

			if (Auth::guard('frontend')->check())
			{
				$u_id=$request->uid;
				$o_id=$request->oid;
				$p_id=$request->pid;

                $result=DB::select("SELECT orders.id,orders.deliverydate,orderplans.day_id, orderplans.food_type_id, orderplans.order_status, orderplans.order_id, orderplans.plan_id, orderplans.food_item_id, food_items.food_name FROM orders LEFT JOIN orderplans ON orders.id=orderplans.order_id LEFT JOIN food_items ON orderplans.food_item_id=food_items.id WHERE orders.id=$o_id ORDER BY orderplans.day_id DESC");
				return response()->json(['daysorderslist'=>$result]);
			}
			else
			{
				return view('user.pages.login');
			}


		}


public function showupdatedstatuss(Request $request)
		{

			if (Auth::guard('frontend')->check())
			{
				$order_id=$request->orderid;
				  $result=DB::select("SELECT orders.id,orders.created_at,orderplansoptions.food_type_id, orderplansoptions.order_status,orderplansoptions.id as opid,orderplansoptions.order_id, orderplansoptions.planoption_id,planoptions.plan_name FROM orders LEFT JOIN orderplansoptions ON orders.id=orderplansoptions.order_id LEFT JOIN planoptions ON orderplansoptions.planoption_id=planoptions.id WHERE orders.id='$order_id'");

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
		if($request->addonsize!=0 || $request->radiobtn_addonsize!=0)
		{

		if($request->radiobtn_addonsize >= 1)
		{
			$singleadons=array();
			for ($i=1; $i <= $request->radiobtn_addonsize; $i++)
			{
				array_push($singleadons, $request->input("singleaddon$i"));
			}
		}


		if(isset($request->addon) || isset($singleadons))
		{
		    if(isset($request->addon) && isset($singleadons))
			{
			    $addonid=$request->addon;
			    foreach ($singleadons as $singleadons)
			    {
			    	array_push($addonid,$singleadons);
			    }
			}
		    elseif(isset($request->addon))
		    {
			    $addonid=$request->addon;
		    }
			elseif(isset($singleadons))
		    {
		        $addonid=array();
		        foreach ($singleadons as $singleadons)
			    {
			    	array_push($addonid,$singleadons);
			    }
		    }
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



    public function updateaccount(Request $request)
	{
    	$id=Auth::guard('frontend')->user()['id'];
    	$res=User::where('id',$id)->first();
       	$res->name=$request->name;
       	$res->ul_name=$request->ul_name;
       	$res->email =$request->email;
       	$res->phone=$request->phone;
       	$res->shipping_address=$request->shipping_address;
       	$res->billing_address=$request->billing_address;
		$res->city=$request->city;
		$res->postcode=$request->postcode;
       	$result=$res->save();
       	if($result)
       	{
       		Session()->flash('success', 'Record updated successfully !');
            return redirect()->back();
    	}
   	}

public function planorderprint($uid,$oid,$pid)
		{

			$orders = DB::select("SELECT foodplans.plan_name,users.id as userid,users.ul_name,users.name,users.email,users.phone,orders.* FROM orders JOIN foodplans ON orders.food_id=foodplans.id JOIN users ON orders.users_id=users.id WHERE orders.product_type='plan' and orders.id='$oid' and orders.users_id='$uid'");

            $orderdays=DB::select("SELECT orders.id,orders.deliverydate,orderplans.day_id,orders.created_at, orderplans.food_type_id, orderplans.order_status, orderplans.order_id, orderplans.plan_id, orderplans.food_item_id, food_items.food_name FROM orders LEFT JOIN orderplans ON orders.id=orderplans.order_id LEFT JOIN food_items ON orderplans.food_item_id=food_items.id WHERE orders.id=$oid ORDER BY orderplans.day_id DESC");


				return view('user.pages.planorderprint',compact('orders','orderdays'));
		}

public function planoptorderprint($uid,$oid,$pid)
		{


	$planopt_details=DB::table('planoptdetails')->where('planoptions_id',$pid)->orderBy('planoptdetails.meal_type', 'asc')->get();
	$planopt_details1=DB::table('planoptdetails')->where('planoptions_id',$planopt_details[0]->planoptions_id)->where('meal_type',$planopt_details[0]->meal_type)->get();

	$orders = DB::select("SELECT planoptions.plan_name,users.id as userid,users.ul_name,users.name,users.email,users.phone,orders.* FROM orders JOIN planoptions ON orders.planoption_id=planoptions.id JOIN users ON orders.users_id=users.id WHERE orders.product_type='plan_option' and orders.id='$oid' and orders.users_id='$uid' ");
	$orderdays=DB::select("SELECT orders.id,orders.created_at,orderplansoptions.food_type_id, orderplansoptions.order_status,orderplansoptions.id as opid,orderplansoptions.order_id, orderplansoptions.planoption_id,planoptions.plan_name FROM orders LEFT JOIN orderplansoptions ON orders.id=orderplansoptions.order_id LEFT JOIN planoptions ON orderplansoptions.planoption_id=planoptions.id WHERE orders.id='$oid'");

			 return view('user.pages.planoptorderprint',compact('orders','orderdays','planopt_details1'));
		}

public function momuserorderprint($mid)
{
	$mealdetails=DB::select("SELECT * from mealdetails WHERE meal_id=$mid");

    $orderdetail=DB::select("SELECT * from orders WHERE meal_id=$mid");
    $log_id=$orderdetail[0]->users_id;
    $mom_name=$orderdetail[0]->meal_name;

    $logged_user_detail=DB::select("SELECT * FROM users WHERE id=$log_id");
    $to_name=$logged_user_detail[0]->name.' '.$logged_user_detail[0]->ul_name;

	return view('user.pages.momuserorderprint',compact('mealdetails','orderdetail','mom_name','logged_user_detail'));
}

public function showmomupdatedstatus(Request $request)
{

	if (Auth::guard('frontend')->check())
	{
		$mealid=$request->mealid;
		$result=DB::select("SELECT * from mealdetails WHERE meal_id=$mealid");
		return response()->json(['daysorderslist'=>$result]);
	}
	else
	{
		return view('user.pages.login');
	}


}






}

