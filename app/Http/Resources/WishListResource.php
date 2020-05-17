<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WishListResource extends JsonResource
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
            'image' => $this->image ? $this->image->getUrl() : '/images/default.jpg',
            // 'products'=>WishListProductResource::collection($this->products)
        ];
       // return parent::toArray($request);
    }
}
