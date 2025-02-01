<?php

declare(strict_types=1);

namespace App\Http\Resources\Api\V1\Cargo;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CargoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->whenHas('id'),
            'name' => $this->whenHas('name'),
            'cargo_fee' => $this->whenHas('cargo_fee'),
        ];
    }
}
