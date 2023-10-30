<?php

namespace App\Http\Controllers;

use App\Http\Resources\VehicleTypeResource;
use App\Models\VehicleType;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    function index()
    {
        $vehicleTypes = VehicleType::all();

        return VehicleTypeResource::collection($vehicleTypes);
    }
}
