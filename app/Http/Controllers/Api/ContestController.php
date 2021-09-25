<?php

namespace App\Http\Controllers\Api;

use App\Activity;
use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contest;
use App\Contestant;
use Carbon\Carbon;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\ActivityCollection;
use App\Http\Resources\ActivityResourse;
use App\Http\Resources\ContestCollection;
use App\Http\Resources\ContestResource;
use App\Http\Resources\UserResource;
use App\Http\Traits\SendNotification;
use App\Notifications\NotWinnerrNotification;
use App\Notifications\WinnerNotification;
use App\SubActicity;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ContestController extends BaseController
{
    use SendNotification;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_all_contest()
    {
        $contestCollection =new ContestCollection(Contest::orderBy('id', 'DESC')->where('is_activity',0)->get());
        return $this->sendResponse($contestCollection,trans('success.all contest') );

    }
    public function get_all_activity()
    {
        $contestCollection =new ActivityCollection(Contest::orderBy('id', 'DESC')->where('is_activity',1)->get());
        return $this->sendResponse($contestCollection,trans('success.all activity') );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = Carbon::now();
        dd(auth('api')->user());
        if(auth('api')->user()->verfy_account != 1){
            
            return $this->sendError(trans('error.you need to verfy your acount'));
        }
        $contest = new Contest();
        $contest->title_ar = $request->title_ar;
        $contest->title_en = $request->title_en;
        $contest->prize=$request->prize;
        $contest->user_id = auth('api')->id();
        $contest->is_visible =$request->is_visible;
        $contest->total_codes=$request->total_codes;
        $contest->remain_codes = $request->total_codes;
        $show = $request->date_to_show .' '. $request->time_to_show;
        
        $drow = $request->date_to_drow .' '. $request->time_to_drow;
        if(($show < $drow && Carbon::now() < $request->date_to_drow  )){
                     
            $contest->is_activity == $request->is_activity;
            $contest->date_to_show= $show;
            $contest->date_to_drow = $drow;
            // $contest->time_to_show =  $request->time_to_show;
            // $contest->time_to_drow= $request->time_to_drow;

            $contest->code = generateNumber();
          
            $contest->save();
            if($request->is_activity == 1){
                if($request->lat == null || $request->long == null){
                    return $this->sendError(trans('error.you need to add lat and long to location'));
                }
                $activity = new Activity();
                $activity->user_id = auth('api')->id();
                $activity->lat = $request->lat;
                $activity->long = $request->long;
                $contest->update(['code'=>null]);
                $url = config('app.url').'/api/create_user_activiry/'.$contest->id;
                $image = QrCode::format('png')
                ->size(200)->errorCorrection('H')
                ->generate($url);
                $output_file =  time() . '.png';
        
        
                $file =  Storage::disk('local')->put($output_file, $image); 
                $activity->qr_code =$output_file;

       
                $activity->constant_id = $contest->id;
                $contest->update(['is_activity'=>1]);
                $activity->save();
                $activityResourse =new ActivityResourse(Contest::find($contest->id));
                return $this->sendResponse($activityResourse,trans('success.register true') );
            }else{
                $contestCollection =new ContestResource(Contest::find($contest->id));
                return $this->sendResponse($contestCollection,trans('success.register true') );
            }
            
        }
        return $this->sendError(trans('error.date'));
    
        
       


    }
    public function subscribe(Request $request){
        $contest = Contest::where('code',$request->code)->first();
        // dd($contest);
        // dd(auth('api')->id());
        if($contest->user_id == auth('api')->id()){
            return $this->sendError(trans('error.The contest owner cannot participate'));
        }
        if($contest){
         
            if(Contestant::where('user_id',auth('api')->id())->where('contest_id',$contest->id)->first()){
                
                return $this->sendError(trans('error.your alredy exits'));
            }
            if($contest->remain_codes > 0 || $contest->total_codes == -1){
        // $date =  $contest->date .' ';
       $show =  $contest->date_to_show;
       $drow =  $contest->date_to_drow;
    //    dd($show,$drow);
                // dd($show < Carbon::now());
       if($show < Carbon::now() && $drow  > Carbon::now()){
      
           $sub = new Contestant();
           $sub->user_id = auth('api')->id();
           $sub->contest_id = $contest->id;
           if($contest->total_codes != -1){
            $contest->remain_codes -= 1;
            $contest->save(); 
           }
           if($sub->save()){
               $contest->decrement('remain_codes',1);
               $success = 'success';
               return $this->sendResponse($success,trans('succuess.done subscribe'));
           } else{
            return $this->sendError(trans('error.time out '));
           }
       }else{
        return $this->sendError(trans('error.time not in '));

       } 
    }else{
        return $this->sendError(trans('error.There is no space'));
    }
    }
    return $this->sendError(trans('error.error code'));
    }
    public function choceWineer(Request $request){
       


       $contest = Contest::find($request->contest_id);
        // dd(auth('api')->id());
        if($contest->user_id == auth('api')->id()){
         if($contest->contentns->count() > 0){
            $winner = $contest->contentns->random(1)->first()->user_id;
            $contest->winner_id = $winner;
            $contest->save();
            $user = User::find($winner);
            $details = [
                'body_en' => trans('Congratulations, you won the contest!'),
                'body_ar' => trans('تهانينا , ربحت المسابقة'),

            ];

            $user->notify(new WinnerNotification($details));

           $this->notification($user->token, $details['body_ar'], $contest->title, 'contest');

           foreach($contest->contentns->where('user_id','!=',$winner) as $key => $contentns){
               $user_no_win= $contentns->user;
              
            $detaills = [
                'body_en' => 'Better luck next time',
                'body_ar' => 'حظا أوفر في مرة قادمة',

               ];
            
               $user_no_win->notify(new NotWinnerrNotification($detaills));
               $this->notification($user_no_win->token, $detaills['body_ar'], $contest->title, 'contest');
           }
         

            $user = new UserResource(User::find($winner));
            
            return $this->sendResponse($user,trans('succuess.winner'));
         }
          return $this->sendError(trans('error.no user to win'));

           
        }else{
            return $this->sendError(trans('error.not valid'));

        }
    

        

    }
    public function choceWineer_activity(Request $request){

        $contest = Contest::find($request->contest_id);
        if($contest->is_activity == 1 ){     
            // dd($cont/est->user_id);    
            // dd(auth('api')->id());
         if($contest->user_id == auth('api')->id()){
             if($contest->userCactitcity->count() > 0){
                $winner = $contest->userCactitcity->random(1)->first();
                $contest->winner_id_activity = $winner->id;
                $contest->save();
                return $this->sendResponse($winner,trans('succuess.winner'));
             }
             return $this->sendError(trans('error.no user to win'));

         }else{
             return $this->sendError(trans('error.not valid'));
 
         }
        }else{
            return $this->sendError(trans('error.its not activity'));

        }
     
 
         
 
     }
    public function create_user_activiry($id){
        $contest = Contest::find($id);
        return view('form_api.create')->with('contest',$contest)->with('cities',City::get());
    }
    public function subscribe_actitvty(Request $request){
        $contest = Contest::find($request->constant_id);
        $show =  $contest->date.' '.$contest->time_to_show;
        $drow =  $contest->date_to_drow.' '.$contest->time_to_drow;
        if($show <Carbon::now() && $drow  > Carbon::now()){
        $sub = new SubActicity();
        $sub->first = $request->first_name;
        $sub->secand = $request->secand_name;
        $sub->contest_id = $request->constant_id;
        $sub->city_id = $request->city_id;
        $sub->phone = $request->phone;
        if($sub->save()){
        return view('form_api.success');
        }
        return view('form_api.error');

    }
        return view('form_api.error');



    }
    public function my_contest(){
        // dd(auth('api')->id());
      $test=  Contest::whereHas('contentns', function ($query) {
        $query->where('user_id', '=', auth('api')->id());
           
    })->get();
        $contestCollection =new ContestCollection($test);
        return $this->sendResponse($contestCollection,trans('success.all_my_contest') );

    }
    

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contentn = Contest::find($id);
        if(!$contentn){
            return $this->sendError(trans('error.error Our'));

        }
        $contentn->increment('count_visitor');
        // $contentn->count_visitor =$contentn->count_visitor +1;
        // $contentn->save();
        if($contentn->is_activity == 1){
            $contestCollection =new ActivityResourse($contentn);
            return $this->sendResponse($contestCollection,trans('success.content') );  
        }
        $contestCollection =new ContestResource($contentn);
        return $this->sendResponse($contestCollection,trans('success.content') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $contest = Contest::find($request->contest_id);
        if(!$contest){
            return $this->sendError(trans('error.no Contest'));
        }
        $now = Carbon::now();
        if(auth('api')->user()->verfy_account != 1){
            return $this->sendError(trans('error.you need to verfy your acount'));
        }
        if(auth('api')->id() != $contest->user_id){
            return $this->sendError(trans('error.you condint edit this contest'));

        }
        $contest->title_ar = $request->title_ar;
        $contest->title_en = $request->title_en;
        $contest->prize=$request->prize;
        $contest->user_id = auth('api')->id();
        $contest->is_visible =$request->is_visible;
        $contest->total_codes=$request->total_codes;
        $contest->remain_codes = $request->total_codes;
        $show = $request->date_to_show .' '. $request->time_to_show;
        
        $drow = $request->date_to_drow .' '. $request->time_to_drow;
        if(($show < $drow && Carbon::now() < $request->date_to_drow  )){
                     
            $contest->is_activity == $request->is_activity;
            $contest->date_to_show= $show;
            $contest->date_to_drow = $drow;
            // $contest->time_to_show =  $request->time_to_show;
            // $contest->time_to_drow= $request->time_to_drow;

            // $contest->code = generateNumber();
          
            $contest->save();
            if($request->is_activity == 1){
                
                $activity = new Activity();
                if($request->lat == null || $request->long == null){
                    return $this->sendError(trans('error.you need to add lat and long to location'));
                }
                $activity->user_id = auth('api')->id();
                $activity->lat = $request->lat;
                $activity->long = $request->long;
                $contest->update(['code'=>null]);
                $image = QrCode::format('png')
                ->size(200)->errorCorrection('H')
                ->generate(route('api.create_user_activiry',$contest->id));
                $output_file =  time() . '.png';
        
        
                $file =  Storage::disk('local')->put($output_file, $image); 
                $activity->qr_code =$output_file;

       
                $activity->constant_id = $contest->id;
                $contest->update(['is_activity'=>1]);
                $activity->save();
                $activityResourse =new ActivityResourse(Contest::find($contest->id));
                return $this->sendResponse($activityResourse,trans('success.register true') );
            }else{
                $contestCollection =new ContestResource(Contest::find($contest->id));
                return $this->sendResponse($contestCollection,trans('success.register true') );
            }
            
        }
        return $this->sendError(trans('error.date'));
    

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
        //
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
