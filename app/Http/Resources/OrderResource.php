<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
        'user_id'=>$this->user_id,
        'total_price'=>$this->total_price,
        'sub_total'=>$this->sub_total,
        'items'=> OrderItemRsource::collection($this->orderItems)
        ];
        //return parent::toArray($request);
    }
}
