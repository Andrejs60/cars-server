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
        return $this->belongsTo(Manufacturer::class);
    }

    /**
     * Get the fuel type associated with the car.
     */
    public function fuel_type(){
        return $this->belongsTo(FuelType::class);
    }

    /** 
     * Scope fo filter by manufacturer, fuel_type, and name.
     */
    public function scopeFilter($query, array $filters){
        if($filters["manufacturer"] ?? false){
            $query->whereRelation("manufacturer","name", request("manufacturer"));
        }

        if($filters["fuel_type"] ?? false){
            $query->whereRelation("fuel_type","name", request("fuel_type"));
        }

        if($filters["name"] ?? false){
            $query->where("name", "like", "%" . request("name") . "%");
        }
    }
}
