<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      class="text-[15px] md:text-[13px]">

<head>
    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>
        {{ config('app.name', 'WePOWER') }}
    </title>

    {{-- Fonts --}}
    <link rel="preconnect"
          href="https://fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
          rel="stylesheet" />

    {{-- Vite --}}
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body
    class="font-sans antialiased"
    @if ($errors->login->any())
        data-open-modal="login"
    @elseif ($errors->any())
        data-open-modal="register"
    @endif
>

    {{-- =========================================================
        NAVBAR
    ========================================================== --}}
    @include('layouts.partials.public-navbar')


    {{-- =========================================================
        MAIN PAGE
    ========================================================== --}}
    <div class="min-h-screen bg-gray-100">

        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto
                            py-6 px-4
                            sm:px-6
                            lg:px-8">

                    {{ $header }}

                </div>
            </header>
        @endisset


        <main>
            @yield('content')
        </main>

    </div>


    {{-- =========================================================
        AI CHATBOT
    ========================================================== --}}
    @include('chatbot.partials.chat-panel')


    {{-- =========================================================
        AUTH MODAL
    ========================================================== --}}
    <div
        id="authModal"
        class="fixed inset-0
               z-50
               hidden
               flex
               items-center
               justify-center
               bg-black/40
               backdrop-blur-sm"
    >

        <div
            id="modalContent"
            class="relative
                   w-full
                   max-w-md
                   bg-white
                   rounded-2xl
                   shadow-xl
                   p-10
                   transform
                   transition-all
                   duration-300
                   scale-95
                   opacity-0"
        >

            {{-- Close Button --}}
            <button
                id="closeAuthModal"
                type="button"
                class="absolute
                       top-4
                       right-4
                       text-gray-500
                       hover:text-black
                       text-xl"
            >
                &times;
            </button>


            {{-- Login Form --}}
            <div
                id="loginForm"
                class="hidden"
            >
                @include('layouts.partials.login-form')
            </div>


            {{-- Register Form --}}
            <div
                id="registerForm"
                class="hidden"
            >
                @include('layouts.partials.register-form')
            </div>

        </div>

    </div>


    {{-- =========================================================
        FOOTER
    ========================================================== --}}
    @include('layouts.partials.public-footer')


    {{-- =========================================================
        EDIT MODE
    ========================================================== --}}
    @if(isset($editMode) && $editMode)

        {{-- Add edit mode content/scripts here if needed --}}

    @endif


    {{-- =========================================================
        OPEN LOGIN MODAL AFTER REDIRECT
    ========================================================== --}}
    @if(session('open_login_modal'))

        <script>
            document.addEventListener('DOMContentLoaded', function () {

                if (typeof openAuthModal === 'function') {
                    openAuthModal('login');
                }

            });
        </script>

    @endif


    {{-- =========================================================
        GOOGLE REGISTER PROMPT
    ========================================================== --}}
    @if(session('google_register_prompt'))

        <div
            id="googleRegisterPrompt"
            class="fixed
                   inset-0
                   z-[99999]
                   flex
                   items-center
                   justify-center
                   bg-black/50
                   px-4"
        >

            <div
                class="bg-white
                       rounded-2xl
                       shadow-xl
                       max-w-md
                       w-full
                       p-6
                       text-center"
            >

                <h2
                    class="text-xl
                           font-bold
                           text-gray-900
                           mb-3"
                >
                    Register with Google?
                </h2>


                <p
                    class="text-gray-600
                           mb-6"
                >

                    Account not found for

                    <strong>
                        {{ session('google_email') }}
                    </strong>.

                    Do you want to create a new WePOWER account
                    using this Google account?

                </p>


                <div
                    class="flex
                           gap-3
                           justify-center"
                >

                    {{-- Register --}}
                    <form
                        method="POST"
                        action="{{ route('google.register') }}"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="px-5
                                   py-2
                                   rounded-lg
                                   bg-blue-600
                                   hover:bg-blue-700
                                   text-white
                                   font-semibold
                                   transition"
                        >
                            Yes, Register
                        </button>

                    </form>


                    {{-- Cancel --}}
                    <a
                        href="{{ route('home') }}"
                        class="px-5
                               py-2
                               rounded-lg
                               bg-gray-100
                               hover:bg-gray-200
                               text-gray-700
                               font-semibold
                               transition"
                    >
                        Cancel
                    </a>

                </div>

            </div>

        </div>

    @endif
@include('chatbot.partials.chat-script')
</body>
</html>