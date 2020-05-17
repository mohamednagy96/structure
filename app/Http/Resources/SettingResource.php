<?php

namespace App\Http\Resources;

use App\Models\Setting;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if($this->key == 'social_links'){
            $this->value=json_decode($this->value);
        }
        if($this->key == 'website_logo'){
            $this->value= $this->image ? $this->image->getUrl() : '/images/default.jpg';
        }
        return[
            'id'=>$this->id,
            'key'=>$this->key,
            'value'=>$this->value,
        ];
      //  return parent::toArray($request);
    }
}
