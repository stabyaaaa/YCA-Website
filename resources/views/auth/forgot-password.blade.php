@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4">

    <div class="max-w-4xl mx-auto">

        <!-- Page Card -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

            <div class="grid md:grid-cols-2">

                <!-- Left Side (Info Panel) -->
                <div class="bg-blue-600 text-white p-10 flex flex-col justify-center">
                    <h2 class="text-3xl font-bold mb-4">
                        Forgot Password?
                    </h2>

                    <p class="text-blue-100 leading-relaxed">
                        Don’t worry. Enter your email and we’ll send you a secure link
                        to reset your password.
                    </p>

                    <div class="mt-6 text-sm text-blue-200">
                        Make sure you use the email registered in your account.
                    </div>
                </div>

                <!-- Right Side (Form) -->
                <div class="p-10">

                    <h3 class="text-xl font-semibold text-gray-800 mb-6">
                        Reset Password
                    </h3>

                    <!-- Status Message -->
                    @if (session('status'))
                        <div class="mb-4 p-3 rounded bg-green-100 text-green-700 text-sm">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Email Address
                            </label>

                            <input type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                                   class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                            @error('email')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <button type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold transition">
                            Send Reset Link
                        </button>
                    </form>

                    <!-- Back -->
                    <div class="mt-6 text-center">
                        <a href="{{ url('/') }}"
                           class="text-blue-600 hover:underline text-sm">
                            ← Back to Home
                        </a>
                    </div>

                </div>

            </div>
        </div>

    </div>

</div>
@endsection