<x-employer-layout>
    <div class="w-full bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500 animate-gradient-x text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-extrabold mb-6">Create Your Own Company</h1>
            <p class="text-lg mb-12">Start building your dream company and hire the best talent.</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 mt-16 max-w-4xl mx-auto">
                <!-- Create Company Card -->
                <div class="bg-white shadow-lg rounded-2xl flex flex-col items-center p-8 space-y-4 transition hover:shadow-xl">
                    <div class="bg-blue-100 p-4 rounded-full">
                        <x-heroicon-o-building-office class="w-10 h-10 text-blue-500" />
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Start Your Company</h2>
                    <p class="text-gray-600 text-center">Create and manage your own company.</p>
                    <a href="{{ route('companies.create') }}"
                       class="bg-blue-500 text-white text-sm font-bold py-3 px-6 rounded-lg transition hover:bg-blue-700">
                        Create Company
                    </a>
                </div>

                <!-- Create Job Card -->
                <div class="bg-white shadow-lg rounded-2xl flex flex-col items-center p-8 space-y-4 transition hover:shadow-xl">
                    <div class="bg-blue-100 p-4 rounded-full">
                        <x-heroicon-s-briefcase class="w-10 h-10 text-blue-500" />
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Post a Job</h2>
                    <p class="text-gray-600 text-center">Hire top talents for your company.</p>
                    <a href="{{ route('jobs.create') }}"
                       class="bg-blue-500 text-white text-sm font-bold py-3 px-6 rounded-lg transition hover:bg-blue-700">
                        Create Job
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .animate-gradient-x {
            background-size: 200% 200%;
            animation: gradient 4s ease infinite;
        }
    </style>
</x-employer-layout>
