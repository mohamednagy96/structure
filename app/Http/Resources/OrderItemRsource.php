<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemRsource extends JsonResource
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
             'product_id'=>$this->product_id,
              'quantity'=>$this->quantity,
              'price'=>$this->price,
              'total_price'=>$this->total_price,
             


        ];
     //   return parent::toArray($request);
    }
}
