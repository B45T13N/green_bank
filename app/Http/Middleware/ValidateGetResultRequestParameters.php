<?php

namespace App\Http\Middleware;

use App\Exceptions\TooMuchParametersException;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateGetResultRequestParameters
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try
        {
            $expectedParameters = ['vehicleType', 'energy', 'mileage', 'year', 'passenger'];

            $requestParameters = array_keys($request->input());

            $unexpectedParameters = array_diff($requestParameters, $expectedParameters);

            if (!empty($unexpectedParameters)) {
                throw new TooMuchParametersException($unexpectedParameters);
            }
        }
        catch (TooMuchParametersException $e)
        {
            return response()->json([
                'error' => $e->getMessage(),
            ], 400);
        }

        return $next($request);
    }
}
