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

            <!-- =========================================================
                LOGO
            ========================================================== -->

            <a
                href="{{ url('/') }}"
                class="flex items-center gap-3 group transition-all duration-500"
                :class="{ 'scale-95': scrolled }"
            >

                <img
                    src="{{ asset('images/wepowerlogo.png') }}"
                    alt="WePOWER"
                    class="h-14 w-auto object-contain"
                >

            </a>


            <!-- =========================================================
                DESKTOP PUBLIC NAVIGATION
            ========================================================== -->

            <nav
                class="hidden lg:flex items-center space-x-8 font-medium text-gray-700 transition-all duration-500"
                :class="{ 'space-x-6 text-sm': scrolled }"
            >

                <!-- Home -->
                <a
                    href="{{ url('/') }}"
                    class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                >
                    Home
                </a>


                <!-- About -->
                <a
                    href="{{ route('about') }}"
                    class="nav-link {{ request()->is('about') ? 'active' : '' }}"
                >
                    About
                </a>


                <!-- Yunus Center -->
                <a
                    href="https://www.yunuscenterait.org/"
                    class="nav-link"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    Yunus Center AIT
                </a>


                <!-- News -->
                <a
                    href="{{ route('news') }}"
                    class="nav-link {{ request()->routeIs('news') ? 'active' : '' }}"
                >
                    News
                </a>


                <!-- Community -->
                <a
                    href="{{ route('community.index') }}"
                    class="nav-link {{ request()->routeIs('community.*') ? 'active' : '' }}"
                >
                    Community
                </a>


                <!-- Partners -->
                <a
                    href="{{ route('partners') }}"
                    class="nav-link {{ request()->is('partners') ? 'active' : '' }}"
                >
                    Our Partners
                </a>


                <!-- Resources -->
                <a
                    href="{{ route('resources') }}"
                    class="nav-link {{ request()->is('resources') ? 'active' : '' }}"
                >
                    Resources
                </a>


                <!-- Contact -->
                <a
                    href="{{ route('contact') }}"
                    class="nav-link {{ request()->is('contact') ? 'active' : '' }}"
                >
                    Contact
                </a>

            </nav>


            <!-- =========================================================
                RIGHT SIDE
            ========================================================== -->

            <div class="flex items-center gap-3">

                @auth

                    @php
                        $user = auth()->user();

                        $isAdmin = in_array(
                            $user->role,
                            ['admin', 'super_admin']
                        );

                        $isSuperAdmin =
                            $user->role === 'super_admin';

                        $isPartner =
                            $user->role === 'partner';
                    @endphp


                    <!-- =================================================
                        ADMIN / SUPER ADMIN DROPDOWN
                    ================================================== -->

                    @if($isAdmin)

                        <div
                            x-data="{ open: false }"
                            class="relative"
                        >

                            <button
                                type="button"
                                @click="open = !open"
                                class="
                                    flex
                                    items-center
                                    gap-2
                                    px-4
                                    py-2
                                    rounded-xl
                                    bg-gradient-to-r
                                    from-indigo-600
                                    to-blue-600
                                    text-white
                                    font-medium
                                    shadow-md
                                    hover:shadow-xl
                                    hover:scale-[1.03]
                                    transition
                                "
                            >

                                <span>
                                    {{ $isSuperAdmin ? 'Dashboard' : 'Admin' }}
                                </span>


                                @if(
                                    $isSuperAdmin &&
                                    isset($pendingCount) &&
                                    $pendingCount > 0
                                )

                                    <span
                                        class="
                                            bg-red-500
                                            text-white
                                            text-xs
                                            px-2
                                            py-0.5
                                            rounded-full
                                            animate-pulse
                                        "
                                    >
                                        {{ $pendingCount }}
                                    </span>

                                @endif


                                <svg
                                    class="w-4 h-4 transition-transform"
                                    :class="{ 'rotate-180': open }"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-width="2"
                                        d="M19 9l-7 7-7-7"
                                    />
                                </svg>

                            </button>


                            <!-- ADMIN DROPDOWN -->
                            <div
                                x-show="open"
                                x-cloak
                                @click.outside="open = false"
                                x-transition
                                class="
                                    absolute
                                    right-0
                                    mt-3
                                    w-72
                                    bg-white/95
                                    backdrop-blur-xl
                                    border
                                    border-gray-200
                                    rounded-2xl
                                    shadow-2xl
                                    overflow-hidden
                                    z-50
                                "
                            >

                                <!-- Community Section -->
                                <div class="dropdown-section-title">
                                    Community
                                </div>


                                <!-- My Community Posts -->
                                <a
                                    href="{{ route('partner.community.posts.index') }}"
                                    class="dropdown-item dropdown-item-icon"
                                >

                                    <span class="dropdown-icon">
                                        <svg
                                            class="w-4 h-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h7l7 7v9a2 2 0 01-2 2z"
                                            />
                                        </svg>
                                    </span>

                                    <span>
                                        My Community Posts
                                    </span>

                                </a>


                                <!-- Create Community Post -->
                                <a
                                    href="{{ route('partner.community.posts.create') }}"
                                    class="dropdown-item dropdown-item-icon"
                                >

                                    <span class="dropdown-icon">

                                        <svg
                                            class="w-4 h-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 4v16m8-8H4"
                                            />
                                        </svg>

                                    </span>

                                    <span>
                                        Create Community Post
                                    </span>

                                </a>


                                <!-- Community Moderation -->
                                <a
                                    href="{{ route('admin.community.posts.index') }}"
                                    class="dropdown-item dropdown-item-icon"
                                >

                                    <span class="dropdown-icon">

                                        <svg
                                            class="w-4 h-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 12l2 2 4-4m5-4A11.95 11.95 0 0112 3a11.95 11.95 0 01-8 3c0 5.591 3.824 10.29 8 11.622C16.176 16.29 20 11.591 20 6z"
                                            />
                                        </svg>

                                    </span>

                                    <span>
                                        Community Moderation
                                    </span>

                                </a>


                                <!-- Community Categories -->
                                @if($isSuperAdmin)

                                    <a
                                        href="{{ route('admin.community.categories.index') }}"
                                        class="dropdown-item dropdown-item-icon"
                                    >

                                        <span class="dropdown-icon">

                                            <svg
                                                class="w-4 h-4"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M7 7h.01M3 3h7l11 11-7 7L3 10V3z"
                                                />
                                            </svg>

                                        </span>

                                        <span>
                                            Community Categories
                                        </span>

                                    </a>

                                @endif


                                <!-- Divider -->
                                <div class="border-t border-gray-100"></div>


                                <!-- Administration -->
                                <div class="dropdown-section-title">
                                    Administration
                                </div>


                                <!-- Manage Users -->
                                <a
                                    href="{{ route('users.index') }}"
                                    class="dropdown-item"
                                >
                                    Manage Users
                                </a>


                                <!-- Admin My Requests -->
                                @if($user->role === 'admin')

                                    <a
                                        href="{{ route('admin.my.requests') }}"
                                        class="dropdown-item"
                                    >
                                        My Requests
                                    </a>

                                @endif


                                <!-- Super Admin Pending Requests -->
                                @if($isSuperAdmin)

                                    <a
                                        href="{{ route('admin.requests.index') }}"
                                        class="dropdown-item flex items-center justify-between"
                                    >

                                        <span>
                                            Pending Requests
                                        </span>


                                        @if(
                                            isset($pendingCount) &&
                                            $pendingCount > 0
                                        )

                                            <span class="badge-red">
                                                {{ $pendingCount }}
                                            </span>

                                        @endif

                                    </a>

                                @endif


                                <!-- Contact Messages -->
                                <a
                                    href="{{ route('admin.contact-messages.index') }}"
                                    class="dropdown-item flex items-center justify-between"
                                >

                                    <span>
                                        Contact Messages
                                    </span>


                                    @if(
                                        isset($unreadMessageCount) &&
                                        $unreadMessageCount > 0
                                    )

                                        <span class="badge-red">
                                            {{ $unreadMessageCount }}
                                        </span>

                                    @endif

                                </a>

                            </div>

                        </div>

                    @endif


                    <!-- =================================================
                        PARTNER DROPDOWN
                    ================================================== -->

                    @if($isPartner)

                        <div
                            x-data="{ open: false }"
                            class="relative"
                        >

                            <button
                                type="button"
                                @click="open = !open"
                                class="
                                    flex
                                    items-center
                                    gap-2
                                    px-4
                                    py-2
                                    rounded-xl
                                    bg-gradient-to-r
                                    from-indigo-600
                                    to-blue-600
                                    text-white
                                    font-medium
                                    shadow-md
                                    hover:shadow-xl
                                    hover:scale-[1.03]
                                    transition
                                "
                            >

                                <span>
                                    Partner
                                </span>


                                <svg
                                    class="w-4 h-4 transition-transform"
                                    :class="{ 'rotate-180': open }"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-width="2"
                                        d="M19 9l-7 7-7-7"
                                    />
                                </svg>

                            </button>


                            <!-- PARTNER MENU -->
                            <div
                                x-show="open"
                                x-cloak
                                @click.outside="open = false"
                                x-transition
                                class="
                                    absolute
                                    right-0
                                    mt-3
                                    w-64
                                    bg-white/95
                                    backdrop-blur-xl
                                    border
                                    border-gray-200
                                    rounded-2xl
                                    shadow-2xl
                                    overflow-hidden
                                    z-50
                                "
                            >

                                <div class="dropdown-section-title">
                                    Community
                                </div>


                                <!-- My Posts -->
                                <a
                                    href="{{ route('partner.community.posts.index') }}"
                                    class="dropdown-item dropdown-item-icon"
                                >

                                    <span class="dropdown-icon">

                                        <svg
                                            class="w-4 h-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h7l7 7v9a2 2 0 01-2 2z"
                                            />
                                        </svg>

                                    </span>

                                    <span>
                                        My Community Posts
                                    </span>

                                </a>


                                <!-- Create Post -->
                                <a
                                    href="{{ route('partner.community.posts.create') }}"
                                    class="dropdown-item dropdown-item-icon"
                                >

                                    <span class="dropdown-icon">

                                        <svg
                                            class="w-4 h-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 4v16m8-8H4"
                                            />
                                        </svg>

                                    </span>

                                    <span>
                                        Create Community Post
                                    </span>

                                </a>


                                <!-- Public Community -->
                                <div class="border-t border-gray-100"></div>

                                <a
                                    href="{{ route('community.index') }}"
                                    class="dropdown-item"
                                >
                                    View Community
                                </a>

                            </div>

                        </div>

                    @endif


                    <!-- =================================================
                        USER NAME + LOGOUT
                    ================================================== -->

                    <div class="hidden md:flex items-center gap-3">

                        <span class="text-gray-700 text-sm whitespace-nowrap">

                            Hi,

                            <span class="font-semibold text-indigo-700">
                                {{ $user->name }}
                            </span>

                        </span>


                        <form
                            method="POST"
                            action="{{ route('logout') }}"
                            x-data="{ loading: false }"
                            @submit="loading = true"
                        >

                            @csrf


                            <button
                                type="submit"
                                :disabled="loading"
                                class="logout-btn"
                            >

                                <svg
                                    x-show="loading"
                                    class="w-4 h-4 animate-spin"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >

                                    <circle
                                        cx="12"
                                        cy="12"
                                        r="10"
                                        stroke="currentColor"
                                        stroke-width="4"
                                        class="opacity-25"
                                    />

                                    <path
                                        fill="currentColor"
                                        class="opacity-75"
                                        d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"
                                    />

                                </svg>


                                <span
                                    x-text="loading ? 'Logging out...' : 'Logout'"
                                ></span>

                            </button>

                        </form>

                    </div>


                @else

                    <!-- =================================================
                        GUEST BUTTONS
                    ================================================== -->

                    <div class="hidden sm:flex items-center gap-3">

                        <button
                            type="button"
                            onclick="openAuthModal('login')"
                            class="btn-outline"
                        >
                            Sign In
                        </button>


                        <button
                            type="button"
                            onclick="openAuthModal('register')"
                            class="btn-primary"
                        >
                            Create Account
                        </button>

                    </div>

                @endauth


                <!-- =====================================================
                    MOBILE BUTTON
                ====================================================== -->

                <button
                    type="button"
                    @click="mobileOpen = !mobileOpen"
                    class="lg:hidden p-2 rounded-lg hover:bg-white/40 transition"
                    aria-label="Toggle navigation"
                >

                    <!-- Hamburger -->
                    <svg
                        x-show="!mobileOpen"
                        class="w-7 h-7"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>


                    <!-- Close -->
                    <svg
                        x-show="mobileOpen"
                        x-cloak
                        class="w-7 h-7"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>

                </button>

            </div>

        </div>


        <!-- =============================================================
            MOBILE MENU
        ============================================================== -->

        <div
            x-show="mobileOpen"
            x-cloak
            x-transition
            @click.outside="mobileOpen = false"
            class="
                lg:hidden
                absolute
                left-0
                right-0
                bg-white/95
                backdrop-blur-xl
                border-t
                border-gray-200
                shadow-xl
            "
        >

            <div class="px-6 py-6 max-h-[calc(100vh-4rem)] overflow-y-auto">

                <!-- Public Links -->
                <div class="space-y-5">

                    <a
                        href="{{ url('/') }}"
                        class="mobile-link"
                    >
                        Home
                    </a>


                    <a
                        href="{{ route('about') }}"
                        class="mobile-link"
                    >
                        About
                    </a>


                    <a
                        href="https://www.yunuscenterait.org/"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="mobile-link"
                    >
                        Yunus Center AIT
                    </a>


                    <a
                        href="{{ route('news') }}"
                        class="mobile-link"
                    >
                        News
                    </a>


                    <!-- PUBLIC COMMUNITY -->
                    <a
                        href="{{ route('community.index') }}"
                        class="
                            mobile-link
                            {{ request()->routeIs('community.*')
                                ? 'text-indigo-600 font-semibold'
                                : ''
                            }}
                        "
                    >
                        Community
                    </a>


                    <a
                        href="{{ route('partners') }}"
                        class="mobile-link"
                    >
                        Our Partners
                    </a>


                    <a
                        href="{{ route('resources') }}"
                        class="mobile-link"
                    >
                        Resources
                    </a>


                    <a
                        href="{{ route('contact') }}"
                        class="mobile-link"
                    >
                        Contact Us
                    </a>

                </div>


                <!-- =====================================================
                    AUTHENTICATED MOBILE LINKS
                ====================================================== -->

                @auth

                    <div class="mt-6 pt-6 border-t border-gray-200">


                        <!-- PARTNER -->
                        @if($isPartner)

                            <div class="mobile-section-title">
                                Partner
                            </div>


                            <div class="space-y-4">

                                <a
                                    href="{{ route('partner.community.posts.index') }}"
                                    class="mobile-link"
                                >
                                    My Community Posts
                                </a>


                                <a
                                    href="{{ route('partner.community.posts.create') }}"
                                    class="mobile-link"
                                >
                                    Create Community Post
                                </a>

                            </div>

                        @endif


                        <!-- ADMIN / SUPER ADMIN -->
                        @if($isAdmin)

                            <div class="mobile-section-title">
                                {{ $isSuperAdmin ? 'Dashboard' : 'Admin' }}
                            </div>


                            <div class="space-y-4">

                                <a
                                    href="{{ route('partner.community.posts.index') }}"
                                    class="mobile-link"
                                >
                                    My Community Posts
                                </a>


                                <a
                                    href="{{ route('partner.community.posts.create') }}"
                                    class="mobile-link"
                                >
                                    Create Community Post
                                </a>


                                <a
                                    href="{{ route('admin.community.posts.index') }}"
                                    class="mobile-link"
                                >
                                    Community Moderation
                                </a>


                                @if($isSuperAdmin)

                                    <a
                                        href="{{ route('admin.community.categories.index') }}"
                                        class="mobile-link"
                                    >
                                        Community Categories
                                    </a>

                                @endif


                                <a
                                    href="{{ route('users.index') }}"
                                    class="mobile-link"
                                >
                                    Manage Users
                                </a>


                                @if($user->role === 'admin')

                                    <a
                                        href="{{ route('admin.my.requests') }}"
                                        class="mobile-link"
                                    >
                                        My Requests
                                    </a>

                                @endif


                                @if($isSuperAdmin)

                                    <a
                                        href="{{ route('admin.requests.index') }}"
                                        class="mobile-link flex items-center justify-between"
                                    >

                                        <span>
                                            Pending Requests
                                        </span>


                                        @if(
                                            isset($pendingCount) &&
                                            $pendingCount > 0
                                        )

                                            <span class="badge-red">
                                                {{ $pendingCount }}
                                            </span>

                                        @endif

                                    </a>

                                @endif


                                <a
                                    href="{{ route('admin.contact-messages.index') }}"
                                    class="mobile-link flex items-center justify-between"
                                >

                                    <span>
                                        Contact Messages
                                    </span>


                                    @if(
                                        isset($unreadMessageCount) &&
                                        $unreadMessageCount > 0
                                    )

                                        <span class="badge-red">
                                            {{ $unreadMessageCount }}
                                        </span>

                                    @endif

                                </a>

                            </div>

                        @endif


                        <!-- User -->
                        <div class="mt-6 pt-5 border-t border-gray-200">

                            <div class="text-sm text-gray-500 mb-4">

                                Signed in as

                                <span class="font-semibold text-gray-800">
                                    {{ $user->name }}
                                </span>

                            </div>


                            <form
                                method="POST"
                                action="{{ route('logout') }}"
                            >

                                @csrf

                                <button
                                    type="submit"
                                    class="logout-btn w-full justify-center"
                                >
                                    Logout
                                </button>

                            </form>

                        </div>

                    </div>

                @else

                    <!-- =================================================
                        GUEST MOBILE AUTH
                    ================================================== -->

                    <div
                        class="
                            pt-6
                            mt-6
                            border-t
                            flex
                            flex-col
                            gap-4
                        "
                    >

                        <button
                            type="button"
                            onclick="openAuthModal('login')"
                            class="btn-outline w-full"
                        >
                            Sign In
                        </button>


                        <button
                            type="button"
                            onclick="openAuthModal('register')"
                            class="btn-primary w-full"
                        >
                            Create Account
                        </button>

                    </div>

                @endauth

            </div>

        </div>

    </div>

</header>


<!-- ================= NAVBAR STYLES ================= -->

<style>

[x-cloak] {
    display: none !important;
}


/* ============================================================
   ACTIVE NAV
============================================================ */

.nav-link.active {
    color: #4f46e5;
    font-weight: 600;
}

.nav-link.active::after {
    width: 70%;
}


/* ============================================================
   LOGO
============================================================ */

.logo-glow {
    animation: logoGlow 6s infinite linear;
}

@keyframes logoGlow {

    0% {
        filter: brightness(1);
    }

    50% {
        filter: brightness(1.25);
    }

    100% {
        filter: brightness(1);
    }

}


/* ============================================================
   DESKTOP NAVIGATION
============================================================ */

.nav-link {
    position: relative;
    transition: all .3s;
    white-space: nowrap;
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

    background:
        linear-gradient(
            to right,
            #6366f1,
            #0ea5e9
        );

    transition: .4s;
    transform: translateX(-50%);
    border-radius: 999px;
}

.nav-link:hover::after {
    width: 70%;
}


/* ============================================================
   MOBILE NAVIGATION
============================================================ */

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

.mobile-section-title {
    margin-bottom: 1rem;
    color: #9ca3af;
    font-size: .72rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .08em;
}


/* ============================================================
   PRIMARY BUTTON
============================================================ */

.btn-primary {
    padding: .55rem 1.4rem;
    border-radius: 12px;
    font-weight: 500;

    background:
        linear-gradient(
            135deg,
            #4f46e5,
            #2563eb
        );

    color: white;

    box-shadow:
        0 10px 20px
        rgba(79, 70, 229, .25);

    transition: .25s;
}

.btn-primary:hover {
    transform:
        translateY(-2px)
        scale(1.04);

    box-shadow:
        0 16px 35px
        rgba(79, 70, 229, .35);
}


/* ============================================================
   OUTLINE BUTTON
============================================================ */

.btn-outline {
    padding: .55rem 1.4rem;
    border-radius: 12px;
    border: 1px solid #c7d2fe;

    color: #4f46e5;
    font-weight: 500;

    background:
        rgba(255, 255, 255, .6);

    backdrop-filter:
        blur(10px);

    transition: .25s;
}

.btn-outline:hover {
    background: #eef2ff;
}


/* ============================================================
   LOGOUT
============================================================ */

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

.logout-btn:disabled {
    opacity: .6;
    cursor: not-allowed;
}


/* ============================================================
   DROPDOWN
============================================================ */

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

.dropdown-item-icon {
    display: flex;
    align-items: center;
    gap: 10px;
}

.dropdown-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    width: 28px;
    height: 28px;

    border-radius: 8px;

    background: #eef2ff;
    color: #4f46e5;

    flex-shrink: 0;
}

.dropdown-section-title {
    padding: 12px 18px 7px;

    color: #9ca3af;

    font-size: .68rem;
    font-weight: 700;

    text-transform: uppercase;
    letter-spacing: .08em;
}


/* ============================================================
   RED BADGE
============================================================ */

.badge-red {
    background: #ef4444;
    color: white;

    font-size: .7rem;

    padding: 2px 6px;

    border-radius: 999px;

    min-width: 20px;
    text-align: center;
}

</style>