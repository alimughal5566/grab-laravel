<?php

namespace App\Http\Controllers\Admin;

use App\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogCategories = BlogCategory::all();
        return view('admin.frontendsetting.blogCategory', compact('blogCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


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
            'status' => 'required',

        ]);


        //insert query
        $blogCategory = new BlogCategory();

        $blogCategory->name = $request->name;
        $blogCategory->status = $request->status;
        $blogCategory->save();

        //redirect
        Session()->flash('success', 'Category successfully Created !');

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
            'status' => 'required',
        ]);

        $blogCategory = BlogCategory::find($request->id);
        $blogCategory->name = $request->name;
        $blogCategory->status = $request->status;
        $blogCategory->save();
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
        BlogCategory::find($request->id)->delete();

        //redirect
        Session()->flash('success', 'successfully deleted !');
        return redirect()->back();
    }
}
