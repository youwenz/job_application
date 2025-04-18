<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\JobListing;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;

class JobApplicationController extends Controller
{

    public function index()
    {
        $user = Auth::user(); 
        $jobApplications = $user->jobApplications() 
            ->with('job.user.company')              
            ->orderBy('created_at', 'desc')         
            ->paginate(5);                          

        return view('jobApplication.index', compact('jobApplications'));
    }

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

        $resumePath = $request->file('resume_path')->store('resumes', 'public');

        $user = Auth::user();

        JobApplication::create([
            'job_id' => $jobListing->id,
            'user_id' => $user->id,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'resume_path' => $resumePath,
            'message' => $request->message,
        ]);

        return redirect()->route('jobApplication.index')
            ->with('success', 'Your application has been submitted successfully!');
    }

    public function showApplicants($jobId)
    {
        // Get the job listing by jobId
        $jobListing = JobListing::findOrFail($jobId);

        // Fetch paginated job applications for this specific job listing
        $jobApplications = JobApplication::where('job_id', $jobId)->paginate(5);  // Paginate with 5 per page

        // Return the view and pass the data
        return view('jobApplication.showApplicants', compact('jobListing', 'jobApplications'));
    }
}
