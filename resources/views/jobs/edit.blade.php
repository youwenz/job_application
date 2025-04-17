<x-employer-layout>
    <form action="{{ route('jobs.update', $job->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="bg-white w-full h-screen flex items-center justify-center p-8">
            <div class="grid grid-cols-2 gap-8 w-full max-w-6xl">
                <!-- Left Side -->
                <div>
                    <label class="text-gray-500 text-sm">Job Title</label>
                    <input type="text" name="title" value="{{ $job->title }}" class="border rounded-lg p-3 mt-1 font-semibold w-full" placeholder="Enter job title" required>

                    <div class="mt-4">
                        <p class="text-sm text-gray-500">Experience Required?</p>
                        <textarea name="requirements" class="border rounded-lg p-3 font-semibold w-full" placeholder="e.g., 2 years, N/A" required>{{ $job->requirements }}</textarea>
                    </div>

                    <div class="mt-4">
                        <p class="text-sm text-gray-500">Salary ($)</p>
                        <input type="number" name="salary" value="{{ $job->salary }}" class="border rounded-lg p-3 w-full" placeholder="Enter salary amount" required>
                    </div>

                    <div class="mt-4">
                        <p class="text-sm text-gray-500">Job Type</p>
                        <select name="job_type" class="border rounded-lg p-3 w-full">
                            <option value="Full-Time" {{ $job->job_type == 'Full-Time' ? 'selected' : '' }}>Full-Time</option>
                            <option value="Part-Time" {{ $job->job_type == 'Part-Time' ? 'selected' : '' }}>Part-Time</option>
                            <option value="Contract" {{ $job->job_type == 'Contract' ? 'selected' : '' }}>Contract</option>
                            <option value="Temporary" {{ $job->job_type == 'Temporary' ? 'selected' : '' }}>Temporary</option>
                            <option value="Internship" {{ $job->job_type == 'Internship' ? 'selected' : '' }}>Internship</option>
                            <option value="Volunteer" {{ $job->job_type == 'Volunteer' ? 'selected' : '' }}>Volunteer</option>
                            <option value="On-Call" {{ $job->job_type == 'On-Call' ? 'selected' : '' }}>On-Call</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <p class="text-sm text-gray-500">Is this a Remote Job?</p>
                        <input type="checkbox" name="remote" value="1" {{ $job->remote ? 'checked' : '' }} class="w-4 h-4 text-blue-500 border-gray-300 rounded">
                        <span>Yes, this job can be done remotely</span>
                    </div>

                    <div class="mt-4">
                        <p class="text-sm text-gray-500">Benefits (e.g., Tips, Commission, Bonuses, etc.)</p>
                        <textarea name="benefits" class="border rounded-lg p-3 w-full" placeholder="List any benefits offered (comma separated)">{{ $job->benefits }}</textarea>
                    </div>
                </div>

                <!-- Right Side -->
                <div>
                    <p class="font-semibold">Write Your Full Job Description</p>
                    <p class="text-sm text-gray-500">Describe Job Descriptions in Detail, including Requirements, Skills, or Education*</p>
                    <textarea name="description" class="w-full mt-2 border p-3 rounded-lg h-32" placeholder="Job Description" required>{{ $job->description }}</textarea>

                    <div class="mt-6 flex space-x-2">
                        <button type="submit" class="bg-blue-600 text-white py-3 px-6 w-full rounded-lg">Save Changes</button>
                        <a href="{{ route('jobs.show', ['id' => $job->user_id]) }}" class="...">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-employer-layout>
