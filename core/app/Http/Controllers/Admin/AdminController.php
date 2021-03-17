<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admins;
use App\Roles;
use Image;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admins::all();
        $roles = DB::table('roles')->get();
        return view('admin.admin.index', compact('roles', 'admin'));
    }


    public function store(Request $request)
    {

        $admins = new Admins();
        $admins->name = $request->input('name');
        $admins->userName = $request->input('userName');
        $admins->email = $request->input('email');
        $admins->password = hash::make($request->input('password'));
        $admins->role_id = $request->input('role_id');
        $admins->save();
        //redirect
        Session()->flash('success', 'Successfully inserted !');
        return redirect()->back();
    }

    public function edit($id)
    {
    }


    public function adminseditmodal(Request $res)
    {


        $data = array();
        $result = DB::table('admins')->where('id', $res->id)->get();
        $data['result'] = $result;
        return response()->json(['result' => $result]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id)
    {


        $admins = Admins::find($request->id);


        $admins->name = $request->name;
        $admins->userName = $request->userName;
        $admins->email = $request->email;
        $admins->role_id = $request->role_id;
        $admins->save();

        //redirect
        Session()->flash('success', 'Updated !');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $admins = Admins::find($request->id);
        $admins->delete();
        //redirect
        Session()->flash('success', 'successfully deleted !');
        return redirect()->back();
    }
}
