<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DestinationResource extends JsonResource
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
            'title' => strtoupper($this->name),
            'about' => $this->description,
            'posted_at' => $this->created_at->format('d M Y'),
            'link' => url('/api/destinations/' . $this->id),
        ];
    }
}
