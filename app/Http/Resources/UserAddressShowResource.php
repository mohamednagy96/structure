<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserAddressShowResource extends JsonResource
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
            'city'=>['id'=>$this->id,'name'=>$this->city->name],
            'country'=>['id'=>$this->city->country->id,'name'=>$this->city->country->name],
            'street'=>$this->street,
            'building'=>$this->building,
            'floor'=>$this->floor,
            'apartment'=>$this->apartment
        ];
        // return parent::toArray($request);
    }
}
