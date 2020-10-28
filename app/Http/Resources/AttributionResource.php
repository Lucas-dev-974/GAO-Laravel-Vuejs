<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AttributionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $client = new ClientResource($this->client);
        return [
            'id' => $this->id,
            'horaire' => $this->horaire,
            'date' => $this->date,
            'client' => $client
        ];
    }
}
