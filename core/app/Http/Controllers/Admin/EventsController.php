<?php

namespace App\Http\Controllers\Admin;

use App\Events;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Banner;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Events::all();
        return view('admin.frontendsetting.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.frontendsetting.events.create');
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
            'event_title'   => 'required',
            'event_date' => 'required',
            'event_duration' => 'required',
            'Description' => 'required',
            'event_image' => 'required',
        ]);

        //image operation
        if ($request->hasFile('event_image')) {
            try {

                $path = 'assets/user/images/events/';

                $input_image = Image::make($request->event_image);
                $image = $input_image->resize(1000, 870);
                $image_name = $request->file('event_image')->getClientOriginalName();
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
        $events = new Events();

        $events->event_title = $request->event_title;
        $events->event_date = $request->event_date;
        $events->event_duration = $request->event_duration;
        $events->Description = $request->Description;
        $events->event_image = $image_name;
        $events->event_slug = str_slug($request->event_title);

        $events->save();
        //redirect
        Session()->flash('success', 'Event successfully Created !');
        return redirect()->route('admin.events.index');
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
        $events = Events::find($id);
        return view('admin.frontendsetting.events.edit', compact('events'));
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
            'event_title'   => 'required',
            'event_date' => 'required',
            'event_duration' => 'required',
            'Description' => 'required',
        ]);


        //Update Query
        $events = Events::find($id);
        $events->event_title = $request->event_title;
        $events->event_date = $request->event_date;
        $events->event_duration = $request->event_duration;
        $events->Description = $request->Description;
        $events->event_slug = str_slug($request->event_title);

        //image update
        if ($request->hasFile('event_image')) {

            //delete old image
            $path = 'assets/user/images/events/';
            $location = $path . $events->event_image;
            if (file_exists($location)) {
                unlink($location);
            }

            //upload new image
            $input_image = Image::make($request->event_image);
            $image = $input_image->resize(800, 533);
            $image_name = $request->file('event_image')->getClientOriginalName();
            $image_name = Carbon::now()->format('YmdHs') . '_' . $image_name;
            $image->save($path . $image_name);

            //image update
            $events->event_image = $image_name;
        }


        $events->save();
        //redirect
        Session()->flash('success', 'Event successfully Updated !');
        return redirect()->route('admin.events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $events = Events::find($request->id);
        $path = 'assets/user/images/events/';

        if (file_exists($path . $events->event_image)) {
            unlink($path . $events->event_image);
        }

        Events::find($request->id)->delete();
        //redirect
        Session()->flash('success', 'successfully deleted !');
        return redirect()->back();
    }

    public function bannerlist()
    {
        $banner = banner::select('id', 'image')->get();
        return view('admin.frontendsetting.bannerlist', compact('banner'));
    }

    public function bannerupdate(Request $request, $id)
    {
        //validation
        $this->validate($request, [
            'bannerimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=870,height=200',
        ]);
        //Update Query
        $events = banner::find($id);
        //image update
        if ($request->hasFile('bannerimage')) {

            //delete old image
            $path = 'assets/admin/img/banner/';
            $location = $path . $events->image;
            if (file_exists($location)) {
                unlink($location);
            }

            //upload new image
            $input_image = Image::make($request->bannerimage);
            $image = $input_image->resize(800, 533);
            $image_name = $request->file('bannerimage')->getClientOriginalName();
            $image_name = Carbon::now()->format('YmdHs') . '_' . $image_name;
            $image->save($path . $image_name);

            //image update
            $events->image = $image_name;
        }


        $events->save();
        //redirect
        Session()->flash('success', 'Banner successfully Updated !');
        return redirect('admin/bannerlist');
    }
}
