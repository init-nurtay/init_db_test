<?php

namespace Database\Seeders;

use App\Models\Lead;
use App\Models\Leads;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//       User::create([
//           'name' => 'Admin',
//           'email' => 'admin@init.red',
//           'password' => bcrypt('password'),
//       ]);
//       Leads::factory(4)->create();
User::create([
    'name' => 'manager',
    'email' => 'manager@init.red',
    'password'  => bcrypt('password'),
]);

    }
}
