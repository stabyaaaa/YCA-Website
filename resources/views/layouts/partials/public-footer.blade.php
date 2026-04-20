<!-- ================= FOOTER ================= -->
<footer class="relative bg-gradient-to-b from-slate-900 to-slate-950 text-gray-300 overflow-hidden">

    <!-- Background glow -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-24 left-0 w-80 h-80 bg-cyan-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-1/3 w-72 h-72 bg-indigo-500/10 rounded-full blur-3xl"></div>
    </div>

    <!-- MAIN -->
    <div class="relative max-w-screen-2xl mx-auto px-5 sm:px-8 lg:px-12 py-16 lg:py-20">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-10 lg:gap-12">

            <!-- ================= LEFT / BRAND ================= -->
            <div class="md:col-span-5 relative">

                <div class="space-y-6">

                    <!-- Logo + Name -->
                    <div class="flex items-center gap-4">

                        <!-- LOGO -->
                        <div class="w-28 h-20 rounded-xl bg-white/10 backdrop-blur-md border border-white/10 flex items-center justify-center overflow-hidden">
                            
                            <!-- Replace with real logo -->
                            <img 
                                src="/images/wepowerlogo.png" 
                                alt="WePOWER Logo" 
                                class="w-24 h-12 object-contain opacity-90"
                            >

                            <!-- fallback -->
                            <!-- <span class="text-white font-bold text-lg">W</span> -->
                        </div>

                        <!-- TEXT -->
                        <div>
                            <h3 class="text-2xl font-bold text-white tracking-tight">
                                WePOWER
                            </h3>
                            <p class="text-xs uppercase tracking-[0.25em] text-cyan-400">
                                South Asia Initiative
                            </p>
                        </div>

                    </div>

                    <!-- Tagline -->
                    <p class="text-lg text-gray-300 leading-relaxed max-w-md">
                        Empowering gender equity in the energy sector 
                        through collaboration, partnerships, and capacity building.
                    </p>

                    <!-- Description -->
                    <p class="text-sm text-gray-400 leading-relaxed max-w-md">
                        A regional partnership supported by the World Bank, working with utilities, 
                        institutions, and professionals to create a more inclusive and sustainable 
                        power sector across South Asia.
                    </p>

                    <!-- CTA -->
                    <div>
                        <a href="{{ route('about') }}"
                           class="inline-flex items-center gap-2 text-sm font-medium text-cyan-400 hover:text-cyan-300 transition">
                            Learn more
                            <span class="text-lg">→</span>
                        </a>
                    </div>

                </div>
            </div>

            <!-- ================= NAV LINKS ================= -->
            <div class="md:col-span-3">
                <h4 class="text-lg font-semibold text-white mb-6">Quick Links</h4>

                <ul class="space-y-3 text-sm">

                    <li>
                        <a href="{{ url('/') }}" 
                        class="hover:text-cyan-400 transition-colors {{ request()->is('/') ? 'text-white' : '' }}">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('about') }}" 
                        class="hover:text-cyan-400 transition-colors {{ request()->is('about') ? 'text-white' : '' }}">
                            About
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('news') }}" 
                        class="hover:text-cyan-400 transition-colors {{ request()->routeIs('news') ? 'text-white' : '' }}">
                            News
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('partners') }}" 
                        class="hover:text-cyan-400 transition-colors {{ request()->is('partners') ? 'text-white' : '' }}">
                            Our Partners
                        </a>
                    </li>

                    <li>
                        <a href="/contact" 
                        class="hover:text-cyan-400 transition-colors {{ request()->is('contact') ? 'text-white' : '' }}">
                            Contact
                        </a>
                    </li>

                </ul>
            </div>

            <!-- ================= CONTACT ================= -->
            <div class="md:col-span-4">
                <h4 class="text-lg font-semibold text-white mb-6">Contact</h4>

                <div class="space-y-4 text-sm text-gray-400">

                    <p>
                        Asian Institute of Technology (AIT)<br>
                        Klong Luang, Pathum Thani<br>
                        Thailand
                    </p>

                    <p>
                        <strong class="text-white">Email:</strong>
                        <a href="mailto:sawtth@ait.asia" class="hover:text-cyan-400 transition">
                            sawtth@ait.asia
                        </a>
                    </p>

                </div>
            </div>

        </div>
    </div>

    <!-- ================= BOTTOM ================= -->
    <div class="border-t border-slate-800/60 bg-slate-950/60">
        <div class="max-w-screen-2xl mx-auto px-6 py-6 text-center text-sm text-gray-500">

            © {{ date('Y') }} WePOWER. All rights reserved.

            <span class="mx-3">•</span>

            <a href="#" class="hover:text-gray-300 transition-colors">
                Privacy Policy
            </a>

            <span class="mx-3">•</span>

            <a href="#" class="hover:text-gray-300 transition-colors">
                Terms of Use
            </a>

        </div>
    </div>

</footer>