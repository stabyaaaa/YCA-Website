<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
      class="text-[15px] md:text-[13px]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
{{-- =========================================
     CHAT BUTTON
========================================= --}}
@auth
    <a href="{{ route('messages.index') }}"
       class="relative inline-flex items-center gap-2 px-4 py-2 rounded-xl
              bg-white/10 border border-white/10 text-white
              hover:bg-pink-600 hover:border-pink-500
              transition duration-300 group">

        {{-- Chat Icon --}}
        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-5 h-5 transition-transform duration-300 group-hover:scale-110"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-4l-4 4v-4z"/>
        </svg>

        <span class="font-medium">
            Messages
        </span>

        {{-- Optional Notification Dot --}}
        <span class="absolute -top-1 -right-1 w-3 h-3 bg-pink-500 rounded-full animate-pulse"></span>
    </a>
@endauth
<div class="ai-chat-widget" id="aiChatWidget">
    <div class="ai-chat-label">AI Assistant</div>

    <button class="ai-chat-trigger" id="aiChatTrigger" type="button" aria-label="Open AI assistant preview">
        <span class="ai-chat-glow"></span>
        <!-- <span class="ai-chat-core"></span> -->
        <span class="ai-chat-emoji">🤖</span>
    </button>

    <div class="ai-chat-popup" id="aiChatPopup">
        <div class="ai-chat-popup-head">
            <span class="ai-chat-popup-dot"></span>
            <span>AI Assistant</span>
        </div>
        <p>Coming soon! A smarter chat experience will be available here.</p>
    </div>
</div>


<body class="font-sans antialiased"
    @if ($errors->login->any())
        data-open-modal="login"
    @elseif ($errors->any())
        data-open-modal="register"
    @endif
>

    {{-- NAVBAR --}}
    @include('layouts.partials.public-navbar')

    <div class="min-h-screen bg-gray-100">

        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main>
            @yield('content')
        </main>
    </div>

    {{-- AUTH MODAL --}}
    <div id="authModal"
         class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/40 backdrop-blur-sm">

        <div id="modalContent"
            class="relative w-full max-w-md bg-white rounded-2xl shadow-xl p-10
                   transform transition-all duration-300 scale-95 opacity-0">

            <button id="closeAuthModal"
                    class="absolute top-4 right-4 text-gray-500 hover:text-black text-xl">
                &times;
            </button>

            <div id="loginForm" class="hidden">
                @include('layouts.partials.login-form')
            </div>

            <div id="registerForm" class="hidden">
                @include('layouts.partials.register-form')
            </div>

        </div>
    </div>

    {{-- FOOTER --}}
    @include('layouts.partials.public-footer')
@if(isset($editMode) && $editMode)



@endif

@if (session('open_login_modal'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof openAuthModal === 'function') {
            openAuthModal('login');
        }
    });
</script>
@endif
@if(session('google_register_prompt'))
<div id="googleRegisterPrompt"
     class="fixed inset-0 z-[99999] flex items-center justify-center bg-black/50 px-4">
    <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-6 text-center">
        <h2 class="text-xl font-bold text-gray-900 mb-3">
            Register with Google?
        </h2>

        <p class="text-gray-600 mb-6">
            Account not found for
            <strong>{{ session('google_email') }}</strong>.
            Do you want to create a new WePOWER account using this Google account?
        </p>

        <div class="flex gap-3 justify-center">
            <form method="POST" action="{{ route('google.register') }}">
                @csrf
                <button type="submit"
                        class="px-5 py-2 rounded-lg bg-blue-600 text-white font-semibold">
                    Yes, Register
                </button>
            </form>

            <a href="{{ route('home') }}"
               class="px-5 py-2 rounded-lg bg-gray-100 text-gray-700 font-semibold">
                Cancel
            </a>
        </div>
    </div>
</div>
@endif
</body>
</html>