<x-employee-layout>
<x-public-layout>
    <div
        class="w-full bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500 animate-gradient-x text-white">
        <div class="container mx-auto px-4 py-20 text-center">
            <h1 class="text-5xl font-extrabold mb-6">Find Your Dream Job</h1>
            <p class="text-lg mb-12">Find a job that suits your interest & skills.</p>


            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-24">
                <!-- Live Jobs Card -->
                <div class="bg-white shadow rounded-2xl flex items-center p-6 space-x-4">
                    <div class="bg-blue-50 p-4 rounded-xl">
                        <x-heroicon-o-briefcase class="w-6 h-6 text-secondary"/>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-tertiary">1,75,324</h2>
                        <p class="text-gray-500">Live Job</p>
                    </div>
                </div>

                <!-- Companies Card -->
                <div class="bg-white shadow rounded-2xl flex items-center p-6 space-x-4">
                    <div class="bg-blue-500 p-4 rounded-xl">
                        <x-heroicon-s-building-office class="w-6 h-6 text-primary"/>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-tertiary">97,354</h2>
                        <p class="text-gray-500">Companies</p>
                    </div>
                </div>

                <!-- Candidates Card -->
                <div class="bg-white shadow rounded-2xl flex items-center p-6 space-x-4">
                    <div class="bg-blue-50 p-4 rounded-xl">
                        <x-heroicon-s-users class="w-6 h-6 text-secondary"/>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-tertiary">38,47,154</h2>
                        <p class="text-gray-500">Candidates</p>
                    </div>
                </div>

                <!-- New Jobs Card -->
                <div class="bg-white shadow rounded-2xl flex items-center p-6 space-x-4">
                    <div class="bg-blue-50 p-4 rounded-xl">
                        <x-heroicon-s-newspaper class="w-6 h-6 text-secondary"/>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-tertiary">7,532</h2>
                        <p class="text-gray-500">New Jobs</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="w-full bg-white flex justify-center items-center flex-row mt-16 py-12">
        <!-- Candidate Card -->
        <div
            class="w-[40%] h-65 rounded-lg bg-primary bg-cover bg-center flex flex-col mx-8 bg-[url('/public/images/office-background.jpg')] relative">
            <!-- Overlay for better text visibility -->
            <div class="absolute inset-0 bg-black opacity-50 z-0 rounded-lg"></div>
            <div class="w-full h-full rounded-2xl flex flex-col justify-center space-y-4 p-4 pl-[10%] z-10">
                <p class="text-3xl text-white font-bold">Become a Candidate</p>
                <p class="text-lg text-gray-200">Your Dream Job Awaits – Start Your Journey Here.</p>

                <!-- Register Button -->
                <a href="/register"
                   class="bg-white text-secondary self-start text-sm font-bold py-2 px-6 rounded-sm transition hover:bg-blue-700 hover:text-white flex flex-row group">
                    Register Now
                    <x-heroicon-s-arrow-long-right
                        class="w-6 h-6 text-secondary ml-4 transition group-hover:text-white"/>
                </a>
            </div>

        </div>
        <!-- Candidate Card -->
        <div
            class="w-[40%] h-65 rounded-lg bg-primary bg-fit bg-center flex flex-col mx-8 bg-[url('/public/images/employer-bg.jpg')] relative">
            <!-- Overlay for better text visibility -->
            <div class="absolute inset-0 bg-black opacity-50 z-0 rounded-lg"></div>
            <div class="w-full h-full rounded-2xl flex flex-col justify-center space-y-4 p-4 pl-[10%] z-10">
                <p class="text-3xl text-white font-bold">Become an Employer</p>
                <p class="text-lg text-gray-200">Discover Top Talent – Build Your Dream Team.</p>

                <!-- Register Button -->
                <a href="/register"
                   class="bg-white text-secondary self-start text-sm font-bold py-2 px-6 rounded-sm transition hover:bg-blue-700 hover:text-white flex flex-row group">
                    Register Now
                    <x-heroicon-s-arrow-long-right
                        class="w-6 h-6 text-secondary ml-4 transition group-hover:text-white"/>
                </a>
            </div>
        </div>
    </div>
</x-public-layout>
</x-employee-layout>

<style>
    @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    .animate-gradient-x {
        background-size: 200% 200%;
        animation: gradient 4s ease infinite;
    }
</style>
