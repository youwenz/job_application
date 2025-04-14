<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Models\JobListing;
use Illuminate\Support\Facades\Gate;
use App\Models\Company; // Add the Company model
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        // Apply auth middleware later when authentication is implemented
        // $this->middleware('auth');
    }

    // Show create job form
    public function create()
    {
        // Check if the user has a company
        if (!auth()->user()->company) {
            // Redirect the user to the create company page with a custom message
            return redirect()->route('companies.create')->with('error', 'Please create your company first before creating a job.');
        }

        return view('jobs.create');
    }

    // Store a new job listing
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|integer',
            'job_type' => 'required|string',
            'remote' => 'nullable|boolean',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
        ]);

        // Use auth()->id() for the user_id
        JobListing::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'salary' => $request->salary,
            'job_type' => $request->job_type,
            'remote' => $request->remote ?? 0,
            'requirements' => $request->requirements,
            'benefits' => $request->benefits,
        ]);

        return redirect()->route('jobs.show')->with('success', 'Job created successfully!');
    }

    // Show all jobs created by a specific user
    public function show($userId)
    {
        $jobs = JobListing::where('user_id', $userId)->paginate(10);

        return view('jobs.show', compact('jobs'));
    }

    // Show edit form
    public function edit($id)
    {
        // Replace hardcoded user_id with auth()->id()
        $job = JobListing::find($id);

        // Show the edit form only when the job is created by the currently logged in user
        $this->authorize('update', $job);

        return view('jobs.edit', compact('job'));
    }

    // Update job listing
    public function update(Request $request, $id)
    {
        // Find the job by ID and ensure it belongs to the authenticated user
        $job = JobListing::find($id);

        // Allows editing when the job is created by the currently logged in user
        $this->authorize('update', $job);

        // Update the job details
        $job->update($request->all());

        return redirect()->route('jobs.show')->with('success', 'Job updated successfully!');
    }

    // Delete job listing
    public function delete($id)
    {
        // Ensure that the job belongs to the authenticated user
        $job = JobListing::find($id);

        // Allows deletion when the job is created by the currently logged in user
        $this->authorize('delete', $job);

        // Delete the job
        $job->delete();

        return redirect()->route('jobs.show')->with('success', 'Job deleted successfully!');
    }
}
