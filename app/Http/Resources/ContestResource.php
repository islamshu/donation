<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ContestResource extends JsonResource
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
            'winner_name' => $this->winner($this->winner_id),
            'prize'=>$this->prize,
            'user_name'=>$this->user->name,
            'user_id'=>$this->user->id,
            'date_to_drow'=> Carbon::parse( @$this->date_to_drow)->format('d-m-Y h:m'),
                    'date_to_show'=>Carbon::parse( @$this->date_to_show)->format('d-m-Y h:m'),
            'status' =>$this->get_status($this),    
            'visitor'=>$this->count_visitor,   
        ];
        
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
