@extends('layouts.app')

@section('content')

@include('layouts.partials.public-navbar')

<div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 py-12 px-4">
    <div class="max-w-2xl w-full bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-8">

        <h2 class="text-2xl font-bold text-gray-800 dark:text-white text-center">
            Create Your Account
        </h2>

        <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-6">
            @csrf

            <!-- Full Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Full Name <span class="text-red-500">*</span>
                </label>
                <input type="text" name="name" required
                    value="{{ old('name') }}"
                    class="mt-1 w-full rounded-md border shadow-sm
                    {{ $errors->has('name') ? 'border-red-500' : 'border-gray-200' }}
                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                    dark:bg-gray-700 dark:text-white">

                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Email <span class="text-red-500">*</span>
                </label>
                <input type="email" name="email" required
                    value="{{ old('email') }}"
                    class="mt-1 w-full rounded-md border shadow-sm
                    {{ $errors->has('email') ? 'border-red-500' : 'border-gray-200' }}
                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                    dark:bg-gray-700 dark:text-white">

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Country -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Country <span class="text-red-500">*</span>
                </label>
                <select name="country" required
                    class="mt-1 w-full rounded-md border shadow-sm
                    {{ $errors->has('country') ? 'border-red-500' : 'border-gray-200' }}
                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                    dark:bg-gray-700 dark:text-white">

                    <option value="">Select Country</option>
                    @foreach(config('countries') as $country)
                        <option value="{{ $country }}"
                            {{ old('country') == $country ? 'selected' : '' }}>
                            {{ $country }}
                        </option>
                    @endforeach
                </select>

                @error('country')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Gender -->
            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300">
                    Gender <span class="text-red-500">*</span>
                </label>
                <select name="gender" required
                    class="mt-1 w-full rounded-md border shadow-sm
                    {{ $errors->has('gender') ? 'border-red-500' : 'border-gray-200' }}
                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                    dark:bg-gray-700 dark:text-white">

                    <option value="">Select</option>
                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                    <option value="Prefer not to say" {{ old('gender') == 'Prefer not to say' ? 'selected' : '' }}>Prefer not to say</option>
                </select>

                @error('gender')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Date of Birth -->
            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300">
                    Date of Birth <span class="text-red-500">*</span>
                </label>
                <input type="date" name="date_of_birth" required
                    value="{{ old('date_of_birth') }}"
                    class="mt-1 w-full rounded-md border shadow-sm
                    {{ $errors->has('date_of_birth') ? 'border-red-500' : 'border-gray-200' }}
                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                    dark:bg-gray-700 dark:text-white">

                @error('date_of_birth')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Organization -->
            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300">
                    Organization <span class="text-red-500">*</span>
                </label>
                <input type="text" name="organization" required
                    value="{{ old('organization') }}"
                    class="mt-1 w-full rounded-md border shadow-sm
                    {{ $errors->has('organization') ? 'border-red-500' : 'border-gray-200' }}
                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                    dark:bg-gray-700 dark:text-white">

                @error('organization')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Password <span class="text-red-500">*</span>
                </label>
                <input type="password" name="password" required
                    class="mt-1 w-full rounded-md border shadow-sm
                    {{ $errors->has('password') ? 'border-red-500' : 'border-gray-200' }}
                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                    dark:bg-gray-700 dark:text-white">

                <p class="text-xs mt-2 text-gray-500">
                    Must be at least 8 characters, include uppercase, lowercase, number, and special character.
                </p>

                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Confirm Password <span class="text-red-500">*</span>
                </label>
                <input type="password" name="password_confirmation" required
                    class="mt-1 w-full rounded-md border shadow-sm
                    {{ $errors->has('password') ? 'border-red-500' : 'border-gray-200' }}
                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                    dark:bg-gray-700 dark:text-white">
            </div>

            <!-- Terms -->
            <div class="flex items-center">
                <input type="checkbox" name="terms_accepted" required
                    {{ old('terms_accepted') ? 'checked' : '' }}
                    class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">

                <label class="ml-2 text-sm text-gray-600 dark:text-gray-400">
                    I agree to the Terms and Privacy Policy <span class="text-red-500">*</span>
                </label>
            </div>

            @error('terms_accepted')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

            <!-- Submit -->
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold transition">
                Create Account
            </button>

        </form>
    </div>
</div>

@include('layouts.partials.public-footer')

@endsection
