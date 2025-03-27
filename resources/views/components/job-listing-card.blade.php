<a href="{{ route('jobListings.details', $jobListing->id) }}" class="border border-gray-200 rounded-lg shadow-md p-4 bg-white">
    <h3 class="text-lg font-semibold mt-2">{{ $jobListing->title }}</h3>
    <div class="flex flex-col md:flex-row justify-between md:items-center mt-2 ">
        <span class="text-sm font-semibold px-2 py-1 rounded bg-green-200 text-green-800 w-fit">
            {{ strtoupper($jobListing->job_type) }}
        </span>
        <p class="text-gray-700 font-bold mt-2">Salary: $ {{ $jobListing->salary }}</p>
    </div>

    <div class="flex justify-between items-center mt-2">
        <div>
            <p class="text-gray-600 text-sm">{{ $jobListing->user->company->name }}</p>
            <div class="flex flex-row items-center mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.0" stroke="currentColor" class="size-5 opacity-50">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                </svg>
                <p class="text-gray-500 text-sm ml-2">{{ $jobListing->user->company->city }}</p>
            </div>
        </div>

        @php
            $defaultUserId = 1; // Temporary user ID
            $isBookmarked = \App\Models\Bookmark::where('user_id', $defaultUserId)->where('job_id', $jobListing->id)->exists();
        @endphp

        <!-- Bookmark Button -->
        <form action="{{ $isBookmarked ? route('jobListings.bookmark.remove', $jobListing->id) : route('jobListings.bookmark', $jobListing->id) }}" method="POST">
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
</a>
