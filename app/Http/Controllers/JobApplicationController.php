<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\JobListing;
use App\Models\JobApplication;

class JobApplicationController extends Controller
{
    public function showApplicationForm($jobId)
    {
        $jobListing = JobListing::with('user.company')->findOrFail($jobId);
        return view('employee.apply-job', compact('jobListing'));
    }

    public function submitApplication(Request $request, $jobId)
    {
        $jobListing = JobListing::find($jobId);

        if (!$jobListing) {
            return back()->withErrors(['job_id' => 'The selected job does not exist.']);
        }        

        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'resume_path' => 'required|mimes:pdf|max:2048',
            'message' => 'nullable|string',
        ]);

        // Store Resume
        $resumePath = $request->file('resume_path')->store('resumes', 'public');

        // Temporary user_id assignment (for testing)
        $dummyUserId = 1;

        Log::info('Request found:', ['request:', $request->all()]);

        // Save Application
        JobApplication::create([
            'job_id' => $jobListing->id,
            'user_id' => $dummyUserId, 
            'full_name' => $request->full_name,
            'email' => $request->email,
            'resume_path' => $resumePath,
            'message' => $request->message,
        ]);

        return redirect()->route('jobListings.index')
            ->with('success', 'Your application has been submitted successfully!');
    }
}
