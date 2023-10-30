<?php

namespace App\Http\Controllers;

use App\Exceptions\FieldTypeErrorException;
use App\Http\Resources\BorrowingRateResource;
use App\Models\BorrowingRate;
use App\Models\Energy;
use App\Models\Grading;
use App\Models\Mileage;
use App\Models\Passenger;
use App\Models\VehicleType;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ResultController extends Controller
{
    function getResult(Request $request)
    {
        try
        {
            $validatedDatas = $request->validate([
                'vehicleType' => 'string|required|exists:vehicle_types,category',
                'energy' => 'string|required|exists:energies,name',
                'mileage' => 'string|required|exists:mileages,wording',
                'year' => 'string|required|exists:years,wording',
                'passenger' => 'integer|required|exists:passengers,count'
            ]);

            $finalGrading = 0;
            $bonus = 0;
            $borrowingRate = 1.85;

            foreach ($validatedDatas as $key => $data)
            {
                $this->getNotation($key, $data, $finalGrading, $bonus);
            }

            $this->getBorrowingRate($bonus, $finalGrading/10, $borrowingRate);
        }
        catch (ValidationException $e)
        {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'bonus' => $bonus/100,
            'finalGrading' => $finalGrading/10,
            'borrowingRate' => $borrowingRate/100
        ], 200);
    }

    private function getNotation(string $fieldType, string|int $value, &$finalGrading, &$bonus)
    {
        switch ($fieldType)
        {
            case 'vehicleType':
                $vehicleType = VehicleType::query()->where('category', '=', $value)->
                    join('gradings', 'vehicle_types.notation_id', '=', 'gradings.id')->first();
                $finalGrading += $vehicleType->grading;
                break;
            case 'energy':
                $energy = Energy::query()->where('name', '=', $value)->
                join('gradings', 'energies.notation_id', '=', 'gradings.id')->first();
                $finalGrading += $energy->grading;
                break;
            case 'mileage':
                $mileage = Mileage::query()->where('wording', '=', $value)->
                join('gradings', 'mileages.notation_id', '=', 'gradings.id')->first();
                $finalGrading += $mileage->grading;
                break;
            case 'year':
                $year = Year::query()->where('wording', '=', $value)->
                join('gradings', 'years.notation_id', '=', 'gradings.id')->first();
                $finalGrading += $year->grading;
                break;
            case 'passenger':
                $passenger = Passenger::query()->where('count', '=', $value)->first();
                $bonus = $passenger->bonus;
                break;
            default:
                throw new FieldTypeErrorException("Erreur lors de la requête le champ $fieldType est inconnu", 400);
        }
    }

    private function getBorrowingRate(int $bonus, int $finalGrading, &$borrowingRate)
    {
        $tmpBorrowingRate = BorrowingRate::query()->where('score', '>=', $finalGrading)->first();
        $borrowingRate = $tmpBorrowingRate->rate + $bonus;
    }
}
