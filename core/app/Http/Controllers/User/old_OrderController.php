<?php

namespace App\Http\Controllers\User;

use App\AboutSetting;
use App\BlogCategory;
use App\BlogPost;
use App\Contact;
use App\Counter;
use App\Customer;
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
use App\Plandetail;
use App\Orderplan;
use Cart;
use Session;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
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


    public function storeCustomer(Request $request)
    {
        $addon=$request->addonid;
        $id=Auth::guard('frontend')->user()['id'];
        $login_user_id=$id;
        $cart=[];
        $order='';
        $payment=$request->input('cashondelivery');


        if(session::has('cart'))
        {
            $cart=Session::get('cart');
        }

    $cartProducts=Cart::getContent();
    foreach ($cartProducts as $val) {

        $products[]=[
        'food_id'=>$val->id,
        'users_id'=>$id,
        'addon_id'=>$addon,
        'c_quantity'=>$val->quantity,
        'price'=>$val->price,
        'product_type'=>$val->attributes->product_type,
        'c_payment'=>0,
        'status'=>0,
        'bill_fname'=>$request->input('bfname'),
        'location'=>$request->input('location'),
        'users_id'=>$id,
        'bill_lname'=>$request->input('blfname'),
        'companyname'=>$request->input('bcompany'),
        'bill_country'=>$request->input('bcountry'),
        'bill_street'=>$request->input('bstreet'),
        'bill_appartment'=>$request->input('bappart'),
        'bill_town'=>$request->input('bcity'),
        'bill_zip'=>$request->input('bzip'),
        'bill_phone'=>$request->input('bphone'),
        'bill_email'=>$request->input('bemail'),
        'ship_fname'=>$request->input('sfname'),
        'ship_lname'=>$request->input('slname'),
        'ship_company'=>$request->input('scompany'),
        'ship_country'=>$request->input('scountry'),
        'ship_appartment'=>$request->input('sstreet'),
        'ship_town'=>$request->input('scity'),
        'ship_zip'=>$request->input('szip'),
        'ship_phone'=>$request->input('sphone'),
        'ship_email'=>$request->input('semail'),
        'notes'=>$request->input('ordernotes'),
        ];
        $order=Order::insert($products);

        if($val->attributes->product_type=='plan')
        {
            $last_order_id = DB::getPDO()->lastInsertId();
            $order_plandetails=Plandetail::where('plan_id',$val->id)->get();

            foreach($order_plandetails as $i => $o_Plandetail)
            {
                $orderedplan[$i] = new Orderplan();
                $orderedplan[$i]->order_id = $last_order_id;
                $orderedplan[$i]->user_id = $login_user_id;
                $orderedplan[$i]->plan_id = $o_Plandetail->plan_id;
                $orderedplan[$i]->day_id = $o_Plandetail->day_id;
                $orderedplan[$i]->food_item_id = $o_Plandetail->food_item_id;
                $orderedplan[$i]->food_type_id = $o_Plandetail->food_type_id;
                $orderedplan[$i]->order_status = 0;
                $orderedplan[$i]->save();
            }
        }

    }
    if($order){
        Cart::clear();
          return redirect('/thank');
    }
    else{
        return redirect('/checkout')->with('message','Invalid Activity');
        }
    }

}

