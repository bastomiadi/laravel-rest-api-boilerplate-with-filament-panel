<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
            'class' => (new ClassesResource($this->whenLoaded('class'))),
            'user' => (new UserResource($this->whenLoaded('user'))),
            'section' => (new SectionResource($this->whenLoaded('section'))),
       ];
    }
}
