<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'title' => $this->title,
            'slug' => $this->slug,
            'auteur' => $this->auteur,
            'photo' => $this->photo,
            'content' => $this->content,
            'comments' => $this->comments,
            'category' => CategoryResource::collection($this->categories ?? 'no categories'),
            'created_ad' => $this->created_ad,
            'updated_ad' => $this->updated_ad,
        ];
    }
}
