<!-- ================= WEPOWER FOOTER ================= -->
<footer class="relative bg-[#020817] text-slate-300 overflow-hidden">

    <!-- ================= BACKGROUND EFFECTS ================= -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">

        <div class="absolute inset-0 bg-gradient-to-r from-[#031724] via-[#030a18] to-[#160b1c]"></div>

        <div
            class="absolute -left-32 top-10
                   w-[420px] h-[420px]
                   rounded-full
                   bg-cyan-500/[0.07]
                   blur-[100px]"
        ></div>

        <div
            class="absolute -right-32 bottom-0
                   w-[420px] h-[420px]
                   rounded-full
                   bg-pink-500/[0.07]
                   blur-[100px]"
        ></div>

    </div>


    <!-- ================= MAIN CONTENT ================= -->
    <div class="relative">

        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10">

            <div class="py-14 lg:py-16">

                <div
                    class="grid grid-cols-1
                           md:grid-cols-2
                           lg:grid-cols-12
                           gap-10 lg:gap-12"
                >

                    <!-- =================================================
                         COLUMN 1 — BRAND
                    ================================================== -->
                    <div class="md:col-span-2 lg:col-span-5">

                        <!-- Logo + Name -->
                        <div class="flex items-center gap-4 mb-6">

                            <!-- Logo -->
                            <div
                                class="w-24 h-16 shrink-0
                                       rounded-xl
                                       border border-cyan-400/20
                                       bg-white/5
                                       flex items-center justify-center
                                       overflow-hidden"
                            >
                                <img
                                    src="{{ asset('images/wepowerlogo.png') }}"
                                    alt="WePOWER Logo"
                                    class="w-20 h-12 object-contain"
                                >
                            </div>


                            <!-- Brand -->
                            <div class="min-w-0">

                                <h2
                                    class="text-2xl
                                           leading-none
                                           font-bold
                                           text-white"
                                >
                                    WePOWER
                                </h2>

                                <p
                                    class="mt-3
                                           text-xs
                                           leading-5
                                           font-medium
                                           uppercase
                                           tracking-widest
                                           text-cyan-400"
                                >
                                    South Asia Women in the Power Sector<br>
                                    Network
                                </p>

                            </div>

                        </div>


                        <!-- Main description -->
                        <p
                            class="max-w-[520px]
                                   text-[15px]
                                   leading-7
                                   text-slate-300"
                        >
                            Advancing gender equity in the power sector through
                            global collaboration, institutional partnerships,
                            leadership development, and inclusive opportunities.
                        </p>


                        <!-- Secondary description -->
                        <p
                            class="mt-4
                                   max-w-[540px]
                                   text-[13px]
                                   leading-6
                                   text-slate-400"
                        >
                            Supported by the World Bank and coordinated through
                            the Global Secretariat at AIT Yunus Center, Thailand,
                            WePOWER connects institutions across South Asia to
                            accelerate women's participation in the energy sector.
                        </p>


                        <!-- Buttons -->
                        <div class="flex flex-wrap items-center gap-3 mt-6">

                            <a
                                href="{{ route('about') }}"
                                class="group
                                       inline-flex items-center gap-2
                                       px-4 py-2.5
                                       rounded-xl
                                       border border-cyan-400/30
                                       bg-cyan-500/10
                                       text-sm font-medium
                                       text-cyan-300
                                       hover:bg-cyan-400
                                       hover:text-slate-950
                                       transition-all duration-300"
                            >
                                Learn More

                                <svg
                                    class="w-4 h-4
                                           transition-transform duration-300
                                           group-hover:translate-x-1"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6"
                                    />
                                </svg>
                            </a>


                            <a
                                href="{{ route('partners') }}"
                                class="inline-flex items-center
                                       px-4 py-2.5
                                       rounded-xl
                                       border border-white/15
                                       bg-white/[0.04]
                                       text-sm font-medium
                                       text-white
                                       hover:bg-white/10
                                       transition-all duration-300"
                            >
                                Our Partners
                            </a>

                        </div>

                    </div>


                    <!-- =================================================
                         COLUMN 2 — QUICK LINKS
                    ================================================== -->
                    <div class="lg:col-span-3">

                        <h3
                            class="text-[15px]
                                   font-semibold
                                   text-white
                                   mb-6"
                        >
                            Quick Links
                        </h3>


                        <nav>
                            <ul class="space-y-3.5">

                                <li>
                                    <a
                                        href="{{ url('/') }}"
                                        class="group inline-flex items-center gap-3
                                               text-[14px] text-slate-400
                                               hover:text-cyan-300
                                               transition-colors duration-200"
                                    >
                                        <span
                                            class="w-1.5 h-1.5 rounded-full
                                                   bg-cyan-400/80
                                                   transition-transform
                                                   group-hover:scale-150"
                                        ></span>
                                        Home
                                    </a>
                                </li>


                                <li>
                                    <a
                                        href="{{ route('about') }}"
                                        class="group inline-flex items-center gap-3
                                               text-[14px] text-slate-400
                                               hover:text-cyan-300
                                               transition-colors duration-200"
                                    >
                                        <span
                                            class="w-1.5 h-1.5 rounded-full
                                                   bg-cyan-400/80
                                                   transition-transform
                                                   group-hover:scale-150"
                                        ></span>
                                        About
                                    </a>
                                </li>


                                <li>
                                    <a
                                        href="{{ route('news') }}"
                                        class="group inline-flex items-center gap-3
                                               text-[14px] text-slate-400
                                               hover:text-cyan-300
                                               transition-colors duration-200"
                                    >
                                        <span
                                            class="w-1.5 h-1.5 rounded-full
                                                   bg-cyan-400/80
                                                   transition-transform
                                                   group-hover:scale-150"
                                        ></span>
                                        News
                                    </a>
                                </li>


                                <li>
                                    <a
                                        href="{{ route('announcements') }}"
                                        class="group inline-flex items-center gap-3
                                               text-[14px] text-slate-400
                                               hover:text-cyan-300
                                               transition-colors duration-200"
                                    >
                                        <span
                                            class="w-1.5 h-1.5 rounded-full
                                                   bg-cyan-400/80
                                                   transition-transform
                                                   group-hover:scale-150"
                                        ></span>
                                        Announcements
                                    </a>
                                </li>


                                <li>
                                    <a
                                        href="{{ route('partners') }}"
                                        class="group inline-flex items-center gap-3
                                               text-[14px] text-slate-400
                                               hover:text-cyan-300
                                               transition-colors duration-200"
                                    >
                                        <span
                                            class="w-1.5 h-1.5 rounded-full
                                                   bg-cyan-400/80
                                                   transition-transform
                                                   group-hover:scale-150"
                                        ></span>
                                        Our Partners
                                    </a>
                                </li>


                                <li>
                                    <a
                                        href="{{ route('resources') }}"
                                        class="group inline-flex items-center gap-3
                                               text-[14px] text-slate-400
                                               hover:text-cyan-300
                                               transition-colors duration-200"
                                    >
                                        <span
                                            class="w-1.5 h-1.5 rounded-full
                                                   bg-cyan-400/80
                                                   transition-transform
                                                   group-hover:scale-150"
                                        ></span>
                                        Resources
                                    </a>
                                </li>


                                <li>
                                    <a
                                        href="{{ route('contact') }}"
                                        class="group inline-flex items-center gap-3
                                               text-[14px] text-slate-400
                                               hover:text-cyan-300
                                               transition-colors duration-200"
                                    >
                                        <span
                                            class="w-1.5 h-1.5 rounded-full
                                                   bg-cyan-400/80
                                                   transition-transform
                                                   group-hover:scale-150"
                                        ></span>
                                        Contact
                                    </a>
                                </li>

                            </ul>
                        </nav>

                    </div>


                    <!-- =================================================
                         COLUMN 3 — CONTACT
                    ================================================== -->
                    <div class="lg:col-span-4">

                        <h3
                            class="text-[15px]
                                   font-semibold
                                   text-white
                                   mb-6"
                        >
                            Contact Information
                        </h3>


                        <div class="space-y-6">

                            <!-- LOCATION -->
                            <div class="flex items-start gap-4">

                                <div
                                    class="w-10 h-10
                                           shrink-0
                                           rounded-lg
                                           border border-cyan-400/20
                                           bg-cyan-500/10
                                           flex items-center justify-center"
                                >
                                    <svg
                                        class="w-[17px] h-[17px] text-cyan-300"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M12 21s6-5.1 6-11a6 6 0 10-12 0c0 5.9 6 11 6 11z"
                                        />

                                        <circle
                                            cx="12"
                                            cy="10"
                                            r="2"
                                            stroke-width="1.8"
                                        />
                                    </svg>
                                </div>


                                <div class="min-w-0">

                                    <h4
                                        class="text-[14px]
                                               font-semibold
                                               text-white
                                               mb-1.5"
                                    >
                                        Global Secretariat
                                    </h4>

                                    <p
                                        class="text-[13px]
                                               leading-6
                                               text-slate-400"
                                    >
                                    Yunus Center    
                                    AIT<br>
                                        Klong Luang, Pathum Thani<br>
                                        Thailand
                                    </p>    

                                </div>

                            </div>


                            <!-- EMAIL -->
                            <div class="flex items-start gap-4">

                                <div
                                    class="w-10 h-10
                                           shrink-0
                                           rounded-lg
                                           border border-cyan-400/20
                                           bg-cyan-500/10
                                           flex items-center justify-center"
                                >
                                    <svg
                                        class="w-[17px] h-[17px] text-cyan-300"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M3 6h18v12H3V6z"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M3 7l9 6 9-6"
                                        />
                                    </svg>
                                </div>


                                <div class="min-w-0">

                                    <h4
                                        class="text-[14px]
                                               font-semibold
                                               text-white
                                               mb-1.5"
                                    >
                                        Email Address
                                    </h4>

                                    <a
                                        href="mailto:wepower-sec@ait.asia"
                                        class="text-[13px]
                                               text-slate-400
                                               hover:text-cyan-300
                                               transition-colors"
                                    >
                                        wepower-sec@ait.asia
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- ================= BOTTOM BAR ================= -->
    <div
        class="relative
               border-t border-white/[0.08]
               bg-black/20"
    >

        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10">

            <div
                class="min-h-[64px]
                       py-4
                       flex flex-col
                       sm:flex-row
                       items-center
                       justify-between
                       gap-3"
            >

                <p
                    class="text-[12px]
                           text-slate-500
                           text-center sm:text-left"
                >
                    © {{ date('Y') }} WePOWER. All rights reserved.
                </p>


                <div
                    class="flex items-center
                           justify-center
                           gap-6"
                >

                    <a
                        href="#"
                        class="text-[12px]
                               text-slate-500
                               hover:text-cyan-300
                               transition-colors"
                    >
                        Privacy Policy
                    </a>

                    <a
                        href="#"
                        class="text-[12px]
                               text-slate-500
                               hover:text-cyan-300
                               transition-colors"
                    >
                        Terms of Use
                    </a>

                </div>

            </div>

        </div>

    </div>

</footer>