<div class="w-full bg-white px-12 h-20">
    <div class="flex justify-between items-center h-full">
        <!-- Logo / Brand Name -->
        <div class="flex-shrink-0">
            <a href="/" class="text-2xl font-extrabold text-secondary ml-12">TalentHub</a>
        </div>

        <!-- Middle Section: Search Bar -->
        <form method="GET" action="{{ route('search.index') }}"
              class="flex items-center border border-gray-300 rounded-full px-4 py-2 space-x-2 w-1/2">
            <span class="text-secondary">🇲🇾</span>
            <span class="text-tertiary">Selangor</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-tertiary" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
            </svg>
            <div class="border-l border-gray-300 h-6"></div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-secondary" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M21 21l-4.35-4.35M3 10a7 7 0 1114 0 7 7 0 01-14 0z"/>
            </svg>
            <input type="text" placeholder="Job title, keyword, company" name="keyword"
                   class="w-full outline-none text-gray-700"/>
                   <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-3xl whitespace-nowrap">
                    Search
                </button>
        </form>

        <!-- Right Section: Buttons -->
        <div class="flex space-x-4">
            @if (Auth::check()) <!-- Check if user is logged in -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('profile.edit') }}" class="border border-blue-200 text-secondary px-5 py-2 rounded">Profile</a>
                    <button type="submit" class="border border-blue-200 text-secondary px-5 py-2 rounded">Log Out</button>
                </form>
            @else <!-- If the user is not logged in -->
                <a href="{{ route('register') }}" class="border border-blue-200 text-secondary px-5 py-2 rounded">Sign Up</a>
                <a href="{{ route('login') }}" class="bg-blue-600 text-white px-5 py-2 rounded">Log In</a>
            @endif
        </div>
    </div>
</div>
