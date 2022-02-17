<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Bien extends JsonResource
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
            'nombreChambre' => $this->nombreChambre,
            'superficie' => $this->superficie,
            'montant' => $this->montant,
            'etage' => $this->etage,
            'nombreEtage' => $this->nombreEtage,
            'typeAchat' => $this->typeAchat,
            'description' => $this->description,
            'typeBienId' => $this->typeBien,
            'lieuId' => $this->lieu,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
            'images'=>$this->visuel,
        ];
    }
}
