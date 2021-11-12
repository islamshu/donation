<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FamousResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'image'=>asset('uploads/'.$this->image),
            'gender'=>$this->gender == 1 ? trans('data.male') : trans('data.female'),
            'address'=>$this->address,

            'verify'=>$this->verify,
             'additanl'=>new MoreInfoResourse($this->moreInfo),
        ];  
    }
}
