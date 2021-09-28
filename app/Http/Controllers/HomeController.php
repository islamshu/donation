<?php

namespace App\Http\Controllers;

use Nexmo\Laravel\Facade\Nexmo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // $notifications = auth()->user()->unreadNotifications;
    return redirect()->route('admin.dashboard');        

    }

}
