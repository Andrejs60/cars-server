<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Validation\Rule;

class CarController extends Controller
{
    /**
     * Get all cars.
     */
    public function index(){
        return CarResource::collection(Car::latest()->filter(request(["manufacturer", "fuel_type", "name"]))->get());
    }

    /**
     * Get a specific car.
     */
    public function show(Car $car){
        return new CarResource($car);
    }

    /** 
     * Creates a new car.
     */
    public function new(Request $request){
        // Validate request
        $validatedFields = $request->validate([
            "manufacturer_id" => ["required",Rule::exists("manufacturers","id")],
            "fuel_type_id" => ["required",Rule::exists("fuel_types","id")],
            "name" => ["required", Rule::unique("cars")],
            "seats" => ["required", "integer", "numeric"],
            "doors" => ["required", "integer", "numeric"],
            "top_speed" => ["required", "numeric"]
        ]);

        // Create car
        $car = Car::create($validatedFields);

        return new CarResource($car);
    }
}
