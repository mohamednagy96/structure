<?php

namespace App\Http\Resources;

use App\Models\UserAddress;
use Illuminate\Http\Resources\Json\JsonResource;

class UserOrderResource extends JsonResource
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
            'user_address'=>$this->user_address_id ? UserAddress::find($this->user_address_id)->name : null, 
            'shipping'=>$this->shipping->name,
            'payment'=>$this->payment->name,
            'status'=>$this->status->name,
            'total_price'=>$this->total_price,
            'shipping_fees'=>$this->shipping_fees,
            'payment_fees'=>$this->payment_fees,
            'sub_total'=>$this->sub_total,
            'tax'=>$this->tax,
            'created_at'=>$this->created_at
        ];
        // return parent::toArray($request);
    }
}
