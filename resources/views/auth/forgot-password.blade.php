@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-indigo-50 px-4">

    <div class="w-full max-w-md">

        <!-- Card -->
        <div class="bg-white/80 backdrop-blur-xl border border-gray-200 shadow-2xl rounded-2xl p-8">

            <!-- Header -->
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">
                    Forgot Password?
                </h1>
                <p class="text-sm text-gray-500 mt-2">
                    Enter your email and we’ll send you a reset link
                </p>
            </div>

            <!-- Status -->
            @if (session('status'))
                <div class="mb-4 p-3 rounded-lg bg-green-50 text-green-700 text-sm border border-green-200">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label class="text-sm font-medium text-gray-700">Email Address</label>

                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           placeholder="you@example.com"
                           class="mt-2 w-full px-4 py-3 rounded-xl border border-gray-300
                                  focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200
                                  outline-none transition bg-white">

                    @error('email')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Button -->
                <button type="submit"
                        class="w-full py-3 rounded-xl bg-gradient-to-r from-indigo-600 to-blue-600
                               text-white font-semibold shadow-lg hover:opacity-90 transition">
                    Send Reset Link
                </button>
            </form>

            <!-- Back -->
            <div class="text-center mt-6">
                <a href="{{ url('/') }}"
                   class="text-sm text-gray-500 hover:text-indigo-600 transition">
                    ← Back to Home
                </a>
            </div>

        </div>

        <!-- Footer text -->
        <p class="text-center text-xs text-gray-400 mt-6">
            Secure password recovery powered by WePower
        </p>

    </div>

</div>
@endsection