<?php

namespace App\Http\Controllers;

use App\Http\Resources\YearResource;
use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    function index()
    {
        $years = Year::all();

        return YearResource::collection($years);
    }
}
