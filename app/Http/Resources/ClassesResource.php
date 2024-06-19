<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClassesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            //'sections' => SectionResource::collection($this->whenLoaded('sections')),
            //'students' => StudentResource::collection($this->whenLoaded('students')),
            'user' => (new UserResource($this->whenLoaded('user'))),
        ];
    }
}
