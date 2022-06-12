<?php

namespace App\Http\Controllers;

use App\AdditionalUser;
use App\City;
use App\Mail\Confremiation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function doLogin(Request $request)
    {

     dd('dddd');
        
    }

    function doRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',   // required and email format validation
            'password' => 'required|min:8', // required and number field validation
            'confirm_password' => 'required|same:password',

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
            
            return response()->json(["status"=>true,"msg"=>"You have successfully registered, Login to access your dashboard","redirect_location"=>url("login")]);  
           
        }
    }
    public function index()
    {
        return view('admin.users.index')->with('users',User::get());
    }
    public function paindUser()
    {
        return view('admin.users.index')->with('users',User::onlyBanned()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_notify($id)
    {
        $notification = auth()->user()->notifications()->where('id', $id)->first();

        if ($notification) {
            $notification->markAsRead();
            return redirect($notification->data['url']);
        }
    }
    public function update_status($id)
    {
        $user = User::find($id);
        $user->status  = 1;
        $user->save();
        return redirect()->back()->with(['success' =>trans('Edited successfully')]);

    }
    public function user()
    {
        return view('admin.users.index')->with('users',User::withoutBanned()->where('type','user')->get());
    }
    public function famous()
    {
        return view('admin.users.index')->with('users',User::withoutBanned()->where('type','famous')->get());
    }
    public function verfy_account(Request $request){
        $user = User::find($request->id);
        $user->verify = $request->status;
        $user->save();
        if($user->verify == 1){
            Mail::to($user->email)->send(new Confremiation($user));
        }
    }
    public function create()
    {
        return view('admin.users.create')->with('citys',City::get());
    }
    public function panUser($id){
        $user = User::find($id);
        $user->ban();
        return redirect()->back()->with(['success'=>'تم حظر العضو بنجاح']);
    }
    public function unpanUser($id){
        $user = User::find($id);
        $user->unban();
        // dd($user->isNotBanned());
        return redirect()->back()->with(['success'=>'تم إلغاء حظر العضو بنجاح']);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required|email|unique:users,email',
            'name'=>'required',
            'password'=>'required',

        ]);
        $request_all = $request->except(['password','type']);
        $request_all['password'] = bcrypt($request->password);

      $user =   User::create($request_all);

        return redirect()->route('users.index')->with(['success'=>'تم الإضافة بنجاح']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.users.show')->with('user',User::with('moreInfo')->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.users.edit')->with('user',User::find($id))->with('citys',City::get());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'email'=>'required|email|unique:users,email,'.$user->id,
            'phone'=>'required|unique:users,phone,'.$user->id,
            'name'=>'required',
            'type'=>'required',
            'gender'=>'required',
            'address_id'=>'required'
        ]);
        $request_all = $request->except(['password','type']);
        $request_all['type']=$request->type;
        if($request->password != null){
            $request_all['password'] = bcrypt($request->password);
        }
        if($request->image != null){
            $request_all['image'] = $request->image->store('user');
        }

        $user->update($request_all);
        if($user->type == 'famous'){
            $add = AdditionalUser::where('user_id',$id)->first();
            if(!$add){
                $more = new AdditionalUser();
                $more->user_id = $user->id;
                $more->save();
            }
        }
        
    
        return redirect()->route('users.index')->with(['success'=>'تم الإضافة بنجاح']);

    }
 
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->back()->with(['success'=> trans('Deleted successfully')]);

    }
}
