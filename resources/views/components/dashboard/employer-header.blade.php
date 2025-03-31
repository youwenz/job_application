<nav class="bg-primary w-full">
    <div class="px-4">
        <div class="flex items-center justify-between h-16">
            <!-- Left Section: Brand & Links -->
            <div class="flex items-center space-x-12 h-full">

                <!-- Navigation Links -->
                <div class="sm:flex space-x-8 h-full ml-24 items-center">
                    <!-- Home -->
                    <a href="/companies" class="{{ request()->is('employer') ? 'border-b-2 border-secondary text-tertiary' : 'text-tertiary' }} transition flex items-center h-full">
                        Home
                    </a>
                    <!-- Job Listing -->
                    <a href="#" class="{{ request()->routeIs('companies.showEmployer') ? 'border-b-2 border-secondary text-tertiary' : 'text-tertiary' }} transition flex items-center h-full">
                        Job Listings
                    </a>

                    <!-- Create Job -->
                    <a href="#" class="{{ request()->routeIs('employer.jobs.create') ? 'border-b-2 border-secondary text-tertiary' : 'text-tertiary' }} transition flex items-center h-full">
                        Post a Job
                    </a>

                    <!-- My Company -->
                    <a href="#" class="{{ request()->routeIs('employer.company.show') ? 'border-b-2 border-secondary text-tertiary' : 'text-tertiary' }} transition flex items-center h-full">
                        My Company
                    </a>

                    <!-- Job Applications -->
                    <a href="#" class="{{ request()->routeIs('employer.applications.*') ? 'border-b-2 border-secondary text-tertiary' : 'text-tertiary' }} transition flex items-center h-full">
                        Applications
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

