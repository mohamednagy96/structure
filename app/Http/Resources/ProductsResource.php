<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'description'=>substr($this->description, 0, 30),
            'slug' => $this->slug,
            'category'=>$this->category_id,
            'price'=>$this->price,
            'stock'=>$this->stock,
            'image' => $this->image ? $this->image->getUrl() : '/images/default.jpg'
            
        ];
        //return parent::toArray($request);
    }
}
