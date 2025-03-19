<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load job listings from file
        $jobListings = include database_path('seeders/data/job_listings.php');

        // Get all user ids from user model
        $userIds = User::where('email', '!=', 'test@test.com')->pluck('id')->toArray();

        // Fetch all company IDs
        $companyIds = Company::pluck('id')->toArray();

        // Process each job listing
        foreach ($jobListings as &$listing) {

            // Assign user id randomly from available users
            $listing['user_id'] = $userIds[array_rand($userIds)];

            // Format tags correctly
            if (isset($listing['tags'])) {
                $listing['tags'] = implode(', ', array_map('trim', explode(',', $listing['tags'])));
            }

            // Populate missing fields
            $listing['salary'] = $listing['salary'] ?? rand(40000, 120000);
            $listing['job_type'] = $listing['job_type'] ?? collect(['Full-Time', 'Part-Time', 'Contract', 'Temporary', 'Internship', 'Volunteer', 'On-Call'])->random();
            $listing['remote'] = $listing['remote'] ?? (bool)rand(0, 1);
            $listing['requirements'] = $listing['requirements'] ?? 'Requirements: ' . fake()->paragraph();
            $listing['benefits'] = $listing['benefits'] ?? 'Benefits: ' . fake()->paragraph();

            // Add timestamps
            $listing['created_at'] = now();
            $listing['updated_at'] = now();
        }

        // Insert job listings into the database
        DB::table('job_listings')->insert($jobListings);

        echo "Jobs created successfully!";
    }
}
