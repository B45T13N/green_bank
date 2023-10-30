<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Year extends Model
{
    use HasFactory;

    public function notation(): HasOne
    {
        return $this->hasOne(Grading::class);
    }
}
