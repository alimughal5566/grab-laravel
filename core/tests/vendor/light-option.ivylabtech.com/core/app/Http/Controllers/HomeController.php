<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
//use Session;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cartProducts=Cart::getContent();
        return view('user.pages.checkout',compact('cartProducts'));
    }
}
