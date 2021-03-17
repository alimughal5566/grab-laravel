<?php

namespace App\Http\Controllers\Admin;

use App\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.frontendsetting.testimonials',compact('testimonials'));
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
            'name' => 'required',
            'designation' => 'required',
            'profile_photo' => 'required',
            'message' => 'required',
        ]);

        //image operation
        if( $request->hasFile('profile_photo') ) {
            try {

                $path = 'assets/user/images/testimonial/';

                $input_image = Image::make($request->profile_photo);
                $image = $input_image->resize(70, 70);
                $image_name = $request->file('profile_photo')->getClientOriginalName();
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

        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->profile_photo = $image_name;
        $testimonial->message = $request->message;

        $testimonial->save();
        //redirect
        Session()->flash('success', 'successfully Created !');
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
            'name' => 'required',
            'designation' => 'required',
            'designation' => 'required',
            'message' => 'required',
        ]);


        $testimonial = Testimonial::find($request->id);
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->message = $request->message;

        //image update
        if( $request->hasFile('profile_photo') ) {

            //delete old image
            $path = 'assets/user/images/testimonial/';
            $location = $path.$testimonial->profile_photo;
            if (file_exists($location)){
                unlink($location);
            }

            //upload new image
            $input_image = Image::make($request->profile_photo);
            $image = $input_image->resize(70, 70);
            $image_name = $request->file('profile_photo')->getClientOriginalName();
            $image_name = Carbon::now()->format('YmdHs').'_'.$image_name;
            $image->save($path.$image_name);

            //image update
            $testimonial->profile_photo = $image_name;
        }

        $testimonial->save();
        //redirect
        Session()->flash('success', 'successfully Created !');
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
        $testimonial = Testimonial::find($request->id);
        $path = 'assets/user/images/testimonial/';

        if (file_exists($path.$testimonial->profile_photo)){
            unlink($path.$testimonial->profile_photo);
        }

        Testimonial::find($request->id)->delete();

        //redirect
        Session()->flash('success', 'successfully deleted !');
        return redirect()->back();
    }
}
