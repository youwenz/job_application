<x-employer-layout>
@if(session('error'))
        <div class="bg-red-100 text-red-700 p-4 rounded">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="bg-white w-full min-h-screen flex justify-center items-center p-8">
            <div class="grid grid-cols-2 gap-6 w-full max-w-5xl">
                <!-- Left Side -->
                <div>
                    <!-- Company Name -->
                    <label class="text-gray-500 text-sm">Company Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="border rounded-lg p-3 mt-1 w-full font-semibold">
                    @error('name')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    <div class="mt-3">
                        <!-- Owner Name -->
                        <label class="text-gray-500 text-sm">Owner Name</label>
                        <input type="text" name="owner_name" value="{{ old('owner_name') }}" class="border rounded-lg p-3 mt-1 w-full font-semibold">
                        @error('owner_name')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <!-- Phone Number -->
                        <label class="text-gray-500 text-sm">Phone Number</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" class="border rounded-lg p-3 mt-1 w-full font-semibold">
                        @error('phone')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <!-- Website -->
                        <label class="text-gray-500 text-sm">Website (Optional)</label>
                        <input type="text" name="website" value="{{ old('website') }}" class="border rounded-lg p-3 mt-1 w-full font-semibold">
                        @error('website')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <!-- Company Logo -->
                        <label class="text-gray-500 text-sm">Company Logo</label>
                        <input type="file" name="logo" accept=".jpeg,.jpg,.png,.gif" class="border rounded-lg p-3 mt-1 w-full">
                        @error('logo')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <!-- Company Size -->
                        <label class="text-gray-500 text-sm">Company Size</label>
                        <select name="company_size" class="w-full p-3 border rounded-lg">
                            <option value="">Select Size</option>
                            <option value="1-10">1-10 employees</option>
                            <option value="11-50">11-50 employees</option>
                            <option value="51-200">51-200 employees</option>
                            <option value="201-500">201-500 employees</option>
                            <option value="501+">501+ employees</option>
                        </select>
                        @error('company_size')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <!-- Company Description -->
                        <label class="text-gray-500 text-sm">Company Description</label>
                        <textarea name="description" class="w-full mt-2 border p-3 rounded-lg h-28" placeholder="Describe your company">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Right Side -->
                <div>
                    <label class="text-gray-500 text-sm">Address</label>
                    <input type="text" name="address" value="{{ old('address') }}" class="border rounded-lg p-3 mt-1 w-full font-semibold">
                    @error('address')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    <div class="mt-3">
                        <!-- ZIP Code -->
                        <label class="text-gray-500 text-sm">ZIP Code</label>
                        <input type="text" name="zipcode" value="{{ old('zipcode') }}" class="border rounded-lg p-3 mt-1 w-full font-semibold">
                        @error('zipcode')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <!-- City -->
                        <label class="text-gray-500 text-sm">City</label>
                        <select name="city" class="w-full p-3 border rounded-lg">
                            <option value="">Select City</option>
                            <option value="Kuala Lumpur">Kuala Lumpur</option>
                            <option value="Johor Bahru">Johor Bahru</option>
                            <option value="Penang">Penang</option>
                            <option value="Ipoh">Ipoh</option>
                        </select>
                        @error('city')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <!-- State -->
                        <label class="text-gray-500 text-sm">State</label>
                        <select name="state" class="w-full p-3 border rounded-lg">
                            <option value="">Select State</option>
                            <option value="Selangor">Selangor</option>
                            <option value="Johor">Johor</option>
                            <option value="Penang">Penang</option>
                            <option value="Perak">Perak</option>
                        </select>
                        @error('state')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <!-- Country -->
                        <label class="text-gray-500 text-sm">Country</label>
                        <select name="country" class="w-full p-3 border rounded-lg">
                            <option value="">Select Country</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Thailand">Thailand</option>
                        </select>
                        @error('country')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <!-- Industry Type -->
                        <label class="text-gray-500 text-sm">Industry Type</label>
                        <select name="industry_type" class="w-full p-3 border rounded-lg">
                            <option value="">Select Industry</option>
                            <option value="Technology">Technology</option>
                            <option value="Finance">Finance</option>
                            <option value="Healthcare">Healthcare</option>
                            <option value="Retail">Retail</option>
                            <option value="Manufacturing">Manufacturing</option>
                        </select>
                        @error('industry_type')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="mt-5 bg-blue-600 text-white py-3 px-6 w-full rounded-lg" onclick="this.disabled=true; this.form.submit();">
                        Create Company
                    </button>

                </div>
            </div>
        </div>
    </form>
</x-employer-layout>
