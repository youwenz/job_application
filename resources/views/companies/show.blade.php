@auth
    @if(auth()->user()->role === 'employee')
        <x-employee-layout>
            <x-company-profile :company="$company" />
        </x-employee-layout>
    @elseif(auth()->user()->role === 'employer')
        <x-employer-layout>
            <x-company-profile :company="$company" :showUpdateButton="true" />
        </x-employer-layout>
    @endif
@endauth
