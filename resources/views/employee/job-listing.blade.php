<x-employee-layout>
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Find Job</h2>

        <!-- Job Search Bar -->
        <x-job-search-bar />

    
        <!-- Job Listings Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($jobListings as $job)
                <x-job-listing-card :jobListing="$job" />
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            {{ $jobListings->links('vendor.pagination.custom-pagination') }}
        </div>

    </div>
</x-employee-layout>

<!-- Include Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
