<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobListing;

class JobController extends Controller
{
    public function index()
    {
        return 'Jobs index works!';
    }


    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|integer',
            'job_type' => 'required|string',
            'remote' => 'nullable|boolean', // Ensure correct handling of remote job option
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
        ]);

        JobListing::create([
            'user_id' => 1, // Replace with auth()->id() once login is implemented
            'title' => $request->title,
            'description' => $request->description,
            'salary' => $request->salary,
            'job_type' => $request->job_type,
            'remote' => $request->remote ?? 0, // Default to false if not provided
            'requirements' => $request->requirements,
            'benefits' => $request->benefits,
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job created successfully!');
    }

    public function view($id)
    {
        $job = JobListing::findOrFail($id);
        return view('jobs.show', compact('job'));
    }

    public function update(Request $request, $id)
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

        $job = JobListing::findOrFail($id);

        $job->update([
            'title' => $request->title,
            'description' => $request->description,
            'salary' => $request->salary,
            'job_type' => $request->job_type,
            'remote' => $request->remote ?? 0,
            'requirements' => $request->requirements,
            'benefits' => $request->benefits,
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully!');
    }

    public function delete($id)
    {
        JobListing::destroy($id);
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully!');
    }
}
