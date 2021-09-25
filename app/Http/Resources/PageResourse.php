<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PageResourse extends JsonResource
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
            'name'=>$this->title,
            'description_ar'=>strip_tags($this->dec_ar),
            'description_en'=>strip_tags($this->dec_en),
            
            
        ];     }
}
