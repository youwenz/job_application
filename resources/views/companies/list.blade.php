<x-employee-layout>
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Top Companies</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($companies as $company)
                <div
                    onclick="window.location='{{ route('companies.show', $company->id) }}'"
                    class="cursor-pointer bg-white shadow-md rounded-lg p-6 flex flex-col items-start border border-gray-200 hover:shadow-lg transition duration-300"
                >
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo"
                                 class="h-16 w-16 object-cover rounded-lg">
                            <div>
                                <h3 class="text-lg font-semibold">{{ $company->name }}</h3>
                                <span class="text-xs bg-red-100 text-red-600 px-2 py-1 rounded">Featured</span>
                            </div>
                        </div>

                        <p class="text-gray-500 mt-2 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            {{ $company->city ?? 'Not specified' }}
                        </p>
                        <a href="{{ route('companies.jobs', ['userId' => $company->user_id]) }}"  class="block">
                            <p class="w-full bg-blue-100 text-blue-700 font-semibold mt-4 py-2 px-4 text-center rounded">
                                View Open Position
                            </p>
                        </a>
                    </div>
            @endforeach
        </div>
    </div>
</x-employee-layout>

