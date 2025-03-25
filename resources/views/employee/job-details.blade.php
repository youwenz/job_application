<x-employee-layout>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>{{ $jobListing->title }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Job Type:</strong> {{ $jobListing->job_type }}</p>
            <p><strong>Salary:</strong> ${{ number_format($jobListing->salary, 2) }}</p>
            <p><strong>Remote:</strong> {{ $jobListing->remote ? 'Yes' : 'No' }}</p>
            <p><strong>Description:</strong></p>
            <p>{{ $jobListing->description }}</p>
            
            <p><strong>Requirements:</strong></p>
            <p>{{ $jobListing->requirements }}</p>
            
            <p><strong>Benefits:</strong></p>
            <p>{{ $jobListing->benefits }}</p>
            
            <p><strong>Posted On:</strong> {{ $jobListing->created_at->format('F d, Y') }}</p>
        </div>
    </div>
</div>
</x-employee-layout>