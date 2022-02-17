<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Favori extends JsonResource
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
            'etat'=>$this->etat,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
            'bien' => new Bien($this->bien),
            'client' => new Client($this->client)
        ];
    }
}
