{{-- resources/views/auth/verify-email.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center px-4 py-16">

    <div class="w-full max-w-md rounded-2xl bg-white shadow-2xl border border-gray-100 overflow-hidden">

        {{-- Header --}}
        <div class="px-8 pt-8 text-center">
            <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-blue-50 text-blue-600">
                ✉️
            </div>

            <h2 class="text-2xl font-bold text-gray-900">
                Verify Your Email
            </h2>

            <p class="mt-3 text-sm leading-6 text-gray-600">
                We’ve sent a verification link to your email address.
                Please check your inbox and verify your account to continue.
            </p>
        </div>

        {{-- Status message --}}
        <div class="px-8 pt-5">
            @if (session('status') === 'verification-link-sent')
                <div class="mb-4 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                    A new verification link has been sent to your email.
                </div>
            @endif

            @if (session('success'))
                <div class="mb-4 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    {{ session('error') }}
                </div>
            @endif
        </div>

        {{-- Actions --}}
        <div class="px-8 pb-8 pt-2 space-y-4">

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <button type="submit"
                        class="w-full rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700">
                    Resend Verification Email
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                        class="w-full rounded-xl border border-gray-200 bg-gray-50 px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">
                    Log Out
                </button>
            </form>

            <p class="text-center text-xs text-gray-500">
                After verifying, refresh this page or open the verification link from your email.
            </p>
        </div>
    </div>

</div>
@endsection