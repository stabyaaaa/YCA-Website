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
            <a href="{{ url('/') }}" class="hover:text-blue-600">Home</a>
            <a href="#" class="hover:text-blue-600">About</a>
            <a href="#" class="hover:text-blue-600">Projects</a>
            <a href="#" class="hover:text-blue-600">Partners</a>
            <a href="#" class="hover:text-blue-600">Resources</a>
            <a href="#" class="hover:text-blue-600">Contact</a>
        </nav>

        <!-- RIGHT SECTION -->
        <div class="flex items-center space-x-4">

            @auth
                @php
                    $user = auth()->user();
                @endphp

                @if($user->role === 'admin' || $user->role === 'super_admin')
                <div x-data="{ open: false }" class="relative">

                    <button @click="open = !open"
                        class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700 transition flex items-center space-x-2">

                        <span>
                            {{ $user->role === 'super_admin' ? 'Superadmin Panel' : 'Admin Panel' }}
                        </span>

                        @if($user->role === 'super_admin' && $pendingCount > 0)
                            <span class="ml-2 bg-red-500 text-white text-xs font-semibold px-2 py-0.5 rounded-full">
                                {{ $pendingCount }}
                            </span>
                        @endif
                    </button>

                    <div x-show="open"
                         @click.outside="open = false"
                         x-transition
                         class="absolute right-0 mt-2 w-56 bg-white border rounded shadow-lg z-50">

                        <!-- BOTH -->
                        <a href="{{ route('users.index') }}"
                           class="block px-4 py-2 hover:bg-gray-100">
                            Manage Users
                        </a>

                        <!-- ADMIN ONLY -->
                        @if($user->role === 'admin')
                            <!-- <a href="{{ route('admin.create.request') }}"
                               class="block px-4 py-2 hover:bg-gray-100">
                                Create Admin (Request)
                            </a> -->

                            <a href="{{ route('admin.my.requests') }}"
                               class="block px-4 py-2 hover:bg-gray-100">
                                My Requests
                            </a>
                        @endif

                        <!-- SUPER ADMIN ONLY -->
                        @if($user->role === 'super_admin')
                            <a href="{{ route('admin.requests.index') }}"
                                class="flex justify-between items-center px-4 py-2 hover:bg-gray-100">
                                    
                                    <span>Pending Requests</span>

                                    @if($pendingCount > 0)
                                        <span class="ml-2 bg-red-500 text-white text-xs font-semibold px-2 py-0.5 rounded-full">
                                            {{ $pendingCount }}
                                        </span>
                                    @endif

                                </a>
                        @endif

                    </div>
                </div>
                @endif

                <span class="text-sm text-gray-700">
                    Hi, <span class="font-semibold">{{ $user->name }}</span>
                </span>

                <form method="POST" action="{{ route('logout') }}" 
                        x-data="{ loading: false }"
                        @submit="loading = true">
                        @csrf

                        <button
                            type="submit"
                            :disabled="loading"
                            class="px-4 py-2 border border-red-500 text-red-500 rounded hover:bg-red-50 transition flex items-center space-x-2">

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

                            <span x-text="loading ? 'Logging out...' : 'Logout'"></span>
                        </button>
                    </form>

            @else


                <button id="loginBtn" onclick="openAuthModal('login')" class="text-blue-600">Sign in</button>
                <button id="registerBtn" onclick="openAuthModal('register')" class="text-blue-600">Create New Account</button>
            @endauth

        </div>
    </div>
</header>