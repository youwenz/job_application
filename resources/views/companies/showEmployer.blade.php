<x-employer-layout>
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif
<x-company-profile :company="$company" :showUpdateButton="true" />
</x-employer-layout>


