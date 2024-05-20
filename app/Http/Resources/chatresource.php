<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Exception;


class chatresource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {   
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'receiver_id' => $this->receiver_id,
            'chat' => $this->chat,
            'user' => $this->user,
            'user2' => $this->user2,
            'created_at' => $this->created_at?->toDateString()
        ];
    }
}
