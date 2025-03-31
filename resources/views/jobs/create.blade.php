<x-employer-layout>
    <form action="{{ route('jobs.store') }}" method="POST">
        @csrf
        <div class="bg-white w-full h-screen flex items-center justify-center p-8">
            <div class="grid grid-cols-2 gap-8 w-full max-w-6xl">
                <!-- Left Side -->
                <div>
                    <label class="text-gray-500 text-sm">Job Title</label>
                    <input type="text" name="title" class="border rounded-lg p-3 mt-1 font-semibold w-full" placeholder="Enter job title" required>

                    <div class="mt-4">
                        <p class="text-sm text-gray-500">Experience Required?</p>
                        <textarea name="requirements" class="border rounded-lg p-3 font-semibold w-full" placeholder="e.g., 2 years, N/A" required></textarea>
                    </div>

                    <div class="mt-4">
                        <p class="text-sm text-gray-500">Salary ($)</p>
                        <input type="number" name="salary" class="border rounded-lg p-3 w-full" placeholder="Enter salary amount" required>
                    </div>

                    <div class="mt-4">
                        <p class="text-sm text-gray-500">Job Type</p>
                        <select name="job_type" class="border rounded-lg p-3 w-full">
                            <option value="Full-Time">Full-Time</option>
                            <option value="Part-Time">Part-Time</option>
                            <option value="Contract">Contract</option>
                            <option value="Temporary">Temporary</option>
                            <option value="Internship">Internship</option>
                            <option value="Volunteer">Volunteer</option>
                            <option value="On-Call">On-Call</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <p class="text-sm text-gray-500">Is this a Remote Job?</p>
                        <input type="checkbox" name="remote" value="1" class="w-4 h-4 text-blue-500 border-gray-300 rounded">
                        <span>Yes, this job can be done remotely</span>
                    </div>

                    <div class="mt-4">
                        <p class="text-sm text-gray-500">Benefits (e.g., Tips, Commission, Bonuses, etc.)</p>
                        <textarea name="benefits" class="border rounded-lg p-3 w-full" placeholder="List any benefits offered (comma separated)"></textarea>
                    </div>
                </div>

                <!-- Right Side -->
                <div>
                    <p class="font-semibold">Write Your Full Job Description</p>
                    <p class="text-sm text-gray-500">Describe Job Descriptions in Detail, including Requirements, Skills, or Education*</p>
                    <textarea name="description" class="w-full mt-2 border p-3 rounded-lg h-32" placeholder="Job Description" required></textarea>

                    <div class="mt-6 space-y-3">
                        <p class="font-semibold">Additional Options</p>
                        <div class="flex items-center justify-between">
                            <span>See Video Interviews</span>
                            <input type="checkbox" name="benefits[]" value="Video Interviews" class="toggle toggle-primary">
                        </div>
                        <div class="flex items-center justify-between">
                            <span>Video Calling</span>
                            <input type="checkbox" name="benefits[]" value="Video Calling" class="toggle toggle-primary">
                        </div>
                        <div class="flex items-center justify-between">
                            <span>Email</span>
                            <input type="checkbox" name="benefits[]" value="Email" class="toggle toggle-primary">
                        </div>
                    </div>

                    <button type="submit" class="mt-6 bg-blue-600 text-white py-3 px-6 w-full rounded-lg">Post Job</button>
                </div>
            </div>
        </div>
    </form>
</x-employer-layout>
