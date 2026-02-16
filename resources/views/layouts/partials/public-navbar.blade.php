<!-- ================= NAVBAR ================= -->
<header class="sticky top-0 z-50 bg-white shadow">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <!-- LOGO -->
        <div class="flex items-center space-x-2">
            <span class="text-xl font-bold text-blue-700">World Bank</span>
            <span class="text-gray-400">×</span>
            <span class="font-semibold">Yunus Center AIT</span>
        </div>

        <!-- NAV LINKS -->
        <nav class="hidden md:flex space-x-6 font-medium">
            <a href="#" class="hover:text-blue-600">Home</a>
            <a href="#" class="hover:text-blue-600">About</a>
            <a href="#" class="hover:text-blue-600">Projects</a>
            <a href="#" class="hover:text-blue-600">Partners</a>
            <a href="#" class="hover:text-blue-600">Resources</a>
            <a href="#" class="hover:text-blue-600">Contact</a>
        </nav>

        <!-- RIGHT ACTIONS -->
        <div class="flex items-center space-x-4">
            @auth
                <!-- GREETING -->
                <span class="text-sm text-gray-700">
                    Hi, <span class="font-semibold">{{ Auth::user()->name }}</span>
                </span>

                {{-- SUPER ADMIN --}}
                @if(Auth::user()->role === 'super_admin')
                    <div x-data="{ open: false }" class="relative">
                        <button
                            @click="open = !open"
                            @click.outside="open = false"
                            class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">
                            Manage
                        </button>

                        <!-- DROPDOWN -->
                        <div
                            x-show="open"a
                            x-transition
                            x-cloak
                            class="absolute right-0 mt-2 w-56 bg-white border rounded shadow-lg z-50">

                            <button
                                onclick="openCreateAdminModal(); open = false"
                                class="w-full text-left px-4 py-2 hover:bg-gray-100">
                                ➕ Create Admin
                            </button>


                            <a href="{{ route('superadmin.admins.pending') }}"
                               class="block px-4 py-2 hover:bg-gray-100">
                                ⏳ Pending Admin Requests
                            </a>
                        </div>
                    </div>

                {{-- ADMIN --}}
                @elseif(Auth::user()->role === 'admin')
                    <a href="{{ route('dashboard') }}"
                       class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                        Request Admin
                    </a>
                @endif

                <!-- LOGOUT -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        type="submit"
                        class="px-4 py-2 border border-red-500 text-red-500 rounded hover:bg-red-50">
                        Logout
                    </button>
                </form>

            @else
                <!-- GUEST -->
                <a href="{{ route('login') }}"
                   class="px-4 py-2 border border-blue-600 text-blue-600 rounded hover:bg-blue-50">
                    Login
                </a>

                <a href="{{ route('register') }}"
                   class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Register
                </a>
            @endauth
        </div>

    </div>
</header>
