<x-employee-layout>
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Job Applications</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="space-y-4">
            @foreach ($jobApplications as $application)
                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 flex flex-col md:flex-row justify-between items-start relative">
                    <div>
                        <h2 class="text-lg font-bold text-gray-800">{{ $application->full_name }}</h2>
                        <p class="text-sm text-gray-600">{{ $application->email }}</p>
                        
                        <div class="mt-2 text-gray-700">
                            <p><strong>Company Name:</strong> {{ $application->job->user->company->name }}</p>
                            <p><strong>Job Title:</strong> {{ $application->job->title }}</p>
                            <p><strong>Message:</strong> {{ \Illuminate\Support\Str::words($application->message, 6, '...')  ?? 'No message' }}</p>
                        </div>
                    </div>

                    <div class="mt-4 md:mt-0 flex flex-col items-center">
                        <a href="{{ asset('storage/' . $application->resume_path) }}" target="_blank" class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-700">
                            View Resume
                        </a>
                    </div>

                    <!-- Sent time positioned at the bottom-right -->
                    <p class="absolute bottom-8 right-4 text-gray-400 text-sm">
                        Sent {{ $application->created_at->diffForHumans() }}
                    </p>
                </div>
            @endforeach
        </div>

        @if ($jobApplications->isEmpty())
            <p class="text-center text-gray-500 mt-6">No job applications found.</p>
        @endif

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            {{ $jobApplications->links('vendor.pagination.custom-pagination') }}
        </div>
    </div>
</x-employee-layout>
