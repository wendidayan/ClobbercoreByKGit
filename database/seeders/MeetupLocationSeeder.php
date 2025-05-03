<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MeetUpLocation;

class MeetupLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $locations = [
            ['city' => 'Sorsogon City', 'landmark' => 'SM Sorsogon'],
            ['city' => 'Sorsogon City', 'landmark' => 'Savemore'],
            ['city' => 'Sorsogon City', 'landmark' => 'Pier'],
            ['city' => 'Sorsogon City', 'landmark' => 'Capitol Park'],
            ['city' => 'Gubat', 'landmark' => 'Pamana'],
            ['city' => 'Casiguran', 'landmark' => 'Town Center'],
        ];

        foreach ($locations as $location) {
            MeetupLocation::create($location);
        }
    }
}
