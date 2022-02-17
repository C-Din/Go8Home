<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Lieu extends JsonResource
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
          'region' => $this->region,
          'ville' => $this->ville,
          'quartier' => $this->quartier,
          'bp' => $this->bp
        ];
    }
}
