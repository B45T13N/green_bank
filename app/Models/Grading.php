<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Nette\Schema\ValidationException;

class Grading extends Model
{
    use HasFactory;

    public function energy(): BelongsTo
    {
        return $this->belongsTo(Energy::class);
    }

    public function mileage(): BelongsTo
    {
        return $this->belongsTo(Mileage::class);
    }

    public function year(): BelongsTo
    {
        return $this->belongsTo(Year::class);
    }

    public function vehicle_type(): BelongsTo
    {
        return $this->belongsTo(VehicleType::class);
    }
}
