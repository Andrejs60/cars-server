<?php

namespace App\Http\Controllers;

use App\Models\FuelType;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function cars_per_manufacturer(){
        $manufacturers = Manufacturer::all();
        $data = [];
        foreach ($manufacturers as $manufacturer) {
            $data[$manufacturer->name] = $manufacturer->cars()->count();
        }
        return $data;
    }

    public function cars_per_fuel_type(){
        $fuel_types = FuelType::all();
        $data = [];
        foreach ($fuel_types as $fuel_type) {
            $data[$fuel_type->name] = $fuel_type->cars()->count();
        }
        return $data;
    }
}
