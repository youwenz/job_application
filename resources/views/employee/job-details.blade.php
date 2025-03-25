<x-employee-layout>
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
        {{-- Job Title & Company --}}
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">{{ $jobListing->title }}</h1>
                <a href="/companies/{{$jobListing->user->company->id}}">
                    <p class="text-gray-600">{{ $jobListing->user->company->name }}</p>
                </a>
            </div>
            <div class="flex flex-row gap-4">
                <a href="#" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">Apply Now</a>
                <a href="#" class="px-2 py-2 border-secondary border-1 rounded-2xl">
                    <x-heroicon-o-bookmark class="w-7 h-7 text-secondary"/>
                </a>
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
