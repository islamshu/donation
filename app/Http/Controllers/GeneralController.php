<?php

namespace App\Http\Controllers;

use App\General;
use Illuminate\Http\Request;

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
}
