<form method="GET" action="{{ route('jobListings.index') }}" class="flex flex-wrap items-center border border-gray-300 rounded-lg overflow-hidden w-full p-2 mb-10">
    <!-- Job Title Input -->
    <div class="flex items-center flex-grow px-3">
        <span class="text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="blue" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
        </span>
        <input type="text" name="query" class="rounded-md ml-2 w-full px-3 py-2 outline-none text-sm md:text-base truncate" placeholder="Search by: Job title, Position, Keyword..." value="{{ request('query') }}">
    </div>

    <!-- Location Input -->
    <div class="hidden md:block h-8 w-px bg-gray-300"></div>
    <div class="flex items-center px-3">
        <span class="text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="blue" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
            </svg>
        </span>
        <input type="text" name="location" class="rounded-md ml-2 w-28 md:w-48 px-3 py-2 outline-none text-sm md:text-base truncate" placeholder="City, state or zip code" value="{{ request('location') }}">
    </div>

    <!-- Salary Range -->
    <!-- <div class="hidden md:block h-8 w-px bg-gray-300"></div>
    <div class="flex items-center px-3">
        <input type="number" name="salary_min" class="w-24 md:w-32 px-3 py-2 outline-none text-sm md:text-base truncate" placeholder="Min Salary" value="{{ request('salary_min') }}">
        <span class="mx-1 text-gray-500">-</span>
        <input type="number" name="salary_max" class="w-24 md:w-32 px-3 py-2 outline-none text-sm md:text-base truncate" placeholder="Max Salary" value="{{ request('salary_max') }}">
    </div> -->

    <!-- Job Type -->
    <div class="hidden sm:flex items-center px-3 relative">
        <select name="job_type"
                class="block w-full px-4 py-2 border border-gray-300 bg-white rounded-lg shadow-sm
               focus:outline-none  text-gray-700
               appearance-none pr-10">
            <option value="" class="text-gray-500">Job Type</option>
            <option value="full-time" {{ request('job_type') == 'full-time' ? 'selected' : '' }}>Full-Time</option>
            <option value="part-time" {{ request('job_type') == 'part-time' ? 'selected' : '' }}>Part-Time</option>
            <option value="contract" {{ request('job_type') == 'contract' ? 'selected' : '' }}>Contract</option>
            <option value="internship" {{ request('job_type') == 'internship' ? 'selected' : '' }}>Internship</option>
        </select>        
    </div>

    <!-- Remote Jobs Checkbox -->
    <div class="hidden sm:flex items-center px-3">
        <label class="flex items-center space-x-2">
            <input type="checkbox" name="remote" value="1" {{ request('remote') ? 'checked' : '' }} />
            <span class="text-sm">Remote Only</span>
        </label>
    </div>

    <!-- Search Button -->
    <button type="submit" class="bg-blue-500 text-white px-3 md:px-5 py-2 rounded-md ml-2 truncate">
        <span class="hidden md:inline">Find Job</span>
        <span class="md:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.0" stroke="white" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
        </span>
    </button>
</form>
