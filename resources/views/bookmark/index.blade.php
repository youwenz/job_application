<x-employee-layout>
    <!-- Job Listings Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @if($bookmarks->isEmpty())
                <div class="text-center py-10">
                    <p class="text-gray-500 text-lg">No bookmarks added.</p>
                </div>
            @else
                @foreach($bookmarks as $job)
                    <x-job-listing-card :jobListing="$job" />
                @endforeach
            @endif
        </div>

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            {{ $bookmarks->links('vendor.pagination.custom-pagination') }}
        </div>
    </div>
</x-employee-layout>
