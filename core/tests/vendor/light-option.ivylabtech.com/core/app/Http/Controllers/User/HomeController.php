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


      //menu
    public function ShowMenu()
    {
        $result=FoodItems::select('id','food_name','food_price','food_image')->paginate(9); 
        $result2=FoodCategory::select('id','food_category_name')->get(); 
        $total=Cart::getContent();
            $count=count($total);  
        return view('user.pages.menu',compact('result','count','result2'));
    }
    
    public function searchFood(Request $request)
    {

        //$result=FoodCategory::select('id','food_category_name')->get();
        $food=$request->input('food');
        $result2=FoodCategory::select('id','food_category_name')->get();
        $result =FoodItems::where('food_name', 'LIKE', '%'.$food.'%')->paginate(5);
            $total=Cart::getContent();
            $count=count($total); 
        return view('user.pages.menufood',compact('result','count','result2'));
    }

    public function categoriesPro($id)
    {
        $total=Cart::getContent();
            $count=count($total); 
             $result2=FoodCategory::select('id','food_category_name')->get(); 
         $result=DB::select("select * from food_items where food_category_id='$id'");
          return view('user.pages.menucat',compact('result','count','result2'));
            
    }



     //product detail
    public function ProductDetail($id)
    {
       //$result=FoodItems::find($id);
        $result=DB::select("SELECT food_items.*,food_categories.food_category_name FROM `food_items` JOIN food_categories ON food_categories.id=food_items.food_category_id where food_items.id='$id'");
//dd($result);
       $result2 = DB::table('assignaddons')
       ->where('assignaddons.fooditem_id',$id)
       ->join('addons', 'addons.id', '=', 'assignaddons.addon_id')
       ->select('addons.*')
       ->get();
     
        return view('user.pages.productdetail',compact('result','result2'));
    }


    public function priceFilter(Request $request)
    {
        $minprice=$request->input('minprice');
        $maxprice=$request->input('maxprice');
        $result2=FoodCategory::select('id','food_category_name')->get();

        $inventory = FoodItems::whereBetween('food_price', [$minprice, $maxprice])
        ->get();
        $result=FoodItems::select('id','food_name','food_price','food_image')->paginate(5); 

        $total=Cart::getContent();
            $count=count($total);  
          return view('user.pages.menuprice',compact('result','count','inventory','result2'));
    }

    public function priceAsc()
    {
        $result2=FoodCategory::select('id','food_category_name')->get();
        $result=FoodItems::select('id','food_name','food_price','food_image')->orderBy('food_price','asc')->get();
            $total=Cart::getContent();
            $count=count($total); 
        return view('user.pages.menupriceasc',compact('result','count','result2'));
           
      

    }

     public function priceDesc()
    {
         $result2=FoodCategory::select('id','food_category_name')->get();
        $result=FoodItems::select('id','food_name','food_price','food_image')->orderBy('food_price','desc')->get();
        $total=Cart::getContent();
        $count=count($total); 
        return view('user.pages.menupricedesc',compact('result','count','result2'));
    }


         //product cart
    // public function cart()
    // {
    //     return view('user.pages.cart');
    // }

    public function checkout()
    {
        return view('user.pages.checkout');
    }

     public function login()
    {
        return view('user.pages.login');
    }

    



    //Contact mail
    public function ContactMail(Request $request)
    {
        try {

            //Send mail to user
            $gs = GeneralSetting::first();

            $to = $gs->receiveEmail;
            $name = ", i am ".$request->name;
            $subject ="Contact mail form user";
            $message = $request->message;

            send_email($to,$name,$subject,$message);

            //redirect
            Session()->flash('success', 'mail sent successful !');
            return redirect()->back();

        }catch(\Exception $exp) {
            Session()->flash('warning', 'mail sent failed !');
            return redirect()->back();
        }
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

        //update view_count
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

        //update view_count
        $foods->view_count = $foods->view_count + 1;
        $foods->save();

        return view('user.pages.foodDetails',compact('foods'));
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
        $plannname=Foodplan::select('plan_name','plan_description')->where('id',$planid)->get();
        $planname=$plannname[0]->plan_name;
        $plandescription=$plannname[0]->plan_description;
        $plandetails=DB::select("SELECT a.day_id, a.food_type_id, b.* FROM plandetails a LEFT JOIN food_items b ON a.food_item_id = b.id WHERE a.plan_id=$planid");
        return view('user.pages.plandetail',compact('cat_id','planid','plandetails','planname','plandescription'));
    }
    public function orderplan(Request $request)
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
        // $cartProducts=Cart::getContent();
        // dd($cartProducts);
        return redirect('/cart');
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
                // $image = $input_image->resize(800, 800);
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
        // $cre_mealId=$created_mealid->id;

// /////////

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
            // dd($totalprice);

            $d=Cart::add([
                'id'=>$cre_mealId,
                'name'=>$selected_mealname,
                'price'=>$totalprice,
                'attributes' => array('image' => $ip_img, 'product_type' => 'own_meal'),
                'quantity'=>1,
            ]);

            Session()->flash('success', 'Your Own Created Meal Created Successfully!');
            // return $this->addplandays($request->plan_id);
            return redirect('/cart');
//////////

        
    }
}
