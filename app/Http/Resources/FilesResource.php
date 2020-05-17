<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FilesResource extends JsonResource
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
            'id' => $this->id,
            'name'=> $this->name,
            'model_id'=>$this->model_id,
            'url' => $this->getFullUrl(),
            'path'=>$this->getPath(),
            'type' => $this->mime_type,
           
        ];
       // return parent::toArray($request);
    }
}
