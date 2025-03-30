<nav class="bg-primary w-full">
    <div class="px-4">
        <div class="flex items-center justify-between h-16">
            <!-- Left Section: Brand & Links -->
            <div class="flex items-center space-x-12 h-full">

                <!-- Navigation Links -->
                <div class="sm:flex space-x-8 h-full ml-24 items-center">
                    <a href="/" class="{{ request()->is('/') ? 'border-b-2 border-secondary text-tertiary' : 'text-tertiary' }} transition flex items-center h-full">
                        Home
                    </a>
                    <a href="/jobs" class="{{ request()->is('jobs*') ? 'border-b-2 border-secondary text-tertiary' : 'text-tertiary' }} transition flex items-center h-full">
                        Browse Jobs
                    </a>
                    <a href="{{ route('companies.list') }}" class="{{ request()->routeIs('companies.list') ? 'border-b-2 border-secondary text-tertiary' : 'text-tertiary' }} transition flex items-center h-full">
                    Browse Companies
                    </a>
                    <a href="/bookmarks" class="{{ request()->is('bookmarks') ? 'border-b-2 border-secondary text-tertiary' : 'text-tertiary' }} transition flex items-center h-full">
                        Bookmarked Jobs
                    </a>
                    <a href="/applications" class="{{ request()->is('applications') ? 'border-b-2 border-secondary text-tertiary' : 'text-tertiary' }} transition flex items-center h-full">
                        My Applications
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

