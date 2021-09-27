<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Auth;
class AdminController extends Controller
{
    public function get_login()
    {
        return view('admin.partials.login');
    }
    public function post_login(Request $request)
    {
        // dd($request);
        $remember_me = $request->has('remember_me') ? true : false;
        if (Auth::guard('admin')->attempt(['email' => $request->input("useremail"), 'password' => $request->input("userpass")], $remember_me)) {
            // dd('dd');
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('get_login');
    }
    public function profile(){
        $admin = Admin::first();
        return view('admin.profile')->with('admin',$admin);
    }
    public function store(Request $request){
        $admin = Admin::first();
        $request_all =  $request->except(['password']);
        if($request->password != null){
            $request_all['password'] = bcrypt($request->password);
        }
        $admin->update($request_all);

        return redirect()->back()->with(['success'=>'تم تعديل بنجاح']);
    }
}
