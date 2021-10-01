<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ActivityCollection extends ResourceCollection
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
                    'winner_name' => $this->winner($data),
                    'prize'=>$data->data,
                    'user_name'=>$data->user->name,
                    'user_id'=>$data->user->id,
                  
                    'date_to_drow'=> Carbon::parse( @$data->date_to_drow)->format('d-m-Y h:m'),
                    'date_to_show'=>Carbon::parse( @$data->date_to_show)->format('d-m-Y h:m'),
        
                    // 'date_to_drow_with_time'=>$this->date_to_drow.' '.$this->time_to_drow,           
                    'actitivty_data'=>$this->get_actitvity($data),
                    'visitor'=>$data->count_visitor,   

                    'status'=>$this->get_status($data),
                    

                ];
              
            }),
        

        ];
    }
    
    protected function get_actitvity($data){
        $array = [];
        // dd($data->actitvity);
        $array['user_id'] = @$data->actitvity->user_id;
        $array['lat'] = @$data->actitvity->lat;
        $array['long'] = @$data->actitvity->long;
        $array['qr_code'] = asset('uploads/'.@$data->actitvity->qr_code);
        $array['constant_id'] = (@$data->actitvity->constant_id);
        return $array;
    
    
    
    
        }
        protected function get_status($cont){
            $date = $cont->date_to_drow;
            
            if(  Carbon::now() > $date){
                return 0;
            }elseif($cont->remain_codes != 0 && Carbon::now() < $date){
                return 1;
            }elseif($cont->remain_codes == 0 && Carbon::now() < $date){
                return 2;
            }
        }
        protected function winner($data){
            // dd($data);
            if($data->winner_id_activity == null){
                $name = trans('error.no_name');
            }else{
                
                $name=$data->winner_activity->first . ' '. $data->winner_activity->secand ;
            }
            return $name;
    
        }
      }
    
    

