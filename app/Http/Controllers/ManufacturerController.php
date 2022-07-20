<?php

namespace App\Http\Controllers;

use App\Http\Resources\ManufacturerResource;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    /**
     * Get all manufacturers.
     */
    public function index(){
        return ManufacturerResource::collection(Manufacturer::latest()->get());
    }

    /**
     * Get a specific manufacturer.
     */
    public function show(Manufacturer $manufacturer){
        return new ManufacturerResource($manufacturer);
    }
}
