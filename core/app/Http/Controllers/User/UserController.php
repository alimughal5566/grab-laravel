<?php

namespace App\Http\Controllers\User;

use Cart;
use Session;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


use App\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


use App\AboutSetting;
use App\BlogCategory;
use App\BlogPost;
use App\Contact;
use App\Counter;
use App\Events;
use App\FoodCategory;
use App\FoodGallery;
use App\FoodItems;
use App\Banner;
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
use Mail;

class UserController extends Controller
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
            'baner' => Banner::all(),
            'posts' => BlogPost::all(),
            'contacts' => Contact::first(),
            'blogs' => BlogPost::orderBy('created_at', 'desc')->paginate(6),
            'blogCategories' => BlogCategory::orderBy('created_at', 'desc')->get(),

        ]);


         $this->middleware('guest:frontend')->except('logout');

    }





//  use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */


    public function index()
    {

       return view('user.pages.login');
    }


//login process
public function login(Request $request)
    {
      //validation
        $this->validate($request, [
            'email'   => 'required',
            'password' => 'required'
        ]);

       if (Auth::guard('frontend')->attempt(['email' => $request->email, 'password' => $request->password])) {

            //redirect
            Session()->flash('success', 'You are successfully logged in !');
            return redirect('/menu');
        }else{
            //redirect
            Session()->flash('warning', 'Please enter correct email and password!');
             return redirect('/user');
           // return redirect()->route('/user');
        }


    }



     //logout
    public function logout()
    {
        Auth::guard('frontend')->logout();
        return redirect('/user');
    }





      protected function guard()
    {
        return Auth::guard('frontend');
    }





      public function create(Request $request)
    {
            $data=[
            'name' => $request->input('fname'),
            'ul_name' => $request->input('lname'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
       ];
       $result=User::insert($data);
       if($result)
       {

            $light_opt_address="Office #15 - AlShamia Tower, Maliya, Kuwait City, Kuwait 22083";
            $light_opt_phone="0123456789";
            $light_opt_email="info@light-option.com";


            $to_name = $request->input('fname').' '.$request->input('lname');
            $to_email = $request->input('email');
            $data = array('officeaddress'=>$light_opt_address, 'officephone'=>$light_opt_phone, 'officeemail'=>$light_opt_email, 'to_name'=>$to_name,'cus_email'=>$request->email, 'cus_password'=>$request->password);
            Mail::send('emails.registration', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            ->subject('Account Registration');
            $message->from('cs@light-option.com','LIGHT OPTIONS');
            });


        Session()->flash('success', 'User register successfully!');
        return redirect('/user');
       }
    }

public function forgot()
        {
             return view('user.pages.forgot');
        }

public function forgotpassword(Request $request)
    {

         $this->validate($request, [
            'email'   => 'required',
            'password' => 'required_with:confirmpassword|same:confirmpassword',
        ]);

            $email=$request->input('email');
            $pass=Hash::make($request->input('password'));

            $res=User::where('email','=',$email)->first();
            if($res)
            {
            User::where('email','=',$email)->update(['password' =>$pass]);
            Session()->flash('success', 'Password updated successfully');
            return redirect('/user');

            }
            elseif($email!=$res)
            {
            Session()->flash('warning', 'Please enter correct email!');
            return redirect('/forgot');
            }
            else
            {
            Session()->flash('warning', 'Please enter correct email and password!');
            return redirect('/forgot');

            }

    }


}

