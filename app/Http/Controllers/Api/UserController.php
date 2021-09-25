<?php

namespace App\Http\Controllers\Api;

use App\AdditionalUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\FamousResourse;
use App\Http\Resources\NotifcationCollection;
use App\Http\Resources\UserResource;
use App\IDFamous;
use App\Mail\mailerification;
use App\Mail\MailVerfication;
use App\User;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends BaseController
{
    public function register_famous(Request $request){
        $email = User::where('email',$request->email)->first();
        $postal = $request->postal;
        $phone = $request->phone;
        $phone_number =  $postal.$phone;
        $phone = User::where('phone',$phone_number)->first();
        if($email){
            return $this->sendError(trans('error.email_exists'));
        }
        if($phone){
            return $this->sendError(trans('error.phone_exists'));
        }
        if($request->password != $request->confirm_password){
            return $this->sendError(trans('error.password_match'));

        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
       

        $user->phone = $phone_number;
        $user->type = 'famous';
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $otp = rand(1000,9999); 
        $user->otp = $otp;
        $user->address_id = $request->address_id;
        if($request->image != null){
            $user->image = $request->image->store('user');
        }else{
            $user->image = 'user/deflut.png';
        }
        $user->save();
        sendSmsOtp($user->phone,$otp);
        $more = new AdditionalUser();
        $more->user_id = $user->id;
        $more->save();
        return $this->sendEmail($user);
    }
    public function register_user(Request $request){
        $email = User::where('email',$request->email)->first();
        $postal = $request->postal;
        $phone = $request->phone;
        $phone_number =  $postal.$phone;
        $phone = User::where('phone',$phone_number)->first();
        $phone = User::where('phone',$request->phone)->first();
        if($email){
            return $this->sendError(trans('error.email_exists'));
        }
        if($phone){
            return $this->sendError(trans('error.phone_exists'));
        }
        if($request->password != $request->confirm_password){
            return $this->sendError(trans('error.password_match'));

        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $phone_number;
        $user->type = 'famous';
        $user->DOB = $request->DOB;
        $user->type = 'user';
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $otp = rand(1000,9999); 
        $user->token= $request->header('X-Client-FCM-Token');

        $user->otp = $otp;
        $user->address_id = $request->address_id;
        if($request->image != null){
            $user->image = $request->image->store('user');
        }else{
            $user->image = 'user/deflut.png';
        }
        $user->save();
        sendSmsOtp($user->phone,$otp);
        return $this->sendEmail($user);
    }  
    public function sendEmail($user){
        Mail::to($user->email)->send(new MailVerfication($user));
        return $this->sendResponse('success',trans('success.Check_mail'));
    }
    public function verfiy_account(Request $request){
        $user = User::where('otp',$request->otp)->first();
        if(!$user){
          return $this->sendError(trans('error.no acount'));
        }
        return $this->LoginSuccess($user); 
    }
    public function login(Request $request)
    {
        if (!Auth::attempt(['phone' => $request->email, 'password' => $request->password])  ){
            if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])  ){
                return $this->sendError(trans('error.no user'));
            }
        }
        $user = $request->user();
        if($user->verfy_account != 1){
            return $this->sendError(trans('error.you need to verfy your account'));

        }
        $user->token = $request->header('X-Client-FCM-Token');
        $user->save();
        return $this->loginSuccess($user);
    }    
    public function LoginSuccess($user){
        $user->verfy_account = 1;
        $user->otp = null;
        $user->save();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->expires_at = Carbon::now()->addWeeks(100);
        $token->save();
        $success['access_token'] = $tokenResult->accessToken;
        $success['token_type']='Bearer';
        $success['expires_at']=Carbon::parse(
        $tokenResult->token->expires_at
        )->toDateTimeString();
        $success['user']=$user;
        return $this->sendResponse('success',$success);

    }
    public function logout()
    {
        $user =  auth('api')->user();
        if(!$user){
            return $this->sendError('error');
        }
        $user->token = null;
         $user->save();
         $user->token()->revoke();
        return $this->sendResponse('Logout', trans('success.Successfully logged out'));
    }
    public function forgit(Request $request){
        $user = User::where('email',$request->emailOrphone)->orWhere('phone',$request->emailOrphone)->first();
        if(!$user){
            return $this->sendError('there is no data here');
        }
        $user->otp = rand(1000,9999);
        $user->save();
        sendSmsOtp($user->phone,$user->otp);
        return $this->sendEmail($user);
    }
    public function reset(Request $request){
        $user = User::where('otp',$request->otp)->first();
        if($request->password != $request->confirm_password){
            return $this->sendError(trans('error.password_match'));
        }
        $user->otp=null;
        $user->password = bcrypt($request->password);
        $user->save();
        return $this->sendResponse('success','password change');
    }
    public function show_profile(){
        $user = auth('api')->user();
        // dd($user);
        if($user->type == 'user'){
            $userResoures =new UserResource($user);
            return $this->sendResponse($userResoures,trans('success.profile') );
        }else{
            $userResoures =new FamousResourse($user);
            return $this->sendResponse($userResoures,trans('success.profile') );
        }
        
    }
    public function change_password(Request $request){
        $user = auth('api')->user();
        // dd($user);
        $validation = Validator::make($request->all(),[ 
            'old_password' => 'required',
            'new_password' => 'required|different:old_password',
            'confirm_password' => 'required|same:new_password',
        ]);
        if($validation->fails()){
            return $this->sendError($validation->messages()->all());
        }
        if (Hash::check($request->old_password, $user->password)) { 
            // dd('dd');
            $user->password = bcrypt($request->new_password);
            $user->save();
    }else{
        return $this->sendError(trans('error.old passowrd error'));

    }
    if($user->type == 'user'){
        $userResoures =new UserResource($user);
        return $this->sendResponse($userResoures,trans('success.password has been changed') );
    }else{
        $userResoures =new FamousResourse($user);
        return $this->sendResponse($userResoures,trans('success.password has been changed') );
    }
}
    
    public function more_info(Request $request){
       $info = AdditionalUser::where('user_id',auth('api')->id())->first();
  
        $info->user_id =auth('api')->id();
        $info->twitter = $request->twitter;
        $info->snapchat = $request->snapchat;
        $info->instagram = $request->instagram;
        $info->tiktok = $request->tiktok;
        $info->pio = $request->pio;
       
        $info->save();  
        $userResoures =new FamousResourse(auth('api')->user());
            return $this->sendResponse($userResoures,trans('success.edit porfile') );
    }
    public function edit_profile(Request $request){
    
        $user = auth('api')->user();
        $validation = Validator::make($request->all(),[ 
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'required|unique:users,phone,'.$user->id,
        ]);
        if($validation->fails()){
            return $this->sendError($validation->messages()->all());
        }
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->address = $request->address_id;
        if($request->image != null){
            $user->image = $request->image->store('user');
        }
        if($user->type == 'user'){
            $user->DOB = $request->DOB;
        }
        
        $user->save();
        if($user->type == 'user'){
            $userResoures =new UserResource($user);
            return $this->sendResponse($userResoures,trans('success.edit porfile') );
        }else{
            $userResoures =new FamousResourse($user);
            return $this->sendResponse($userResoures,trans('success.edit porfile') );
        }


    }
    public function verfiy_account_famous(Request $request){
        $account = IDFamous::where('user_id',auth('api')->id())->first();
        if($account){
            return $this->sendError(trans('error.You have already sent your request'));
        }else{
            $account = new IDFamous();
            $account->user_id = auth('api')->id();
            $account->id_image = $request->id_image->store('user_id_image');
            $account->save();
            $userResoures =new FamousResourse(auth('api')->user());
            return $this->sendResponse($userResoures,trans('success.Your request has been successfully sent'));
        }
    
    }
    public function get_notofiaction(){
        $userCollection = new NotifcationCollection(auth('api')->user()->unreadNotifications()->get());
        return $this->sendResponse($userCollection,trans('success.Your request has been successfully sent'));

        
    }
}
