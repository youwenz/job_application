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

        // Get test user id
        $testUserId = User::where('email', 'test@test.com')->value('id');

        // Get all other user ids from user model
        $userIds = User::where('email', '!=', 'test@test.com')->pluck('id')->toArray();

        // Fetch all company IDs
        $companyIds = Company::pluck('id')->toArray();

        foreach ($jobListings as $index => &$listing) {
            if ($index < 2) {
                // Assign the first two listings to the test user
                $listing['user_id'] = $testUserId;
            } else {
                // Assign user id randomly from available users
                $listing['user_id'] = $userIds[array_rand($userIds)];
            }

            // Assign company_id randomly from available companies
            $listing['company_id'] = $companyIds[array_rand($companyIds)];

            // Add missing columns and randomize them
            $listing['salary'] = rand(40000, 120000);
            $listing['tags'] = implode(', ', ['PHP', 'Laravel', 'Backend']);
            $listing['job_type'] = collect(['Full-Time', 'Part-Time', 'Contract', 'Temporary', 'Internship', 'Volunteer', 'On-Call'])->random();
            $listing['remote'] = (bool) rand(0, 1);
            $listing['requirements'] = 'Requirements: ' . fake()->paragraph();
            $listing['benefits'] = 'Benefits: ' . fake()->paragraph();

            // Add timestamps
            $listing['created_at'] = now();
            $listing['updated_at'] = now();
        }

        // Insert job listings into the database
        DB::table('job_listings')->insert($jobListings);

        echo "Jobs created successfully!";
    }
}
