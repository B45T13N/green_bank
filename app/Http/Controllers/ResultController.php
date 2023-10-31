<?php

namespace App\Http\Controllers;

use App\Exceptions\FieldTypeErrorException;
use App\Exceptions\TooMuchParametersException;
use App\Http\Resources\BorrowingRateResource;
use App\Models\BorrowingRate;
use App\Models\Energy;
use App\Models\Grading;
use App\Models\Mileage;
use App\Models\Passenger;
use App\Models\Result;
use App\Models\VehicleType;
use App\Models\Year;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ResultController extends Controller
{
    function submitResult(Request $request)
    {
        try
        {
            $validatedDatas = $request->validate([
                'vehicleType' => 'string|required|exists:vehicle_types,category',
                'energy' => 'string|required|exists:energies,name',
                'mileage' => 'string|required|exists:mileages,wording',
                'year' => 'string|required|exists:years,wording',
                'passenger' => 'string|required|exists:passengers,wording'
            ]);

            $finalGrading = 0;
            $bonus = 0;
            $borrowingRate = 1.85;
            $finalBorrowingRate = 1.85;

            foreach ($validatedDatas as $key => $data)
            {
                $this->getFinalGrading($key, $data, $finalGrading, $bonus);
            }

            $finalGrading = $finalGrading/10;

            $this->getBorrowingRate($bonus, $finalGrading, $borrowingRate, $finalBorrowingRate);

            $result = new Result();
            $result->vehicle_type = $validatedDatas['vehicleType'];
            $result->energy = $validatedDatas['energy'];
            $result->mileage = $validatedDatas['mileage'];
            $result->year = $validatedDatas['year'];
            $result->passenger = $validatedDatas['passenger'];
            $result->bonus = $bonus/100;
            $result->final_grading = $finalGrading;
            $result->final_borrowing_rate = $finalBorrowingRate/100;
            $result->borrowing_rate = $borrowingRate/100;

            $result->save();
        }
        catch (ValidationException $e)
        {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
        catch (\Exception $e)
        {
            return response()->json(['messsage' => 'Error creating result'], 500);
        }

        return redirect()->route('result.fetchResult', ['id' => $result->id]);
    }

    public function fetchResult($id)
    {
        try
        {
            $result = Result::query()->where('id', '=', $id)->first();

            if(!isset($result))
            {
                throw new ModelNotFoundException();
            }
        }
        catch (ModelNotFoundException $e)
        {
            return response()->json([
                'message' => "Non existing result"
            ], 400);
        }

        return response()->json([
            'bonus' => $result->bonus,
            'finalGrading' => $result->final_grading,
            'finalBorrowingRate' => $result->final_borrowing_rate,
            'borrowingRate' => $result->borrowing_rate
        ], 200);
    }

    private function getFinalGrading(string $fieldType, string|int $value, &$finalGrading, &$bonus)
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
                $passenger = Passenger::query()->where('wording', '=', $value)->first();
                $bonus = $passenger->bonus;
                break;
            default:
                throw new FieldTypeErrorException("Erreur lors de la requête le champ $fieldType est inconnu", 400);
        }
    }

    private function getBorrowingRate(int $bonus, int $finalGrading, &$borrowingRate, &$finalBorrowingRate)
    {
        $tmpBorrowingRate = BorrowingRate::query()->where('score', '>=', $finalGrading)->first();
        $borrowingRate = $tmpBorrowingRate->rate;
        $finalBorrowingRate = $tmpBorrowingRate->rate + $bonus;
    }
}
