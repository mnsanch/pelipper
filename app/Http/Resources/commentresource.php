<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Exception;


class commentresource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {   
        //if no resize image
    
        return [
            'id' => $this->id,
            'ID_User' => $this->ID_User,
            'ID_Post' => $this->ID_Post ,
            'Comment' => $this->Comment,
            'created_at' => $this->created_at?->toDateString(),
            'user' => $this->user
        ];
    }
}
