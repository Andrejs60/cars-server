<?php

namespace App\Http\Controllers;

use App\Http\Resources\ManufacturerResource;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    /** 
     * Creates a new manufacturer.
     */
    public function new(Request $request){
        // Validate request
        $validatedFields = $request->validate([
            "name" => ["required", Rule::unique("manufacturers")],
        ]);
        // Create manufacturer
        $manufacturer = Manufacturer::create($validatedFields);

        return new ManufacturerResource($manufacturer);
    }
}
