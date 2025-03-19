@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $jobListing->title }}</h2>
    <p><strong>Company:</strong> {{ $jobListing->user->company->name }}</p> <!-- Assuming relationship -->
    <p><strong>Location:</strong> {{ $jobListing->user->company->address }}</p>
    <p><strong>Description:</strong> {{ $jobListing->description }}</p>

    <a href="{{ route('jobListings.apply.form', $jobListing->id) }}" class="btn btn-success">Apply Now</a>

    <!-- Bookmark Button -->
    <form action="{{ route('jobListings.bookmark', $jobListing->id) }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-warning">Bookmark</button>
    </form>
</div>
@endsection
