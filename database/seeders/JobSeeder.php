<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\User;
use App\Models\Company;
use App\Models\JobListing;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load job listings from file
        $jobListings = include database_path('seeders/data/job_listings.php');

        // Get all user IDs except the test user
        $userIds = User::where('email', '!=', 'test@test.com')->pluck('id')->toArray();

        foreach ($jobListings as $listing) {

            // Assign user and company IDs randomly
            $listing['user_id'] = $userIds[array_rand($userIds)];

            // Extract tags from the listing
            $tags = $listing['tags'] ?? [];
            unset($listing['tags']);  // Remove tags before creating the JobListing

            // Populate missing fields
            $listing['salary'] = $listing['salary'] ?? rand(40000, 120000);
            $validJobTypes = ['Full-Time', 'Part-Time', 'Contract', 'Temporary', 'Internship', 'Volunteer', 'On-Call'];
            $listing['job_type'] = $listing['job_type'] ?? collect($validJobTypes)->random();
            $listing['remote'] = $listing['remote'] ?? (bool)rand(0, 1);
            $listing['requirements'] = $listing['requirements'] ?? 'Requirements: ' . fake()->paragraph();
            $listing['benefits'] = $listing['benefits'] ?? 'Benefits: ' . fake()->paragraph();
            $listing['created_at'] = now();
            $listing['updated_at'] = now();

            // Create the JobListing record in the database
            $jobListing = JobListing::create($listing);

            // Process and attach tags if they exist
            if (!empty($tags)) {
                foreach ($tags as $tagName) {
                    $tag = Tag::firstOrCreate(['name' => $tagName]);
                    $jobListing->tags()->attach($tag->id); // Attach tag to JobListing
                }
            }
        }

        echo "Jobs created successfully!";
    }
}
