<?php

namespace App\Http\Controllers;

use App\General;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class GeneralController extends Controller
{
    
    public function general(){
        return view('admin.general')->with('general',General::first());
    }
    public function update(Request $request){
        $general = General::first();
        $request_all = $request->except(['logo']);
        if($request->logo != null){
            $request_all['logo'] = $request->logo->store('logo');
        }
        $general->update($request_all);
        return redirect()->back()->with(['success'=>'تم التعديل بنجاح']);
    }
    public function get_mail_setting(){
        return view('admin.setting.mail');
    }
    public function get_nexmo_setting(){
        return view('admin.setting.nexmo');
    }
    public function get_firebase_setting(){
        return view('admin.setting.firebase');
    }
    public function env_key_update(Request $request)
    {
        // dd($request);
        foreach ($request->types as $key => $type) {
            put_permanent_env($type, $request[$type]);
        }
        // Artisan::call('config:clear');
     
     

        return redirect()->back()->with(['success'=>'تم التعديل بنجاح']);

    }
    
}
