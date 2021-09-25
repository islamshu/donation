<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GenerealResourse extends JsonResource
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
            'name_ar'=>$this->name_ar,
            'name_en'=>$this->name_ar,
            'logo'=>asset('uploads/'.$this->logo),
            'email'=>$this->email,
            'phone'=>$this->phone,
            'twitter'=>$this->twitter,
            'facebbok'=>$this->facebbok,
            'tiktok'=>$this->tiktok,
            'instagram'=>$this->instagram,
            'snapchat'=>$this->snapchat,
            
        ];     }
}
