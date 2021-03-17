<?php

namespace App\Http\Controllers\Admin;

use App\AboutSetting;
use App\Contact;
use App\Counter;
use App\FoodCategory;
use App\FoodGallery;
use App\FrontEndSetting;
use App\Reservation;
use App\Order;
use App\slider;
use App\SocialSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use DB;
use Mail;

class FrontEndController extends Controller
{
    //Banner+logo + Icon
    public function BannerLogoIcon()
    {
        $frontEndSetting = FrontEndSetting::first();
        return view('admin.frontendsetting.banner', compact('frontEndSetting'));
    }

    public function BannerLogoIconStore(Request $request)
    {
        //validation
        $this->validate($request, [
            'banner_text1'   => 'required',
            'banner_text2'   => 'required',
            'banner_text3'   => 'required',
        ]);

        //Logo image
        if ($request->hasFile('logo_image')) {
            try {

                $path = 'assets/user/images/frontEnd/';

                $input_image = Image::make($request->logo_image);


                $image_name = 'logo.png';


                //save in storage
                $input_image->save($path . $image_name);
            } catch (\Exception $exp) {
                Session()->flash('warning', 'image upload failed !');
                return redirect()->back();
            }
        }

        //Icon image
        if ($request->hasFile('icon_image')) {
            try {

                $path = 'assets/user/images/frontEnd/';

                $input_image = Image::make($request->icon_image);


                $image_name = 'icon.png';

                //save in storage
                $input_image->save($path . $image_name);
            } catch (\Exception $exp) {
                Session()->flash('warning', 'image upload failed !');
                return redirect()->back();
            }
        }

        //Banner image
        if ($request->hasFile('banner_image')) {
            try {

                $path = 'assets/user/images/frontEnd/';

                $input_image = Image::make($request->banner_image);
                $image = $input_image->resize(1920, 1280);


                $image_name = 'banner.png';

                //save in storage
                $image->save($path . $image_name);
            } catch (\Exception $exp) {
                Session()->flash('warning', 'image upload failed !');
                return redirect()->back();
            }
        }

        $frontEndSetting = FrontEndSetting::first();
        if (!$frontEndSetting) $frontEndSetting = new FrontEndSetting;

        $frontEndSetting->banner_text1 = $request->banner_text1;
        $frontEndSetting->banner_text2 = $request->banner_text2;
        $frontEndSetting->banner_text3 = $request->banner_text3;
        $frontEndSetting->save();

        //redirect
        Session()->flash('success', 'successfully Updated !');
        return redirect()->back();
    }

    //about
    public function showAboutSettings()
    {
        $aboutSetting = AboutSetting::first();

        return view('admin.frontendsetting.about', compact('aboutSetting'));
    }

    //About setting update
    public function AboutSettings(Request $request)
    {
        //validation
        $this->validate($request, [
            'about_title1'   => 'required',
            'about_title2'   => 'required',
            'about_text'   => 'required',
        ]);


        //image operation
        if ($request->hasFile('about_image')) {
            try {

                $path = 'assets/user/images/frontEnd/';

                $input_image = Image::make($request->about_image);

                //resize
                $image = $input_image->resize(800, 600);

                //select unique name
                $image_name = 'about_image.jpg';
                //delete old image


                //save in storage
                $image->save($path . $image_name);
            } catch (\Exception $exp) {
                Session()->flash('warning', 'image upload failed !');
                return redirect()->back();
            }
        }

        //update query
        $aboutSetting = AboutSetting::first();
        if (!$aboutSetting) $aboutSetting = new AboutSetting;
        $aboutSetting->about_title1 = $request->about_title1;
        $aboutSetting->about_title2 = $request->about_title2;
        $aboutSetting->about_text = $request->about_text;

        $aboutSetting->save();
        //redirect
        Session()->flash('success', 'successfully updated!');
        return redirect()->back();
    }

    //FoodTitles
    public function FoodTitles(Request $request)
    {
        //update query
        $frontEndSetting = FrontEndSetting::first();
        if (!$frontEndSetting) $frontEndSetting = new FrontEndSetting;

        $frontEndSetting->featureTitle1 = $request->featureTitle1;
        $frontEndSetting->featureTitle2 = $request->featureTitle2;

        $frontEndSetting->foodTitle1 = $request->foodTitle1;
        $frontEndSetting->foodTitle2 = $request->foodTitle2;

        $frontEndSetting->foodGalleryTitle1 = $request->foodGalleryTitle1;
        $frontEndSetting->foodGalleryTitle2 = $request->foodGalleryTitle2;
        $frontEndSetting->save();

        //redirect
        Session()->flash('success', 'successfully Updated !');
        return redirect()->back();
    }

    //FooterSettings
    public function ShowSettings()
    {
        return view('admin.frontendsetting.footer');
    }

    public function FooterSettings(Request $request)
    {

        //update query
        $frontEndSetting = FrontEndSetting::first();
        if (!$frontEndSetting) $frontEndSetting = new FrontEndSetting;

        $frontEndSetting->footerText = $request->footerText;
        $frontEndSetting->phone = $request->phone;
        $frontEndSetting->address = $request->address;

        $frontEndSetting->save();

        //redirect
        Session()->flash('success', 'successfully Updated !');
        return redirect()->back();
    }

    //ShowReservation
    public function ShowReservation()
    {
        $reservations = Reservation::where('status', 0)->get();
        return view('admin.reservation.reservation', compact('reservations'));
    }

    public function ShowReservationLog()
    {
        $reservations = Reservation::where('status', '!=', 0)->get();
        return view('admin.reservation.reservation_log', compact('reservations'));
    }

    public function ShowReservationPage()
    {
        $reservations = Reservation::all();
        return view('admin.reservation.reservation_page', compact('reservations'));
    }



    public function ReservationSettings(Request $request)
    {
        //update query
        $frontEndSetting = FrontEndSetting::first();
        if (!$frontEndSetting) $frontEndSetting = new FrontEndSetting;

        $frontEndSetting->reservation_title1 = $request->reservation_title1;
        $frontEndSetting->reservation_title2 = $request->reservation_title2;
        $frontEndSetting->reservation_openingTime = $request->reservation_openingTime;

        $frontEndSetting->save();

        //redirect
        Session()->flash('success', 'successfully Updated !');
        return redirect()->back();
    }

    //reject
    public function ReservationDelete($id)
    {
        Reservation::where('id', $id)
            ->update(['status' => 1]);

        //redirect
        Session()->flash('success', 'Rejected !');
        return redirect()->back();
    }

    //reject
    public function ReservationAccept($id)
    {
        Reservation::where('id', $id)
            ->update(['status' => 2]);

        //redirect
        Session()->flash('success', 'Accepted !');
        return redirect()->back();
    }


    //ShowFoodGallery
    public function ShowFoodGallery()
    {
        $foodCategoryForItem = FoodCategory::where('status', 1)->get();
        $foodGallery = FoodGallery::all();
        return view('admin.frontendsetting.foodGallery', compact('foodCategoryForItem', 'foodGallery'));
    }

    public function FoodGallery(Request $request)
    {
        //validation
        $this->validate($request, [
            'food_category_id'   => 'required',
            'food_image'   => 'required',
        ]);

        //image operation
        if ($request->hasFile('food_image')) {
            try {

                $path = 'assets/user/images/foodGallery/';

                $input_image = Image::make($request->food_image);
                $image = $input_image->resize(800, 800);
                $image_name = $request->file('food_image')->getClientOriginalName();
                $image_name = Carbon::now()->format('YmdHs') . '_' . $image_name;
                $image->save($path . $image_name);
            } catch (\Exception $exp) {
                Session()->flash('warning', 'image upload failed !');
                return redirect()->back();
            }
        } else {
            Session()->flash('warning', 'image not found !');
            return redirect()->back();
        }

        $foodGallery = new FoodGallery();
        $foodGallery->food_category_id = $request->food_category_id;
        $foodGallery->food_image = $image_name;

        $foodGallery->save();

        //redirect
        Session()->flash('success', 'successfully Inserted !');
        return redirect()->back();
    }

    //delete
    public function foodGalleryDelete($id)
    {
        $foodGallery = FoodGallery::find($id);

        //delete image
        $path = 'assets/user/images/foodGallery/';
        $location = $path . $foodGallery->food_image;
        if (file_exists($location)) {
            unlink($location);
        }

        FoodGallery::find($id)->delete();

        //redirect
        Session()->flash('success', 'successfully deleted !');
        return redirect()->back();
    }

    //ShowFoodPageTitle
    public function ShowFoodPageTitle()
    {
        $foodCategoryForItem = FoodCategory::where('status', 1)->get();
        return view('admin.frontendsetting.foodPageTitle');
    }

    //ShowContact
    public function ShowContact()
    {
        $contactSetting = Contact::first();
        return view('admin.frontendsetting.contact', compact('contactSetting'));
    }

    public function ContactSetting(Request $request)
    {
        //validation
        $this->validate($request, [
            'contact_title1'   => 'required',
            'contact_title2'   => 'required',
            'contact_title3'   => 'required',
            'contact_map'   => 'required',
            'address'   => 'required',
            'contact_phone'   => 'required',
            'contact_mail'   => 'required',
        ]);

        //update query
        $contactSetting = Contact::first();
        if (!$contactSetting) $contactSetting = new Contact;

        $contactSetting->contact_title1 = $request->contact_title1;
        $contactSetting->contact_title2 = $request->contact_title2;
        $contactSetting->contact_title3 = $request->contact_title3;
        $contactSetting->contact_map = $request->contact_map;

        $contactSetting->address = $request->address;
        $contactSetting->contact_phone = $request->contact_phone;
        $contactSetting->contact_mail = $request->contact_mail;

        $contactSetting->save();
        //redirect
        Session()->flash('success', 'successfully updated!');
        return redirect()->back();
    }



    //order list
    public function OrderList()
    {

        $orders = DB::select("SELECT food_items.food_name,users.id,users.ul_name,users.name,users.email,users.phone,sum(orders.c_quantity) as sumq,orders.*,food_categories.food_category_name FROM orders JOIN food_items ON orders.food_id=food_items.id JOIN users ON orders.users_id=users.id JOIN food_categories ON food_items.food_category_id=food_categories.id WHERE orders.product_type='product' GROUP BY orders.users_id");
        return view('admin.frontendsetting.order.orderList', compact('orders'));
    }


    public function statusUpdate(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');
        $result = Order::where('id', $id)->update(['status' => $status]);

        $order_result = Order::where('id', $id)->get();

        $orderd_userid = $order_result[0]->users_id;
        $logged_user_detail = DB::select("SELECT * FROM users WHERE users.id=$orderd_userid");

        $changed_up_status = '';
        if ($status == 0) {
            $changed_up_status = 'Pending';
        } elseif ($status == 1) {
            $changed_up_status = 'Confirm';
        } elseif ($status == 2) {
            $changed_up_status = 'Preparing';
        } elseif ($status == 3) {
            $changed_up_status = 'Deliver';
        }


        $light_opt_address = "Office #15 - AlShamia Tower, Maliya, Kuwait City, Kuwait 22083";
        $light_opt_phone = "+965 2534 0090";
        $light_opt_email = "info@light-option.com";

        $to_name = $logged_user_detail[0]->name . ' ' . $logged_user_detail[0]->ul_name;
        $to_email = $logged_user_detail[0]->email;
        $data = array('officeaddress' => $light_opt_address, 'officephone' => $light_opt_phone, 'officeemail' => $light_opt_email, 'to_name' => $to_name, 'changed_up_status' => $changed_up_status);
        Mail::send('emails.order_status', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Food Item Order Status');
            $message->from('orders@light-option.com', 'LIGHT OPTIONS');
        });

        echo "Status updated Successfully!";
    }


    public function orderDetails($id)
    {

        $orders = DB::select("SELECT food_items.food_name,users.*,orders.*,food_categories.food_category_name FROM orders JOIN food_items ON orders.food_id=food_items.id JOIN users ON orders.users_id=users.id JOIN food_categories ON food_items.food_category_id=food_categories.id WHERE orders.users_id='$id' and product_type='product'");

        return view('admin.frontendsetting.order.ordersview', compact('orders'));
    }

    //order History
    public function OrderHistory()
    {
        $orders = Order::where('status', '!=', 0)->get();
        return view('admin.frontendsetting.order.orderHistory', compact('orders'));
    }

    //delete
    public function OrderRemove(Request $request, $id)
    {
        //send mail
        try {
            $customer = Order::find($id);

            $to = $customer->c_mail;
            $name = $customer->c_name;
            $subject = "Order Reject Mail";
            $message = $request->reject_message;

            send_email($to, $name, $subject, $message);
        } catch (\Exception $exp) {
            Session()->flash('warning', 'mail sent failed !');
            return redirect()->back();
        }

        //send sms
        try {
            $toPhone = $customer->c_phone;
            $message = $request->reject_message;
            send_sms($toPhone, $message);
        } catch (\Exception $exp) {
            Session()->flash('warning', 'sms sent failed !');
            return redirect()->back();
        }

        //reject
        Order::where('id', $id)
            ->update(['status' => 1]);

        //redirect
        Session()->flash('success', 'successfully rejected !');
        return redirect()->back();
    }

    //Accept
    public function OrderAccept(Request $request, $id)
    {
        //update status
        Order::where('id', $id)->update(['status' => 2]);

        //send mail
        try {
            //Send mail to user
            $customer = Order::find($id);

            $toPhone = $customer->c_mail;
            $name = $customer->c_name;
            $subject = "Order Accept Mail";
            $message = "your order is accepted, you will get soon";

            send_email($toPhone, $name, $subject, $message);
        } catch (\Exception $exp) {
            Session()->flash('warning', 'mail sent failed !');
            return redirect()->back();
        }

        //send sms
        try {
            $to = $customer->c_phone;
            $message = "your order is accepted, you will get soon";
            send_sms($to, $message);
        } catch (\Exception $exp) {
            Session()->flash('warning', 'sms sent failed !');
            return redirect()->back();
        }

        //redirect
        Session()->flash('success', 'Accepted !');
        return redirect()->back();
    }


    //Event Title
    public function EventTitle(Request $request)
    {
        //validation
        $this->validate($request, [
            'eventTitle1'   => 'required',
            'eventTitle2'   => 'required',
        ]);

        //update query
        $frontEndSetting = FrontEndSetting::first();
        if (!$frontEndSetting) $frontEndSetting = new FrontEndSetting;

        $frontEndSetting->eventTitle1 = $request->eventTitle1;
        $frontEndSetting->eventTitle2 = $request->eventTitle2;

        $frontEndSetting->save();

        //redirect
        Session()->flash('success', 'successfully Updated !');
        return redirect()->back();
    }

    //News Title
    public function NewsTitle(Request $request)
    {
        //validation
        $this->validate($request, [
            'newsTitle1'   => 'required',
            'newsTitle2'   => 'required',
        ]);

        //update query
        $frontEndSetting = FrontEndSetting::first();
        if (!$frontEndSetting) $frontEndSetting = new FrontEndSetting;

        $frontEndSetting->newsTitle1 = $request->newsTitle1;
        $frontEndSetting->newsTitle2 = $request->newsTitle2;

        $frontEndSetting->save();

        //redirect
        Session()->flash('success', 'successfully Updated !');
        return redirect()->back();
    }

    //chef Title
    public function chefTitle(Request $request)
    {
        //validation
        $this->validate($request, [
            'chefTitle1'   => 'required',
            'chefTitle2'   => 'required',
        ]);


        //update query
        $frontEndSetting = FrontEndSetting::first();
        if (!$frontEndSetting) $frontEndSetting = new FrontEndSetting;

        $frontEndSetting->chefTitle1 = $request->chefTitle1;
        $frontEndSetting->chefTitle2 = $request->chefTitle2;

        $frontEndSetting->save();

        //redirect
        Session()->flash('success', 'successfully Updated !');
        return redirect()->back();
    }



    //social settings
    public function showSocialSettings()
    {
        $socialSettings = SocialSetting::all();
        return view('admin.frontendsetting.socialSettings', compact('socialSettings'));
    }

    public function storeSocialSettings(Request $request)
    {
        //validation
        $this->validate($request, [
            'name'   => 'required',
            'icon'   => 'required',
            'link'   => 'required',

        ]);

        $socialSettings = new SocialSetting();
        $socialSettings->name = $request->name;
        $socialSettings->icon = $request->icon;
        $socialSettings->link = $request->link;

        $socialSettings->save();
        //redirect
        Session()->flash('success', 'successfully created!');
        return redirect()->back();
    }

    //social delete
    public function SocialDestroy(Request $request)
    {
        SocialSetting::find($request->id)->delete();

        //redirect
        Session()->flash('success', 'successfully deleted !');
        return redirect()->back();
    }


    public function UpdateSocialSettings(Request $request)
    {
        //validation
        $this->validate($request, [
            'name'   => 'required',
            'icon'   => 'required',
            'link'   => 'required',

        ]);

        $socialSettings = SocialSetting::find($request->id);
        $socialSettings->name = $request->name;
        $socialSettings->icon = $request->icon;
        $socialSettings->link = $request->link;

        $socialSettings->save();
        //redirect
        Session()->flash('success', 'successfully updated!');
        return redirect()->back();
    }


    //counter
    public function showCounter()
    {
        $counter = Counter::all();
        return view('admin.frontendsetting.counter', compact('counter'));
    }

    public function storeCounter(Request $request)
    {
        //validation
        $this->validate($request, [
            'title'   => 'required',
            'quantity'   => 'required',
            'icon'   => 'required',
        ]);

        $counter = new Counter();
        $counter->counter_title = $request->title;
        $counter->counter_quantity = $request->quantity;
        $counter->counter_icon = $request->icon;
        $counter->save();
        //redirect
        Session()->flash('success', 'successfully created!');
        return redirect()->back();
    }

    public function CounterDestroy(Request $request)
    {
        Counter::find($request->id)->delete();

        //redirect
        Session()->flash('success', 'successfully deleted !');
        return redirect()->back();
    }

    public function storeCounterImage(Request $request)
    {
        //Banner image
        if ($request->hasFile('counter_image')) {
            try {

                $path = 'assets/user/images/frontEnd/';

                $input_image = Image::make($request->counter_image);
                $image = $input_image->resize(1920, 1280);


                $image_name = 'counter_image.jpg';

                //save in storage
                $image->save($path . $image_name);
            } catch (\Exception $exp) {
                Session()->flash('warning', 'image upload failed !');
                return redirect()->back();
            }
        }

        //redirect
        Session()->flash('success', 'successfully updated !');
        return redirect()->back();
    }

    public function planorderlist()
    {
        $orders = DB::select("SELECT foodplans.plan_name,users.id as userid,users.ul_name,users.name,users.email,users.phone,orders.* FROM orders JOIN foodplans ON orders.food_id=foodplans.id JOIN users ON orders.users_id=users.id WHERE orders.product_type='plan' order by orders.deliverydate asc");
        return view('admin.frontendsetting.order.planorderlist', compact('orders'));
    }

    public function planorderdays($uid, $oid, $pid)
    {
        $orderdays = DB::select("SELECT orders.id,orders.deliverydate,orderplans.day_id, orderplans.food_type_id, orderplans.order_status, orderplans.order_id, orderplans.plan_id, orderplans.order_date, orderplans.food_item_id, food_items.food_name FROM orders LEFT JOIN orderplans ON orders.id=orderplans.order_id LEFT JOIN food_items ON orderplans.food_item_id=food_items.id WHERE orders.id=$oid ORDER BY orderplans.order_date ASC");
        return view('admin.frontendsetting.order.planorderdayslist', compact('orderdays', 'pid', 'uid'));
    }


    public function planoptionlist()
    {
        $orders = DB::select("SELECT planoptions.plan_name,users.id as userid,users.ul_name,users.name,users.email,users.phone,orders.* FROM orders JOIN planoptions ON orders.planoption_id=planoptions.id JOIN users ON orders.users_id=users.id WHERE orders.product_type='plan_option'");
        return view('admin.frontendsetting.order.planoptionlist', compact('orders'));
    }


    public function planooptionorder($uid, $oid, $pid)
    {
        $orderdays = DB::select("SELECT orders.id,orders.created_at,orderplansoptions.food_type_id, orderplansoptions.order_status,orderplansoptions.id as opid,orderplansoptions.order_id, orderplansoptions.planoption_id,planoptions.plan_name FROM orders LEFT JOIN orderplansoptions ON orders.id=orderplansoptions.order_id LEFT JOIN planoptions ON orderplansoptions.planoption_id=planoptions.id WHERE orders.id='$oid'");
        return view('admin.frontendsetting.order.planorderoptionlist', compact('orderdays', 'pid', 'uid'));
    }


    public function statusUpdateplanorder(Request $request)
    {
        $sql = DB::update("UPDATE orderplans SET order_status=$request->status WHERE order_id=$request->orderid AND plan_id=$request->planid AND day_id=$request->dayid AND food_item_id=$request->fooditemid AND food_type_id=$request->foodtypeid");

        $result = DB::select("SELECT orders.id,orders.deliverydate,orderplans.day_id, orderplans.food_type_id, orderplans.order_status, orderplans.order_id, orderplans.plan_id, orderplans.food_item_id, food_items.food_name FROM orders LEFT JOIN orderplans ON orders.food_id=orderplans.plan_id LEFT JOIN food_items ON orderplans.food_item_id=food_items.id WHERE orders.id=$request->orderid AND orderplans.food_type_id=$request->foodtypeid AND orderplans.plan_id=$request->planid AND orderplans.food_item_id=$request->fooditemid");

        $plan_name = DB::select("SELECT plan_name from foodplans WHERE id=$request->planid");

        $logged_user_detail = DB::select("SELECT * FROM users WHERE users.id=$request->personid");

        $changed_up_status = '';
        if ($result[0]->order_status == 0) {
            $changed_up_status = 'Pending';
        } elseif ($result[0]->order_status == 1) {
            $changed_up_status = 'Confirm';
        } elseif ($result[0]->order_status == 2) {
            $changed_up_status = 'Preparing';
        } elseif ($result[0]->order_status == 3) {
            $changed_up_status = 'Deliver';
        }



        $changed_food = '';
        if ($result[0]->food_type_id == 1) {
            $changed_food = 'BreakFast';
        } elseif ($result[0]->food_type_id == 2) {
            $changed_food = 'Lunch';
        } elseif ($result[0]->food_type_id == 3) {
            $changed_food = 'Snacks';
        } elseif ($result[0]->food_type_id == 4) {
            $changed_food = 'Dinner';
        }


        $changed_day = '';
        if ($result[0]->day_id == 1) {
            $changed_day = 'Sunday';
        } elseif ($result[0]->day_id == 2) {
            $changed_day = 'Monday';
        } elseif ($result[0]->day_id == 3) {
            $changed_day = 'Tuesday';
        } elseif ($result[0]->day_id == 4) {
            $changed_day = 'Wednesday';
        } elseif ($result[0]->day_id == 5) {
            $changed_day = 'Thursday';
        } elseif ($result[0]->day_id == 6) {
            $changed_day = 'Friday';
        } elseif ($result[0]->day_id == 7) {
            $changed_day = 'Saturday';
        }


        $changed_delivery = '';
        if ($result[0]->day_id == 1) {
            $changed_delivery = date('d-m-Y', strtotime($result[0]->deliverydate . "+ 6 days"));
        } elseif ($result[0]->day_id == 2) {
            $changed_delivery = date('d-m-Y', strtotime($result[0]->deliverydate));
        } elseif ($result[0]->day_id == 3) {
            $changed_delivery = date('d-m-Y', strtotime($result[0]->deliverydate . "+ 1 days"));
        } elseif ($result[0]->day_id == 4) {
            $changed_delivery = date('d-m-Y', strtotime($result[0]->deliverydate . "+ 2 days"));
        } elseif ($result[0]->day_id == 5) {
            $changed_delivery = date('d-m-Y', strtotime($result[0]->deliverydate . "+ 3 days"));
        } elseif ($result[0]->day_id == 6) {
            $changed_delivery = date('d-m-Y', strtotime($result[0]->deliverydate . "+ 4 days"));
        } elseif ($result[0]->day_id == 7) {
            $changed_delivery = date('d-m-Y', strtotime($result[0]->deliverydate . "+ 5 days"));
        }

        $light_opt_address = "Office #15 - AlShamia Tower, Maliya, Kuwait City, Kuwait 22083";
        $light_opt_phone = "+965 2534 0090";
        $light_opt_email = "info@light-option.com";

        $to_name = $logged_user_detail[0]->name . ' ' . $logged_user_detail[0]->ul_name;

        $to_email = $logged_user_detail[0]->email;
        $planname = $plan_name[0]->plan_name;
        $foodname = $result[0]->food_name;

        $data = array('officeaddress' => $light_opt_address, 'officephone' => $light_opt_phone, 'officeemail' => $light_opt_email, 'to_name' => $to_name, 'fooditem' => $foodname, 'day' => $changed_day, 'foodtype' => $changed_food, 'deliverydate' => $changed_delivery, 'planname' => $planname, 'changed_up_status' => $changed_up_status);

        Mail::send('emails.order_planstatus', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Plan Order Status');
            $message->from('orders@light-option.com', 'LIGHT OPTIONS');
        });
        Session()->flash('success', 'Status updated successfully!');
        return response()->json(['result' => 'true']);
    }


    public function statusUpdateplanoptionorder(Request $request)
    {

        $sql = DB::update("UPDATE orderplansoptions SET order_status=$request->status WHERE id=$request->orderid AND planoption_id=$request->planid AND food_type_id=$request->foodtypeid");

        $result = DB::select("SELECT orders.id,orders.created_at,orderplansoptions.food_type_id, orderplansoptions.order_status,orderplansoptions.id as opid,orderplansoptions.order_id, orderplansoptions.planoption_id,planoptions.plan_name FROM orders LEFT JOIN orderplansoptions ON orders.id=orderplansoptions.order_id LEFT JOIN planoptions ON orderplansoptions.planoption_id=planoptions.id WHERE orderplansoptions.id=$request->orderid");

        $logged_user_detail = DB::select("SELECT * FROM users WHERE users.id=$request->personid");

        $changed_up_status = '';
        if ($result[0]->order_status == 0) {
            $changed_up_status = 'Pending';
        } elseif ($result[0]->order_status == 1) {
            $changed_up_status = 'Confirm';
        } elseif ($result[0]->order_status == 2) {
            $changed_up_status = 'Preparing';
        } elseif ($result[0]->order_status == 3) {
            $changed_up_status = 'Deliver';
        }



        $changed_food = '';
        if ($result[0]->food_type_id == 1) {
            $changed_food = 'BreakFast';
        } elseif ($result[0]->food_type_id == 2) {
            $changed_food = 'Lunch';
        } elseif ($result[0]->food_type_id == 3) {
            $changed_food = 'Snacks';
        } elseif ($result[0]->food_type_id == 4) {
            $changed_food = 'Dinner';
        }




        $light_opt_address = "Office #15 - AlShamia Tower, Maliya, Kuwait City, Kuwait 22083";
        $light_opt_phone = "+965 2534 0090";
        $light_opt_email = "info@light-option.com";

        $to_name = $logged_user_detail[0]->name . ' ' . $logged_user_detail[0]->ul_name;
        $to_email = $logged_user_detail[0]->email;
        $plan_name = $result[0]->plan_name;
        $deliverydate = $result[0]->created_at;
        $data = array('officeaddress' => $light_opt_address, 'officephone' => $light_opt_phone, 'officeemail' => $light_opt_email, 'to_name' => $to_name, 'plan_name' => $plan_name, 'foodtype' => $changed_food, 'deliverydate' => $deliverydate, 'changed_up_status' => $changed_up_status);
        Mail::send('emails.order_optplanstatus', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Plan Options Order Status');
            $message->from('orders@light-option.com', 'LIGHT OPTIONS');
        });

        Session()->flash('success', 'Status updated successfully');
        return response()->json(['result' => 'true']);
    }

    public function viewslider()
    {
        $slider = slider::all();
        return view('admin.frontendsetting.ourslider', compact('slider'));
    }


    public function createslider(Request $request)
    {


        //image operation
        if ($request->hasFile('image')) {
            try {

                $path = 'assets/admin/img/slider/';

                $input_image = Image::make($request->image);
                $image = $input_image;
                $image_name = $request->file('image')->getClientOriginalName();
                $image_name = Carbon::now()->format('YmdHs') . '_' . $image_name;
                $image->save($path . $image_name);
            } catch (\Exception $exp) {
                Session()->flash('warning', 'image upload failed !');
                return redirect()->back();
            }
        } else {
            Session()->flash('warning', 'image not found !');
            return redirect()->back();
        }

        //insert query
        $slider = new slider();

        $slider->heading = $request->head;
        $slider->paragraph = $request->para;
        $slider->image = $image_name;

        $slider->save();
        //redirect
        Session()->flash('success', 'Slider successfully Created !');
        return redirect()->route('admin.slider');
    }



    public function slidereditmodal(Request $res)
    {

        $data = array();
        $result = DB::table('sliders')->where('id', $res->id)->get();
        $data['result'] = $result;
        return response()->json(['result' => $result]);
    }

    public function sliderupdate(Request $request)
    {

        //Update Query
        $id = $request->id;
        $slider = slider::find($id);
        $slider->heading = $request->head;
        $slider->paragraph = $request->para;
        //image update
        if ($request->hasFile('image')) {

            //delete old image
            $path = 'assets/admin/img/slider/';
            $location = $path . $slider->image;
            if (file_exists($location)) {
                unlink($location);
            }

            //upload new image
            $input_image = Image::make($request->image);
            $image = $input_image;
            $image_name = $request->file('image')->getClientOriginalName();
            $image_name = Carbon::now()->format('YmdHs') . '_' . $image_name;
            $image->save($path . $image_name);

            //image update
            $slider->image = $image_name;
        }

        $slider->save();

        //redirect
        Session()->flash('success', 'Slider successfully Updated !');
        return redirect()->route('admin.slider');
    }


    public function delete_slider(Request $request)
    {

        $slider = slider::find($request->id);
        $path = 'assets/admin/img/slider/';
        if (file_exists($path . $slider->image)) {
            unlink($path . $slider->image);
        }
        slider::find($request->id)->delete();
        //redirect
        Session()->flash('success', 'successfully deleted !');
        return redirect()->back();
    }

    public function planorderprintdays($uid, $oid, $pid)
    {


        $orders = DB::select("SELECT foodplans.plan_name,users.id as userid,users.ul_name,users.name,users.email,users.phone,orders.* FROM orders JOIN foodplans ON orders.food_id=foodplans.id JOIN users ON orders.users_id=users.id WHERE orders.product_type='plan' and orders.id='$oid' and orders.users_id='$uid'");


        $orderdays = DB::select("SELECT orders.id,orders.deliverydate,orderplans.day_id,orders.created_at, orderplans.food_type_id, orderplans.order_date, orderplans.order_status, orderplans.order_id, orderplans.plan_id, orderplans.food_item_id, food_items.food_name FROM orders LEFT JOIN orderplans ON orders.id=orderplans.order_id LEFT JOIN food_items ON orderplans.food_item_id=food_items.id WHERE orders.id=$oid ORDER BY orderplans.order_date ASC");

        return view('admin.frontendsetting.order.planlistprint', compact('orders', 'orderdays'));
    }

    public function planoptorder($uid, $oid, $pid)
    {

        $planopt_details = DB::table('planoptdetails')->where('planoptions_id', $pid)->orderBy('planoptdetails.meal_type', 'asc')->get();



        $planopt_details1 = DB::table('planoptdetails')->where('planoptions_id', $planopt_details[0]->planoptions_id)->where('meal_type', $planopt_details[0]->meal_type)->get();



        $orders = DB::select("SELECT planoptions.plan_name,users.id as userid,users.ul_name,users.name,users.email,users.phone,orders.* FROM orders JOIN planoptions ON orders.planoption_id=planoptions.id JOIN users ON orders.users_id=users.id WHERE orders.product_type='plan_option' and orders.id='$oid' and orders.users_id='$uid' ");


        $orderdays = DB::select("SELECT orders.id,orders.created_at,orderplansoptions.food_type_id, orderplansoptions.order_status,orderplansoptions.id as opid,orderplansoptions.order_id, orderplansoptions.planoption_id,planoptions.plan_name FROM orders LEFT JOIN orderplansoptions ON orders.id=orderplansoptions.order_id LEFT JOIN planoptions ON orderplansoptions.planoption_id=planoptions.id WHERE orders.id='$oid'");


        return view('admin.frontendsetting.order.planoptionprint', compact('orders', 'orderdays', 'planopt_details1'));
    }

    public function statusUpdateplan(Request $request)
    {

        $sql = DB::update("UPDATE orders SET status=$request->status WHERE id=$request->id");
        Session()->flash('success', 'successfully updated !');
        return response()->json(['result' => 'true']);
    }

    public function delivery()
    {
        return view('admin.frontendsetting.delivery');
    }

    public function deliverysave(Request $request)
    {

        //update query
        $frontEndSetting = FrontEndSetting::first();
        if (!$frontEndSetting) $frontEndSetting = new FrontEndSetting;

        $frontEndSetting->deliverycharges = $request->deliverycharges;


        $frontEndSetting->save();

        //redirect
        Session()->flash('success', 'successfully Updated !');
        return redirect()->back();
    }

    public function meallist()
    {
        $orders = DB::select("SELECT users.id as userid,users.ul_name,users.name,users.email,users.phone,orders.* FROM orders JOIN users ON orders.users_id=users.id WHERE orders.product_type='meal' order by orders.deliverydate asc");
        return view('admin.frontendsetting.order.meallist', compact('orders'));
    }

    public function momorderdays($mid)
    {
        $orderdays = DB::select("SELECT * FROM mealdetails WHERE meal_id=$mid ORDER BY weekno asc");

        return view('admin.frontendsetting.order.mealorderdayslist', compact('orderdays', 'mid'));
    }

    public function statusUpdatemom(Request $request)
    {
        $sql = DB::update("UPDATE mealdetails SET status=$request->status WHERE id=$request->mealid");

        $mealdetails = DB::select("SELECT * from mealdetails WHERE id=$request->mealid");
        $selected_mealid = $mealdetails[0]->meal_id;

        $detail = DB::select("SELECT meal_name,users_id from orders WHERE meal_id=$selected_mealid");
        $log_id = $detail[0]->users_id;

        $logged_user_detail = DB::select("SELECT * FROM users WHERE id=$log_id");


        $changed_up_status = '';
        if ($request->status == 0) {
            $changed_up_status = 'Pending';
        } elseif ($request->status == 1) {
            $changed_up_status = 'Confirm';
        } elseif ($request->status == 2) {
            $changed_up_status = 'Preparing';
        } elseif ($request->status == 3) {
            $changed_up_status = 'Deliver';
        }



        $changed_food = '';
        if ($mealdetails[0]->food_type == 1) {
            $changed_food = 'BreakFast';
        } elseif ($mealdetails[0]->food_type == 2) {
            $changed_food = 'Lunch';
        } elseif ($mealdetails[0]->food_type == 3) {
            $changed_food = 'Snacks';
        } elseif ($mealdetails[0]->food_type == 4) {
            $changed_food = 'Dinner';
        }


        $changed_day = '';
        if ($mealdetails[0]->day_id == 1) {
            $changed_day = 'Monday';
        } elseif ($mealdetails[0]->day_id == 2) {
            $changed_day = 'Tuesday';
        } elseif ($mealdetails[0]->day_id == 3) {
            $changed_day = 'Wednesday';
        } elseif ($mealdetails[0]->day_id == 4) {
            $changed_day = 'Thursday';
        } elseif ($mealdetails[0]->day_id == 5) {
            $changed_day = 'Friday';
        } elseif ($mealdetails[0]->day_id == 6) {
            $changed_day = 'Saturday';
        } elseif ($mealdetails[0]->day_id == 7) {
            $changed_day = 'Sunday';
        }

        $light_opt_address = "Office #15 - AlShamia Tower, Maliya, Kuwait City, Kuwait 22083";
        $light_opt_phone = "+965 2534 0090";
        $light_opt_email = "info@light-option.com";

        $to_name = $logged_user_detail[0]->name . ' ' . $logged_user_detail[0]->ul_name;
        $to_email = $logged_user_detail[0]->email;
        $mealname = $detail[0]->meal_name;
        $foodname = $mealdetails[0]->food_name;

        $data = array('officeaddress' => $light_opt_address, 'officephone' => $light_opt_phone, 'officeemail' => $light_opt_email, 'to_name' => $to_name, 'fooditem' => $foodname, 'day' => $changed_day, 'foodtype' => $changed_food, 'planname' => $mealname, 'changed_up_status' => $changed_up_status);

        Mail::send('emails.momorderstatus', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Make Your Own Meal Order Status');
            $message->from('orders@light-option.com', 'LIGHT OPTIONS');
        });
        Session()->flash('success', 'Status updated successfully!');
        return response()->json(['result' => 'true']);
    }

    public function momorderprintdays($mid)
    {

        $mealdetails = DB::select("SELECT * from mealdetails WHERE meal_id=$mid");

        $orderdetail = DB::select("SELECT * from orders WHERE meal_id=$mid");
        $log_id = $orderdetail[0]->users_id;
        $mom_name = $orderdetail[0]->meal_name;

        $logged_user_detail = DB::select("SELECT * FROM users WHERE id=$log_id");
        $to_name = $logged_user_detail[0]->name . ' ' . $logged_user_detail[0]->ul_name;

        return view('admin.frontendsetting.order.momorderlist', compact('logged_user_detail', 'to_name', 'mom_name', 'mealdetails', 'orderdetail'));
    }

    public function momstatusUpdate(Request $request)
    {
        $sql = DB::update("UPDATE orders SET status=$request->status WHERE id=$request->id");
        Session()->flash('success', 'order updated successfully!');
        return response()->json(['result' => 'true']);
    }
}
