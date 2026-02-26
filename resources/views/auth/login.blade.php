@extends('layouts.app')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 px-4 py-12">

    <div class="max-w-md w-full bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-8">

        <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-white">
            Login to Your Account
        </h2>

        <form method="POST"
              action="{{ route('login') }}"
              class="mt-8 space-y-6"
              x-data="{ loading: false }"
              @submit="loading = true">
            @csrf

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
                    dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                @error('email')
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
                    dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <label class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                    <input type="checkbox" name="remember"
                        {{ old('remember') ? 'checked' : '' }}
                        class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    Remember Me
                </label>

                <a href="{{ route('password.request') }}"
                   class="text-sm text-blue-600 hover:underline">
                    Forgot Password?
                </a>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                :disabled="loading"
                class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition flex items-center justify-center space-x-2 disabled:opacity-60 disabled:cursor-not-allowed">

                <!-- Spinner -->
                <svg x-show="loading"
                     class="w-4 h-4 animate-spin"
                     fill="none"
                     viewBox="0 0 24 24">
                    <circle class="opacity-25"
                            cx="12" cy="12" r="10"
                            stroke="currentColor"
                            stroke-width="4"></circle>
                    <path class="opacity-75"
                          fill="currentColor"
                          d="M4 12a8 8 0 018-8v8H4z"></path>
                </svg>

                <!-- Text -->
                <span x-text="loading ? 'Logging in...' : 'Login'"></span>
            </button>

            <!-- Register Link -->
            <p class="text-sm text-center text-gray-600 dark:text-gray-400 mt-4">
                Don’t have an account?
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline">
                    Register
                </a>
            </p>

        </form>
    </div>

</div>

@endsection