<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PrizeRequest as Prize;

class PrizeRequestController extends Controller
{
     public function index()
    {
        return view('admin.prize_request.index')->with('prizes',Prize::get());
    }
    public function show($id){
        return view('admin.prize_request.show')->with('prize',Prize::find($id));
  
    }
}
