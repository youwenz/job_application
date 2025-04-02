<x-employer-layout>
    <div class="container mx-auto p-8">
        <h1 class="text-2xl font-semibold mb-4">Applicants for "{{ $jobListing->title }}"</h1>

        @if($jobApplications->count() > 0)
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left">Full Name</th>
                        <th class="px-6 py-3 text-left">Email</th>
                        <th class="px-6 py-3 text-left">Resume</th>
                        <th class="px-6 py-3 text-left">Applied At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobApplications as $application)
                        <tr>
                            <td class="px-6 py-3">{{ $application->full_name }}</td>
                            <td class="px-6 py-3">{{ $application->email }}</td>
                            <td class="px-6 py-3">
                                <a href="{{ Storage::url($application->resume_path) }}" target="_blank" class="text-blue-500">View Resume</a>
                            </td>
                            <td class="px-6 py-3">{{ $application->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $jobApplications->links() }}
            </div>
        @else
            <p>No applicants yet for this job.</p>
        @endif
    </div>
</x-employer-layout>
