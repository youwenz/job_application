<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\JobListing;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function apply(Request $request, $jobId)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'message' => 'nullable|string',
            'resume' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $job = JobListing::findOrFail($jobId);
        $user = Auth::user();

        // Handle file upload
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');
        }

        // Create application
        Application::create([
            'user_id' => $user->id,
            'job_id' => $job->id,
            'full_name' => $request->full_name,
            'message' => $request->message,
            'resume_path' => $resumePath,
        ]);

        return redirect()->back()->with('success', 'Job application submitted successfully!');
    }

    public function showApplyForm($jobId)
    {
        $job = JobListing::findOrFail($jobId);
        return view('employee.apply-job', compact('job')); 
    }
}
