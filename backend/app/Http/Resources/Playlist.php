<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Playlist extends JsonResource
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
            'user' => $this->user,
            'name' => $this->name,
            'playlists' => $this->playlists,
            'clips' => $this->clips,
            'likes' => $this->likes,
            'comments' => $this->comments,
        ];
    }
}
