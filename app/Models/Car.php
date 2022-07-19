<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "manufacturer_id",
        "fuel_type_id",
        "name",
        "seats",
        "doors",
        "top_speed"
    ];

    /**
     * Get the manufacturer associated with the car.
     */
    public function manufacturer(){
        return $this->hasOne(Manufacturer::class);
    }

    /**
     * Get the fuel type associated with the car.
     */
    public function fuel_type(){
        return $this->hasOne(FuelType::class);
    }
}
