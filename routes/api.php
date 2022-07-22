<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FuelTypeController;
use App\Http\Controllers\ManufacturerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


    Route::prefix("cars")->controller(CarController::class)->group(function () {
        Route::get("/list", "index");
        Route::get("/get/{car}", "show");
        Route::post("/new", "new")->middleware("password.protect");
    });
    
    Route::prefix("fuel-types")->controller(FuelTypeController::class)->group(function () {
        Route::get("/list", "index");
        Route::get("/get/{fuel_type}", "show");
    });
    
    Route::prefix("manufacturers")->controller(ManufacturerController::class)->group(function () {
        Route::get("/list", "index");
        Route::get("/get/{manufacturer}", "show");
        Route::post("/new", "new")->middleware("password.protect");
    });
    
    Route::prefix("analytics")->controller(AnalyticsController::class)->group(function() {
        Route::get("/cars-per-manufacturer","cars_per_manufacturer");
        Route::get("/cars-per-fuel-type","cars_per_fuel_type");
    });
    
    Route::prefix("cart")->controller(CartController::class)->group(function() {
        Route::get("/","index");
        Route::post("/","set");
    });

