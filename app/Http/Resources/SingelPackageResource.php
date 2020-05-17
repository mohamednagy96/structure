<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SingelPackageResource extends JsonResource
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
            'name'=>$this->name,
            'description'=>$this->description,
            'price'=>$this->price,
            'slug'=>$this->slug,
            'invisible'=>$this->invisible ? $this->invisible == 0 :'false' ? $this->invisible == 1 :'true' ,
            'color_picker'=>$this->color_picker ,
            'created_at'=>$this->created_at ,
            'updated_at'=>$this->updated_at ,

            'seo'=>$this->seo,

        ];
       // return parent::toArray($request);
    }
}

