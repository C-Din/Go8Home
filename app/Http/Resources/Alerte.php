<?php

namespace App\Http\Resources;

use App\Http\Resources\Client;
use Illuminate\Http\Resources\Json\JsonResource;

class Alerte extends JsonResource
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
            'montantMin' => $this->montantMin,
            'montantMax' => $this->montantMax,
            'lieu' => new Lieu($this->lieu),
            'client' => new Client($this->client),
            'typeBien' => new TypeBien($this->typeBien)
        ];
    }
}
