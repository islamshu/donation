<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Contest;
use App\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.contests.index')->with('contests',Contest::orderBy('id', 'DESC')->get());
    }
    public function contests( Request $request){
        // dd($request);
        $contest= Contest::query()->where('is_activity',0)->orderBy('id', 'DESC');
        if($request->status == 1){
            $contest->where('remain_codes','>',0)->where('date_to_drow','>',Carbon::now());
        }elseif($request->status == 2){
            $contest->Orwhere('date_to_drow','<',Carbon::now());
        }
        elseif($request->status == 3){
            $contest->where('remain_codes','==',0)->where('date_to_drow','>',Carbon::now());
        }
        return view('admin.contests.index')->with('contests',$contest->get())->with('request',$request);
    }
    public function activites(Request $request){
        $contest= Contest::query()->where('is_activity',1)->orderBy('id', 'DESC');
     
        if($request->status == 1){
            $contest->where('remain_codes','>',0)->where('date_to_drow','>',Carbon::now());
           
        }elseif($request->status == 2){
            $contest->where('date_to_drow','<',Carbon::now());
         
        }
        elseif($request->status == 3){
            $contest->where('remain_codes','==',0)->where('date_to_drow','>',Carbon::now());
        }
        return view('admin.contests.index')->with('contests',$contest->get())->with('request',$request); 
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contests.create')->with('users',User::where('verify',1)->where('type','famous')->get());
 
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
      
        $contest = new Contest();
        $contest->title_ar = $request->title_ar;
        $contest->title_en = $request->title_en;
        $contest->prize=$request->prize;
        $contest->user_id = $request->user_id;
        $contest->is_visible =1;
        $contest->total_codes=$request->total_codes;
        $contest->remain_codes = $request->total_codes;
        $show = str_replace('T',' ',$request->date_to_show) ;
        // dd($show);
        
        
        $drow = str_replace('T',' ',$request->date_to_drow ) ;
        // dd($show < $drow);
        if(($show < $drow && Carbon::now() < $drow  )){
          
            $contest->is_activity == $request->is_activity;
            $contest->date_to_show= $show;
            $contest->date_to_drow = $drow;
      

            $contest->code = generateNumber();
          
          
            if($request->is_activity == 1){
                if($request->lat == null || $request->long == null){
                    return redirect()->back()->with(['error'=>'يجب اضافة خط الطول والعرض لمكان الفعالية']) ->withInput($request->all())
                    ;
                }
                $contest->total_codes=-1;
                $contest->remain_codes = -1;
                $contest->save();
                $activity = new Activity();
                $activity->user_id = $request->user_id;
                $activity->lat = $request->lat;
                $activity->long = $request->long;
                $contest->update(['code'=>null]);
                $url = config('app.url').'/create_user_activiry/'.$contest->id;
                $image = QrCode::format('png')
                ->size(200)->errorCorrection('H')
                ->generate($url);
                $output_file =  time() . '.png';
        
        
                $file =  Storage::disk('local')->put($output_file, $image); 
                $activity->qr_code =$output_file;

       
                $activity->constant_id = $contest->id;
                $contest->update(['is_activity'=>1]);
                $activity->save();
                return redirect()->route('contests.index')->with(['success'=>'تمت الاضافة بنجاح']);

            }
            $contest->total_codes=$request->code;
            $contest->remain_codes = $request->code;
            $contest->save();
            return redirect()->route('contests.index')->with(['success'=>'تمت الاضافة بنجاح']);

        }
        return redirect()->back()->with(['error'=>'يوجد خطأ في توايخ المسابقة'])->withInput($request->all());
    
        
       


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
        return view('admin.contests.show')->with('con',Contest::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.contests.edit')->with('users',User::where('verify',1)->where('type','famous')->get())->with('con',Contest::find($id));
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
        $now = Carbon::now();
        $contest = Contest::find($id);
        $contest->title_ar = $request->title_ar;
        $contest->title_en = $request->title_en;
        $contest->prize=$request->prize;
        $contest->user_id = $request->user_id;
        $contest->is_visible =1;
        $contest->total_codes=$request->total_codes;
        $contest->remain_codes = $request->total_codes;
        $show = str_replace('T',' ',$request->date_to_show) ;
        // dd($show);
        $contest->is_activity = (int)$request->is_activity;

        
        $drow = str_replace('T',' ',$request->date_to_drow ) ;
        // dd($show < $drow);
        if(($show < $drow && Carbon::now() < $drow  )){
          
           
            $contest->date_to_show= $show;
            $contest->date_to_drow = $drow;
      

            $contest->code = generateNumber();

          
            if($request->is_activity == 1){
               
                if($request->lat == null || $request->long == null){
                    return redirect()->back()->with(['error'=>'يجب اضافة خط الطول والعرض لمكان الفعالية']) ->withInput($request->all());
                }
                $contest->total_codes=-1;
                $contest->remain_codes = -1;
                $contest->save();

                $activity = $contest->actitvity;
                if($activity == null){
                    $activity = new Activity(); 
                }
                $activity->user_id = $request->user_id;
                $activity->lat = $request->lat;
                $activity->long = $request->long;
                $contest->update(['code'=>null]);
                $url = config('app.url').'/create_user_activiry/'.$contest->id;
                if(  $activity->qr_code == null){
                    $image = QrCode::format('png')
                    ->size(200)->errorCorrection('H')
                    ->generate(route('api.create_user_activiry',$contest->id));
                    $output_file =  time().'.png';
                    $file =  Storage::disk('local')->put($output_file, $image); 
                    $activity->qr_code =$output_file;
                }

       
                $activity->constant_id = $contest->id;
                $contest->update(['is_activity'=>1]);
                $activity->save();
                return redirect()->route('contests.index')->with(['success'=>'تم التعديل بنجاح']);

            }else{
                if($contest->actitvity != null){
                    $activity = $contest->actitvity->delete();
                }
                $contest->total_codes=$request->code;
                $contest->remain_codes = $request->code;
                $contest->save();
            }

            
            
            return redirect()->route('contests.index')->with(['success'=>'تم التعديل بنجاح']);

        }
        return redirect()->back()->with(['error'=>'يوجد خطأ في توايخ المسابقة'])->withInput($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contest::find($id)->delete();
        return redirect()->route('contests.index')->with(['success'=>'تم الحذف بنجاح']);

    }
}
