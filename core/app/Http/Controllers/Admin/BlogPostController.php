<?php

namespace App\Http\Controllers\Admin;

use App\BlogCategory;
use App\BlogPost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogCategories = BlogCategory::all();
        $posts = BlogPost::all();
        return view('admin.frontendsetting.blog.index', compact('posts', 'blogCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogCategories = BlogCategory::all();
        return view('admin.frontendsetting.blog.create', compact('blogCategories'));
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
            'blog_title' => 'required|unique:blog_posts',
            'blogContent' => 'required',
            'category' => 'required',
            'post_image' => 'required',

        ]);

        //image operation
        if ($request->hasFile('post_image')) {
            try {

                $path = 'assets/user/images/posts/';

                $input_image = Image::make($request->post_image);
                $image = $input_image->resize(800, 533);
                $image_name = $request->file('post_image')->getClientOriginalName();
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
        $blogpost = new BlogPost();

        $blogpost->blog_title = $request->blog_title;
        $blogpost->blog_content = $request->blogContent;
        $blogpost->blog_category_id = $request->category;
        $blogpost->blog_photo = $image_name;
        $blogpost->blog_slug = str_slug($request->blog_title);

        $blogpost->save();
        //redirect
        Session()->flash('success', 'Promotion successfully Created !');
        return redirect()->route('admin.post.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $blogpost = BlogPost::find($id);
        $blogCategories = BlogCategory::all();
        return view('admin.frontendsetting.blog.edit', compact('blogpost', 'blogCategories'));
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
            'blog_title' => 'required',
            'blogContent' => 'required',
            'category' => 'required',

        ]);

        //Update Query
        $blogpost = BlogPost::find($id);
        $blogpost->blog_title = $request->blog_title;
        $blogpost->blog_content = $request->blogContent;
        $blogpost->blog_category_id = $request->category;
        $blogpost->blog_slug = str_slug($request->blog_title);

        //image update
        if ($request->hasFile('post_image')) {

            //delete old image
            $path = 'assets/user/images/posts/';
            $location = $path . $blogpost->blog_photo;
            if (file_exists($location)) {
                unlink($location);
            }

            //upload new image
            $input_image = Image::make($request->post_image);
            $image = $input_image->resize(800, 533);
            $image_name = $request->file('post_image')->getClientOriginalName();
            $image_name = Carbon::now()->format('YmdHs') . '_' . $image_name;
            $image->save($path . $image_name);

            //image update
            $blogpost->blog_photo = $image_name;
        }


        $blogpost->save();
        //redirect
        Session()->flash('success', 'Promotion successfully Updated !');
        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $blogpost = BlogPost::find($request->id);
        $path = 'assets/user/images/posts/';

        if (file_exists($path . $blogpost->blog_photo)) {
            unlink($path . $blogpost->blog_photo);
        }

        BlogPost::find($request->id)->delete();
        //redirect
        Session()->flash('success', 'Promotion deleted successfully!');
        return redirect()->back();
    }
}
