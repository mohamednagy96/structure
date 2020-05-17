<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HeaderSliderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'title'=>$this->title,
            'description'=>$this->description,
            'button'=>$this->button,            
            'button_link'=>$this->button_link,
            'image'=>$this->image ? $this->image->getUrl() : '/images/default.jpg'        
        ];
        // return parent::toArray($request);
    }
}
