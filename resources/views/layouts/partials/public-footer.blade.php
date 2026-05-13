<!-- ================= PREMIUM FOOTER ================= -->
<footer class="relative overflow-hidden bg-[#020817] text-slate-300">

    <!-- ================= BACKGROUND ================= -->
    <div class="absolute inset-0 pointer-events-none">

        <!-- gradient -->
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-[#06111f] to-black"></div>

        <!-- glows -->
        <div class="absolute -top-40 left-0 w-[32rem] h-[32rem] bg-cyan-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-[28rem] h-[28rem] bg-pink-500/10 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 w-[40rem] h-[20rem] bg-indigo-500/5 blur-3xl rounded-full"></div>

        <!-- grid -->
        <div class="absolute inset-0 opacity-[0.04]"
            style="
                background-image:
                    linear-gradient(rgba(255,255,255,0.08) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(255,255,255,0.08) 1px, transparent 1px);
                background-size: 60px 60px;
            ">
        </div>
    </div>

    <!-- ================= MAIN ================= -->
    <div class="relative max-w-screen-2xl mx-auto px-6 sm:px-8 lg:px-12 pt-20 pb-14">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-14">

            <!-- ================= BRAND ================= -->
            <div class="lg:col-span-5">

                <!-- logo -->
                <div class="flex items-center gap-5 mb-8">

                    <div class="relative">

                        <div class="absolute inset-0 bg-cyan-400/20 blur-xl rounded-2xl"></div>

                        <div class="relative w-28 h-20 rounded-2xl border border-white/10 bg-white/5 backdrop-blur-xl flex items-center justify-center overflow-hidden shadow-2xl">

                            <img
                                src="/images/wepowerlogo.png"
                                alt="WePOWER Logo"
                                class="w-24 h-12 object-contain opacity-95"
                            >

                        </div>
                    </div>

                    <div>
                        <h2 class="text-3xl font-bold text-white tracking-tight">
                            WePOWER
                        </h2>

                        <p class="mt-1 text-xs uppercase tracking-[0.35em] text-cyan-400">
                            South Asia Women in Power Sector Network
                        </p>
                    </div>
                </div>

                <!-- text -->
                <p class="text-lg leading-relaxed text-slate-300 max-w-xl">
                    Advancing gender equity in the power sector through
                    regional collaboration, institutional partnerships,
                    leadership development, and inclusive opportunities.
                </p>

                <p class="mt-6 text-sm leading-relaxed text-slate-400 max-w-xl">
                    Supported by the World Bank and coordinated through
                    the Regional Secretariat at AIT Yunus Center, Thailand,
                    WePOWER connects institutions across South Asia to
                    accelerate women's participation in the energy sector.
                </p>

                <!-- buttons -->
                <div class="flex flex-wrap items-center gap-4 mt-8">

                    <a href="{{ route('about') }}"
                    class="group inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-cyan-500/10 border border-cyan-400/20 text-cyan-300 hover:bg-cyan-400 hover:text-slate-950 transition-all duration-300">

                        Learn More

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>

                    </a>

                    <a href="{{ route('partners') }}"
                    class="inline-flex items-center gap-2 px-5 py-3 rounded-xl border border-white/10 bg-white/5 hover:bg-white/10 text-white transition-all duration-300">

                        Our Partners
                    </a>

                </div>

                <!-- socials -->
                <div class="flex items-center gap-4 mt-10">

                    <a href="#"
                    class="w-11 h-11 rounded-xl border border-white/10 bg-white/5 hover:bg-cyan-400 hover:text-slate-950 transition-all duration-300 flex items-center justify-center backdrop-blur-xl">

                        <i class="fab fa-linkedin-in"></i>
                    </a>

                    <a href="#"
                    class="w-11 h-11 rounded-xl border border-white/10 bg-white/5 hover:bg-cyan-400 hover:text-slate-950 transition-all duration-300 flex items-center justify-center backdrop-blur-xl">

                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <a href="#"
                    class="w-11 h-11 rounded-xl border border-white/10 bg-white/5 hover:bg-cyan-400 hover:text-slate-950 transition-all duration-300 flex items-center justify-center backdrop-blur-xl">

                        <i class="fab fa-x-twitter"></i>
                    </a>

                </div>

            </div>

            <!-- ================= LINKS ================= -->
            <div class="lg:col-span-3">

                <h4 class="text-white text-lg font-semibold mb-7">
                    Quick Links
                </h4>

                <ul class="space-y-4">

                    <li>
                        <a href="{{ url('/') }}"
                        class="group flex items-center gap-3 text-slate-400 hover:text-cyan-300 transition">

                            <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 opacity-70 group-hover:scale-150 transition"></span>

                            Home
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('about') }}"
                        class="group flex items-center gap-3 text-slate-400 hover:text-cyan-300 transition">

                            <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 opacity-70 group-hover:scale-150 transition"></span>

                            About
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('news') }}"
                        class="group flex items-center gap-3 text-slate-400 hover:text-cyan-300 transition">

                            <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 opacity-70 group-hover:scale-150 transition"></span>

                            News
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('partners') }}"
                        class="group flex items-center gap-3 text-slate-400 hover:text-cyan-300 transition">

                            <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 opacity-70 group-hover:scale-150 transition"></span>

                            Our Partners
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('resources') }}"
                        class="group flex items-center gap-3 text-slate-400 hover:text-cyan-300 transition">

                            <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 opacity-70 group-hover:scale-150 transition"></span>

                            Resources
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('contact') }}"
                        class="group flex items-center gap-3 text-slate-400 hover:text-cyan-300 transition">

                            <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 opacity-70 group-hover:scale-150 transition"></span>

                            Contact
                        </a>
                    </li>

                </ul>

            </div>

            <!-- ================= CONTACT ================= -->
            <div class="lg:col-span-4">

                <h4 class="text-white text-lg font-semibold mb-7">
                    Contact Information
                </h4>

                <div class="space-y-6">

                    <div class="flex items-start gap-4">

                        <div class="w-11 h-11 rounded-xl bg-cyan-500/10 border border-cyan-400/20 flex items-center justify-center text-cyan-300 shrink-0">
                            📍
                        </div>

                        <div>
                            <h5 class="text-white font-medium mb-1">
                                Regional Secretariat
                            </h5>

                            <p class="text-sm text-slate-400 leading-relaxed">
                                Asian Institute of Technology (AIT)<br>
                                Klong Luang, Pathum Thani<br>
                                Thailand
                            </p>
                        </div>

                    </div>

                    <div class="flex items-start gap-4">

                        <div class="w-11 h-11 rounded-xl bg-cyan-500/10 border border-cyan-400/20 flex items-center justify-center text-cyan-300 shrink-0">
                            ✉
                        </div>

                        <div>
                            <h5 class="text-white font-medium mb-1">
                                Email Address
                            </h5>

                            <a href="mailto:wepower-sec@ait.asia"
                            class="text-sm text-slate-400 hover:text-cyan-300 transition">

                                wepower-sec@ait.asia
                            </a>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- ================= BOTTOM ================= -->
    <div class="relative border-t border-white/10 bg-black/30 backdrop-blur-xl">

        <div class="max-w-screen-2xl mx-auto px-6 py-6">

            <div class="flex flex-col md:flex-row items-center justify-between gap-4">

                <p class="text-sm text-slate-500 text-center md:text-left">
                    © {{ date('Y') }} WePOWER. All rights reserved.
                </p>

                <div class="flex items-center gap-6 text-sm">

                    <a href="#"
                    class="text-slate-500 hover:text-cyan-300 transition">
                        Privacy Policy
                    </a>

                    <a href="#"
                    class="text-slate-500 hover:text-cyan-300 transition">
                        Terms of Use
                    </a>

                </div>

            </div>

        </div>

    </div>

</footer>