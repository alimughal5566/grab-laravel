<?php

namespace App\Http\Controllers\Admin;

use App\OurChef;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class OurChefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chefs = OurChef::all();
        return view('admin.frontendsetting.ourchef', compact('chefs'));
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
            'name' => 'required',
            'designation' => 'required',
            'profile_photo' => 'required',

            'facebook' => 'required',
            'twitter' => 'required',
            'pinterest' => 'required',
            'linkedin' => 'required',
        ]);

        //image operation
        if ($request->hasFile('profile_photo')) {
            try {

                $path = 'assets/user/images/chefs/';

                $input_image = Image::make($request->profile_photo);
                $image = $input_image->resize(390, 518);
                $image_name = $request->file('profile_photo')->getClientOriginalName();
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

        $ourChef = new OurChef();
        $ourChef->name = $request->name;
        $ourChef->designation = $request->designation;
        $ourChef->profile_photo = $image_name;

        $ourChef->facebook = $request->facebook;
        $ourChef->twitter = $request->twitter;
        $ourChef->pinterest = $request->pinterest;
        $ourChef->linkedin = $request->linkedin;

        $ourChef->save();
        //redirect
        Session()->flash('success', 'successfully Created !');
        return redirect()->back();
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
            'name' => 'required',
            'designation' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'pinterest' => 'required',
            'linkedin' => 'required',
        ]);

        $ourChef = OurChef::find($request->id);
        $ourChef->name = $request->name;
        $ourChef->designation = $request->designation;
        $ourChef->facebook = $request->facebook;
        $ourChef->twitter = $request->twitter;
        $ourChef->pinterest = $request->pinterest;
        $ourChef->linkedin = $request->linkedin;

        //image operation
        if ($request->hasFile('profile_photo')) {
            try {

                //delete old image
                $path = 'assets/user/images/chefs/';
                $location = $path . $ourChef->profile_photo;
                if (file_exists($location)) {
                    unlink($location);
                }


                $input_image = Image::make($request->profile_photo);
                $image = $input_image->resize(390, 518);
                $image_name = $request->file('profile_photo')->getClientOriginalName();
                $image_name = Carbon::now()->format('YmdHs') . '_' . $image_name;
                $image->save($path . $image_name);
            } catch (\Exception $exp) {
                Session()->flash('warning', 'image upload failed !');
                return redirect()->back();
            }
            $ourChef->profile_photo = $image_name;
        }

        $ourChef->save();
        //redirect
        Session()->flash('success', 'successfully updated !');
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
        $ourChef = OurChef::find($request->id);
        $path = 'assets/user/images/chefs/';

        if (file_exists($path . $ourChef->profile_photo)) {
            unlink($path . $ourChef->profile_photo);
        }

        OurChef::find($request->id)->delete();

        //redirect
        Session()->flash('success', 'successfully deleted !');
        return redirect()->back();
    }
}
