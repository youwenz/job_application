<x-employee-layout>
    <div class="flex-1">
        <div class="flex flex-row pl-10 pt-8 bg-gray-100">
            <div class="flex-col inline-flex w-[30%] relative">
                <p class="text-3xl font-bold mb-8">Filtered Jobs</p>
                <!-- Filter Bar -->
                <form method="GET" action="{{ route('search.index') }}" class="bg-gray-100 shadow rounded w-full">
                    <div class="flex flex-wrap flex-col gap-4 w-full">
                        <!-- Tags Filter -->
                        <div class="relative w-full">
                            <label onclick="toggleFilter('tags')"
                                   class="cursor-pointer font-bold px-4 py-4 hover:bg-blue-100 w-full block">Tags</label>
                            <div id="tags"
                                 class="hidden space-y-1 p-2 rounded bg-gray-100 grid grid-cols-2 gap-x-6 gap-y-2">
                                @foreach ($tags as $tag)
                                    <div class="flex items-center gap-2 mb-4 pl-4">
                                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                               id="tag-{{ $tag->id }}"
                                               class="appearance-none h-4 w-4 border border-gray-300 rounded-2xl checked:bg-secondary checked:border-transparent focus:ring-2 focus:ring-blue-500 cursor-pointer transition duration-200"/>
                                        <label for="tag-{{ $tag->id }}"
                                               class="text-gray-700 cursor-pointer">{{ $tag->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- State Filter -->
                        <div class="relative">
                            <label onclick="toggleFilter('states')"
                                   class="cursor-pointer font-bold px-4 py-4 hover:bg-blue-100 w-full block">States</label>
                            <div id="states"
                                 class="hidden space-y-1 p-2 rounded bg-gray-100 grid grid-cols-2 gap-x-6 gap-y-2">
                                @foreach ($states as $state)
                                    <div class="flex items-center gap-2 mb-4 pl-4">
                                        <input type="checkbox" name="states[]" value="{{ $state }}" id="{{ $state }}"
                                               class="appearance-none h-4 w-4 border border-gray-300 rounded-2xl checked:bg-secondary checked:border-transparent focus:ring-2 focus:ring-blue-500 cursor-pointer transition duration-200"/>
                                        <label for="{{ $state }}"
                                               class="text-gray-700 cursor-pointer">{{ $state }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Salary Filter -->
                        <div class="relative">
                            <label onclick="toggleFilter('salary')"
                                   class="cursor-pointer font-bold px-4 py-4 hover:bg-blue-100 w-full block">Salary
                                Range</label>
                            <div id="salary" class="hidden flex gap-2 pl-4">
                                <input type="number" name="min_salary" placeholder="Min"
                                       class="border border-gray-300 rounded-xl p-2 w-40">
                                <div class="mt-2">-</div>
                                <input type="number" name="max_salary" placeholder="Max"
                                       class="border border-gray-300 rounded-xl p-2 w-40">
                            </div>
                        </div>

                        <!-- Remote Filter -->
                        <div class="relative">
                            <label onclick="toggleFilter('remote')"
                                   class="cursor-pointer font-bold px-4 py-4 hover:bg-blue-100 w-full block">Remote</label>
                            <div id="remote" class="hidden space-y-1 p-2 rounded bg-gray-100">
                                <div class="flex items-center gap-2 mb-4 pl-4">
                                    <input type="checkbox" name="remote" value="yes" id="remote"
                                           class="appearance-none h-4 w-4 border border-gray-300 rounded-2xl checked:bg-secondary checked:border-transparent focus:ring-2 focus:ring-blue-500 cursor-pointer transition duration-200"/>
                                    <label for="remote" class="text-gray-700 cursor-pointer">Yes</label>
                                </div>
                                <div class="flex items-center gap-2 mb-4 pl-4">
                                    <input type="checkbox" name="remote" value="no" id="non-remote"
                                           class="appearance-none h-4 w-4 border border-gray-300 rounded-2xl checked:bg-secondary checked:border-transparent focus:ring-2 focus:ring-blue-500 cursor-pointer transition duration-200"/>
                                    <label for="non-remote" class="text-gray-700 cursor-pointer">No</label>
                                </div>
                            </div>
                        </div>

                        <!-- Job Type Filter -->
                        <div class="relative">
                            <label onclick="toggleFilter('jobType')"
                                   class="cursor-pointer font-bold px-4 py-4 hover:bg-blue-100 block w-full">Job
                                Type</label>
                            <div id="jobType" class="hidden space-y-2 grid grid-cols-2 p-2 rounded bg-gray-100">
                                @foreach (['Full-Time', 'Part-Time', 'Contract', 'Temporary', 'Internship', 'Volunteer', 'On-Call'] as $type)
                                    <div class="flex items-center gap-2 mb-4 pl-4">
                                        <input type="checkbox" name="states[]" value="{{ $type }}" id="{{ $type }}"
                                               class="appearance-none h-4 w-4 border border-gray-300 rounded-2xl checked:bg-secondary checked:border-transparent focus:ring-2 focus:ring-blue-500 cursor-pointer transition duration-200"/>
                                        <label for="{{ $type }}"
                                               class="text-gray-700 cursor-pointer">{{ $type }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-center">
                            <button type="submit" class="bg-secondary text-white py-2 px-10 rounded-lg mt-6 mb-6">Filter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 p-8 gap-8 max-h-fit">
                @foreach($jobs as $job)
                <x-job-card :job="$job"/>
                @endforeach
            </div>
        </div>

        <!-- JavaScript for Toggle Filters -->
        <script>
            function toggleFilter(id) {
                const element = document.getElementById(id);
                element.classList.toggle('hidden');
            }
        </script>
    </div>
</x-employee-layout>
