<?php

use App\Http\Controllers\BorrowingRateController;
use App\Http\Controllers\EnergyController;
use App\Http\Controllers\MileageController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\VehicleTypeController;
use App\Http\Controllers\YearController;
use App\Http\Middleware\ValidateGetResultRequestParameters;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/energies', [EnergyController::class, 'index'])->name('energy.index');
Route::get('/mileages', [MileageController::class, 'index'])->name('mileage.index');
Route::get('/vehicleTypes', [VehicleTypeController::class, 'index'])->name('vehicleType.index');
Route::get('/years', [YearController::class, 'index'])->name('year.index');
Route::get('/borrowingRates', [BorrowingRateController::class, 'index'])->name('borrowingRates.index');
Route::get('/passengers', [PassengerController::class, 'index'])->name('passenger.index');

Route::post('/results', [ResultController::class, 'submitResult'])->middleware(ValidateGetResultRequestParameters::class)->name('result.getResult');
Route::get('/fetchResult/{id}', [ResultController::class, 'fetchResult'])->name('result.fetchResult');


