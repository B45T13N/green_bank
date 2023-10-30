<?php

namespace App\Http\Controllers;

use App\Http\Resources\MileageResource;
use App\Models\Mileage;
use Illuminate\Http\Request;

class MileageController extends Controller
{
    function index()
    {
        $mileages = Mileage::all();

        return MileageResource::collection($mileages);
    }
}
