<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Visuel extends JsonResource
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
            'typeVisuel' => $this->typeVisuel,
            'urlVisuel' => $this->urlVisuel,
            'bien' => new Bien($this->bien)
        ];
    }
}
