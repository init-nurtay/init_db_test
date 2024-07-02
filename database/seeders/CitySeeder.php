<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['name' => 'Moscow', 'country_id' => 1],
            ['name' => 'Saint Petersburg', 'country_id' => 1],
            ['name' => 'Novosibirsk', 'country_id' => 1],
            ['name' => 'Almaty', 'country_id' => 2],
            ['name' => 'Nur-Sultan', 'country_id' => 2],
            ['name' => 'Bishkek', 'country_id' => 3],
        ];

        foreach ($cities as $city) {
            \App\Models\City::create($city);
        }
    }
}
