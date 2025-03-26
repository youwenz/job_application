<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\JobListing;

class JobListingController extends Controller
{
    public function index(Request $request)
    {
        $query = JobListing::query();

        // Search by Job Title, Keyword, or Job Type
        if ($request->filled('query')) {
            $search = $request->input('query');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                ->orWhere('job_type', 'LIKE', "%{$search}%")
                ->orWhereHas('user.company', function ($q2) use ($search) {
                    $q2->where('name', 'LIKE', "%{$search}%");
                });
            });
        }

        // Filter by Location (City, State, Zip Code)
        if ($request->filled('location')) {
            $location = $request->input('location');
            $query->whereHas('user.company', function ($q) use ($location) {
                $q->where('city', 'LIKE', "%{$location}%")
                ->orWhere('state', 'LIKE', "%{$location}%")
                ->orWhere('zipcode', 'LIKE', "%{$location}%");
            });
        }

        // Filter by Job Type (this ensures that job type filter applies independently)
        if ($request->filled('job_type')) {
            $query->where('job_type', $request->input('job_type'));
        }

        // Filter by Remote Jobs
        if ($request->filled('remote') && $request->input('remote') == '1') {
            $query->where('remote', true); 
        }

        $jobListings = $query->paginate(9);

        return view('employee.job-listing', compact('jobListings'));
    }

    public function show($jobId)
    {
        $jobListing = JobListing::find($jobId);

        if (!$jobListing) {
            Log::warning("JobListing not found for ID: {$jobId}");
            abort(404, 'Job listing not found.');
        }

        Log::info('JobListing found:', ['id' => $jobListing->id, 'title' => $jobListing->title]);

        return view('employee.job-details', compact('jobListing')); 
    }

}
