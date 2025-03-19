<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\JobListing;

class JobController extends Controller
{
    public function index() {
        return view('jobs.index', ['jobs' => JobListing::all()]);
    }

    public function viewJob($id) {
        return view('jobs.list', ['job' => JobListing::findOrFail($id)]);
    }

    public function create() {
        return view('jobs.create');
    }

    public function createJob(Request $request) {
        JobListing::create($request->all());
        return redirect('jobs');
    }

    public function updateJob(Request $request, $id) {
        JobListing::find($id)->update($request->all());
        return redirect('jobs');
    }

    public function deleteJob($id) {
        JobListing::find($id)->delete();
        return redirect('jobs');
    }
}
