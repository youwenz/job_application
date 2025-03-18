<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\JobListing;
use App\Models\Tag;
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    public function index(Request $request)
    {
        $query = JobListing::query();

        // Filter by Tags
        if ($request->has('tags')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->whereIn('tags.id', $request->tags);
            });
        }

        // Filter by State
        if ($request->filled('state')) {
            $query->where('state', 'like', '%' . $request->state . '%');
        }

        // Filter by Salary Range
        if ($request->filled('min_salary')) {
            $query->where('salary', '>=', $request->min_salary);
        }
        if ($request->filled('max_salary')) {
            $query->where('salary', '<=', $request->max_salary);
        }

        // Filter by Remote
        if ($request->has('remote')) {
            $query->where('remote', true);
        }

        // Filter by Job Type
        if ($request->filled('job_type')) {
            $query->where('job_type', $request->job_type);
        }

        // Fetch the results
        $jobs = $query->with('tags')->paginate(10);

        // Get all tags for filtering
        $tags = Tag::all();

        // Get all states for filtering
        $states = Company::all()->pluck('state')->unique();

        return view('search.index', compact('jobs', 'tags', 'states'));
    }
}
