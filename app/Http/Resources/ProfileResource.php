<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
            'first_name'=>$this->first_name,
            'middle_name'=>$this->middle_name,
            'last_name'=>$this->last_name,
            'mobile'=>$this->mobile,
            'email'=>$this->email
        ];
        // return parent::toArray($request);
    }
}
