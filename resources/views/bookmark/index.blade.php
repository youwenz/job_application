<x-employee-layout>
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Bookmarks</h2>

        <div class="space-y-4">
            @foreach ($bookmarks as $bookmark)
                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 flex flex-col md:flex-row justify-between items-start relative">
                    <div class="flex-1">
                        <h2 class="text-lg font-bold text-gray-800">{{ $bookmark->job->user->company->name }}</h2>
                        <p class="text-sm text-gray-600 font-semibold">{{ $bookmark->job->title }}</p>
                        
                        <p class="text-sm text-gray-700 mt-2">{{ Str::limit($bookmark->job->description, 100) }}</p>
                        <p class="text-sm text-gray-600 mt-1"><strong>Salary:</strong> ${{ number_format($bookmark->job->salary) }}</p>
                        <p class="text-sm text-gray-600"><strong>Job Type:</strong> {{ $bookmark->job->job_type }}</p>
                        <p class="text-sm text-gray-600"><strong>Remote:</strong> {{ $bookmark->job->remote ? 'Yes' : 'No' }}</p>

                        <details class="mt-2 text-sm text-gray-700">
                            <summary class="cursor-pointer text-blue-500 font-semibold">View More</summary>
                            <p class="mt-1"><strong>Requirements:</strong> {{ Str::limit($bookmark->job->requirements, 150) }}</p>
                            <p class="mt-1"><strong>Benefits:</strong> {{ Str::limit($bookmark->job->benefits, 150) }}</p>
                        </details>
                    </div>

                    <div class="mt-4 md:mt-0 flex flex-col items-center">
                        @php
                            $isBookmarked = \App\Models\Bookmark::where('user_id', $user->id)
                                ->where('job_id', $bookmark->job->id)
                                ->exists();
                        @endphp

                        <!-- Bookmark Button -->
                        <form action="{{ $isBookmarked ? route('jobListings.bookmark.remove', ['jobId' => $bookmark->job->id]) : route('jobListings.bookmark', ['jobId' => $bookmark->job->id]) }}" method="POST">
                            @csrf
                            @if ($isBookmarked)
                                @method('DELETE')
                            @endif

                            <button type="submit" class="text-gray-500 hover:text-blue-500 transition duration-200 transform hover:scale-110">
                                @if ($isBookmarked)
                                    <!-- Filled Bookmark -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-blue-500">
                                        <path fill-rule="evenodd" d="M6.32 2.577a49.255 49.255 0 0 1 11.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 0 1-1.085.67L12 18.089l-7.165 3.583A.75.75 0 0 1 3.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93Z" clip-rule="evenodd" />
                                    </svg>
                                @else
                                    <!-- Unfilled Bookmark -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 opacity-30">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                                    </svg>
                                @endif
                            </button>
                        </form>
                    </div>

                    <!-- Sent time positioned at the bottom-right -->
                    <p class="absolute bottom-8 right-4 text-gray-400 text-sm">
                        Added {{ $bookmark->created_at->diffForHumans() }}
                    </p>
                </div>
            @endforeach
        </div>

        @if ($bookmarks->isEmpty())
            <p class="text-center text-gray-500 mt-6">No bookmarks found.</p>
        @endif

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            {{ $bookmarks->links('vendor.pagination.custom-pagination') }}
        </div>
    </div>
</x-employee-layout>
