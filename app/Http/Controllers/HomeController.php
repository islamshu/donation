<?php

namespace App\Http\Controllers;

use App\About;
use App\Gallary;
use App\Home;
use App\News;
use Nexmo\Laravel\Facade\Nexmo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   
    public function indexpage()
    {
        $about = Home::first();
        return view('admin.home')->with('about',$about);
    }
    public function storepage(Request $request)
    {
        $about = Home::first();
        if(!$about){
            $about = new Home();
        }
        $about->body = $request->body;
        $about->save();
        return redirect()->back()->with(['success'=> trans('Added successfully')]);
        }
    public function login()
    {
        return redirect()->route('admin.dashboard');
    }
    public function index()
    {
        $news = Home::first();
        return view('front.index')->with('home',$news);
    }
    public function new($id)
    {
        $news = News::find($id);
        return view('front.single_new')->with('new',$news);
    }
    public function news()
    {
        $news = News::paginate(4);
        return view('front.news')->with('news',$news);
    }
    public function about_us()
    {
        $news = About::first();
        return view('front.about')->with('about',$news);
    }
    public function gallery(){
        $gals = Gallary::paginate(6);
        return view('front.gallery')->with('gals',$gals);
    }
    public function gallery_single($id){
        $gals = Gallary::find($id);
        return view('front.gallery_single')->with('gal',$gals);
    }
    public function contact()
    {
        return view('front.contact');
    }
    
}
