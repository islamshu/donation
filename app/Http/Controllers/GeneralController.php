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
        $request_all = $request->except(['logo','big_logo']);
        if($request->logo != null){
            $request_all['logo'] = $request->logo->store('logo');
        }
        if($request->big_logo != null){
            $request_all['big_logo'] = $request->big_logo->store('big_logo');
        }
        $general->update($request_all);
        return redirect()->back()->with(['success'=> trans('Edit successfully')]);
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
    public function get_pusher_setting(){
        return view('admin.setting.pusher');
        
    }
    public function env_key_update(Request $request)
    {
        // dd($request);
        foreach ($request->types as $key => $type) {
            put_permanent_env($type, $request[$type]);
        }
        // Artisan::call('config:clear');
     
     

        return redirect()->back()->with(['success'=> trans('Edit successfully')]);

    }
    public function show_translate()
    {
        $language = 'en';

        return view('admin.language_view_en', compact('language'));
    }
 
    public function key_value_store(Request $request)
    {
        $data = openJSONFile($request->id);
        foreach ($request->key as $key => $key) {
            $data[$key] = $request->key[$key];
        }
        saveJSONFile($request->id, $data);
        return back();
    }
    
}
