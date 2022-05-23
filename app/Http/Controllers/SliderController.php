<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
class SliderController extends Controller
{
    public function index(){
        return view('admin.sliders.index')->with('sliders',Slider::get());
    }
    public function create(){
        return view('admin.sliders.create');
    }
    public function store(Request $request){
        $slider =new Slider();
        $slider->image = $request->image->store('slider');
        $slider->save();
        return redirect()->back()->with(['success'=>'تم الاضافة بنجاح']);
    }
     public function destroy($id)
    {
        $slider =Slider::find($id);
        $slider->delete();
        return redirect()->back()->with(['success'=>'تم الحذف بنجاح']);
    }
}
