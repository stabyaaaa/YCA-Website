<x-guest-layout>
    <div class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-md">

        <!-- Header -->
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
            Forgot Your Password?
        </h2>

        <div class="mb-6 text-sm text-gray-600 text-center leading-relaxed">
            No problem. Just let us know your email address and we will email you 
            a password reset link that will allow you to choose a new one.
        </div>

        <!-- Status Message -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Email Address <span class="text-red-500">*</span>
                </label>
                <input type="email" 
                       name="email" 
                       value="{{ old('email') }}" 
                       required
                       class="mt-1 w-full rounded-md border border-gray-300 shadow-sm 
                       focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit"
                    class="w-full mt-6 bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold transition">
                Send Password Reset Link
            </button>
        </form>

        <!-- Back to Login -->
        <div class="text-center mt-8">
            <a href="{{ url('/') }}" 
               class="text-blue-600 hover:text-blue-700 hover:underline text-sm">
                ← Back to Home
            </a>
        </div>

    </div>
</x-guest-layout>