<?php

namespace App\Http\Resources;

use App\Models\Director;
use App\Models\Genre;
use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

     public static $wrap = 'film';

    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->resource->id,
            'year' => $this->resource->year,
            'title' => $this->resource->title,
            'tagline' => $this->resource->tagline,
            'synopsis' => $this->resource->synopsis,
            'genre' => Genre::get()->where('id', $this->resource->genre),
            'director' => Director::get()->where('id', $this->resource->director)
        ];
    }
}
