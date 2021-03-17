<?php

namespace App\Http\Controllers\Admin;

use App\FoodCategory;
use App\FoodItems;
use App\Addons;
use App\Assignaddons;
use App\Foodplan;
use App\Plandetail;
use App\Planday;
use App\Catplan;
use App\FrontEndSetting;
use Carbon\Carbon; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use DB;
class FoodItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foodCategory = FoodCategory::all();
        $foodItems = FoodItems::all();
        $foodCategoryForItem = FoodCategory::where('status',1)->get();
        return view('admin.frontendsetting.foods',compact('foodCategory','foodCategoryForItem','foodItems'));
    }


    public function manageaddons()
    {
        $addons=Addons::all();
        return view('admin.frontendsetting.manageaddons',compact('addons'));
    }

   
    public function addnew_addons()
    {
        return view('admin.frontendsetting.newaddons');
    }

    public function add_addons(Request $request)
    {
        $this->validate($request, [
            'addon_name' => 'required',
            'price' => 'required',
        ]);

        $addons = new  Addons();
        $addons->addon_name = $request->addon_name;
        $addons->price = $request->price;
        $addons->save();
        Session()->flash('success', 'Ad-on Created Successfully!');
        return $this->manageaddons();
    }

    public function edit_addons(Request $request,$id)
    {
        $addon = Addons::find($id);
        return view('admin.frontendsetting.updateaddons',compact('id','addon'));
    }

    public function update_addons(Request $request,$id)
    {
        $this->validate($request, [
            'addon_name' => 'required',
            'price' => 'required',
        ]);

        $addons = Addons::find($request->id);
        $addons->addon_name = $request->addon_name;
        $addons->price = $request->price;
        $addons->save();
        Session()->flash('success', 'Ad-on Updated Successfully!');
        return $this->manageaddons();
    }

    public function delete_addon(Request $request)
    {
        Addons::find($request->id)->delete();
        Session()->flash('success', 'Ad-on Deleted Successfully!');
        return $this->manageaddons();
    }


    public function listassign_addons()
    {
        $assignedaddons=Assignaddons::all();
        $addons=Addons::select('id','addon_name')->get();
        $fooditems=FoodItems::select('id','food_name')->get();

        $addons_list=DB::select("SELECT assignaddons.id,food_items.food_name,addons.addon_name FROM assignaddons LEFT JOIN food_items ON assignaddons.fooditem_id = food_items.id LEFT JOIN addons ON assignaddons.addon_id = addons.id");

        return view('admin.frontendsetting.listassignaddons',compact('addons_list'));
    }

    public function addassign_addons()
    {
        $addons=Addons::select('id','addon_name')->get();
        $fooditems=FoodItems::select('id','food_name')->get();
        return view('admin.frontendsetting.addassignaddons',compact('addons','fooditems'));
    }

    public function newassign_addons(Request $request)
    {
        $this->validate($request, [
            'fooditem_id' => 'required',
            'addon_id' => 'required',
        ]);
        $assignaddons = new  Assignaddons();
        $assignaddons->fooditem_id = $request->fooditem_id;
        $assignaddons->addon_id = $request->addon_id;
        $assignaddons->save();
        Session()->flash('success', 'Ad-on Assigned Successfully!');
        return $this->listassign_addons();
    }

    public function delete_assignedaddon(Request $request)
    {
        Assignaddons::find($request->id)->delete();
        Session()->flash('success', 'Assigned Ad-on Deleted Successfully!');
        return $this->listassign_addons();
    }

    public function edit_assignedaddon(Request $request,$id)
    {
        $assignedaddon = Assignaddons::find($id);
        $addons=Addons::select('id','addon_name')->get();
        $fooditems=FoodItems::select('id','food_name')->get();
        return view('admin.frontendsetting.updateassignedaddons',compact('id','addons','fooditems','assignedaddon'));
    }

    public function update_assignedaddon(Request $request,$id)
    {
        $this->validate($request, [
            'fooditem_id' => 'required',
            'addon_id' => 'required',
        ]);
        $assignaddons = Assignaddons::find($id);
        $assignaddons->fooditem_id = $request->fooditem_id;
        $assignaddons->addon_id = $request->addon_id;
        $assignaddons->save();
        Session()->flash('success', 'Assigned Ad-on Updated Successfully!');
        return $this->listassign_addons();
    }


    public function foodavailabilityindex()
    {
        $fooditems=FoodItems::select('id','food_name','food_price','availability')->get();
        return view('admin.frontendsetting.foodavailabilityindex',compact('fooditems'));
    }

    public function addavailability()
    {
        $fooditems=FoodItems::select('id','food_name')->get();
        return view('admin.frontendsetting.addavailability',compact('fooditems'));
    }

    public function storeavailability(Request $request)
    {
        $this->validate($request, [
            'fooditem_id' => 'required',
            'days' => 'required',
        ]);
        $fooditems=FoodItems::find($request->fooditem_id);

        $alldays=implode(',', $request->days);

        $fooditems->availability = $alldays;
        $fooditems->save();
        Session()->flash('success', 'Availability Added Successfully!');
        return $this->foodavailabilityindex();
    }

    public function delete_availability(Request $request)
    {
        $fooditems=FoodItems::find($request->id);
        $fooditems->availability = '';
        $fooditems->save();
        Session()->flash('success', 'Availability Deleted Successfully!');
        return $this->foodavailabilityindex();
    }


    public function edit_availability(Request $request,$id)
    {
        $fooditems=FoodItems::find($id);
        return view('admin.frontendsetting.updateavailability',compact('id','fooditems'));
    }

    public function update_availability(Request $request,$id)
    {
        $this->validate($request, [
            'days' => 'required',
        ]);
        $fooditems=FoodItems::find($id);

        $alldays=implode(',', $request->days);

        $fooditems->availability = $alldays;
        $fooditems->save();
        Session()->flash('success', 'Availability Updated Successfully!');
        return $this->foodavailabilityindex();
    }

    public function plancategories()
    {
        // $plancategory=CatPlan::all();
        $plancategory = DB::table('catplans')->select('id', 'category_name')->get();
        return view('admin.frontendsetting.plancatgories',compact('plancategory'));
    }

    public function createplancategory(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
        ]);
        // dd($request);
        // $plancate = new Catplan();
        DB::table('catplans')->insert(['category_name' => $request->category_name]);

        // $plancate->category_name = $request->category_name;
        // $plancate->save();
        Session()->flash('success', 'Plans Category Added Successfully!');
        return redirect()->back();
    }

    public function updateplancat(Request $request)
    {
        DB::table('catplans')->where('id', $request->id)->update(['category_name' => $request->food_category]);
        Session()->flash('success', 'Plans Category Updated Successfully!');
        return redirect()->back();

    }

    public function delete_plancategory(Request $request)
    {
        DB::table('catplans')->where('id', $request->id)->delete();
        Session()->flash('success', 'Plans Category Deleted Successfully!');
        return redirect()->back();
    }



    public function planslisting()
    {
        $foodplan=Foodplan::all();
        $plancategory = DB::table('catplans')->select('id', 'category_name')->get();
        return view('admin.frontendsetting.plans',compact('foodplan','plancategory'));
    }

    public function createplan()
    {
        $plancategory = DB::table('catplans')->select('id', 'category_name')->get();
        return view('admin.frontendsetting.createplan',compact('plancategory'));
    }

    public function storeplan(Request $request)
    {
        $foodplan = new Foodplan();
        $foodplan->plan_name=$request->plan_name;
        $foodplan->plan_price=$request->plan_price;
        $foodplan->plan_description=$request->plan_description;
        $foodplan->category_id=$request->category_id;
        $foodplan->total_days=$request->total_days;


        if( $request->hasFile('plan_image') ) {
            try {

                $path = 'assets/user/images/plans/';

                //upload new image

                $ip_img = "";
                $food_image=$request->plan_image;
                $input_image = Image::make($food_image);
                // $image = $input_image;
                $image = $input_image->resize(290, 290);
                $image_name = $food_image->getClientOriginalName();
                $image_name = Carbon::now()->format('YmdHs').'_'.$image_name;
                $image->save($path.$image_name);
                $ip_img= $image_name;
                

            }catch(\Exception $exp) {
                Session()->flash('warning', 'image upload failed !');
                return redirect()->back();
            }

            $foodplan->plan_image = $ip_img;
        }



        $foodplan->save();
        Session()->flash('success', 'Plan Created Successfully!');
        return $this->planslisting();
    }

    public function delete_plan(Request $request)
    {
        DB::table('plandetails')->where('plan_id', $request->id)->delete();
        DB::table('foodplans')->where('id', $request->id)->delete();
        Session()->flash('success', 'Plan Deleted Successfully!');
        return redirect()->back();
    }

    public function plan_edit($id)
    {
        $fooditems=Foodplan::find($id);
        $plancategory = DB::table('catplans')->select('id', 'category_name')->get();
        return view('admin.frontendsetting.planupdate',compact('id','fooditems','plancategory'));
    }

    public function plan_update(Request $request,$id)
    {
        $foodplan = Foodplan::find($id);
        $foodplan->plan_name=$request->plan_name;
        $foodplan->category_id=$request->category_id;
        $foodplan->plan_price=$request->plan_price;
        $foodplan->plan_description=$request->plan_description;

        if( $request->hasFile('plan_image') ) {
            try {

                $path = 'assets/user/images/plans/';

                //upload new image

                $ip_img = "";
                $food_image=$request->plan_image;
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

            $foodplan->plan_image = $ip_img;
        }

        $foodplan->save();
        Session()->flash('success', 'Plan Updated Successfully!');
        return $this->planslisting();
    }

    public function addplandays($id)
    {
      
        $planid=$id;
        $food_plan=Foodplan::find($id);
        $planname=$food_plan->plan_name;
        $plandays=Planday::where('plan_id',$id)->get();
        $plandetail=DB::select("SELECT plandays.id,plandays.plan_id as planid,plandays.day_id,plandetails.food_item_id,plandetails.food_type_id FROM plandays LEFT JOIN plandetails ON plandays.day_id = plandetails.day_id WHERE plandays.plan_id=$planid");
        // dd($record);

        // $plandetail=DB::select("SELECT plandetails.id,plandetails.day_id,plandetails.food_type_id FROM foodplans RIGHT JOIN plandetails ON foodplans.id = plandetails.id WHERE foodplans.id=$planid");
        // dd($plandetail);

        return view('admin.frontendsetting.plandays',compact('planid','planname','plandays','plandetail'));   
    }

    public function adddaysofplans($id)
    {
        $planid=$id;
        $food_plan=Foodplan::find($id);
        $planname=$food_plan->plan_name;
        $fooditems=FoodItems::select('id','food_name')->get();
        return view('admin.frontendsetting.formplandays',compact('planid','planname','fooditems'));
    }

    public function storeplandayfood(Request $request)
    {
        $result=Planday::select('*')->where('plan_id',$request->plan_id)->where('day_id',$request->day)->get();
        if(sizeof($result) > 0)
        {
            Session()->flash('warning', 'This day is already created');
            return redirect()->back();
        }
        else{
            $addplandays = new Planday();
            $addplandays->plan_id=$request->plan_id;
            $addplandays->day_id=$request->day;
            $addplandays->save();

            foreach ($request->fooditem as $key => $item)
            {
                $plandetail = new Plandetail();
                $plandetail->plan_id=$request->plan_id;
                $plandetail->day_id=$request->day;
                $plandetail->food_item_id=$item;
                $plandetail->food_type_id=$request->food_type[$key];
                $plandetail->save();
            }
            Session()->flash('success', 'Plan Created Successfully!');
            return $this->addplandays($request->plan_id);
        }
    }

    public function edit_plandayrecord($id,$day)
    {
        $planid=$id;
        $food_plan=Foodplan::find($id);
        $planname=$food_plan->plan_name;
        $day_schedule=Plandetail::select('*')->where('plan_id',$id)->where('day_id',$day)->get();
        $sizeof_totalfoods=sizeof($day_schedule);
        $fooditems=FoodItems::select('id','food_name')->get();
        return view('admin.frontendsetting.editplanday',compact('planid','planname','day_schedule','day','fooditems','sizeof_totalfoods'));
    }

    public function update_plandayrecord(Request $request,$id)
    {
        $dayid=$request->selected_day;
        DB::table('plandetails')->where('plan_id', $id)->where('day_id', $dayid)->delete();

        foreach ($request->fooditem as $key => $item)
        {
            $plandetail = new Plandetail();
            $plandetail->plan_id=$id;
            $plandetail->day_id=$dayid;
            $plandetail->food_item_id=$item;
            $plandetail->food_type_id=$request->food_type[$key];
            $plandetail->save();
        }
        Session()->flash('success', 'Plan Updated Successfully!');
        return $this->addplandays($id);
    }


    public function delete_plandays(Request $request)
    {
        DB::table('plandetails')->where('plan_id', $request->id)->where('day_id', $request->dayid)->delete();
        DB::table('plandays')->where('plan_id', $request->id)->where('day_id', $request->dayid)->delete();
        Session()->flash('success', 'Plan Day Deleted Successfully!');
        return redirect()->back();
    }
    

    

    
    

        


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //validation
        $this->validate($request, [
            'food_name' => 'required',
            'food_category_id' => 'required',
            'food_type' => 'required',
            'food_price' => 'required',
            'food_description' => 'required',
            'food_image' => 'required',
        ]);

        $result=FoodItems::select('sku')->take(1)->orderBy('id', 'DESC')->get();
        $sku=$result[0]->sku;
        $sku=explode('lpfi', $sku);
        $sku=$sku[1];
        $sku=$sku+1;
        $com_sku='lpfi'.$sku;


        //image operation
        if( $request->hasFile('food_image') ) {
            try {
                $path = 'assets/user/images/foods/';
                $ip_img = "";
                foreach ($request->food_image as $food_image) {

                    $input_image = Image::make($food_image);
                    $image = $input_image->resize(800, 800);
                    $image_name = $food_image->getClientOriginalName();
                    $image_name = Carbon::now()->format('YmdHs').'_'.$image_name;
                    $image->save($path.$image_name);
                    $ip_img .= $image_name. ',';
                }

            }catch(\Exception $exp) {
                Session()->flash('warning', 'image upload failed !'. $exp);
                return redirect()->back();
            }
        }else{
            Session()->flash('warning', 'image not found !');
            return redirect()->back();
        }

        //trim last comma
         $foodImg= substr($ip_img, 0, -1);

        $foodItems = new  FoodItems();
        $foodItems->food_name = $request->food_name;
        $foodItems->food_category_id = $request->food_category_id;
        $foodItems->food_type = $request->food_type;
        $foodItems->sku = $com_sku;
        $foodItems->food_price = $request->food_price;
        $foodItems->food_description = $request->food_description;
        $foodItems->food_image = $foodImg;
        $foodItems->save();

        //redirect
        Session()->flash('success', 'Successfully inserted !');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validation
        $this->validate($request, [
            'food_name' => 'required',
            'food_category_id' => 'required',
            'food_type' => 'required',
            'food_price' => 'required',
            'food_description' => 'required',
        ]);

        $foodItems = FoodItems::find($request->id);

        $foodItems->food_name = $request->food_name;
        $foodItems->food_category_id = $request->food_category_id;
        $foodItems->food_type = $request->food_type;
        $foodItems->food_price = $request->food_price;
        $foodItems->food_description = $request->food_description;

        //image operation
        if( $request->hasFile('food_image') ) {
            try {

                $path = 'assets/user/images/foods/';

                //delete old image
                foreach ( explode(',', $foodItems->food_image) as $f_image) {
                    $location = $path.$f_image;
                    if (file_exists($location)){
                        unlink($location);
                    }
                }

                //upload new image

                $ip_img = "";
                foreach ($request->food_image as $food_image) {
                    $input_image = Image::make($food_image);
                    $image = $input_image->resize(800, 800);
                    $image_name = $food_image->getClientOriginalName();
                    $image_name = Carbon::now()->format('YmdHs').'_'.$image_name;
                    $image->save($path.$image_name);
                    $ip_img .= $image_name. ',';
                }

            }catch(\Exception $exp) {
                Session()->flash('warning', 'image upload failed !');
                return redirect()->back();
            }
            //trim last comma
            $foodImg= substr($ip_img, 0, -1);
            $foodItems->food_image = $foodImg;
        }

        $foodItems->save();

        //redirect
        Session()->flash('success', 'Updated !');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $foodItems = FoodItems::find($request->id);

        $path = 'assets/user/images/foods/';

        //delete old image
        foreach ( explode(',', $foodItems->food_image) as $fo_image) {
            $location = $path.$fo_image;
            if (file_exists($location)){
                unlink($location);
            }
        }


        FoodItems::find($request->id)->delete();

        //redirect
        Session()->flash('success', 'successfully deleted !');
        return redirect()->back();
    }





}
