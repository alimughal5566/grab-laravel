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
use App\Catplan;
use App\Foodplan;
use App\Mealplan;
use App\Mealdetail;
use App\Planoption;
use App\Banner;
use App\Review;
use App\slider;
use App\AddonCat;
use App\Plancompose;
use Mail;
use DB;
use Cart;
use Session;
use Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function __construct()
    {
        view()->share([
            'aboutSetting' => AboutSetting::first(),
            'events' => Events::orderBy('created_at', 'desc')->paginate(6),
            'counter' => Counter::all(),
            'slider' => slider::all(),
            'foodItems' => FoodItems::orderBy('created_at', 'desc')->paginate(6),
            'plans' => Catplan::orderBy('created_at', 'desc')->paginate(3),
            'optionsplans' => DB::table('catoptionplans')->orderBy('id','DESC')->take(3)->get(),
            'foodGallery' => FoodGallery::all(),
            'testimonials' => Testimonial::all(),
            'foodCategories' => FoodCategory::where('status','=',1)->get(),
            'chefs' => OurChef::all(),
            'posts' => BlogPost::all(),
            'contacts' => Contact::first(),
            'blogs' => BlogPost::orderBy('created_at', 'desc')->paginate(6),
            'blogCategories' => BlogCategory::orderBy('created_at', 'desc')->get(),
            'baner' => Banner::all(),

        ]);
    }

    //lang change
    public function changeLang($lang)
    {
        $language = Language::where('code', $lang)->first();
        if (!$language) $lang = 'en';
        session()->put('lang', $lang);
        return redirect()->back();
    }


    //home page
    public function index()
    {
        return view('user.pages.index');
    }

    public function MakeReservation(Request $request)
    {
        $reservation = new Reservation();
        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->person_quantity = $request->person_quantity;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->message = $request->message;
        $reservation->save();
        //redirect
        Session()->flash('success', 'Message sent !');
        return redirect()->back();

    }

    //about
    public function ShowAbout()
    {
        return view('user.pages.about');
    }

    //reservation
    public function ShowReservation()
    {
        return view('user.pages.reservation');
    }

    //contact
    public function ShowContact()
    {
        return view('user.pages.contact');
    }


public function ShowMenu()
    {
        $result=FoodItems::select('id','food_name','food_price','food_image')->paginate(12);
        $result2=FoodCategory::select('id','food_category_name')->where('status','=',1)->get();
        return view('user.pages.menu',compact('result','result2'));
    }

public function searchFood(Request $request)
    {
        $food=$request->input('food');
       $result2=FoodCategory::select('id','food_category_name')->where('status','=',1)->get();
        $result =FoodItems::where('food_name', 'LIKE', '%'.$food.'%')->paginate(12);

        return view('user.pages.menufood',compact('result','result2'));
    }

public function categoriesPro($id)
    {
              $result2=FoodCategory::select('id','food_category_name')->where('status','=',1)->get();
          $result=DB::table('food_items')->where('food_category_id','=',$id)->paginate(12);
          return view('user.pages.menucat',compact('result','result2'));

    }



//product detail
    public function ProductDetail($id)
    {
        $result=DB::select("SELECT food_items.*,food_categories.id as catid,food_categories.food_category_name FROM `food_items` JOIN food_categories ON food_categories.id=food_items.food_category_id where food_items.id='$id'");

        $addoncats=AddonCat::all();
       $result2 = DB::table('assignaddons')
       ->where('assignaddons.fooditem_id',$id)
       ->join('addons', 'addons.id', '=', 'assignaddons.addon_id')
       ->select('addons.*','assignaddons.addon_type','assignaddons.addon_category')
       ->orderBy('assignaddons.addon_type', 'ASC')
       ->get();

       $distinct_addons=DB::select("SELECT DISTINCT addon_category FROM assignaddons WHERE fooditem_id='$id'");
       $additionalarr=array();
       foreach($distinct_addons as $distinct_addon)
       {
        if($distinct_addon->addon_category=='' || $distinct_addon->addon_category==null)
        {
        }
        else
        {
            array_push($additionalarr, $distinct_addon->addon_category);
        }
       }

       $distinct_addons=$additionalarr;
       $distinctaddonsize=sizeof($distinct_addons);


       $review=DB::select("SELECT users.name,users.ul_name,reviews.ratings,reviews.comments from users JOIN reviews ON reviews.user_id=users.id JOIN food_items ON reviews.food_id=food_items.id WHERE reviews.food_id='$id'");
        return view('user.pages.productdetail',compact('result','result2','review','addoncats','distinct_addons','distinctaddonsize'));
    }


public function priceFilter(Request $request)
    {
        $minprice=$request->input('minprice');
        $maxprice=$request->input('maxprice');

        $result2=FoodCategory::select('id','food_category_name')->where('status','=',1)->get();

        $inventory = FoodItems::whereBetween('food_price', [$minprice, $maxprice])
        ->paginate(12);
          return view('user.pages.menuprice',compact('inventory','result2'));
    }

public function priceAsc()
    {
         $result2=FoodCategory::select('id','food_category_name')->where('status','=',1)->get();
        $result=FoodItems::select('id','food_name','food_price','food_image')->orderBy('food_price','asc')->paginate(12);


        return view('user.pages.menupriceasc',compact('result','result2'));
    }

public function priceDesc()
    {
         $result2=FoodCategory::select('id','food_category_name')->where('status','=',1)->get();
        $result=FoodItems::select('id','food_name','food_price','food_image')->orderBy('food_price','desc')->paginate(12);

        return view('user.pages.menupricedesc',compact('result','result2'));
    }

    public function checkout()
    {
        return view('user.pages.checkout');
    }

     public function login()
    {
        return view('user.pages.login');
    }

public function ContactMail(Request $request)
    {
        $light_opt_address="Office #15 - AlShamia Tower, Maliya, Kuwait City, Kuwait 22083";
        $light_opt_phone="0123456789";
        $light_opt_email="info@light-option.com";


        $to_name = 'Admin';
        $to_email = 'cs@light-option.com';
        $data = array('officeaddress'=>$light_opt_address, 'officephone'=>$light_opt_phone, 'officeemail'=>$light_opt_email, 'to_name'=>$to_name,'cus_name'=>$request->name, 'cus_email'=>$request->email, 'cus_subject'=>$request->subject, 'cus_message'=>$request->message);
        Mail::send('emails.contactus', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject('Contact Us E-Mail');
        $message->from('cs@light-option.com','LIGHT OPTIONS');
        });

        Session()->flash('success', 'E-Mail sent successfully!');
        return redirect()->back();
    }


    //Blog Home page
    public function ShowBlog()
    {
        return view('user.pages.blog.blog');
    }

    //Blog details page
    public function BlogDetails($slug)
    {
        $blogpost = BlogPost::where('blog_slug', $slug)->first();

        $blogpost->view_count = $blogpost->view_count + 1;
        $blogpost->save();

        return view('user.pages.blog.blogDetails', compact('blogpost'));
    }

    //Blog by category
    public function BlogByCategory($slug)
    {
        $categories = BlogCategory::where('name', $slug)->first();

        $blogByCategory = BlogPost::where('blog_category_id', $categories->id)->paginate(6);

        return view('user.pages.blog.categoryWisePost', compact('blogByCategory'));
    }

    //Show events
    public function ShowEvents()
    {
        return view('user.pages.events');
    }

    //Events details
    public function EventDetails($slug)
    {
        $eventDetails = Events::where('event_slug', $slug)->first();

        //update view_count
        $eventDetails->view_count = $eventDetails->view_count + 1;
        $eventDetails->save();

        return view('user.pages.eventDetails', compact('eventDetails'));
    }

    //Show Foods
    public function ShowFood()
    {
        return view('user.pages.foods');
    }

    public function FoodDetails($id)
    {
        $foods = FoodItems::find($id);

            $result=DB::select("SELECT food_items.*,food_categories.id as catid,food_categories.food_category_name FROM `food_items` JOIN food_categories ON food_categories.id=food_items.food_category_id where food_items.id='$id'");
       $result2 = DB::table('assignaddons')
       ->where('assignaddons.fooditem_id',$id)
       ->join('addons', 'addons.id', '=', 'assignaddons.addon_id')
       ->select('addons.*')
       ->get();

       $review=DB::select("SELECT users.name,users.ul_name,reviews.ratings,reviews.comments from users JOIN reviews ON reviews.user_id=users.id JOIN food_items ON reviews.food_id=food_items.id WHERE reviews.food_id='$id'");
        return view('user.pages.productdetail',compact('result','result2','review'));

    }

    //food order
    public function FoodOrder(Request $request,$id)
    {
        $order = new Order();
        $foodName = FoodItems::find($id);
        $order->food_id = $foodName->food_name;
        $order->c_name = $request->name;
        $order->c_mail = $request->email;
        $order->c_quantity = $request->quantity;
        $order->c_phone = $request->phone;
        $order->c_address = $request->address;

        $order->save();
        Session()->flash('success', 'Order successful !');
        return redirect()->back();
    }

    //Show Foods
    public function ShowGallery()
    {
        return view('user.pages.gallery');
    }

    public function plans_Ofcategories($id)
    {
        $cat_name=Catplan::select('category_name')->where('id',$id)->get();
        $cat_name=$cat_name[0]->category_name;
        $cat_plans=Foodplan::where('category_id',$id)->get();
        return view('user.pages.plans',compact('cat_plans','cat_name','id'));
    }

    public function plandetail($cat_id,$planid)
    {
        $plannname=Foodplan::select('plan_name','plan_description','plan_calories')->where('id',$planid)->get();
        $plancompose=Plancompose::where('plan_id',$planid)->get();

        $planname=$plannname[0]->plan_name;
        $plandescription=$plannname[0]->plan_description;
        $plan_calories=$plannname[0]->plan_calories;
        $plandetails=DB::select("SELECT a.day_id, a.food_type_id, b.* FROM plandetails a LEFT JOIN food_items b ON a.food_item_id = b.id WHERE a.plan_id=$planid");
        return view('user.pages.plandetail',compact('cat_id','planid','plandetails','planname','plandescription','plancompose','plan_calories'));
    }

    public function orderplan(Request $request)
    {
        $result=DB::select("SELECT count( * ) as total_record FROM plandetails WHERE plan_id=$request->plan_id");
        $countofplandetails=$result[0]->total_record;
        if($countofplandetails > 0)
        {
            $productId=$request->plan_id;
            $plandetail=Foodplan::where('id',$request->plan_id)->get();
            $plandetail=$plandetail[0];

            $d=Cart::add([
                'id'=>$productId,
                'name'=>$plandetail->plan_name,
                'price'=>$plandetail->plan_price,
                'attributes' => array('image' => $plandetail->plan_image, 'product_type' => 'plan'),
                'quantity'=>1,
            ]);
            return redirect('/cart');
        }
        else
        {
            Session()->flash('warning', 'Plan does not have any food items!');
            return redirect()->back();
        }
    }

    public function makemeal()
    {
        $fooditems=FoodItems::select('id','food_name','food_image')->get();
        return view('user.pages.makemeal',compact('fooditems'));
    }

    public function storemeal(Request $request)
    {
        $selected_mealname=$request->plan_name;
        $mealplan = new Mealplan();
        $mealplan->meal_name = $request->plan_name;

        $ip_img = "";
        if( $request->hasFile('meal_image') ) {
            try {

                $path = 'assets/user/images/meal/';

                $food_image=$request->meal_image;
                $input_image = Image::make($food_image);
                $image = $input_image;
                $image = $input_image->resize(290, 290);
                $image_name = $food_image->getClientOriginalName();
                $image_name = Carbon::now()->format('YmdHs').'_'.$image_name;
                $image->save($path.$image_name);
                $ip_img= $image_name;


            }catch(\Exception $exp) {
                Session()->flash('warning', 'image upload failed !');
                return redirect()->back();
            }

            $mealplan->meal_image = $ip_img;
        }

        $mealplan->save();
        $cre_mealId = DB::getPDO()->lastInsertId();
        $totalprice=0;
            foreach ($request->fooditem as $key => $item)
            {
                $selected_price=FoodItems::select('food_price')->where('id',$item)->get();
                $totalprice=$totalprice+$selected_price[0]->food_price;
                $mealdetail = new Mealdetail();
                $mealdetail->meal_id=$cre_mealId;
                $mealdetail->food_type=$request->food_type[$key];
                $mealdetail->order_date=date('Y-m-d',strtotime($request->order_date[$key]));
                $mealdetail->food_id=$item;
                $mealdetail->save();
            }

            $d=Cart::add([
                'id'=>$cre_mealId,
                'name'=>$selected_mealname,
                'price'=>$totalprice,
                'attributes' => array('image' => $ip_img, 'product_type' => 'own_meal'),
                'quantity'=>1,
            ]);

            Session()->flash('success', 'Your Own Created Meal Created Successfully!');
            return redirect('/cart');


    }

    public function meal()
    {
        $cartProducts=Cart::getContent();
        return view('user.pages.meal',compact('cartProducts'));
    }


    public function mealeModal(Request $request)
    {
        $data=array();
        $result1=[
            'day'=>$request->day,
            'food'=>$request->food,
            'weekno'=>$request->weekno
        ];

        $result=FoodItems::select('id','food_name','food_price','food_image','food_type','calories')->get();
        $data['result']=$result;
        $data['food']=$result1;

        $weeknovalue=0;
        if($request->weekno==1)
        {
            $weeknovalue=7;
        }
        if($request->weekno==2)
        {
            $weeknovalue=14;
        }
        if($request->weekno==3)
        {
            $weeknovalue=21;
        }
        if($request->weekno==4)
        {
            $weeknovalue=28;
        }
        session(['ml_weekno' => $request->selected_weekno]);

       return response()->json(['result'=>$result,'foodtypeid'=>$request->food,'dayid'=>$request->day, 'weekno'=>$request->weekno]);
    }

    public function cat_planoptions($id)
    {
        $cat_name=DB::table('catoptionplans')->where('id',$id)->get();
        $cat_name=$cat_name[0]->category_name;
        $cat_planoptions=Planoption::where('category_id',$id)->get();
        return view('user.pages.plansoptions',compact('cat_planoptions','cat_name','id'));
    }

    public function planoptionmeals($id,$planid)
    {
        $cat_name=DB::table('catoptionplans')->where('id',$id)->get();
        $cat_name=$cat_name[0]->category_name;

        $cat_planoptions=Planoption::where('id',$planid)->get();
        $plan_name=$cat_planoptions[0]->plan_name;
        $plan_image=$cat_planoptions[0]->plan_detail_image;

        $planopt_details=DB::table('planoptdetails')->where('planoptions_id',$planid)->orderBy('planoptdetails.meal_type', 'asc')->get();

        $planopt_list=DB::table('planoptlistmeals')->where('planopt_id',$planid)->get();
        return view('user.pages.plansoptionsdetail',compact('plan_name','cat_name','id','planid','planopt_details','planopt_list','plan_image'));
    }

    public function planoptionmeals_detail($id,$planid,$mealtype)
    {
        $planoptions=Planoption::where('id',$planid)->get();

        $planoptions=$planoptions[0];

        $planopt_list=DB::table('planoptlistmeals')->where('planopt_id',$planid)->where('meal_type',$mealtype)->get();
        $plan_image=$planopt_list[0]->single_img;

        $planopt_details=DB::table('planoptdetails')->where('planoptions_id',$planid)->where('meal_type',$mealtype)->get();

        $plancompostions= DB::table('plancompostions')->where('plan_id', $planid)->get();

        return view('user.pages.plansoptionsmealdetail',compact('id','planid','mealtype','planoptions','planopt_details','plancompostions','plan_image'));

    }

    public function orderplanoptions(Request $request)
    {

        $selected_mealtype=$request->mealtype;
        $selected_planid=$request->plan_id;

        $rec=DB::select("SELECT id FROM mealhelps ORDER BY id DESC LIMIT 1");
        $dummy_Id=$rec[0]->id;
        $dummy_productId=$dummy_Id+1;
        DB::update("UPDATE mealhelps set id=$dummy_productId WHERE id=$dummy_Id");

        $planopt_details=DB::table('planoptlistmeals')->where('planopt_id',$request->plan_id)->where('meal_type',$request->mealtype)->get();
        $planopt_details=$planopt_details[0];


        $plandetail=Planoption::where('id',$request->plan_id)->get();
        $plandetail=$plandetail[0];

        $d=Cart::add([
            'id'=>$dummy_productId,
            'name'=>$plandetail->plan_name,
            'price'=>$planopt_details->price,
            'attributes' => array('image' => $plandetail->plan_image, 'product_type' => 'plan_option', 'meal_type' => $selected_mealtype, 'pro_id' => $selected_planid),
            'quantity'=>1,
        ]);
        return redirect('/cart');

    }

     public function calorieFilter(Request $request)
    {
        $minprice=$request->input('minprice');
        $maxprice=$request->input('maxprice');
        $result2=FoodCategory::select('id','food_category_name')->get();
        $inventory = FoodItems::whereBetween('calories',[$minprice, $maxprice])
        ->paginate(5);

          return view('user.pages.filtercalorie',compact('inventory','result2'));
    }

    public function addreview(Request $res)
    {

        $data[]=[
        'ratings'=>$res->input('ratings'),
        'user_id'=>$res->input('user_id'),
        'comments'=>$res->input('comments'),
        'food_id'=>$res->input('food_id'),
    ];
          Review::insert($data);
          return redirect()->back()->with('success', 'Review Post Successfully');
    }

    public function listplancategories()
    {
        $plans=Catplan::all();
        return view('user.pages.plancategories',compact('plans'));
    }

    public function listplansoptionscat()
    {
        $plansoptions=DB::table('catoptionplans')->get();
        return view('user.pages.plansoptionscategories',compact('plansoptions'));
    }


}
