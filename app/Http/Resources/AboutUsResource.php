<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutUsResource extends JsonResource
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
                    'title'=>$this->title,
                    'description'=>$this->description,
                    'image'=>$this->image ? $this->image->getUrl() : '/images/default.jpg' ,     

                    'created_at'=>$this->created_at,
                    'updated_at'=>$this->updated_at,

        ];
    }
}
