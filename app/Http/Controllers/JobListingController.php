<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobListing;

class JobListingController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $location = $request->input('location');

        $jobListings = JobListing::query();

        if ($query) {
            $jobListings->where('title', 'like', "%{$query}%")
                        ->orWhere('job_type', 'like', "%{$query}%")
                        ->orWhere('description', 'like', "%{$query}%");
        }

        if ($location) {
            $jobListings->whereHas('company', function ($q) use ($location) {
                $q->where('city', 'like', "%{$location}%");
            });
        }

        $jobListings = JobListing::paginate(9);
        return view('employee.job-listing', compact('jobListings')); 
    }

    public function show($jobId)
    {
        $jobListing = JobListing::findOrFail($jobId);
        return view('employee.job-details', compact('jobListing')); 
    }

}
