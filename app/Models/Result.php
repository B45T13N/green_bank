<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_type',
        'energy',
        'mileage',
        'year',
        'passenger',
        'bonus',
        'final_grading',
        'final_borrowing_rate',
        'borrowing_rate',
    ];
}
