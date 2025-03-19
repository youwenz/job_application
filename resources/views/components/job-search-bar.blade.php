<form method="GET" action="{{ route('jobListings.list') }}" class="flex flex-wrap items-center border border-gray-300 rounded-lg overflow-hidden w-full p-2 mb-10">
    <!-- Job Title Input -->
    <div class="flex items-center flex-grow px-3">
        <span class="text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="blue" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
        </span>
        <input type="text" name="query" class="w-full px-3 py-2 outline-none text-sm md:text-base truncate" placeholder="Search by: Job title, Position, Keyword..." value="{{ request('query') }}">
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
        <input type="text" name="location" class="w-28 md:w-48 px-3 py-2 outline-none text-sm md:text-base truncate" placeholder="City, state or zip code" value="{{ request('location') }}">
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
