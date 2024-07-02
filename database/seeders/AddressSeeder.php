<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $addresses = [
            ['city_id' => 1, 'country_id' => 1, 'apartment' => '12', 'building' => '1', 'street' => 'Lenina'],
            ['city_id' => 2, 'country_id' => 1, 'apartment' => '13', 'building' => '2', 'street' => 'Pushkina'],
            ['city_id' => 3, 'country_id' => 1, 'apartment' => '14', 'building' => '3', 'street' => 'Gagarina'],
            ['city_id' => 4, 'country_id' => 2, 'apartment' => '15', 'building' => '4', 'street' => 'Abay'],
            ['city_id' => 5, 'country_id' => 2, 'apartment' => '16', 'building' => '5', 'street' => 'Dostyk'],
            ['city_id' => 6, 'country_id' => 3, 'apartment' => '17', 'building' => '6', 'street' => 'Manasa'],
        ];


        foreach ($addresses as $address) {
            \App\Models\Address::create($address);
        }
    }
}
