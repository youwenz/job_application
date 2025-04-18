@php
    $layout = auth()->user()->role === 'employee' ? 'employee-layout' : 'employer-layout';
@endphp
<x-dynamic-component :component="$layout">
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">{{$jobs->first()->user->company->name}} - Job Listings</h2>

        <div class="space-y-4">
            @foreach ($jobs as $job)
                <div
                    onclick="window.location='{{ route('jobListings.details', $job->id) }}'"
                    class="bg-white p-6 rounded-lg shadow-md border border-gray-200 flex flex-col md:flex-row justify-between items-start relative">
                    <div class="flex-1">
                        <h2 class="text-lg font-bold text-gray-800">{{ $job->title }}</h2>
                        <p class="text-sm text-gray-600 font-semibold">{{ $job->user->company->name }}</p>

                        <p class="text-sm text-gray-700 mt-2">{{ Str::limit($job->description, 100) }}</p>
                        <p class="text-sm text-gray-600 mt-1"><strong>Salary:</strong>
                            ${{ number_format($job->salary) }}</p>
                        <p class="text-sm text-gray-600"><strong>Job Type:</strong> {{ $job->job_type }}</p>
                        <p class="text-sm text-gray-600"><strong>Remote:</strong> {{ $job->remote ? 'Yes' : 'No' }}</p>

                        <details class="mt-2 text-sm text-gray-700" onclick="event.stopPropagation()">
                            <summary class="cursor-pointer text-blue-500 font-semibold">View More</summary>
                            <p class="mt-1"><strong>Requirements:</strong> {{ Str::limit($job->requirements, 150) }}</p>
                            <p class="mt-1"><strong>Benefits:</strong> {{ Str::limit($job->benefits, 150) }}</p>
                        </details>

                        <!-- <a href="{{ route('jobListings.details', $job->id) }}"
                            class="mt-3 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                            View Details
                        </a> -->

                        @can('update', $job)
                        <a href="{{ route('jobs.showApplicants', $job->id) }}"
                            class="inline-block mt-4 bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded shadow-md transition">
                                View Applicants
                        </a>
                        @endcan
                    </div>

                    <!-- Buttons Section: Side by side, Edit first, Delete second -->
                    <div class="absolute top-4 right-4 flex space-x-4">
                        <!-- Edit Button -->
                        @can('update', $job)
                            <a href="{{ route('jobs.edit', $job->id) }}"
                               class="p-2 rounded-full hover:bg-gray-100 shadow-md transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                     stroke="currentColor"
                                     class="h-6 w-6 text-blue-500 hover:scale-110 transition-transform">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M16.862 3.487a2.25 2.25 0 013.182 3.182L7.018 19.696a1.5 1.5 0 01-.67.39l-4.5 1.2a.75.75 0 01-.927-.928l1.2-4.5a1.5 1.5 0 01.39-.67L16.862 3.487zM15 5.25l3.75 3.75"/>
                                </svg>
                            </a>
                        @endcan

                        <!-- Delete Button -->
                        @can('delete', $job)
                            <form action="{{ route('jobs.delete', $job->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this job?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="p-2 rounded-full hover:bg-gray-100 shadow-md transition duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="2"
                                         stroke="currentColor"
                                         class="h-6 w-6 text-red-500 hover:scale-110 transition-transform">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </form>
                        @endcan
                    </div>

                    <!-- Sent time positioned at the bottom-right -->
                    <p class="absolute bottom-8 right-4 text-gray-400 text-sm">
                        Posted {{ $job->created_at->diffForHumans() }}
                    </p>
                </div>
            @endforeach
        </div>

        @if ($jobs->isEmpty())
            <p class="text-center text-gray-500 mt-6">No jobs found.</p>
        @endif

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            {{ $jobs->links('vendor.pagination.custom-pagination') }}
        </div>
    </div>
</x-dynamic-component>


