<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ContestCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'data' => $this->collection->map(function($data) {
                return [
                    'id'=>$data->id,
                    'title_ar' => $data->title_ar,
                    'title_en' => $data->title_en,
                    'code'=>$data->code,
                    'total_codes' => $data->total_codes,
                    'remain_codes' => $data->remain_codes,
                    'is_visible'=>$data->is_visible,
                    'winner_name' => @$data->winner->name == null ? trans('error.no winner'):$data->winner->name,
                    'prize'=>$data->prize,
                    'user_id'=>$data->user->id, 
                    'user_name'=>$data->user->name,
                      'user_more_info'=>new MoreInfoResourse($data->user->moreInfo),

                    'date_to_drow'=> Carbon::parse( @$data->date_to_drow)->format('d-m-Y h:m'),
                    'date_to_show'=>Carbon::parse( @$data->date_to_show)->format('d-m-Y h:m'),
                    'visitor'=>$data->count_visitor,   

                    'status'=>$this->get_status($data),
                    

                ];
              
            }),
        

        ];
    }
    protected function get_status($cont){
        $date = $cont->date_to_drow;
        
        if( Carbon::now() > $date){
            return 0;
        }elseif($cont->remain_codes != 0 && Carbon::now() < $date){
            return 1;
        }elseif($cont->remain_codes == 0 && Carbon::now() < $date){
            return 2;
        }
    }
    
    protected function winner($data){
        
        if($data->winner_id == null){
            $name = trans('error.no_name');
        }else{
            $name=$data->winner->name;
        }
        return $name;

    }
}
