<?php

namespace Database\Seeders;

use App\Models\Amenity;
use Illuminate\Database\Seeder;

class AmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amenities = [
            ['name' => 'WiFi'],
            ['name' => 'Swimming Pool'],
            ['name' => 'Gym'],
            ['name' => 'Air Conditioning'],
            ['name' => 'Restaurant'],
            ['name' => 'Bar'],
            ['name' => 'Parking'],
            ['name' => 'Breakfast'],
            ['name' => 'Room Service'],
            ['name' => 'Laundry'],
            ['name' => 'Meeting Rooms'],
            ['name' => 'Spa'],
            ['name' => 'Pet Friendly'],
            ['name' => 'Elevator'],
            ['name' => '24/7 Reception'],
        ];

        foreach ($amenities as $amenity) {
            Amenity::updateOrCreate(
                ['name' => $amenity['name']],
                $amenity
            );
        }
    }
}
