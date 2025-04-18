<x-employee-layout>
    @if (session('success'))
        <div
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 text-center w-full"
            role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Find Job</h2>

        <!-- Job Search Bar -->
        <x-job-search-bar/>


        <!-- Job Listings Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @if($jobListings->isEmpty())
                <div class="text-center py-10">
                    <p class="text-gray-500 text-lg">No jobs found.</p>
                </div>
            @else
                @foreach($jobListings as $job)
                    <x-job-listing-card :jobListing="$job"/>
                @endforeach
            @endif
        </div>

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            {{ $jobListings->links('vendor.pagination.custom-pagination') }}
        </div>

        @auth
            <h2 class="text-2xl font-bold mb-6">Recently Viewed Openings</h2>
            <!-- Job Listings Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @if($recentlyViewed->isEmpty())
                    <div class="text-center py-10">
                        <p class="text-gray-500 text-lg">No recently viewed openings.</p>
                    </div>
                @else
                    @foreach($recentlyViewed as $job)
                        <x-job-listing-card :jobListing="$job"/>
                    @endforeach
                @endif
            </div>
        @endauth
    </div>
</x-employee-layout>

<!-- Include Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
    window.addEventListener("pageshow", function (event) {
        if (event.persisted || window.performance.navigation.type === 2) {
            // If page loaded from back-forward cache or browser history
            window.location.reload();
        }
    });
</script>
