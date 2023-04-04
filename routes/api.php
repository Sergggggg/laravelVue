<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ExportController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    
	Route::get('getFlatByName/{name}', [ExportController::class, 'getFlatByName']);

	Route::get('getFlatByBedrooms/{numberBedrooms}', [ExportController::class, 'getFlatByBedrooms']);

	Route::get('getFlatByBathrooms/{numberBedrooms}', [ExportController::class, 'getFlatByBathrooms']);

	Route::get('getFlatByStoreys/{numberStoreys}', [ExportController::class, 'getFlatByStoreys']);

	Route::get('getFlatByGarages/{numberGarages}', [ExportController::class, 'getFlatByGarages']);
	
	Route::get('getFlatByPrices/min/{min}/max/{max}', [ExportController::class, 'getFlatByPrices']);

	Route::post('getFlatByParam', [ExportController::class, 'getFlatByParam']);

});
