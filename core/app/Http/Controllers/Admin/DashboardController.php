<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\BlogCategory;
use App\BlogPost;
use App\Events;
use App\FoodCategory;
use App\FoodItems;
use App\OurChef;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

class DashboardController extends Controller
{

    public function __construct()
    {
        view()->share([
            'events' => Events::all(),
            'foodCategories' => FoodCategory::all(),
            'foodItems' => FoodItems::orderBy('created_at', 'desc')->paginate(6),
            'chefs' => OurChef::all(),
            'blogs' => BlogPost::all(),
            'blogCategories' => BlogCategory::orderBy('created_at', 'desc')->get(),
        ]);
    }


    //login page
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    //login process
    public function login(Request $request)
    {

        if (Auth::guard('admin')->attempt(['userName' => $request->userName, 'password' => $request->password], $request->get('remember'))) {

            //redirect
            Session()->flash('success', 'You are successfully logged in !');
            return redirect()->route('admin.dashboard');
        } else {
            //redirect
            Session()->flash('warning', 'Please enter correct email and password!');
            return redirect()->route('admin.login');
        }
    }

    //dashboard
    public function dashboard()
    {
        $order = $this->chartData();
        $foodCategories = FoodCategory::where('status', '=', 1)->get();
        $foodItems = FoodItems::all();
        $fooditem = DB::select("SELECT orders.product_type FROM orders WHERE orders.product_type='product' and DATE_FORMAT(orders.created_at,'%Y%c%d')=DATE_FORMAT(now(),'%Y%c%d')");
        $prodpend = Order::where('status', '=', 0)->where('product_type', '=', 'product')->get();
        $prodcon = Order::where('status', '=', 1)->where('product_type', '=', 'product')->get();
        $prodprep = Order::where('status', '=', 2)->where('product_type', '=', 'product')->get();
        $proddel = Order::where('status', '=', 3)->where('product_type', '=', 'product')->get();
        $planpend = Order::where('status', '=', 0)->where('product_type', '=', 'plan')->get();
        $plandone = Order::where('status', '=', 1)->where('product_type', '=', 'plan')->get();
        $plancancel = Order::where('status', '=', 2)->where('product_type', '=', 'plan')->get();

        $planoptpend = Order::where('status', '=', 0)->where('product_type', '=', 'plan_option')->get();
        $planoptdone = Order::where('status', '=', 1)->where('product_type', '=', 'plan_option')->get();
        $planoptcancel = Order::where('status', '=', 2)->where('product_type', '=', 'plan_option')->get();

        $mealpend = Order::where('status', '=', 0)->where('product_type', '=', 'meal')->get();
        $mealdone = Order::where('status', '=', 1)->where('product_type', '=', 'meal')->get();
        $mealcancel = Order::where('status', '=', 2)->where('product_type', '=', 'meal')->get();

        return view('admin.pages.dashboard', compact('order', 'foodCategories', 'foodItems', 'prodpend', 'prodcon', 'prodprep', 'proddel', 'planpend', 'plandone', 'plancancel', 'planoptpend', 'planoptdone', 'planoptcancel', 'fooditem', 'mealpend', 'mealdone', 'mealcancel'));
    }

    //Chart
    public function chartData()
    {
        //Pending order
        $pendingOrder = Order::where('status', 0)->whereYear('created_at', '=', date('Y'))->get()->groupBy(function ($d) {
            return $d->created_at->format('F');
        });

        //Complete order
        $completeOrder = Order::where('status', 1)->whereYear('created_at', '=', date('Y'))->get()->groupBy(function ($d) {
            return $d->created_at->format('F');
        });

        $monthly_chart = collect([]);

        foreach (month_arr() as $key => $value) {

            $monthly_chart->push([
                'month' => Carbon::parse(date('Y') . '-' . $key)->format('Y-m'),

                //Give Book
                'PendingOrder' => $pendingOrder->has($value) ? $pendingOrder[$value]->count('created_at') : 0,

                //Returned Book
                'CompleteOrder' => $completeOrder->has($value) ? $completeOrder[$value]->count('created_at') : 0,


            ]);
        }

        return response()->json($monthly_chart->toArray())->content();
    }



    //logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }


    //change password
    public function changePassword()
    {

        return view('admin.auth.changeAdminPassword');
    }

    //password update
    public function PasswordUpdate(Request $request)
    {
        //validation
        $this->validate($request, [
            'current_password'   => 'required',
            'password' => 'required|min:5|confirmed'
        ]);


        $AdminPassword = Auth::guard('admin')->user()->password;

        if (password_verify($request->current_password, $AdminPassword)) {

            //update query
            $userId = Auth::guard('admin')->id();

            $admin = Admin::find($userId);

            $admin->password = Hash::make($request->password);
            $admin->save();

            //redirect
            Session()->flash('success', 'Password Change successful!');
            return redirect()->back();
        } else {
            //redirect
            Session()->flash('warning', 'Please enter correct password!');
            return redirect()->back();
        }
    }

    public function customers()
    {
        $customers = DB::table('users')->select('*')->get();
        return view('admin.pages.customers', compact('customers'));
    }
    public function deletecustomer(Request $request)
    {
        DB::table('users')->where('id', $request->id)->delete();
        DB::table('orders')->where('users_id', $request->id)->delete();
        DB::table('orderplans')->where('user_id', $request->id)->delete();
        Session()->flash('success', 'Customer Deleted Successfully!');
        return redirect()->back();
    }

    public function showcustomerdetail(Request $request)
    {
        $customer = DB::table('users')->where('id', $request->cid)->get();
        return response()->json(['customer' => $customer]);
    }
}
