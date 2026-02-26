<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased"
    @if ($errors->login->any())
        data-open-modal="login"
    @elseif ($errors->any())
        data-open-modal="register"
    @endif
>


    {{-- NAVBAR --}}
    @include('layouts.partials.public-navbar')

    <div class="min-h-screen bg-gray-100 dark:bg-gray-100">

        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
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
             class="relative w-full max-w-6xl bg-white rounded-2xl shadow-xl p-10
                    transform transition-all duration-300 scale-95 opacity-0">

            <button onclick="closeAuthModal()"
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


<script>
    function openAuthModal(type) {
        const modal = document.getElementById('authModal');
        const content = document.getElementById('modalContent');
        const login = document.getElementById('loginForm');
        const register = document.getElementById('registerForm');

        modal.classList.remove('hidden');

        // Animate in
        setTimeout(() => {
            content.classList.remove('scale-95', 'opacity-0');
            content.classList.add('scale-100', 'opacity-100');
        }, 10);

        login.classList.add('hidden');
        register.classList.add('hidden');

        if (type === 'login') {
            login.classList.remove('hidden');
        } else {
            register.classList.remove('hidden');
        }
    }

    function closeAuthModal() {
        const modal = document.getElementById('authModal');
        const content = document.getElementById('modalContent');

        content.classList.add('scale-95', 'opacity-0');
        content.classList.remove('scale-100', 'opacity-100');

        setTimeout(() => {
            modal.classList.add('hidden');
        }, 200);
    }
</script>


{{-- AUTO OPEN LOGIN IF LOGIN FAILED --}}
@if ($errors->login->any())
<script>
    document.addEventListener("DOMContentLoaded", function () {
        openAuthModal('login');
    });
</script>
@endif

{{-- AUTO OPEN REGISTER ONLY IF REGISTER FAILED --}}
@if (!$errors->login->any() && $errors->count() > 0)
<script>
    document.addEventListener("DOMContentLoaded", function () {
        openAuthModal('register');
    });
</script>
@endif


</body>
</html>
