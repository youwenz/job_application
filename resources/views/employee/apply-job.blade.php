@php
    //$user = Auth::user();
    use App\Models\User;
    $dummyUserId = 1; // Simulated logged-in user ID
    $user = User::find($dummyUserId);
@endphp
<x-employee-layout>
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6 m-5">
        <h1 class="text-2xl font-bold text-gray-800">Apply for {{ $jobListing->title }}</h1>
        <p class="text-gray-600 mb-4">{{ $jobListing->user->company->name }}</p>

        <form action="{{ route('jobApplication.apply', ['jobId' => $jobListing->id]) }}" method="POST"
              enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="full_name" value={{old('full_name', $user->name ?? '')}} id="full_name"
                       class="mt-1 p-2 w-full border border-gray-300 rounded-lg" required>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{old('email', $user->email ?? '')}}"
                       class="mt-1 p-2 w-full border border-gray-300 rounded-lg" required>
            </div>

            <!-- Resume Upload -->
            <div class="mb-4">
                <label for="resume" class="block text-sm font-medium text-gray-700">Upload Resume (PDF only)</label>
                <input type="file" name="resume_path" id="resume_path" accept=".pdf"
                       class="mt-1 p-2 w-full border border-gray-300 rounded-lg" required>
            </div>

            <!-- Cover Letter -->
            <div class="mb-4">
                <label for="cover_letter" class="block text-sm font-medium text-gray-700">Cover Letter</label>
                <textarea name="message" id="message" rows="4"
                          class="mt-1 p-2 w-full border border-gray-300 rounded-lg"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                    Submit Application
                </button>
            </div>
        </form>
    </div>
</x-employee-layout>

