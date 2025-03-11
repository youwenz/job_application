<nav class="bg-primary w-full">
    <div class="px-4">
        <div class="flex items-center justify-between h-16">
            <!-- Left Section: Brand & Links -->
            <div class="flex items-center space-x-12 h-full">

                <!-- Navigation Links -->
                <div class="sm:flex space-x-8 h-full ml-24 items-center">
                    <a href="/employer" class="{{ request()->is('employer') ? 'border-b-2 border-secondary text-tertiary' : 'text-tertiary' }} transition flex items-center h-full">
                        Home
                    </a>
                    <a href="/employer/jobs" class="{{ request()->is('jobs') ? 'border-b-2 border-secondary text-tertiary' : 'text-tertiary' }} transition flex items-center h-full">
                        My Jobs
                    </a>
                    <a href="/jobs/create" class="{{ request()->is('jobs/create') ? 'border-b-2 border-secondary text-tertiary' : 'text-tertiary' }} transition flex items-center h-full">
                        Post a Job
                    </a>
                    <a href="/employer/applications" class="{{ request()->is('employer/applications') ? 'border-b-2 border-secondary text-tertiary' : 'text-tertiary' }} transition flex items-center h-full">
                        Applications
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>



