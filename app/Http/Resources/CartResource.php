<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'unique_id' => $this->unique_id,
            'address'=> $this->address,
            'city_id'=> $this->city_id,
            'email'=> $this->email,
            'is_paid'=> $this->is_paid,
            'items'=> OrderItemResource::collection($this->items),
            'phone'=> $this->phone
        ];
    }
}
