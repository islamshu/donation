<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('admin.about')->with('about',$about);
    }
    public function store(Request $request)
    {
        $about = About::first();
        if(!$about){
            $about = new About();
        }
        $about->body = $request->body;
        $about->save();
        return redirect()->back()->with(['success'=> trans('Added successfully')]);
        }
}
