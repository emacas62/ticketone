<?php

namespace App\Http\Resources;

class EventResource extends BaseResource {
    public function toArray($request) {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'date' => $this->date,
            'cover_url' => $this->cover_url,
            'address' => $this->address,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'views_count' => $this->views_count,
            'comments_count' => $this->comments_count,
            'likes_count' => $this->likes_count,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
