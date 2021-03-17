<?php

namespace App\Http\Controllers\Admin;

use App\FoodCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foodCategory = FoodCategory::all();
        return view('admin.frontendsetting.foodCategory',compact('foodCategory'));
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
            'food_category' => 'required',
            'category_status' => 'required',
        ]);


        $foodCategory = new  FoodCategory();
        $foodCategory->food_category_name = $request->food_category;
        $foodCategory->status = $request->category_status;
        $foodCategory->food_category_slug = str_slug($request->food_category);
        $foodCategory->save();

        //redirect
        Session()->flash('success', 'Success !');
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
            'food_category' => 'required',
            'category_status' => 'required',
        ]);

        $foodCategory = FoodCategory::find($request->id);
        $foodCategory->food_category_name = $request->food_category;
        $foodCategory->status = $request->category_status;
        $foodCategory->save();

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
        FoodCategory::find($request->id)->delete();

        //redirect
        Session()->flash('success', 'successfully deleted !');
        return redirect()->back();
    }
}
