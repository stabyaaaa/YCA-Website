<!-- ================= PREMIUM GLASS NAVBAR ================= -->
<header 
    x-data="{ 
        scrolled: false, 
        mobileOpen: false
    }" 
    @scroll.window="scrolled = window.scrollY > 20"
    class="sticky top-0 z-50 transition-all duration-500 ease-[cubic-bezier(.4,0,.2,1)]"
    :class="{
        'h-16 bg-white/70 backdrop-blur-xl border-b border-gray-200/60 shadow-lg': scrolled,
        'h-20 bg-white/30 backdrop-blur-md border-transparent': !scrolled
    }"
>
    <div class="max-w-7xl mx-auto px-6 lg:px-8 h-full">
        <div class="flex justify-between items-center h-full">

            <!-- ================= LOGO ================= -->
            <a 
                href="{{ url('/') }}" 
                class="flex items-center gap-3 group transition-all duration-500"
                :class="{ 'scale-95': scrolled }"
            >
                <img 
                    src="{{ asset('images/wepowerlogo.png') }}" 
                    alt="Logo"
                    class="h-14 w-auto object-contain"
                >
            </a>


            <!-- ================= DESKTOP NAV ================= -->
            <nav 
                class="hidden lg:flex items-center space-x-10 font-medium text-gray-700 transition-all duration-500"
                :class="{ 'space-x-7 text-sm': scrolled }"
            >

                <!-- HOME -->
                <a href="{{ url('/') }}" 
                   class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                    Home
                </a>


                <!-- ================= ABOUT DROPDOWN ================= -->
                <div 
                    x-data="{ open:false }" 
                    class="relative"
                >

                    <button
                        @click="open = !open"
                        @click.outside="open = false"
                        class="nav-link flex items-center gap-1
                        {{ request()->routeIs('about') || request()->routeIs('news') || request()->routeIs('partners') || request()->routeIs('resources') ? 'active' : '' }}"
                    >
                        <span>About</span>

                        <svg 
                            class="w-4 h-4 transition-transform duration-300"
                            :class="{ 'rotate-180': open }"
                            fill="none" 
                            viewBox="0 0 24 24"
                        >
                            <path 
                                stroke="currentColor" 
                                stroke-width="2" 
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19 9l-7 7-7-7"
                            />
                        </svg>
                    </button>


                    <!-- ABOUT DROPDOWN MENU -->
                    <div 
                        x-show="open"
                        x-transition
                        style="display:none;"
                        class="absolute left-1/2 -translate-x-1/2 top-full mt-5
                               w-56 bg-white/95 backdrop-blur-xl
                               border border-gray-200
                               rounded-2xl shadow-2xl
                               overflow-hidden z-50"
                    >

                        <a 
                            href="{{ route('about') }}"
                            class="dropdown-item
                            {{ request()->routeIs('about') ? 'text-indigo-600 bg-indigo-50' : '' }}"
                        >
                            About
                        </a>

                        <a 
                            href="{{ route('news') }}"
                            class="dropdown-item
                            {{ request()->routeIs('news') ? 'text-indigo-600 bg-indigo-50' : '' }}"
                        >
                            News
                        </a>

                        <a 
                            href="{{ route('partners') }}"
                            class="dropdown-item
                            {{ request()->routeIs('partners') ? 'text-indigo-600 bg-indigo-50' : '' }}"
                        >
                            Our Partners
                        </a>

                        <a 
                            href="{{ route('resources') }}"
                            class="dropdown-item
                            {{ request()->routeIs('resources') ? 'text-indigo-600 bg-indigo-50' : '' }}"
                        >
                            Resources
                        </a>

                    </div>
                </div>


                <!-- YUNUS CENTER AIT -->
                <a 
                    href="https://www.yunuscenterait.org/" 
                    class="nav-link" 
                    target="_blank" 
                    rel="noopener noreferrer"
                >
                    Yunus Center AIT
                </a>


                <!-- ANNOUNCEMENTS -->
                <a 
                    href="{{ route('announcements') }}" 
                    class="nav-link {{ request()->routeIs('announcements*') ? 'active' : '' }}"
                >
                    Announcements
                </a>


                <!-- CONTACT -->
                <a 
                    href="{{ route('contact') }}"
                    class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                >
                    Contact
                </a>

            </nav>


            <!-- ================= RIGHT SIDE ================= -->
            <div class="flex items-center gap-4">

                @auth
                    @php $user = auth()->user(); @endphp

                    <!-- ADMIN DROPDOWN -->
                    @if($user->role === 'admin' || $user->role === 'super_admin')
                        <div x-data="{ open:false }" class="relative">
                            <button 
                                @click="open=!open"
                                class="flex items-center gap-2 px-5 py-2 rounded-xl bg-gradient-to-r from-indigo-600 to-blue-600 text-white font-medium shadow-md hover:shadow-xl hover:scale-[1.05] transition"
                            >
                                <span>
                                    {{ $user->role === 'super_admin' ? 'Dashboard' : 'Admin' }}
                                </span>

                                @if($user->role === 'super_admin' && $pendingCount > 0)
                                    <span class="bg-red-500 text-white text-xs px-2 py-0.5 rounded-full animate-pulse">
                                        {{ $pendingCount }}
                                    </span>
                                @endif

                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            <!-- DROPDOWN -->
                            <div 
                                x-show="open"
                                @click.outside="open=false"
                                x-transition
                                class="absolute right-0 mt-3 w-64 bg-white/95 backdrop-blur-xl border border-gray-200 rounded-2xl shadow-2xl overflow-hidden"
                            >
                                <a href="{{ route('users.index') }}" class="dropdown-item">
                                    Manage Users
                                </a>
                                
                                @if($user->role === 'admin')
                                    <a href="{{ route('admin.my.requests') }}" class="dropdown-item">
                                        My Requests
                                    </a>
                                @endif

                                @if($user->role === 'super_admin')
                                    <a href="{{ route('admin.requests.index') }}" class="dropdown-item flex justify-between">
                                        Pending Requests

                                        @if($pendingCount > 0)
                                            <span class="badge-red">
                                                {{ $pendingCount }}
                                            </span>
                                        @endif
                                    </a>
                                @endif

                                @if($user->role === 'admin' || $user->role === 'super_admin')
                                    <a href="{{ route('admin.contact-messages.index') }}" class="dropdown-item">
                                        Contact Messages

                                        @if($unreadMessageCount > 0)
                                            <span class="badge-red">
                                                {{ $unreadMessageCount }}
                                            </span>
                                        @endif
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endif


                    <!-- USER + LOGOUT -->
                    <div class="hidden md:flex items-center gap-4">
                        <span class="text-gray-700 text-sm">
                            Hi, <span class="font-semibold text-indigo-700">{{ $user->name }}</span>
                        </span>

                        <form 
                            method="POST" 
                            action="{{ route('logout') }}"
                            x-data="{ loading:false }"
                            @submit="loading=true"
                        >
                            @csrf

                            <button :disabled="loading" class="logout-btn">
                                <svg x-show="loading" class="w-4 h-4 animate-spin" fill="none">
                                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                                </svg>

                                <span x-text="loading ? 'Logging out...' : 'Logout'"></span>
                            </button>
                        </form>
                    </div>

                @else

                    <!-- SIGN IN -->
                    <button onclick="openAuthModal('login')" class="btn-outline">
                        Sign In
                    </button>

                    <!-- REGISTER -->
                    <button onclick="openAuthModal('register')" class="btn-primary">
                        Create Account
                    </button>

                @endauth


                <!-- ================= MOBILE BUTTON ================= -->
                <button 
                    @click="mobileOpen=!mobileOpen"
                    class="lg:hidden p-2 rounded-lg hover:bg-white/40 transition"
                >
                    <svg x-show="!mobileOpen" class="w-7 h-7">
                        <path stroke="currentColor" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>

                    <svg x-show="mobileOpen" class="w-7 h-7">
                        <path stroke="currentColor" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

            </div>
        </div>


        <!-- ================= MOBILE MENU ================= -->
        <div 
            x-show="mobileOpen"
            x-transition
            class="lg:hidden bg-white/95 backdrop-blur-xl border-t border-gray-200 shadow-xl"
        >
            <div class="px-6 py-8 space-y-5">


                <!-- HOME -->
                <a href="{{ url('/') }}" class="mobile-link">
                    Home
                </a>


                <!-- ================= MOBILE ABOUT DROPDOWN ================= -->
                <div x-data="{ aboutOpen:false }">

                    <button
                        @click="aboutOpen = !aboutOpen"
                        class="mobile-link w-full flex items-center justify-between text-left"
                    >
                        <span>About</span>

                        <svg 
                            class="w-4 h-4 transition-transform duration-300"
                            :class="{ 'rotate-180': aboutOpen }"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <path 
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19 9l-7 7-7-7"
                            />
                        </svg>
                    </button>


                    <!-- MOBILE ABOUT SUBMENU -->
                    <div 
                        x-show="aboutOpen"
                        x-transition
                        style="display:none;"
                        class="mt-4 ml-4 pl-4 border-l-2 border-indigo-100 space-y-4"
                    >

                        <a 
                            href="{{ route('about') }}" 
                            class="mobile-link text-sm"
                        >
                            About
                        </a>

                        <a 
                            href="{{ route('news') }}" 
                            class="mobile-link text-sm"
                        >
                            News
                        </a>

                        <a 
                            href="{{ route('partners') }}" 
                            class="mobile-link text-sm"
                        >
                            Our Partners
                        </a>

                        <a 
                            href="{{ route('resources') }}" 
                            class="mobile-link text-sm"
                        >
                            Resources
                        </a>

                    </div>
                </div>


                <!-- YUNUS CENTER AIT -->
                <a 
                    href="https://www.yunuscenterait.org/"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="mobile-link"
                >
                    Yunus Center AIT
                </a>


                <!-- ANNOUNCEMENTS -->
                <a 
                    href="{{ route('announcements') }}" 
                    class="mobile-link"
                >
                    Announcements
                </a>


                <!-- CONTACT -->
                <a 
                    href="{{ route('contact') }}" 
                    class="mobile-link"
                >
                    Contact
                </a>


                @guest
                    <div class="pt-6 border-t flex flex-col gap-4">

                        <button onclick="openAuthModal('login')" class="btn-outline w-full">
                            Sign In
                        </button>

                        <button onclick="openAuthModal('register')" class="btn-primary w-full">
                            Create Account
                        </button>

                    </div>
                @endguest

            </div>
        </div>

    </div>
</header>


<!-- ================= NAVBAR STYLES ================= -->
<style>

.nav-link.active {
    color: #4f46e5;
    font-weight: 600;
}

.nav-link.active::after {
    width: 70%;
}

.logo-glow {
    animation: logoGlow 6s infinite linear;
}

@keyframes logoGlow {
    0%   { filter: brightness(1); }
    50%  { filter: brightness(1.25); }
    100% { filter: brightness(1); }
}

.nav-link {
    position: relative;
    transition: all .3s;
}

.nav-link:hover {
    color: #4f46e5;
    transform: translateY(-2px);
}

.nav-link::after {
    content: '';
    position: absolute;
    bottom: -6px;
    left: 50%;
    width: 0;
    height: 2px;
    background: linear-gradient(to right, #6366f1, #0ea5e9);
    transition: .4s;
    transform: translateX(-50%);
    border-radius: 999px;
}

.nav-link:hover::after {
    width: 70%;
}

.mobile-link {
    display: block;
    font-size: 1rem;
    font-weight: 500;
    color: #374151;
    transition: .3s;
}

.mobile-link:hover {
    color: #4f46e5;
    transform: translateX(4px);
}

.btn-primary {
    padding: .55rem 1.4rem;
    border-radius: 12px;
    font-weight: 500;
    background: linear-gradient(135deg, #4f46e5, #2563eb);
    color: white;
    box-shadow: 0 10px 20px rgba(79,70,229,.25);
    transition: .25s;
}

.btn-primary:hover {
    transform: translateY(-2px) scale(1.04);
    box-shadow: 0 16px 35px rgba(79,70,229,.35);
}

.btn-outline {
    padding: .55rem 1.4rem;
    border-radius: 12px;
    border: 1px solid #c7d2fe;
    color: #4f46e5;
    font-weight: 500;
    background: rgba(255,255,255,.6);
    backdrop-filter: blur(10px);
    transition: .25s;
}

.btn-outline:hover {
    background: #eef2ff;
}

.logout-btn {
    display: flex;
    align-items: center;
    gap: .4rem;
    padding: .45rem 1.1rem;
    border-radius: 10px;
    border: 1px solid #fecaca;
    background: #fff5f5;
    color: #b91c1c;
    font-size: .9rem;
    transition: .25s;
}

.logout-btn:hover {
    background: #fee2e2;
}

.dropdown-item {
    display: block;
    padding: 12px 18px;
    color: #374151;
    font-size: .95rem;
    transition: .25s;
}

.dropdown-item:hover {
    background: #eef2ff;
    color: #4f46e5;
}

.badge-red {
    background: #ef4444;
    color: white;
    font-size: .7rem;
    padding: 2px 6px;
    border-radius: 999px;
}

</style>