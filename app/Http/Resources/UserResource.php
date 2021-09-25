<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'image'=>$this->image == null ? asset('uploads/defult.png') : asset('uploads/'.$this->image),
            'DOB'=>$this->DOB,
            'address'=>$this->address,

            'gender'=>$this->gender == 1 ? trans('data.male') : trans('data.female'),
        ];  
      }
}
