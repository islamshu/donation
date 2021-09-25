<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResourse extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title_ar' => $this->title_ar,
            'title_en' => $this->title_en,
            'code'=>$this->code,
            'total_codes' => $this->total_codes,
            'remain_codes' => $this->remain_codes,
            'is_visible'=>$this->is_visible,
            'winner_name' => $this->userCactitcity($this->winner_id_activity),
            'prize'=>$this->prize,
            'user_name'=>$this->user->name,
            'user_id'=>$this->user->id,
          
            'date_to_drow'=> Carbon::parse( @$this->date_to_drow)->format('d-m-Y h:m'),
            'date_to_show'=>Carbon::parse( @$this->date_to_show)->format('d-m-Y h:m'),

            // 'date_to_drow_with_time'=>$this->date_to_drow.' '.$this->time_to_drow,           
            'actitivty_data'=>$this->get_actitvity($request),
            'visitor'=>$this->count_visitor,   

            'status'=>$this->get_status($request),

        ];
        
    }

    protected function get_actitvity($request){
    $array = [];
    $array['user_id'] = $this->actitvity->user_id;
    $array['lat'] = $this->actitvity->lat;
    $array['long'] = $this->actitvity->long;
    $array['qr_code'] = asset('uploads/'.$this->actitvity->qr_code);
    $array['constant_id'] = ($this->actitvity->constant_id);
    return $array;




    }
    protected function get_status($cont){
        $date = $cont->date_to_drow.' '.$cont->time_to_drow;
        
        if($cont->remain_codes == 0 ||  Carbon::now() > $date){
            return 0;
        }elseif($cont->remain_codes != 0 && Carbon::now() < $date){
            return 1;
        }elseif($cont->remain_codes == 0 && Carbon::now() < $date){
            return 2;
        }
    }
    protected function winner($winner_id){
        if($winner_id == null){
            $name = trans('error.no_name');
        }else{
            $name=$this->winner->name;
        }
        return $name;

    }
}
