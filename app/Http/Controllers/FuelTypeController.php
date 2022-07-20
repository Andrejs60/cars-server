<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\FuelTypeResource;
use App\Models\FuelType;

class FuelTypeController extends Controller
{
    /**
     * Get all fuel types.
     */
    public function index(){
        return FuelTypeResource::collection(FuelType::latest()->get());
    }

    /**
     * Get a specific fuel type.
     */
    public function show(FuelType $fuel_type){
        return new FuelTypeResource($fuel_type);
    }
}
