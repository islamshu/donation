<?php

namespace App\Http\Controllers;

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
}
