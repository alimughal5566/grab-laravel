<?php

namespace App\Http\Controllers\Admin;

use App\GeneralSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneralSettingController extends Controller
{

    public function basicSettings()
    {
        $basicSetting = GeneralSetting::first();
        return view('admin.GeneralSetting.basicSettings',compact('basicSetting'));

    }

    public function BasicSettingsPro(Request $request)
    {
        //validation
        $this->validate($request, [
            'websiteTitle'   => 'required',
            'colorCode'   => 'required',
            'currencyText'   => 'required',
            'currencySymbol'   => 'required',
            'receiveEmail'   => 'required',

        ]);


        //update query
        $basicSetting = GeneralSetting::first();
        if (!$basicSetting) $basicSetting = new GeneralSetting;

        $basicSetting->websiteTitle = $request->websiteTitle;
        $basicSetting->colorCode = $request->colorCode;
        $basicSetting->currencyText = $request->currencyText;

        $basicSetting->currencySymbol = $request->currencySymbol;
        $basicSetting->receiveEmail = $request->receiveEmail;


        $basicSetting->save();


        //redirect
        Session()->flash('success', 'Content successfully updated!');

        return redirect()->back();

    }

    public function EmailSettings()
    {
        $basicSetting = GeneralSetting::first();
        return view('admin.GeneralSetting.EmailSettings',compact('basicSetting'));
    }


    public function EmailSettingsPro(Request $request)
    {
        //update query

        $basicSetting = GeneralSetting::first();
        $basicSetting->email_sent_form = $request->email_sent_from;
        $basicSetting->email_template = $request->email_template;
        $basicSetting->save();
        //redirect
        Session()->flash('success', 'Content successfully updated!');
        return redirect()->back();
    }

    public function SmsSettings()
    {
        $basicSetting = GeneralSetting::first();
        return view('admin.GeneralSetting.SmsSettings',compact('basicSetting'));
    }

    public function SmsSettingsPro(Request $request)
    {
        //update query

        $basicSetting = GeneralSetting::first();

        $basicSetting->sms_api = $request->sms_api;

        $basicSetting->save();


        //redirect
        Session()->flash('success', 'Content successfully updated!');
        return redirect()->back();
    }
}
