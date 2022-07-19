<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\FuelType;
use App\Models\Manufacturer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $manufacturers = [ // 5
            [
                "name" => "Audi",
            ],
            [
                "name" => "Bentley",
            ],
            [
                "name" => "BMW",
            ],
            [
                "name" => "Ferrari",
            ],
            [
                "name" => "Ford",
            ],
        ];

        foreach($manufacturers as $manufacturer){
            Manufacturer::create($manufacturer);
        }

        $fuel_types = [ // 3
            [
                "name" => "Petrol",
            ],
            [
                "name" => "Diesel",
            ],
            [
                "name" => "Electric",
            ],
        ];

        foreach($fuel_types as $fuel_type){
            FuelType::create($fuel_type);
        }

        $fuel_types_ids = FuelType::pluck("id")->toArray();
        $manufacturers_ids = Manufacturer::pluck("id")->toArray();

        $cars = [ // TODO: add all 10
            [
                "manufacturer_id" => $manufacturers_ids[0],
                "fuel_type_id" => $fuel_types_ids[0],
                "name" => "Audi A3",
                "seats" => 5,
                "doors" => 4,
                "top_speed"=> 144.2,
            ]
        ];

        foreach($cars as $car){
            Car::create($car);
        }
    }
}
