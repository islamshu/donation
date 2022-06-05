<?php

namespace App\Http\Controllers;

use App\About;
use App\Gallary;
use App\Home;
use App\News;
use Nexmo\Laravel\Facade\Nexmo;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;

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
    function doLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',   // required and email format validation
            'password' => 'required', // required and number field validation

        ]); // create the validations
        if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
        {
            return response()->json($validator->errors(),422);  
            // validation failed return with 422 status

        } else {
            //validations are passed try login using laravel auth attemp
            if (\Auth::attempt($request->only(["email", "password"]))) {
                return response()->json(["status"=>true,"redirect_location"=>url("home")]);
                
            } else {
                return response()->json([["Invalid credentials"]],422);
                
            }
        }
    }

    function doRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',   // required and email format validation
            'password' => 'required|min:8', // required and number field validation
            'password_confirmation' => 'required|same:password',

        ]); // create the validations
        if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
        {
            return response()->json($validator->errors(),422);  
            // validation failed return back to form

        } else {
            //validations are passed, save new user in database
            $User = new User;
            $User->name = $request->name;
            $User->email = $request->email;
            $User->password = bcrypt($request->password);
            $User->save();
            
            return response()->json(["status"=>true,"msg"=>"You have successfully registered","redirect_location"=>url("/home")]);  
           
        }
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
