<x-employer-layout>
    <form action="{{ route('jobs.createJob') }}" method="POST">
        @csrf
        <div class="bg-white w-full h-screen flex items-center justify-center p-8">
            <div class="grid grid-cols-2 gap-8 w-full max-w-6xl">
                <!-- Left Side -->
                <div>
                    <label class="text-gray-500 text-sm">Job Title</label>
                    <div class="border rounded-lg p-3 mt-1 font-semibold">Looking for a creative designer</div>

                    <div class="mt-4">
                        <p class="text-sm text-gray-500">Experience Required?</p>
                        <p class="font-semibold">N/A</p>
                    </div>

                    <div class="mt-4">
                        <p class="text-sm text-gray-500">What is the Pay for this Job?</p>
                        <div class="flex gap-4">
                            <div class="border rounded-lg p-3 flex-1">From $ <span class="font-semibold">16</span></div>
                            <div class="border rounded-lg p-3 flex-1">To $ <span class="font-semibold">20</span></div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <p class="text-sm text-gray-500">Contract Type</p>
                        <p class="font-semibold">Per Hour</p>
                    </div>

                    <div class="mt-4">
                        <p class="text-sm text-gray-500">Are there Any Additional Forms of Compensation Offered?</p>
                        <div class="space-y-2 mt-2">
                            <div class="flex items-center gap-2">
                                <input type="checkbox" checked class="w-4 h-4 text-blue-500 border-gray-300 rounded">
                                <span>Tips</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <input type="checkbox" class="w-4 h-4 text-blue-500 border-gray-300 rounded">
                                <span>Commission</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <input type="checkbox" class="w-4 h-4 text-blue-500 border-gray-300 rounded">
                                <span>Bonuses</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <input type="checkbox" class="w-4 h-4 text-blue-500 border-gray-300 rounded">
                                <span>Store Discounts</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <input type="checkbox" class="w-4 h-4 text-blue-500 border-gray-300 rounded">
                                <span>Other Forms</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side -->
                <div>
                    <p class="font-semibold">Write Your Full Job Description</p>
                    <p class="text-sm text-gray-500">Describe Job Descriptions in Details, Requirements, Skills or Education*</p>
                    <textarea class="w-full mt-2 border p-3 rounded-lg h-32" placeholder="Job Description"></textarea>

                    <div class="mt-6 space-y-3">
                        <p class="font-semibold">Options Included</p>
                        <div class="flex items-center justify-between">
                            <span>See Video Interviews</span>
                            <input type="checkbox" class="toggle toggle-primary" checked>
                        </div>
                        <div class="flex items-center justify-between">
                            <span>Video Calling</span>
                            <input type="checkbox" class="toggle toggle-primary">
                        </div>
                        <div class="flex items-center justify-between">
                            <span>Email</span>
                            <input type="checkbox" class="toggle toggle-primary">
                        </div>
                    </div>

                    <button class="mt-6 bg-blue-600 text-white py-3 px-6 w-full rounded-lg">Post Job</button>
                </div>
            </div>
        </div>
    </form>
</x-employer-layout>
