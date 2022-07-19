<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Get all cars.
     */
    public function index(){
        return Car::all();
    }

    /**
     * Get a specific car
     */
    public function show(Car $car){
        return $car;
    }
}
