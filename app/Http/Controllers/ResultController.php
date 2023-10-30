<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultController extends Controller
{
    function getResult(Request $request)
    {
        $validatedData = $request->validate([
            'vehicleType' => 'string|required|exists:vehicle_types,category',
            'energy' => 'string|required|exists:energies,name',
            'mileage' => 'string|required|exists:mileages,wording',
            'year' => 'string|required|exists:years,wording',
            'passenger' => 'integer|required|exists:passengers,count'
        ]);
    }
}
