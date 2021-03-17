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
use App\SocialSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use DB;

class FrontEndController extends Controller
{
    //Banner+logo + Icon
    public function BannerLogoIcon()
    {
        $frontEndSetting = FrontEndSetting::first();
        return view('admin.frontendsetting.banner',compact('frontEndSetting'));
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
        if( $request->hasFile('logo_image') ) {
            try {

                $path ='assets/user/images/frontEnd/';

                $input_image = Image::make($request->logo_image);


                $image_name = 'logo.png';


                //save in storage
                $input_image->save($path.$image_name);

            }catch(\Exception $exp) {
                Session()->flash('warning', 'image upload failed !');
                return redirect()->back();
            }
        }

        //Icon image
        if( $request->hasFile('icon_image') ) {
            try {

                $path ='assets/user/images/frontEnd/';

                $input_image = Image::make($request->icon_image);


                $image_name = 'icon.png';

                //save in storage
                $input_image->save($path.$image_name);

            }catch(\Exception $exp) {
                Session()->flash('warning', 'image upload failed !');
                return redirect()->back();
            }
        }

       //Banner image
        if( $request->hasFile('banner_image') ) {
            try {

                $path ='assets/user/images/frontEnd/';

                $input_image = Image::make($request->banner_image);
                $image = $input_image->resize(1920, 1280);


                $image_name = 'banner.png';

                //save in storage
                $image->save($path.$image_name);

            }catch(\Exception $exp) {
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

        return view('admin.frontendsetting.about',compact('aboutSetting'));
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
        if( $request->hasFile('about_image') ) {
            try {

                $path ='assets/user/images/frontEnd/';

                $input_image = Image::make($request->about_image);

                //resize
                $image = $input_image->resize(800, 600);

                //select unique name
                $image_name = 'about_image.jpg';
                //delete old image


                //save in storage
                $image->save($path.$image_name);

            }catch(\Exception $exp) {
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

        $frontEndSetting->save();

        //redirect
        Session()->flash('success', 'successfully Updated !');
        return redirect()->back();
    }

    //ShowReservation
    public function ShowReservation()
    {
        $reservations = Reservation::where('status',0)->get();
        return view('admin.reservation.reservation',compact('reservations'));
    }

    public function ShowReservationLog()
    {
        $reservations = Reservation::where('status','!=',0)->get();
        return view('admin.reservation.reservation_log',compact('reservations'));
    }

    public function ShowReservationPage()
    {
        $reservations = Reservation::all();
        return view('admin.reservation.reservation_page',compact('reservations'));
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
        $foodCategoryForItem = FoodCategory::where('status',1)->get();
        $foodGallery = FoodGallery::all();
        return view('admin.frontendsetting.foodGallery',compact('foodCategoryForItem','foodGallery'));
    }

    public function FoodGallery(Request $request)
    {
        //validation
        $this->validate($request, [
            'food_category_id'   => 'required',
            'food_image'   => 'required',
        ]);

        //image operation
        if( $request->hasFile('food_image') ) {
            try {

                $path = 'assets/user/images/foodGallery/';

                $input_image = Image::make($request->food_image);
                $image = $input_image->resize(800, 800);
                $image_name = $request->file('food_image')->getClientOriginalName();
                $image_name = Carbon::now()->format('YmdHs').'_'.$image_name;
                $image->save($path.$image_name);

            }catch(\Exception $exp) {
                Session()->flash('warning', 'image upload failed !');
                return redirect()->back();
            }
        }else{
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
        $location = $path.$foodGallery->food_image;
        if (file_exists($location)){
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
        $foodCategoryForItem = FoodCategory::where('status',1)->get();
        return view('admin.frontendsetting.foodPageTitle');
    }

    //ShowContact
    public function ShowContact()
    {
        $contactSetting = Contact::first();
        return view('admin.frontendsetting.contact',compact('contactSetting'));
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
        $orders = DB::select("SELECT food_items.food_name,users.id,users.ul_name,users.name,users.email,users.phone,orders.*,food_categories.food_category_name FROM orders JOIN food_items ON orders.food_id=food_items.id JOIN users ON orders.users_id=users.id JOIN food_categories ON food_items.food_category_id=food_categories.id WHERE orders.product_type='product'");
        return view('admin.frontendsetting.order.orderList',compact('orders'));
    }

    public function orderDetails($id)
    {
        $orders = DB::select("SELECT food_items.food_name,users.*,orders.*,food_categories.food_category_name FROM orders JOIN food_items ON orders.food_id=food_items.id JOIN users ON orders.users_id=users.id JOIN food_categories ON food_items.food_category_id=food_categories.id WHERE orders.id='$id'");
       // echo "<pre>";print_r($orders);die;
        return view('admin.frontendsetting.order.ordersview',compact('orders'));
    }

    //order History
    public function OrderHistory()
    {
        $orders = Order::where('status','!=',0)->get();
        return view('admin.frontendsetting.order.orderHistory',compact('orders'));
    }

    //delete
    public function OrderRemove(Request $request,$id)
    {
        //send mail
        try {
            //Send mail to user
            $customer = Order::find($id);

            $to = $customer->c_mail;
            $name = $customer->c_name;
            $subject = "Order Reject Mail";
            $message = $request->reject_message;

            send_email($to,$name,$subject,$message);

        }catch(\Exception $exp) {
            Session()->flash('warning', 'mail sent failed !');
            return redirect()->back();
        }

        //send sms
        try {
            $toPhone = $customer->c_phone;
            $message = $request->reject_message;
            send_sms($toPhone,$message);

        }catch(\Exception $exp) {
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
    public function OrderAccept(Request $request,$id)
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

            send_email($toPhone,$name,$subject,$message);

        }catch(\Exception $exp) {
            Session()->flash('warning', 'mail sent failed !');
            return redirect()->back();
        }

        //send sms
        try {
            $to = $customer->c_phone;
            $message = "your order is accepted, you will get soon";
            send_sms($to,$message);

        }catch(\Exception $exp) {
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
        return view('admin.frontendsetting.socialSettings',compact('socialSettings'));
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

        $socialSettings =SocialSetting::find($request->id);
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
        return view('admin.frontendsetting.counter',compact('counter'));
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
        if( $request->hasFile('counter_image') ) {
            try {

                $path ='assets/user/images/frontEnd/';

                $input_image = Image::make($request->counter_image);
                $image = $input_image->resize(1920, 1280);


                $image_name = 'counter_image.jpg';

                //save in storage
                $image->save($path.$image_name);

            }catch(\Exception $exp) {
                Session()->flash('warning', 'image upload failed !');
                return redirect()->back();
            }
        }

        //redirect
        Session()->flash('success', 'successfully updated !');
        return redirect()->back();
    }


}
