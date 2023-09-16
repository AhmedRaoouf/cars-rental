<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($this->img !== NULL){
            $image = asset("uploads/users/$this->img");
        }else{
            $image = 'Not Found';
        }

        return[
            'id' => $this->id,
            'username' => $this->username,
            'image'=>$image,
            'review'=>$this->pivot->review,
            'rate'=>$this->pivot->rate
        ];
    }
}
