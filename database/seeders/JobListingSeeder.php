<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class JobListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks to prevent constraint errors
        Schema::disableForeignKeyConstraints();
        DB::table('job_listings')->truncate(); // Clears the table
        Schema::enableForeignKeyConstraints();

        // Sample job listings with random titles
        $jobs = [
            [
                'title' => 'Software Engineer',
                'user_id' => 16,
                'company_id' => 4,
                'salary' => 7500,
                'tags' => 'PHP, Laravel, Backend',
                'job_type' => 'Full-Time',
                'remote' => 1, // Remote job
                'requirements' => 'Bachelor’s degree in Computer Science. 2+ years of experience.',
                'benefits' => 'Medical, annual leave, flexible hours.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Marketing Specialist',
                'user_id' => 17,
                'company_id' => 5,
                'salary' => 65000,
                'tags' => 'Marketing, SEO, Content',
                'job_type' => 'Part-Time',
                'remote' => 0, // Office-based job
                'requirements' => 'Degree in Marketing. Google Analytics experience required.',
                'benefits' => 'Health insurance, bonuses.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Data Scientist',
                'user_id' => 18,
                'company_id' => 5,
                'salary' => 85000,
                'tags' => 'Data Science, Python, Machine Learning',
                'job_type' => 'Contract',
                'remote' => 1,
                'requirements' => 'Master’s degree in Data Science. 3+ years of experience.',
                'benefits' => 'Remote work, training programs, bonuses.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'UI/UX Designer',
                'user_id' => 19,
                'company_id' => 6,
                'salary' => 70000,
                'tags' => 'UI/UX, Figma, Adobe XD',
                'job_type' => 'Full-Time',
                'remote' => 1,
                'requirements' => 'Bachelor’s degree in Design. Experience with Figma & Adobe XD.',
                'benefits' => 'Flexible hours, stock options, remote work.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Project Manager',
                'user_id' => 20,
                'company_id' => 7,
                'salary' => 90000,
                'tags' => 'Agile, Scrum, PMP',
                'job_type' => 'Full-Time',
                'remote' => 0,
                'requirements' => 'PMP Certification. 5+ years of experience in project management.',
                'benefits' => 'Leadership training, annual bonuses, gym membership.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Project Manager',
                'user_id' => 20,
                'company_id' => 7,
                'salary' => 90000,
                'tags' => 'Agile, Scrum, PMP',
                'job_type' => 'Full-Time',
                'remote' => 0,
                'requirements' => 'PMP Certification. 5+ years of experience in project management.',
                'benefits' => 'Leadership training, annual bonuses, gym membership.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Project Manager',
                'user_id' => 20,
                'company_id' => 7,
                'salary' => 90000,
                'tags' => 'Agile, Scrum, PMP',
                'job_type' => 'Full-Time',
                'remote' => 0,
                'requirements' => 'PMP Certification. 5+ years of experience in project management.',
                'benefits' => 'Leadership training, annual bonuses, gym membership.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Project Manager',
                'user_id' => 20,
                'company_id' => 7,
                'salary' => 90000,
                'tags' => 'Agile, Scrum, PMP',
                'job_type' => 'Full-Time',
                'remote' => 0,
                'requirements' => 'PMP Certification. 5+ years of experience in project management.',
                'benefits' => 'Leadership training, annual bonuses, gym membership.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Project Manager',
                'user_id' => 20,
                'company_id' => 7,
                'salary' => 90000,
                'tags' => 'Agile, Scrum, PMP',
                'job_type' => 'Full-Time',
                'remote' => 0,
                'requirements' => 'PMP Certification. 5+ years of experience in project management.',
                'benefits' => 'Leadership training, annual bonuses, gym membership.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Project Manager',
                'user_id' => 20,
                'company_id' => 7,
                'salary' => 90000,
                'tags' => 'Agile, Scrum, PMP',
                'job_type' => 'Full-Time',
                'remote' => 0,
                'requirements' => 'PMP Certification. 5+ years of experience in project management.',
                'benefits' => 'Leadership training, annual bonuses, gym membership.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Project Manager',
                'user_id' => 20,
                'company_id' => 7,
                'salary' => 90000,
                'tags' => 'Agile, Scrum, PMP',
                'job_type' => 'Full-Time',
                'remote' => 0,
                'requirements' => 'PMP Certification. 5+ years of experience in project management.',
                'benefits' => 'Leadership training, annual bonuses, gym membership.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Project Manager',
                'user_id' => 20,
                'company_id' => 7,
                'salary' => 90000,
                'tags' => 'Agile, Scrum, PMP',
                'job_type' => 'Full-Time',
                'remote' => 0,
                'requirements' => 'PMP Certification. 5+ years of experience in project management.',
                'benefits' => 'Leadership training, annual bonuses, gym membership.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Front End Developer',
                'user_id' => 21,
                'company_id' => 8,
                'salary' => 80000,
                'tags' => 'React, JavaScript, TailwindCSS',
                'job_type' => 'Full-Time',
                'remote' => 1,
                'requirements' => 'Strong experience with React, JavaScript, and TailwindCSS.',
                'benefits' => '100% remote, equipment budget, annual bonus.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        // Insert job listings into the database
        DB::table('job_listings')->insert($jobs);

        echo "Job listings seeded successfully!\n";
    }
}
