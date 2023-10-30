<?php

namespace App\Http\Resources;

use App\Models\Grading;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BorrowingRateResource extends JsonResource
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
            'score' => $this->score,
            'rate' => $this->rate,
        ];

        return $data;
    }
}
