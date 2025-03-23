<x-employer-layout>
    <div class="container mx-auto px-6 py-10 flex flex-col items-center">
        <div class="bg-white shadow-lg rounded-xl p-10 border border-gray-200 w-full max-w-2xl text-center">
            <div class="flex flex-col items-center">
                <img src="{{ asset('storage/' . $company->logo) }}"
                     alt="Company Logo"
                     class="h-24 w-24 object-cover rounded-lg shadow-md mb-4">

                <h3 class="text-xl font-semibold text-gray-800">{{ $company->name }}</h3>
                <p class="text-gray-600 mt-1">{{ $company->description ?? 'No description available' }}</p>
            </div>

            <div class="mt-6 space-y-4 text-gray-700 flex flex-col items-center w-full">
                @php
                    $details = [
                        '📍 Location' => ($company->city ?? 'Not specified') . ', ' . ($company->state ?? '') . ', ' . ($company->country ?? ''),
                        '🏢 Address' => $company->address ?? 'Not specified',
                        '💼 Industry' => $company->industry_type ?? 'Not specified',
                        '👥 Company Size' => $company->company_size ?? 'Not specified',
                        '🔗 Website' => $company->website ? "<a href='{$company->website}' class='text-blue-500 underline' target='_blank'>{$company->website}</a>" : 'N/A',
                        '👤 Owner' => $company->owner_name ?? 'Not specified',
                        '📞 Phone' => $company->phone ?? 'Not specified',
                    ];
                @endphp

                @foreach ($details as $label => $value)
                    <div class="flex w-4/5">
                        <p class="w-1/3 font-semibold text-gray-800 text-left">{{ $label }}:</p>
                        <p class="w-2/3 text-left">{!! $value !!}</p>
                    </div>
                @endforeach
            </div>

            <a href="{{ route('companies.show', $company->id) }}"
               class="block mt-6 bg-blue-600 text-white text-center py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300 w-4/5 mx-auto">
                View Open Positions ({{ $company->job_openings ?? 0 }})
            </a>
        </div>
    </div>
</x-employer-layout>


