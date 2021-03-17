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


    // public function index()
    // {
    //     if(!Session::has('cart') || empty(Session::get('cart')->getContent() ))
    //     {
    //     return redirect('/menu')->with('message','No Products in the Cart');
    //     }
    //     $cart=Session::get('cart');
    //      return view('user.pages.checkout',compact('cart'));

    // }

    public function storeCustomer(Request $request)
    {
        // dd($request->all());
       // $id=Auth::guard('users')->user()->id;
        $id=Auth::guard('frontend')->user()['id'];
        $cart=[];
        $order='';
       // $checkout='';
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
        'c_quantity'=>$val->quantity,
        'price'=>$val->price,
        'product_type'=>$val->attributes->product_type,
        'c_payment'=>0,
        'status'=>0,
        'bill_fname'=>$request->input('bfname'),
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
    }
    if($order){
        Cart::clear();
 //         return response()->json($order);
          return redirect('/thank');
        //return view('.')
    }
    else{
        return redirect('/checkout')->with('message','Invalid Activity');
        //return response()->json($order);
        }
    }

}

