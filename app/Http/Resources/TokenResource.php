<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TokenResource extends JsonResource
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
            'symbol' => $this->symbol,
            'last_price' => $this->last_price,
            'price_change_percent' => $this->price_change_percent,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
