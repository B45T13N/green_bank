<?php

namespace App\Http\Resources;

use App\Models\Grading;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'id' => $this->id,
            'category' => $this->category,
            'weight' => $this->weight,
        ];

        $data['notation'] = new GradingResource(Grading::query()->find($this->notation_id));

        return $data;
    }
}
