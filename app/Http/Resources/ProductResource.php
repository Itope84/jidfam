<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'category' => $this->category->name,
            'category_id' => $this->category_id,
            'unit' => $this->unit,
            'price' => $this->price,
            'available_units' => $this->units,
            // 'tags' => TagResource::collection($this->tags),
            'images' => $this->getImagesUrl(),
            'links' => [
                'self' => route('product.single', ['product' => $this->id])
            ]
        ];
    }
}
