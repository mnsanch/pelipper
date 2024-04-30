<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Exception;


class pruebaresource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {   
        //if no resize image
    
        $resized_image="";
        try {
            $resized_image = $this->getMedia('*');//[0]->getUrl('resized-image');
           // return resized_image;
            if(count($resized_image) != 0){
               // $resized_image = $resized_image[0]->getUrl('resized-image');
            }
        } catch (Exception $e) {
            $resized_image="";
        }
        return [
            'id' => $this->id,
            'Title' => $this->Title,
            'ID_Category' => $this->categories,
            'ID_User' => $this->ID_User,
            'Usuario' => $this->nombre_usuario,
            'Post' => $this->Post,
            'Upvote' => $this->Upvote,
            'Downvote' => $this->Downvote,
            'Totalvotes' => $this->Totalvotes,
            'Avatar' => $this->Avatar,
            'comments' => $this->comments,
            'votes' => $this->votes,
            'original_image' => count($this->getMedia('*')) > 0 ? $this->getMedia('*')[0]->getUrl() : null,
            'resized_image' => $resized_image,
            'created_at' => $this->created_at?->toDateString()
        ];
    }
}
