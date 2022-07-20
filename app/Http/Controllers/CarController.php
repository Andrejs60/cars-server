<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CarResource;
use App\Models\Car;

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
}
