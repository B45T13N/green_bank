<?php

namespace App\Http\Controllers;

use App\Http\Resources\BorrowingRateResource;
use App\Models\BorrowingRate;
use Illuminate\Http\Request;

class BorrowingRateController extends Controller
{
    function index()
    {
        $borrowingRates = BorrowingRate::all();

        return BorrowingRateResource::collection($borrowingRates);
    }
}
