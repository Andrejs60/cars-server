<?php

namespace App\Http\Resources;

use App\Http\Resources\ManufacturerResource;
use App\Http\Resources\FuelTypeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
        "id" => $this->id,
        "name" => $this->name,
        "manufacturer" => new ManufacturerResource($this->manufacturer), 
        "fuel_type" => new FuelTypeResource($this->fuel_type), 
        "seats" => $this->seats,
        "doors" => $this->doors,
        "top_speed" => $this->top_speed,
        ];
    }
}
