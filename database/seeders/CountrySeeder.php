<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{

    public function run(): void
    {
        $countries = [
            ['name' => 'Russia'],
            ['name' => 'Kazakhstan'],
            ['name' => 'Kyrgyzstan'],
        ];

        foreach ($countries as $country) {
            \App\Models\Country::create($country);
        }
    }
}
