<div class="max-w-6xl mx-auto px-8">

    <h2 class="text-3xl font-bold text-center text-gray-800">
        Create Account
    </h2>

    @if ($errors->any())
        <div class="mt-4 p-4 rounded-lg bg-red-100 text-red-700 text-sm">
            Please fix the errors below.
        </div>
    @endif

    <form method="POST"
          action="{{ route('register') }}"
          class="mt-8"
          x-data="{ loading: false }"
          x-init="loading = false"
          @submit="loading = true">

        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Full Name --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Full Name <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       placeholder="Enter your full name"
                       required
                       class="mt-1 w-full rounded-md border shadow-sm focus:ring-2
                       @error('name') border-red-500 focus:ring-red-500
                       @else border-gray-300 focus:ring-blue-500
                       @enderror">
                @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Email <span class="text-red-500">*</span>
                </label>
                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       placeholder="Enter your email address"
                       required
                       class="mt-1 w-full rounded-md border shadow-sm focus:ring-2
                       @error('email') border-red-500 focus:ring-red-500
                       @else border-gray-300 focus:ring-blue-500
                       @enderror">
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Date of Birth --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Date of Birth <span class="text-red-500">*</span>
                </label>
                <input type="date"
                       name="date_of_birth"
                       value="{{ old('date_of_birth') }}"
                       required
                       class="mt-1 w-full rounded-md border shadow-sm focus:ring-2
                       @error('date_of_birth') border-red-500 focus:ring-red-500
                       @else border-gray-300 focus:ring-blue-500
                       @enderror">
                @error('date_of_birth')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Gender --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Gender <span class="text-red-500">*</span>
                </label>
                <select name="gender"
                        required
                        class="mt-1 w-full rounded-md border shadow-sm focus:ring-2
                        @error('gender') border-red-500 focus:ring-red-500
                        @else border-gray-300 focus:ring-blue-500
                        @enderror">
                    <option value="">Select your gender</option>
                    <option value="male" {{ old('gender')=='male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender')=='female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender')=='other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('gender')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Organization --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Organization <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       name="organization"
                       value="{{ old('organization') }}"
                       placeholder="Enter your organization name"
                       required
                       class="mt-1 w-full rounded-md border shadow-sm focus:ring-2
                       @error('organization') border-red-500 focus:ring-red-500
                       @else border-gray-300 focus:ring-blue-500
                       @enderror">
                @error('organization')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Country --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Country <span class="text-red-500">*</span>
                </label>
                <select name="country"
                        required
                        class="mt-1 w-full rounded-md border shadow-sm focus:ring-2
                        @error('country') border-red-500 focus:ring-red-500
                        @else border-gray-300 focus:ring-blue-500
                        @enderror">
                    <option value="">Select your country</option>
                    @foreach(config('countries') as $code => $country)
                        <option value="{{ $code }}"
                            {{ old('country') == $code ? 'selected' : '' }}>
                            {{ $country }}
                        </option>
                    @endforeach
                </select>
                @error('country')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700">
                    Password <span class="text-red-500">*</span>
                </label>
                <input type="password"
                       name="password"
                       placeholder="Create a strong password"
                       required
                       class="mt-1 w-full rounded-md border shadow-sm focus:ring-2
                       @error('password') border-red-500 focus:ring-red-500
                       @else border-gray-300 focus:ring-blue-500
                       @enderror">
                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
                <p class="text-xs mt-2 text-gray-600 leading-relaxed">
                    Must be at least 8 characters and include uppercase, lowercase, number, and special character.
                </p>
            </div>

            {{-- Confirm Password --}}
            <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700">
                    Confirm Password <span class="text-red-500">*</span>
                </label>
                <input type="password"
                       name="password_confirmation"
                       placeholder="Re-enter your password"
                       required
                       class="mt-1 w-full rounded-md border shadow-sm border-gray-300 focus:ring-2 focus:ring-blue-500">
                <p class="text-xs mt-2 text-gray-600">
                    Must match the password entered above.
                </p>
            </div>

        </div>

        {{-- Terms --}}
        <div class="flex items-center mt-6">
            <input type="checkbox"
                   name="terms_accepted"
                   value="1"
                   {{ old('terms_accepted') ? 'checked' : '' }}
                   class="h-4 w-4 text-blue-600 border-gray-300 rounded">
            <label class="ml-2 text-sm text-gray-600">
                I accept the Terms and Conditions
            </label>
        </div>

        @error('terms_accepted')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror

        {{-- Submit --}}
        <button type="submit"
                :disabled="loading"
                class="w-full mt-6 bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold transition flex items-center justify-center space-x-2">

            <svg x-show="loading"
                 x-cloak
                 class="w-5 h-5 animate-spin"
                 fill="none"
                 viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10"
                        stroke="currentColor"
                        stroke-width="4"
                        class="opacity-25"/>
                <path fill="currentColor"
                      class="opacity-75"
                      d="M4 12a8 8 0 018-8v8H4z"/>
            </svg>

            <span x-text="loading ? 'Creating Account...' : 'Register'"></span>
        </button>

        <p class="text-sm text-center mt-4">
            Already have an account?
            <button type="button"
                    onclick="openAuthModal('login')"
                    class="text-blue-600">
                Login
            </button>
        </p>

    </form>
</div>