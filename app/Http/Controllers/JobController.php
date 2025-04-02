<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobListing;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function __construct()
    {
        // Apply auth middleware later when authentication is implemented
        // $this->middleware('auth');
    }

    // Show create job form
    public function create()
    {
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

        JobListing::create([
            'user_id' => 1, // Temporary, replace with auth()->id()
            'title' => $request->title,
            'description' => $request->description,
            'salary' => $request->salary,
            'job_type' => $request->job_type,
            'remote' => $request->remote ?? 0,
            'requirements' => $request->requirements,
            'benefits' => $request->benefits,
        ]);
        return redirect()->route('jobs.show', ['userId' => 1])->with('success', 'Job created successfully!');
        // return redirect()->route('jobs.show')->with('success', 'Job created successfully!');
    }

    // Show all jobs created by a specific user
    public function show($userId)
    {
        $jobs = JobListing::where('user_id', $userId)->paginate(10); // This fetches paginated jobs
        return view('jobs.show', compact('jobs'));
    }

        // Show edit form
        public function edit($id)
        {
            $job = JobListing::where('id', $id)->where('user_id', 1)->firstOrFail(); // Replace with auth()->id()
            return view('jobs.edit', compact('job'));
        }

        // Update job listing
        public function update(Request $request, $id)
        {
            // Find the job by ID
            $job = JobListing::findOrFail($id);

            // Update the job details
            $job->update($request->all());

            // Redirect to the show route based on userId
            return redirect()->route('jobs.show', ['userId' => $job->user_id]);
        }

        // Delete job listing
        public function delete($id)
        {
            $job = JobListing::where('id', $id)->where('user_id', 1)->firstOrFail(); // Replace with auth()->id()
            $job->delete();
            return redirect()->route('jobs.show', ['userId' => $job->user_id])->with('success', 'Job deleted successfully!');
        }
}
