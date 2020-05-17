<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'images'=> $this->images()->count() ? $this->images->map(function($image){ return $image->getUrl(); })->toArray() : ['/images/default.jpg'],
        ];

        //return parent::toArray($request);
    }
}
