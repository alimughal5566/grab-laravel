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


class UserController extends Controller
{


     public function __construct()
    {
         //$this->middleware('guest:users', ['except' => ['logout']]);
         $this->middleware('guest:frontend')->except('logout');

        // guard if login then open dashboard otherwise not
      //$this->middleware('guest:users')->except('logout');
    }





//  use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
   

    public function index()
    {
    // if (Auth::guard('frontend')->check()){
    //         return redirect('/checkout');
    //     }

       return view('user.pages.login');
    }


    //login process
    public function login(Request $request)
    {
       //validation
        $this->validate($request, [
            'name'   => 'required',
            'password' => 'required|min:5'
        ]);

        if (Auth::guard('frontend')->attempt(['name' => $request->name, 'password' => $request->password])) {

            //redirect
            Session()->flash('success', 'You are successfully logged in !');
            return redirect('/checkout');
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
       // return Auth::guard('users');
    }



	// public function addToCart(Request $request)
	// {
	// 	$productId=$request->ProductId; 
	// 	$productById=FoodItems::where('id',$productId)->first();

	// 	$d=Cart::add([
	// 		'id'=>$productId,
	// 		'name'=>$productById->food_name,
	// 		'price'=>$productById->food_price,
	// 		'options' => array('image' => $request->image),
	// 		'quantity'=>$request->qty,
	// 	]);

	// 	return redirect('/cart');
	// }


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
        return redirect('/user');
       }
    }
	

}

