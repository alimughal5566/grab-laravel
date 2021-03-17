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
use App\Planoption;
use App\Planoptlistmeal;
use App\Planoptdetail;
use App\Plancompostion;
use App\AddonCat;
use App\Plancompose;
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
        $foodCategoryForItem = FoodCategory::where('status', 1)->get();
        return view('admin.frontendsetting.foods', compact('foodCategory', 'foodCategoryForItem', 'foodItems'));
    }

    public function listaddonscat()
    {
        $addoncats = AddonCat::all();
        return view('admin.frontendsetting.listaddoncats', compact('addoncats'));
    }
    public function createaddoncategory(Request $request)
    {

        $addons = new  AddonCat();
        $addons->category_name = $request->category_name;
        $addons->save();
        Session()->flash('success', 'Addon Category Created Successfully!');
        return redirect()->back();
    }

    public function delete_addoncategory(Request $request)
    {
        DB::table('addon_cats')->where('id', $request->id)->delete();
        Session()->flash('success', 'Addon Category Deleted Successfully!');
        return redirect()->back();
    }

    public function updateaddoncat(Request $request)
    {

        DB::table('addon_cats')->where('id', $request->id)->update(['category_name' => $request->category_name]);

        Session()->flash('success', 'Addon Category Updated Successfully!');
        return redirect()->back();
    }

    public function manageaddons()
    {
        $addons = Addons::all();
        return view('admin.frontendsetting.manageaddons', compact('addons'));
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

    public function edit_addons(Request $request, $id)
    {
        $addon = Addons::find($id);
        return view('admin.frontendsetting.updateaddons', compact('id', 'addon'));
    }

    public function update_addons(Request $request, $id)
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
        $assignedaddons = Assignaddons::all();
        $addons = Addons::select('id', 'addon_name')->get();
        $fooditems = FoodItems::select('id', 'food_name')->get();

        $addons_list = DB::select("SELECT assignaddons.id,food_items.food_name,addons.addon_name FROM assignaddons LEFT JOIN food_items ON assignaddons.fooditem_id = food_items.id LEFT JOIN addons ON assignaddons.addon_id = addons.id");

        return view('admin.frontendsetting.listassignaddons', compact('addons_list'));
    }

    public function addassign_addons()
    {
        $addons = Addons::select('id', 'addon_name')->get();
        $fooditems = FoodItems::select('id', 'food_name')->get();
        $addoncats = AddonCat::all();
        return view('admin.frontendsetting.addassignaddons', compact('addons', 'fooditems', 'addoncats'));
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
        $assignaddons->addon_type = $request->addon_type;
        $assignaddons->addon_category = $request->addon_category;
        $assignaddons->save();
        Session()->flash('success', 'Addon Assigned Successfully!');
        return $this->listassign_addons();
    }

    public function delete_assignedaddon(Request $request)
    {
        Assignaddons::find($request->id)->delete();
        Session()->flash('success', 'Assigned Ad-on Deleted Successfully!');
        return $this->listassign_addons();
    }

    public function edit_assignedaddon(Request $request, $id)
    {
        $assignedaddon = Assignaddons::find($id);
        $addons = Addons::select('id', 'addon_name')->get();
        $fooditems = FoodItems::select('id', 'food_name')->get();
        $addoncats = AddonCat::all();
        return view('admin.frontendsetting.updateassignedaddons', compact('id', 'addons', 'fooditems', 'assignedaddon', 'addoncats'));
    }

    public function update_assignedaddon(Request $request, $id)
    {
        $this->validate($request, [
            'fooditem_id' => 'required',
            'addon_id' => 'required',
        ]);
        $assignaddons = Assignaddons::find($id);
        $assignaddons->fooditem_id = $request->fooditem_id;
        $assignaddons->addon_id = $request->addon_id;
        $assignaddons->addon_type = $request->addon_type;
        $assignaddons->addon_category = $request->addon_category;
        $assignaddons->save();
        Session()->flash('success', 'Assigned Addon Updated Successfully!');
        return $this->listassign_addons();
    }


    public function foodavailabilityindex()
    {
        $fooditems = FoodItems::select('id', 'food_name', 'food_price', 'availability')->get();
        return view('admin.frontendsetting.foodavailabilityindex', compact('fooditems'));
    }

    public function addavailability()
    {
        $fooditems = FoodItems::select('id', 'food_name')->get();
        return view('admin.frontendsetting.addavailability', compact('fooditems'));
    }

    public function storeavailability(Request $request)
    {
        $this->validate($request, [
            'fooditem_id' => 'required',
            'days' => 'required',
        ]);
        $fooditems = FoodItems::find($request->fooditem_id);

        $alldays = implode(',', $request->days);

        $fooditems->availability = $alldays;
        $fooditems->save();
        Session()->flash('success', 'Availability Added Successfully!');
        return $this->foodavailabilityindex();
    }

    public function delete_availability(Request $request)
    {
        $fooditems = FoodItems::find($request->id);
        $fooditems->availability = '';
        $fooditems->save();
        Session()->flash('success', 'Availability Deleted Successfully!');
        return $this->foodavailabilityindex();
    }


    public function edit_availability(Request $request, $id)
    {
        $fooditems = FoodItems::find($id);
        return view('admin.frontendsetting.updateavailability', compact('id', 'fooditems'));
    }

    public function update_availability(Request $request, $id)
    {
        $this->validate($request, [
            'days' => 'required',
        ]);
        $fooditems = FoodItems::find($id);

        $alldays = implode(',', $request->days);

        $fooditems->availability = $alldays;
        $fooditems->save();
        Session()->flash('success', 'Availability Updated Successfully!');
        return $this->foodavailabilityindex();
    }

    public function plancategories()
    {
        $plancategory = DB::table('catplans')->select('id', 'category_name', 'category_image')->get();
        return view('admin.frontendsetting.plancatgories', compact('plancategory'));
    }

    public function createplancategory(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
        ]);

        $catimage = '';
        if ($request->hasFile('category_image')) {
            try {

                $path = 'assets/user/images/plans/';


                $ip_img = "";
                $food_image = $request->category_image;
                $input_image = Image::make($food_image);
                $image = $input_image->resize(800, 800);
                $image_name = $food_image->getClientOriginalName();
                $image_name = Carbon::now()->format('YmdHs') . '_' . $image_name;
                $image->save($path . $image_name);
                $ip_img = $image_name;
            } catch (\Exception $exp) {
                Session()->flash('warning', 'image upload failed !');
                return redirect()->back();
            }

            $catimage = $ip_img;
        }


        DB::table('catplans')->insert(['category_name' => $request->category_name, 'category_image' => $catimage]);

        Session()->flash('success', 'Plans Category Added Successfully!');
        return redirect()->back();
    }

    public function updateplancat(Request $request)
    {

        if ($request->hasFile('category_image')) {
            try {

                $path = 'assets/user/images/plans/';

                //upload new image

                $ip_img = "";
                $food_image = $request->category_image;
                $input_image = Image::make($food_image);
                $image = $input_image->resize(800, 800);
                $image_name = $food_image->getClientOriginalName();
                $image_name = Carbon::now()->format('YmdHs') . '_' . $image_name;
                $image->save($path . $image_name);
                $ip_img = $image_name;
            } catch (\Exception $exp) {
                Session()->flash('warning', 'image upload failed !');
                return redirect()->back();
            }

            DB::table('catplans')->where('id', $request->id)->update(['category_name' => $request->food_category, 'category_image' => $ip_img]);
        } else {
            DB::table('catplans')->where('id', $request->id)->update(['category_name' => $request->food_category]);
        }


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
        $foodplan = Foodplan::all();
        $plancategory = DB::table('catplans')->select('id', 'category_name')->get();
        return view('admin.frontendsetting.plans', compact('foodplan', 'plancategory'));
    }

    public function createplan()
    {
        $plancategory = DB::table('catplans')->select('id', 'category_name')->get();
        return view('admin.frontendsetting.createplan', compact('plancategory'));
    }

    public function storeplan(Request $request)
    {
        $foprice = $request->plan_price;
        $food_price = (int)(($foprice * 1000)) / 1000;
        $foodplan = new Foodplan();
        $foodplan->plan_name = $request->plan_name;
        $foodplan->plan_price = $food_price;
        $foodplan->plan_calories = $request->plan_calories;
        $foodplan->plan_description = $request->plan_description;
        $foodplan->category_id = $request->category_id;
        $foodplan->total_days = $request->total_days;


        if ($request->hasFile('plan_image')) {
            try {

                $path = 'assets/user/images/plans/';

                //upload new image

                $ip_img = "";
                $food_image = $request->plan_image;
                $input_image = Image::make($food_image);
                $image = $input_image->resize(290, 290);
                $image_name = $food_image->getClientOriginalName();
                $image_name = Carbon::now()->format('YmdHs') . '_' . $image_name;
                $image->save($path . $image_name);
                $ip_img = $image_name;
            } catch (\Exception $exp) {
                Session()->flash('warning', 'image upload failed !');
                return redirect()->back();
            }

            $foodplan->plan_image = $ip_img;
        }



        $foodplan->save();

        $specified_planId = $foodplan->id;

        if (sizeof($request->nutrition) > 0) {
            foreach ($request->nutrition as $key => $value) {
                $plancom = new Plancompose();
                $plancom->plan_id = $specified_planId;
                $plancom->nutrition = $value;
                $plancom->unit = $request->unit[$key];
                $plancom->gramvalue = $request->gmvalue[$key];
                $plancom->dmvalue = $request->dmvalue[$key];
                $plancom->save();
            }
        }

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
        $fooditems = Foodplan::find($id);
        $plancategory = DB::table('catplans')->select('id', 'category_name')->get();
        $plancompostions = DB::table('plancomposes')->where('plan_id', $id)->get();

        return view('admin.frontendsetting.planupdate', compact('id', 'fooditems', 'plancategory', 'plancompostions'));
    }


    public function plan_update(Request $request, $id)
    {
        $foprice = $request->plan_price;
        $food_price = (int)(($foprice * 1000)) / 1000;
        $foodplan = Foodplan::find($id);
        $foodplan->plan_name = $request->plan_name;
        $foodplan->category_id = $request->category_id;
        $foodplan->plan_price = $food_price;
        $foodplan->plan_calories = $request->plan_calories;
        $foodplan->plan_description = $request->plan_description;

        if ($request->hasFile('plan_image')) {
            try {

                $path = 'assets/user/images/plans/';

                //upload new image

                $ip_img = "";
                $food_image = $request->plan_image;
                $input_image = Image::make($food_image);
                $image = $input_image;
                $image = $input_image->resize(290, 290);
                $image_name = $food_image->getClientOriginalName();
                $image_name = Carbon::now()->format('YmdHs') . '_' . $image_name;
                $image->save($path . $image_name);
                $ip_img = $image_name;
            } catch (\Exception $exp) {
                Session()->flash('warning', 'image upload failed !');
                return redirect()->back();
            }

            $foodplan->plan_image = $ip_img;
        }

        $foodplan->save();
        $specified_planId = $foodplan->id;
        $compositionsizeofplan = DB::table('plancomposes')->where('plan_id', $specified_planId)->get();

        if (sizeof($compositionsizeofplan) > 0) {
            DB::table('plancomposes')->where('plan_id', $specified_planId)->delete();
        }

        if (sizeof($request->nutrition) > 0) {
            foreach ($request->nutrition as $key => $value) {
                $plancom = new Plancompose();
                $plancom->plan_id = $specified_planId;
                $plancom->nutrition = $value;
                $plancom->unit = $request->unit[$key];
                $plancom->gramvalue = $request->gramvalue[$key];
                $plancom->dmvalue = $request->dmvalue[$key];
                $plancom->save();
            }
        }



        Session()->flash('success', 'Plan Updated Successfully!');
        return $this->planslisting();
    }

    public function addplandays($id)
    {

        $planid = $id;
        $food_plan = Foodplan::find($id);
        $planname = $food_plan->plan_name;
        $plandays = Planday::where('plan_id', $id)->get();
        $plandetail = DB::select("SELECT plandays.id,plandays.plan_id as planid,plandays.day_id,plandetails.food_item_id,plandetails.food_type_id FROM plandays LEFT JOIN plandetails ON plandays.day_id = plandetails.day_id WHERE plandays.plan_id=$planid");


        return view('admin.frontendsetting.plandays', compact('planid', 'planname', 'plandays', 'plandetail'));
    }

    public function adddaysofplans($id)
    {
        $planid = $id;
        $food_plan = Foodplan::find($id);
        $planname = $food_plan->plan_name;
        $fooditems = FoodItems::select('id', 'food_name')->get();
        return view('admin.frontendsetting.formplandays', compact('planid', 'planname', 'fooditems'));
    }

    public function storeplandayfood(Request $request)
    {
        $result = Planday::select('*')->where('plan_id', $request->plan_id)->where('day_id', $request->day)->get();
        if (sizeof($result) > 0) {
            Session()->flash('warning', 'This day is already created');
            return redirect()->back();
        } else {
            if (isset($request->fooditem) && sizeof($request->fooditem) > 0) {
                $addplandays = new Planday();
                $addplandays->plan_id = $request->plan_id;
                $addplandays->day_id = $request->day;
                $addplandays->save();


                foreach ($request->fooditem as $key => $item) {
                    $plandetail = new Plandetail();
                    $plandetail->plan_id = $request->plan_id;
                    $plandetail->day_id = $request->day;
                    $plandetail->food_item_id = $item;
                    $plandetail->food_type_id = $request->food_type[$key];
                    $plandetail->save();
                }
                Session()->flash('success', 'Plan Created Successfully!');
                return $this->addplandays($request->plan_id);
            } else {
                Session()->flash('warning', 'Please add food items!');
                return redirect()->back();
            }
        }
    }

    public function edit_plandayrecord($id, $day)
    {
        $planid = $id;
        $food_plan = Foodplan::find($id);
        $planname = $food_plan->plan_name;
        $day_schedule = Plandetail::select('*')->where('plan_id', $id)->where('day_id', $day)->get();
        $sizeof_totalfoods = sizeof($day_schedule);
        $fooditems = FoodItems::select('id', 'food_name')->get();
        return view('admin.frontendsetting.editplanday', compact('planid', 'planname', 'day_schedule', 'day', 'fooditems', 'sizeof_totalfoods'));
    }

    public function update_plandayrecord(Request $request, $id)
    {
        $dayid = $request->selected_day;
        DB::table('plandetails')->where('plan_id', $id)->where('day_id', $dayid)->delete();

        foreach ($request->fooditem as $key => $item) {
            $plandetail = new Plandetail();
            $plandetail->plan_id = $id;
            $plandetail->day_id = $dayid;
            $plandetail->food_item_id = $item;
            $plandetail->food_type_id = $request->food_type[$key];
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

        $result = FoodItems::select('sku')->take(1)->orderBy('id', 'DESC')->get();
        $com_sku;
        if (sizeof($result) > 0) {
            $sku = $result[0]->sku;
            $sku = explode('lpfi', $sku);
            $sku = $sku[1];
            $sku = $sku + 1;
            $com_sku = 'lpfi' . $sku;
        } else {
            $com_sku = 'lpfi' . '1';
        }



        //image operation
        if ($request->hasFile('food_image')) {
            try {
                $path = 'assets/user/images/foods/';
                $ip_img = "";
                foreach ($request->food_image as $food_image) {

                    $input_image = Image::make($food_image);
                    $image = $input_image->resize(800, 800);
                    $image_name = $food_image->getClientOriginalName();
                    $image_name = Carbon::now()->format('YmdHs') . '_' . $image_name;
                    $image->save($path . $image_name);
                    $ip_img .= $image_name . ',';
                }
            } catch (\Exception $exp) {
                Session()->flash('warning', 'image upload failed !' . $exp);
                return redirect()->back();
            }
        } else {
            Session()->flash('warning', 'image not found !');
            return redirect()->back();
        }

        //trim last comma
        $foodImg = substr($ip_img, 0, -1);
        $foprice = $request->food_price;
        $food_price = (int)(($foprice * 1000)) / 1000;
        $food_price = number_format((float)$food_price, 3, '.', '');


        $foodItems = new  FoodItems();
        $foodItems->food_name = $request->food_name;
        $foodItems->food_category_id = $request->food_category_id;
        $foodItems->food_type = $request->food_type;
        $foodItems->sku = $com_sku;
        $foodItems->food_price = $food_price;
        $foodItems->calories = $request->calories;
        $foodItems->food_description = $request->food_description;
        $foodItems->food_image = $foodImg;
        $foodItems->save();
        $lastid = $foodItems->id;
        $nut = $request->input('nutrition');
        for ($i = 0; $i < count($nut); $i++) {
            $data = [
                'food_id' => $lastid,
                'type' => $nut[$i],
                'unit' => $request->input('unit')[$i],
                'gramvalue' => $request->input('gmvalue')[$i],
                'dmvalue' => $request->input('dmvalue')[$i],
            ];
            DB::table('compostions')->insert($data);
        }

        //redirect
        Session()->flash('success', 'Successfully inserted !');
        return redirect()->back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function foodeditmodal(Request $res)
    {


        $data = array();

        $result1 = DB::table('food_items')->where('id', $res->id)->get();
        $result = DB::table('compostions')->where('food_id', $res->id)->get();
        $result3 = count($result);
        $data['result'] = $result;
        $data['result1'] = $result1;


        return response()->json(['result' => $result, 'result1' => $result1, 'result3' => $result3]);
    }

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

        $foodItems = FoodItems::find($request->ids);

        $foprice = $request->food_price;
        $food_price = (int)(($foprice * 1000)) / 1000;
        $food_price = number_format((float)$food_price, 3, '.', '');


        $foodItems->food_name = $request->food_name;
        $foodItems->food_category_id = $request->food_category_id;
        $foodItems->food_type = $request->food_type;
        $foodItems->food_price = $food_price;
        $foodItems->food_description = $request->food_description;

        //image operation
        if ($request->hasFile('food_image')) {
            try {

                $path = 'assets/user/images/foods/';

                //delete old image
                foreach (explode(',', $foodItems->food_image) as $f_image) {
                    $location = $path . $f_image;
                    if (file_exists($location)) {
                        unlink($location);
                    }
                }

                //upload new image

                $ip_img = "";
                foreach ($request->food_image as $food_image) {
                    $input_image = Image::make($food_image);
                    $image = $input_image->resize(800, 800);
                    $image_name = $food_image->getClientOriginalName();
                    $image_name = Carbon::now()->format('YmdHs') . '_' . $image_name;
                    $image->save($path . $image_name);
                    $ip_img .= $image_name . ',';
                }
            } catch (\Exception $exp) {
                Session()->flash('warning', 'image upload failed !');
                return redirect()->back();
            }



            //trim last comma
            $foodImg = substr($ip_img, 0, -1);
            $foodItems->food_image = $foodImg;
        }

        $foodItems->save();

        $lastid = $foodItems->id;
        DB::table('compostions')->where('food_id', $lastid)->delete();
        $nut = $request->input('nutrition');
        for ($i = 0; $i < count($nut); $i++) {
            $data = [
                'food_id' => $lastid,
                'type' => $nut[$i],
                'unit' => $request->input('unit')[$i],
                'gramvalue' => $request->input('gmvalue')[$i],
                'dmvalue' => $request->input('dmvalue')[$i],
            ];
            DB::table('compostions')->insert($data);
        }

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
    public function destroy(Request $request, $id)
    {
        $foodItems = FoodItems::find($request->id);

        $path = 'assets/user/images/foods/';

        //delete old image
        foreach (explode(',', $foodItems->food_image) as $fo_image) {
            $location = $path . $fo_image;
            if (file_exists($location)) {
                unlink($location);
            }
        }


        FoodItems::find($request->id)->delete();

        //redirect
        Session()->flash('success', 'successfully deleted !');
        return redirect()->back();
    }


    public function mealsplanoption()
    {
        $plancategory = DB::table('planoptionmeals')->select('id', 'category_name')->get();
        return view('admin.frontendsetting.planoptionmeal', compact('plancategory'));
    }

    public function createplanoptionmeal(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
        ]);
        DB::table('planoptionmeals')->insert(['category_name' => $request->category_name]);

        Session()->flash('success', 'Plan With Options Meal Added Successfully!');
        return redirect()->back();
    }

    public function updateplanoptionmeal(Request $request)
    {
        DB::table('planoptionmeals')->where('id', $request->id)->update(['category_name' => $request->food_category]);
        Session()->flash('success', 'Plan With Options Meal Updated Successfully!');
        return redirect()->back();
    }

    public function delete_mealsplanoption(Request $request)
    {
        DB::table('planoptionmeals')->where('id', $request->id)->delete();
        Session()->flash('success', 'Plan With Options Meal Deleted Successfully!');
        return redirect()->back();
    }

    public function planoptioncategories()
    {
        $plancategory = DB::table('catoptionplans')->select('id', 'category_name', 'category_image')->get();
        return view('admin.frontendsetting.planoptionscatgories', compact('plancategory'));
    }

    public function createplanoptioncategory(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
        ]);


        $catimage = '';
        if ($request->hasFile('category_image')) {
            try {

                $path = 'assets/user/images/planoptions/';


                $ip_img = "";
                $food_image = $request->category_image;
                $input_image = Image::make($food_image);
                $image = $input_image->resize(800, 800);
                $image_name = $food_image->getClientOriginalName();
                $image_name = Carbon::now()->format('YmdHs') . '_' . $image_name;
                $image->save($path . $image_name);
                $ip_img = $image_name;
            } catch (\Exception $exp) {
                Session()->flash('warning', 'image upload failed !');
                return redirect()->back();
            }

            $catimage = $ip_img;
        }


        DB::table('catoptionplans')->insert(['category_name' => $request->category_name, 'category_image' => $catimage]);

        Session()->flash('success', 'Plan With Options Category Added Successfully!');
        return redirect()->back();
    }

    public function delete_planoptioncategory(Request $request)
    {
        DB::table('catoptionplans')->where('id', $request->id)->delete();
        Session()->flash('success', 'Plan With Options Category Deleted Successfully!');
        return redirect()->back();
    }

    public function updateplanoptioncat(Request $request)
    {

        if ($request->hasFile('category_image')) {
            try {

                $path = 'assets/user/images/planoptions/';


                $ip_img = "";
                $food_image = $request->category_image;
                $input_image = Image::make($food_image);
                $image = $input_image->resize(800, 800);
                $image_name = $food_image->getClientOriginalName();
                $image_name = Carbon::now()->format('YmdHs') . '_' . $image_name;
                $image->save($path . $image_name);
                $ip_img = $image_name;
            } catch (\Exception $exp) {
                Session()->flash('warning', 'image upload failed !');
                return redirect()->back();
            }

            DB::table('catoptionplans')->where('id', $request->id)->update(['category_name' => $request->food_category, 'category_image' => $ip_img]);
        } else {
            DB::table('catoptionplans')->where('id', $request->id)->update(['category_name' => $request->food_category]);
        }



        Session()->flash('success', 'Plan With Options Category Updated Successfully!');
        return redirect()->back();
    }

    public function plansoptionlisting()
    {
        $foodplan = Planoption::all();
        $plancategory = DB::table('catoptionplans')->select('id', 'category_name')->get();
        return view('admin.frontendsetting.plansoption', compact('foodplan', 'plancategory'));
    }

    public function createplanoptions()
    {
        $plancategory = DB::table('catoptionplans')->select('id', 'category_name')->get();
        return view('admin.frontendsetting.createplanoption', compact('plancategory'));
    }

    public function storeplanoptions(Request $request)
    {
        $foodplan = new Planoption();
        $foodplan->plan_name = $request->plan_name;
        $foodplan->plan_description = $request->plan_description;
        $foodplan->category_id = $request->category_id;
        $foodplan->plan_calories = $request->plan_calories;


        if ($request->hasFile('plan_image')) {
            try {

                $path = 'assets/user/images/planoptions/';

                //upload new image

                $ip_img = "";
                $food_image = $request->plan_image;
                $input_image = Image::make($food_image);
                $image = $input_image->resize(290, 290);
                $image_name = $food_image->getClientOriginalName();
                $image_name = Carbon::now()->format('YmdHs') . '_' . $image_name;
                $image->save($path . $image_name);
                $ip_img = $image_name;
            } catch (\Exception $exp) {
                Session()->flash('warning', 'image upload failed !');
                return redirect()->back();
            }

            $foodplan->plan_image = $ip_img;
        }




        $foodplan->save();
        $specified_planId = $foodplan->id;

        if (sizeof($request->nutrition) > 0) {
            foreach ($request->nutrition as $key => $value) {
                $plancom = new Plancompostion();
                $plancom->plan_id = $specified_planId;
                $plancom->nutrition = $value;
                $plancom->unit = $request->unit[$key];
                $plancom->gmvalue = $request->gmvalue[$key];
                $plancom->dmvalue = $request->dmvalue[$key];
                $plancom->save();
            }
        }
        Session()->flash('success', 'Plan With Options Created Successfully!');
        return redirect()->route('admin.plansoption');
    }


    public function delete_planoptions(Request $request)
    {

        DB::table('planoptdetails')->where('planoptions_id', $request->id)->delete();

        DB::table('planoptlistmeals')->where('planopt_id', $request->id)->delete();

        DB::table('planoptions')->where('id', $request->id)->delete();
        Session()->flash('success', 'Plan With Options Deleted Successfully!');
        return redirect()->back();
    }



    public function planoptions_edit($id)
    {
        $fooditems = Planoption::find($id);
        $plancategory = DB::table('catoptionplans')->select('id', 'category_name')->get();
        $plancompostions = DB::table('plancompostions')->where('plan_id', $id)->get();
        return view('admin.frontendsetting.planoptionupdate', compact('id', 'fooditems', 'plancategory', 'plancompostions'));
    }

    public function planoptions_update(Request $request, $id)
    {
        $foodplan = Planoption::find($id);
        $foodplan->plan_name = $request->plan_name;
        $foodplan->category_id = $request->category_id;
        $foodplan->plan_calories = $request->plan_calories;
        $foodplan->plan_description = $request->plan_description;

        if ($request->hasFile('plan_image')) {
            try {

                $path = 'assets/user/images/planoptions/';

                //upload new image

                $ip_img = "";
                $food_image = $request->plan_image;
                $input_image = Image::make($food_image);
                $image = $input_image;
                $image = $input_image->resize(290, 290);
                $image_name = $food_image->getClientOriginalName();
                $image_name = Carbon::now()->format('YmdHs') . '_' . $image_name;
                $image->save($path . $image_name);
                $ip_img = $image_name;
            } catch (\Exception $exp) {
                Session()->flash('warning', 'image upload failed !');
                return redirect()->back();
            }

            $foodplan->plan_image = $ip_img;
        }


        $foodplan->save();
        $specified_planId = $foodplan->id;

        $compositionsizeofplan = DB::table('plancompostions')->where('plan_id', $specified_planId)->get();

        if (sizeof($compositionsizeofplan) > 0) {
            DB::table('plancompostions')->where('plan_id', $specified_planId)->delete();
        }

        if (sizeof($request->nutrition) > 0) {
            foreach ($request->nutrition as $key => $value) {
                $plancom = new Plancompostion();
                $plancom->plan_id = $specified_planId;
                $plancom->nutrition = $value;
                $plancom->unit = $request->unit[$key];
                $plancom->gmvalue = $request->gmvalue[$key];
                $plancom->dmvalue = $request->dmvalue[$key];
                $plancom->save();
            }
        }



        Session()->flash('success', 'Plan With Options Updated Successfully!');
        return redirect()->route('admin.plansoption');
    }


    public function planoptions_mealslist($id)
    {
        $planid = $id;
        $all_mealoptionsdays = Planoptlistmeal::where('planopt_id', $planid)->get();
        $food_plan = Planoption::find($id);
        $planname = $food_plan->plan_name;
        $mealstype = DB::table('planoptionmeals')->select('id', 'category_name')->get();
        return view('admin.frontendsetting.planoptions_mealslist', compact('planid', 'planname', 'mealstype', 'all_mealoptionsdays'));
    }

    public function addplanoptions_mealfood($id)
    {
        $planid = $id;
        $food_plan = Planoption::find($id);
        $planname = $food_plan->plan_name;
        $mealstype = DB::table('planoptionmeals')->select('id', 'category_name')->get();
        return view('admin.frontendsetting.planoptioncreatemeals', compact('planid', 'planname', 'mealstype'));
    }

    public function storeplanoptions_meal(Request $request)
    {
        $result = DB::table('planoptlistmeals')->where('planopt_id', $request->plan_id)->where('meal_type', $request->meal_type)->get();

        if (sizeof($result) > 0) {
            Session()->flash('warning', 'This Meal is already exist!');
            return redirect()->back();
        } else {
            $path = 'assets/user/images/planoptions/';

            $Poptlistmeal = new Planoptlistmeal();
            $Poptlistmeal->planopt_id = $request->plan_id;
            $Poptlistmeal->meal_type = $request->meal_type;
            $Poptlistmeal->price = $request->price;

            $food_image1 = $request->single_img;
            $input1_image = Image::make($food_image1);
            $image1 = $input1_image;
            $image_name1 = $food_image1->getClientOriginalName();
            $image_name1 = Carbon::now()->format('YmdHs') . '_' . $image_name1;
            $image1->save($path . $image_name1);
            $Poptlistmeal->single_img = $image_name1;

            $Poptlistmeal->save();



            foreach ($request->meal_name as $key => $item) {
                $plandetail = new Planoptdetail();
                $plandetail->planoptions_id = $request->plan_id;
                $plandetail->meal_type = $request->meal_type;
                $plandetail->food_name = $item;
                $plandetail->food_type = $request->food_type[$key];

                $ip_img = "";
                $food_image = $request->meal_image[$key];
                $input_image = Image::make($food_image);
                $image = $input_image;
                $image_name = $food_image->getClientOriginalName();
                $image_name = Carbon::now()->format('YmdHs') . '_' . $image_name;
                $image->save($path . $image_name);
                $ip_img = $image_name;


                $plandetail->food_image = $ip_img;



                $plandetail->save();
            }
            Session()->flash('success', 'Plan With Options Meal Added Successfully!');
            return $this->planoptions_mealslist($request->plan_id);
        }
    }

    public function editplanoptions_mealfood($id, $meal_type)
    {
        $planid = $id;
        $food_plan = Planoption::find($id);
        $planname = $food_plan->plan_name;
        $mealstype = $meal_type;
        $planoptdetails = DB::table('planoptdetails')->where('planoptions_id', $id)->where('meal_type', $meal_type)->get();

        $planoptmealslist = DB::table('planoptionmeals')->where('id', $meal_type)->get();

        $planoptionlistmeals = DB::table('planoptlistmeals')->where('planopt_id', $planid)->where('meal_type', $meal_type)->get();
        $planoptionlistmeals = $planoptionlistmeals[0];
        $specific_price = $planoptionlistmeals->price;
        $single_img = $planoptionlistmeals->single_img;


        $sizeOfTotalFoods = sizeof($planoptdetails);

        return view('admin.frontendsetting.editplanoptions_meal', compact('planid', 'planname', 'mealstype', 'planoptdetails', 'sizeOfTotalFoods', 'specific_price', 'planoptmealslist', 'single_img'));
    }

    public function updateplanoptions_meal(Request $request)
    {

        if (isset($request->single_img)) {
            $path = 'assets/user/images/planoptions/';
            $ip_img = "";
            $food_image = $request->single_img;
            $input_image = Image::make($food_image);
            $image = $input_image;
            $image_name = $food_image->getClientOriginalName();
            $image_name = Carbon::now()->format('YmdHs') . '_' . $image_name;
            $image->save($path . $image_name);

            DB::table('planoptlistmeals')->where('planopt_id', $request->planid)->where('meal_type', $request->mealtype)->update(['price' => $request->price, 'single_img' => $image_name]);
        } else {
            DB::table('planoptlistmeals')->where('planopt_id', $request->planid)->where('meal_type', $request->mealtype)->update(['price' => $request->price]);
        }


        $path = 'assets/user/images/planoptions/';
        foreach ($request->meal_name as $key => $item) {
            if ($key < $request->sizeof_totalfoods) {
                if ($request->food_type[$key]) {
                    $key = $key + 1;
                    $newvalue = $request->input('prime_id_' . $key);
                    $key = $key - 1;

                    if (isset($request->meal_image[$key])) {
                        $ip_img = "";
                        $food_image = $request->meal_image[$key];
                        $input_image = Image::make($food_image);
                        $image = $input_image;
                        $image_name = $food_image->getClientOriginalName();
                        $image_name = Carbon::now()->format('YmdHs') . '_' . $image_name;
                        $image->save($path . $image_name);
                        $ip_img = $image_name;

                        DB::table('planoptdetails')->where('id', $newvalue)->where('planoptions_id', $request->planid)->where('meal_type', $request->mealtype)->update(['food_name' => $item, 'food_type' => $request->food_type[$key], 'food_image' => $ip_img]);
                    } else {
                        DB::table('planoptdetails')->where('id', $newvalue)->where('planoptions_id', $request->planid)->where('meal_type', $request->mealtype)->update(['food_name' => $item, 'food_type' => $request->food_type[$key]]);
                    }
                }
            } else {

                $ip_img = "";
                $food_image = $request->meal_image[$key];
                $input_image = Image::make($food_image);
                $image = $input_image;
                $image_name = $food_image->getClientOriginalName();
                $image_name = Carbon::now()->format('YmdHs') . '_' . $image_name;
                $image->save($path . $image_name);
                $ip_img = $image_name;

                $plandetail = new Planoptdetail();
                $plandetail->planoptions_id = $request->planid;
                $plandetail->meal_type = $request->mealtype;
                $plandetail->food_name = $item;
                $plandetail->food_type = $request->food_type[$key];
                $plandetail->food_image = $ip_img;
                $plandetail->save();
            }
        }
        Session()->flash('success', 'Plan With Options Meal Updated Successfully!');
        return $this->planoptions_mealslist($request->planid);
    }


    public function planoptionmealdelete(Request $request)
    {
        $rec = DB::table('planoptdetails')->where('id', $request->rowId)->delete();
        return response()->json(['result' => 'true']);
    }


    public function delete_planoptionsmeal(Request $request)
    {
        DB::table('planoptdetails')->where('planoptions_id', $request->id)->where('meal_type', $request->mealtype)->delete();

        DB::table('planoptlistmeals')->where('planopt_id', $request->id)->where('meal_type', $request->mealtype)->delete();

        Session()->flash('success', 'Plans Options Meal Deleted Successfully!');
        return redirect()->back();
    }
}
