<x-employer-layout>
    <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="bg-white w-full h-screen flex items-center justify-center p-8">
            <div class="grid grid-cols-2 gap-6 w-full max-w-5xl">
                <!-- Left Side -->
                <div>
                    <label class="text-gray-500 text-sm">Company Name</label>
                    <input type="text" name="name" value="{{ $company->name }}" class="border rounded-lg p-3 mt-1 w-full font-semibold">

                    <div class="mt-3">
                        <label class="text-gray-500 text-sm">Owner Name</label>
                        <input type="text" name="owner_name" value="{{ $company->owner_name }}" class="border rounded-lg p-3 mt-1 w-full font-semibold">
                    </div>

                    <div class="mt-3">
                        <label class="text-gray-500 text-sm">Phone Number</label>
                        <input type="text" name="phone" value="{{ $company->phone }}" class="border rounded-lg p-3 mt-1 w-full font-semibold">
                    </div>

                    <div class="mt-3">
                        <label class="text-gray-500 text-sm">Website (Optional)</label>
                        <input type="text" name="website" value="{{ $company->website }}" class="border rounded-lg p-3 mt-1 w-full font-semibold">
                    </div>

                    <div class="mt-3 flex items-center space-x-4">
                         @if($company->logo)
                            <div class="w-20 h-17 flex items-center justify-center border rounded-lg overflow-hidden">
                                <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" class="object-cover w-full h-full">
                            </div>
                        @endif
                        <div>
                            <label class="text-gray-500 text-sm">Company Logo</label>
                            <input type="file" name="logo" accept=".jpeg,.jpg,.png,.gif" class="border rounded-lg p-3 mt-1 w-full">
                        </div>
                    </div>

                    <div class="mt-3">
                        <label class="text-gray-500 text-sm">Company Size</label>
                        <select name="company_size" class="w-full p-3 border rounded-lg">
                            <option value="1-10" {{ $company->company_size == '1-10' ? 'selected' : '' }}>1-10 employees</option>
                            <option value="11-50" {{ $company->company_size == '11-50' ? 'selected' : '' }}>11-50 employees</option>
                            <option value="51-200" {{ $company->company_size == '51-200' ? 'selected' : '' }}>51-200 employees</option>
                            <option value="201-500" {{ $company->company_size == '201-500' ? 'selected' : '' }}>201-500 employees</option>
                            <option value="501+" {{ $company->company_size == '501+' ? 'selected' : '' }}>501+ employees</option>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="text-gray-500 text-sm">Company Description</label>
                        <textarea name="description" class="w-full mt-2 border p-3 rounded-lg h-28">{{ $company->description }}</textarea>
                    </div>
                </div>

                <!-- Right Side -->
                <div>
                    <label class="text-gray-500 text-sm">Address</label>
                    <input type="text" name="address" value="{{ $company->address }}" class="border rounded-lg p-3 mt-1 w-full font-semibold">

                    <div class="mt-3">
                        <label class="text-gray-500 text-sm">ZIP Code</label>
                        <input type="text" name="zipcode" value="{{ $company->zipcode }}" class="border rounded-lg p-3 mt-1 w-full font-semibold">
                    </div>

                    <div class="mt-3">
                        <label class="text-gray-500 text-sm">City</label>
                        <select name="city" class="w-full p-3 border rounded-lg">
                            <option value="Kuala Lumpur" {{ $company->city == 'Kuala Lumpur' ? 'selected' : '' }}>Kuala Lumpur</option>
                            <option value="Johor Bahru" {{ $company->city == 'Johor Bahru' ? 'selected' : '' }}>Johor Bahru</option>
                            <option value="Penang" {{ $company->city == 'Penang' ? 'selected' : '' }}>Penang</option>
                            <option value="Ipoh" {{ $company->city == 'Ipoh' ? 'selected' : '' }}>Ipoh</option>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="text-gray-500 text-sm">State</label>
                        <select name="state" class="w-full p-3 border rounded-lg">
                            <option value="Selangor" {{ $company->state == 'Selangor' ? 'selected' : '' }}>Selangor</option>
                            <option value="Johor" {{ $company->state == 'Johor' ? 'selected' : '' }}>Johor</option>
                            <option value="Penang" {{ $company->state == 'Penang' ? 'selected' : '' }}>Penang</option>
                            <option value="Perak" {{ $company->state == 'Perak' ? 'selected' : '' }}>Perak</option>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="text-gray-500 text-sm">Country</label>
                        <select name="country" class="w-full p-3 border rounded-lg">
                            <option value="">Select Country</option>
                            <option value="Malaysia" {{ $company->country == 'Malaysia' ? 'selected' : '' }}>Malaysia</option>
                            <option value="Singapore" {{ $company->country == 'Singapore' ? 'selected' : '' }}>Singapore</option>
                            <option value="Indonesia" {{ $company->country == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                            <option value="Thailand" {{ $company->country == 'Thailand' ? 'selected' : '' }}>Thailand</option>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="text-gray-500 text-sm">Industry Type</label>
                        <select name="industry_type" class="w-full p-3 border rounded-lg">
                            <option value="">Select Industry</option>
                            <option value="Technology" {{ $company->industry_type == 'Technology' ? 'selected' : '' }}>Technology</option>
                            <option value="Finance" {{ $company->industry_type == 'Finance' ? 'selected' : '' }}>Finance</option>
                            <option value="Healthcare" {{ $company->industry_type == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
                            <option value="Retail" {{ $company->industry_type == 'Retail' ? 'selected' : '' }}>Retail</option>
                            <option value="Manufacturing" {{ $company->industry_type == 'Manufacturing' ? 'selected' : '' }}>Manufacturing</option>
                        </select>
                    </div>

                    <div class="mt-3 flex space-x-2">
                        <button type="submit" class="bg-blue-600 text-white py-3 px-6 w-full rounded-lg">Save Changes</button>
                        <a href="{{ route('companies.view', $company->id) }}" class="bg-gray-400 text-white py-3 px-6 w-full rounded-lg text-center">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-employer-layout>
