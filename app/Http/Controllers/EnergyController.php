<?php

namespace App\Http\Controllers;

use App\Http\Resources\EnergyResource;
use App\Models\Energy;
use Illuminate\Http\Request;

class EnergyController extends Controller
{
    function index()
    {
        $energies = Energy::all();

        return EnergyResource::collection($energies);
    }
}
