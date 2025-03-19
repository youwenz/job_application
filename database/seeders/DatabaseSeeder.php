<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create 20 users with the role of 'employer' and their associated companies
        User::factory()->count(20)->has(
            Company::factory()->count(1)
        )->create(['role' => 'employer']);

        // Create other users with the role of 'employee'
        User::factory()->count(20)->create(['role' => 'employee']);

        // Call the JobSeeder to seed job listings
        $this->call(JobSeeder::class);
    }
}

