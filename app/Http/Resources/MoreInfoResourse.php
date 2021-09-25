<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MoreInfoResourse extends JsonResource
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
            'bio'=>$this->pio,
            'twitter'=>$this->twitter,
            'snapchat'=>$this->snapchat,
            'instagram'=>$this->instagram,
            'tiktok'=>$this->tiktok,
            
        ]; 
}
}