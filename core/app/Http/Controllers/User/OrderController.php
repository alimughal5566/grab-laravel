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
use App\Planoptdetail;
use App\Orderplansoption;
use Cart;
use Session;
use DB;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use DateTime;
class OrderController extends Controller
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
            'foodCategories' => FoodCategory::where('status','=',1)->get(),
            'chefs' => OurChef::all(),
            'posts' => BlogPost::all(),
            'contacts' => Contact::first(),
            'blogs' => BlogPost::orderBy('created_at', 'desc')->paginate(6),
            'blogCategories' => BlogCategory::orderBy('created_at', 'desc')->get(),

        ]);
    }

    public function storeCustomer(Request $request)
    {

    $email_confiramtion_foods=Cart::getContent();
    $loguser_emaildetail=Auth::guard('frontend')->user();

    $light_opt_address="Office #15 - AlShamia Tower, Maliya, Kuwait City, Kuwait 22083";
    $light_opt_phone="0123456789";
    $light_opt_email="info@light-option.com";
    $light_opt_billaddress=$request->input('bstreet');
    $light_opt_shipaddress=$request->input('sstreet');


    //To User Email

        $to_name = $loguser_emaildetail->name.' '.$loguser_emaildetail->ul_name;
        $to_email = $loguser_emaildetail->email;
        $data = array('officeaddress'=>$light_opt_address, 'officephone'=>$light_opt_phone, 'officeemail'=>$light_opt_email, 'light_opt_billaddress'=>$light_opt_billaddress, 'light_opt_shipaddress'=>$light_opt_shipaddress, 'email_confiramtion_foods'=>$email_confiramtion_foods, 'to_name'=>$to_name);
        Mail::send('emails.order_confimation_email', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject('Order Confirmation Mail');
        $message->from('orders@light-option.com','LIGHT OPTIONS');
        });


    ///To Admin Email

        $to_name = 'Admin';
        $to_email = ['orders@light-option.com','cs@light-option.com'];
        $data = array('officeaddress'=>$light_opt_address, 'officephone'=>$light_opt_phone, 'officeemail'=>$light_opt_email, 'light_opt_billaddress'=>$light_opt_billaddress, 'light_opt_shipaddress'=>$light_opt_shipaddress, 'email_confiramtion_foods'=>$email_confiramtion_foods, 'to_name'=>$to_name);
        Mail::send('emails.order_admin', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject('Order Confirmation Mail');
        $message->from('orders@light-option.com','LIGHT OPTIONS');
        });



        $id=Auth::guard('frontend')->user()['id'];
        $login_user_id=$id;
        $products=array();
        $order=array();
        $adon='';
        $selected_planopt_id=0;
         $date = new DateTime();
            // Modify the date it contains
            $date->modify('next monday');
            // Output
            $orderdates=$date->format('Y-m-d');


        $payment=$request->input('cashondelivery');


    $cartProducts=Cart::getContent();

    foreach ($cartProducts as $key => $val)
     {
       $invoicefo;
            if($val->attributes->product_type=='product')
            {

            $orderfo=Order::select('invoice_no')->where('product_type','product')->take(1)->orderBy('id','DESC')->get();

            if(sizeof($orderfo)>0)
            {
                $inv=$orderfo[0]->invoice_no;
                if($inv==null)
                {
                $invoicefo='LPFI-'.'000000';
                }
                else
                {
                $inv=$orderfo[0]->invoice_no;

                $inv=explode('invoice_no', $inv);
                $inv=$inv[0];
                $inv=++$inv;
                $invoicefo=$inv;
                }
            }
            else
            {
                $invoicefo='LPFI-'.'000000';
            }
            }



            elseif ($val->attributes->product_type=='plan')
            {

                $orderpl=Order::select('invoice_no')->where('product_type','plan')->take(1)->orderBy('id','DESC')->get();
                if(sizeof($orderpl)>0)
                {

                $inv=$orderpl[0]->invoice_no;

                if($inv=="")
                {
                $invoicefo='LTMP-'.'000000';

                }
                else
                {
                $inv=$orderpl[0]->invoice_no;
                $inv=explode('invoice_no', $inv);
                $inv=$inv[0];
                $inv=++$inv;
                $invoicefo=$inv;
                }
                }
                else
                {
                    $invoicefo='LTMP-'.'000000';
                }

            }

            elseif($val->attributes->product_type=='plan_option')
            {
                $orderop=Order::select('invoice_no')->where('product_type','plan_option')->take(1)->orderBy('id','DESC')->get();

                if(sizeof($orderop)>0)
                {

                $inv=$orderop[0]->invoice_no;

                if($inv=="")
                {
                $invoicefo='LTPO-'.'000000';


                }
                else
                {
                $inv=$orderop[0]->invoice_no;
                $inv=explode('invoice_no', $inv);
                $inv=$inv[0];
                $inv=++$inv;
                $invoicefo=$inv;
                }
                }
                else
                {
                    $invoicefo='LTPO-'.'000000';
                }
            }

            elseif($val->attributes->product_type=='meal')
            {
                $orderop=Order::select('invoice_no')->where('product_type','meal')->take(1)->orderBy('id','DESC')->get();

                if(sizeof($orderop)>0)
                {

                $inv=$orderop[0]->invoice_no;

                if($inv=="")
                {
                $invoicefo='LTMOM-'.'000000';


                }
                else
                {
                $inv=$orderop[0]->invoice_no;
                $inv=explode('invoice_no', $inv);
                $inv=$inv[0];
                $inv=++$inv;
                $invoicefo=$inv;
                }
                }
                else
                {
                    $invoicefo='LTMOM-'.'000000';
                }
            }


            $selected_meal_id=0;
            $selected_meal_name='';
            if($val->attributes->product_type && $val->attributes->product_type=='meal')
            {
                $selected_meal_id=$val->attributes->pro_id;
                $selected_meal_name=$val->name;

            }

            if($val->attributes->pro_id && $val->attributes->pro_id > 0)
            {
                $selected_planopt_id=$val->attributes->pro_id;
            }
            else
            {
                 $selected_planopt_id=0;

            }

            if($val->attributes->addonsize && $val->attributes->addonsize > 0)
            {
                $adon=$val->attributes->addonid;
            }
            else
            {
                 $adon='';

            }






            $products=[
            'food_id'=>$val->id,
            'users_id'=>$id,
            'addon_id'=>$adon,
            'c_quantity'=>$val->quantity,
            'invoice_no'=>$invoicefo,
            'price'=>$val->price,
            'product_type'=>$val->attributes->product_type,
            'c_payment'=>0,
            'status'=>0,
            'bill_fname'=>$request->input('bfname'),
            'location'=>$request->input('location'),
            'users_id'=>$id,
            'planoption_id'=>$selected_planopt_id,
            'meal_id'=>$selected_meal_id,
            'meal_name'=>$selected_meal_name,
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
            'deliverydate'=>$orderdates,
                ];
        $order=Order::insert($products);

        if($val->attributes->product_type=='plan')
        {

            $date = new DateTime();
            // Modify the date it contains
            $date->modify('next monday');
            // Output
            $orderdate=$date->format('Y-m-d');
            $last_order_id = DB::getPDO()->lastInsertId();
            $order_plandetails=Plandetail::where('plan_id',$val->id)->get();

            foreach($order_plandetails as $i => $o_Plandetail)
            {
                $orderedplan[$i] = new Orderplan();
                $orderedplan[$i]->order_id = $last_order_id;
                $orderedplan[$i]->user_id = $login_user_id;
                $orderedplan[$i]->plan_id = $o_Plandetail->plan_id;
                $orderedplan[$i]->day_id = $o_Plandetail->day_id;

                if($o_Plandetail->day_id==2)
                {
                    $orderedplan[$i]->order_date=$orderdate;
                }
                elseif($o_Plandetail->day_id==3)
                {
                    $orderedplan[$i]->order_date=date('Y-m-d',strtotime($orderdate."+ 1 days"));
                }
                elseif($o_Plandetail->day_id==4)
                {
                    $orderedplan[$i]->order_date=date('Y-m-d',strtotime($orderdate."+ 2 days"));
                }
                elseif($o_Plandetail->day_id==5)
                {
                    $orderedplan[$i]->order_date=date('Y-m-d',strtotime($orderdate."+ 3 days"));
                }
                elseif($o_Plandetail->day_id==6)
                {
                    $orderedplan[$i]->order_date=date('Y-m-d',strtotime($orderdate."+ 4 days"));
                }
                elseif($o_Plandetail->day_id==7)
                {
                    $orderedplan[$i]->order_date=date('Y-m-d',strtotime($orderdate."+ 5 days"));
                }
                elseif($o_Plandetail->day_id==1)
                {
                    $orderedplan[$i]->order_date=date('Y-m-d',strtotime($orderdate."+ 6 days"));
                }

                $orderedplan[$i]->food_item_id = $o_Plandetail->food_item_id;
                $orderedplan[$i]->food_type_id = $o_Plandetail->food_type_id;
                $orderedplan[$i]->order_status = 0;
                $planorder=$orderedplan[$i]->save();
            }
        }

        if($val->attributes->product_type=='plan_option')
        {

            $last_order_id = DB::getPDO()->lastInsertId();
            $order_planoptdetails=Planoptdetail::where('planoptions_id',$val->attributes->pro_id)->where('meal_type',$val->attributes->meal_type)->get();
            foreach($order_planoptdetails as $i => $o_Plandetail)
            {
                $orderedplan[$i] = new Orderplansoption();
                $orderedplan[$i]->order_id = $last_order_id;
                $orderedplan[$i]->user_id = $login_user_id;
                $orderedplan[$i]->planoption_id = $o_Plandetail->planoptions_id;
                $orderedplan[$i]->food_type_id = $o_Plandetail->food_type;
                $orderedplan[$i]->order_status = 0;
                $planoptorder=$orderedplan[$i]->save();
            }
        }



    }
    if($order || $planorder || $planoptorder){
        Cart::clear();
        $sel_week=7;
		session(['ml_weekno' => $sel_week]);
          return redirect('/thank');
    }
    else{
        return redirect('/checkout')->with('message','Invalid Activity');
        }
    }

}

