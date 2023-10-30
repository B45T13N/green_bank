<?php

namespace App\Http\Controllers;

use App\Http\Resources\PassengerResource;
use App\Models\Passenger;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
    function index()
    {
        $passengers = Passenger::all();

        return PassengerResource::collection($passengers);
    }
}
