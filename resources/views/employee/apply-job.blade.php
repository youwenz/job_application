@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Apply for {{ $jobListing->title }}</h2>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Job Application Form -->
    <form action="{{ route('jobListings.apply', $jobListing->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="full_name" class="form-label">Full Name</label>
            <input type="text" name="full_name" id="full_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Cover Letter (Optional)</label>
            <textarea name="message" id="message" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="resume" class="form-label">Upload Resume (PDF/DOC)</label>
            <input type="file" name="resume" id="resume" class="form-control" accept=".pdf,.doc,.docx" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit Application</button>
    </form>
</div>
@endsection
