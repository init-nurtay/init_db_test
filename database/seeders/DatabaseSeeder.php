<?php

namespace Database\Seeders;

use App\Models\Lead;
use App\Models\Leads;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@init.red',
            'password' => bcrypt('password'),
        ]);

        Leads::factory(10)->create();

        $this->call([
            CountrySeeder::class,
            CitySeeder::class,
            AddressSeeder::class,
        ]);

        // $lead = Leads::first();
        // $lead->comments()->create([
        //     'message' => 'First comment',
        // ]);
    }
}
