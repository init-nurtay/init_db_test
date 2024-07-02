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
       User::create([
           'name' => 'Admin',
           'email' => 'admin@admin.com',
           'password' => bcrypt('password'),
       ]);
       Leads::factory(4)->create();
    }
}
