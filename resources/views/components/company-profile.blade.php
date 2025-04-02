@props(['company', 'showUpdateButton' => false])

<div class="container mx-auto px-6 py-10 flex flex-col items-center">
    <div class="bg-white shadow-lg rounded-xl p-10 border border-gray-200 w-full max-w-2xl text-center relative">

        @if ($showUpdateButton)
            <a href="{{ route('companies.edit', $company->id) }}"
               class="absolute top-4 right-4 p-2 rounded-full shadow-md transition duration-300
                      group hover:bg-gray-100 hover:shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="2" stroke="currentColor"
                     class="h-6 w-6 text-blue-500 group-hover:scale-110 transition-transform">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16.862 3.487a2.25 2.25 0 013.182 3.182L7.018 19.696a1.5 1.5 0 01-.67.39l-4.5 1.2a.75.75 0 01-.927-.928l1.2-4.5a1.5 1.5 0 01.39-.67L16.862 3.487zM15 5.25l3.75 3.75" />
                </svg>
                <span class="absolute -top-8 right-0 bg-black text-white text-xs py-1 px-2 rounded-lg
                              opacity-0 group-hover:opacity-100 transition-opacity">
                    Edit
                </span>
            </a>
        @endif

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
                    '👤 Owner' => $company->user->name ?? 'Not specified',
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
