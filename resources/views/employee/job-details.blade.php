@php
    $dummyUserId = 1; // Simulated logged-in user ID
   $isBookmarked = $jobListing->bookmarkedByUsers->contains($dummyUserId);
@endphp
<x-employee-layout>
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6 m-5">
        {{-- Job Title & Company --}}
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">{{ $jobListing->title }}</h1>
                <a href="/companies/{{$jobListing->user->company->id}}">
                    <p class="text-gray-600">{{ $jobListing->user->company->name }}</p>
                </a>
            </div>
            <div class="flex flex-row gap-4">
                <a href="{{ route('jobListings.apply.form', ['jobId' => $jobListing->id]) }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">Apply Now</a>
                <form class="px-2 py-1 border-2 border-gray-200 rounded-xl" action="{{ route('jobListings.bookmark', $jobListing->id) }}" method="POST" x-data="{ bookmarked: false }" @submit.prevent="bookmarked = !bookmarked">
                    @csrf
                    <button type="submit" class="mt-1 text-gray-500 hover:text-blue-500 transition duration-200 transform hover:scale-110">
                        <!-- Unfilled Bookmark (Default) -->
                        <svg x-show="!bookmarked" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 opacity-30">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                        </svg>

                        <!-- Filled Bookmark -->
                        <svg x-show="bookmarked" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-blue-500">
                            <path fill-rule="evenodd" d="M6.32 2.577a49.255 49.255 0 0 1 11.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 0 1-1.085.67L12 18.089l-7.165 3.583A.75.75 0 0 1 3.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93Z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </form>

            </div>
        </div>

        {{-- Job Info --}}
        <div class="mt-4 flex gap-4 text-sm text-gray-700">
            <span class="bg-gray-200 px-3 py-1 rounded-md">{{ ucfirst($jobListing->job_type) }}</span>
            <span class="bg-gray-200 px-3 py-1 rounded-md">{{ $jobListing->remote ? 'Remote' : 'On-Site' }}</span>
            @foreach($jobListing -> tags as $tag)
                <span class="bg-gray-200 px-3 py-1 rounded-md">{{ $tag -> name}}</span>
            @endforeach
        </div>

        <h2 class="text-lg font-semibold mt-4">Salary</h2>
        <div class=" flex-row flex mt-2">
            <x-heroicon-o-currency-dollar class="w-7 h-7"/>
            <p class="text-gray-600 text-lg ml-2">{{$jobListing -> salary}} MYR</p>
        </div>

        <h2 class="text-lg font-semibold mt-4">Location</h2>
        <div class=" flex-row flex mt-2">
            <x-heroicon-o-map-pin class="w-7 h-7"/>
            <p class="text-gray-600 text-lg ml-2">{{$jobListing -> user -> company -> state}}</p>
        </div>

        {{-- Job Description --}}
        <div class="mt-6">
            <h2 class="text-lg font-semibold">About this role</h2>
            <p class="text-gray-700 mt-2">{{ $jobListing->description }}</p>
        </div>

        {{-- Qualifications --}}
        <div class="mt-6">
            <h2 class="text-lg font-semibold">Qualifications</h2>
            <ul class="list-disc list-inside text-gray-700 mt-2">
                @foreach(explode("\n", $jobListing->requirements) as $requirement)
                    <li>{{ $requirement }}</li>
                @endforeach
            </ul>
        </div>


        {{-- Benefits --}}
        <div class="mt-6">
            <h2 class="text-lg font-semibold">Benefits</h2>
            <p class="text-gray-700 mt-2">{{ $jobListing->benefits }}</p>
        </div>

        {{-- Posted Date --}}
        <div class="mt-6 text-sm text-gray-500">
            <p>Posted on {{ $jobListing->created_at->format('F d, Y') }}</p>
        </div>
    </div>
</x-employee-layout>

<!-- Include Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

