@extends('layouts.app')

@section('title', 'Home')

@section('content')

<style>
    :root {
        --pink: #F31671;
        --orange: #E99210;
        --cyan: #019DDE;

        --slate-900: #0f172a;
        --slate-800: #1e293b;
        --slate-700: #334155;
        --gray-100: #f3f4f6;
        --gray-200: #e5e7eb;
    }

    * { scroll-behavior: smooth; }

    .text-pink-brand { color: var(--pink); }
    .text-orange-brand { color: var(--orange); }
    .text-cyan-brand { color: var(--cyan); }

    .bg-pink-brand { background-color: var(--pink); }
    .bg-orange-brand { background-color: var(--orange); }
    .bg-cyan-brand { background-color: var(--cyan); }

    .border-pink-brand { border-color: var(--pink); }
    .border-orange-brand { border-color: var(--orange); }
    .border-cyan-brand { border-color: var(--cyan); }

    /* Animations */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(50px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    @keyframes heroZoom {
        from { transform: scale(1.05); }
        to   { transform: scale(1); }
    }

    .animate-hero-zoom {
        animation: heroZoom 18s ease-out forwards;
    }

    .animate-fade-up {
        animation: fadeInUp 1s ease forwards;
    }

    .animate-fade-up-delay {
        opacity: 0;
        animation: fadeInUp 1s ease forwards;
        animation-delay: 0.25s;
    }

    .animate-on-scroll {
        opacity: 0;
        transform: translateY(50px);
        transition: all 0.9s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .animate-on-scroll.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .card-hover {
        transition: all 0.35s ease;
    }

    .card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px -10px rgba(0,0,0,0.12);
    }

    @media (max-width: 640px) {
        h1 { font-size: 2.8rem; line-height: 1.15; }
        h2 { font-size: 2.4rem; }
    }
</style>

<!-- ================= PREMIUM HERO ================= -->
<section class="relative min-h-screen flex items-center overflow-hidden">

    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="{{ asset('images/bgg.jpeg') }}"
             class="w-full h-full object-cover scale-105 animate-hero-zoom"
             alt="Women in the South Asia power sector">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/85 via-slate-900/70 to-slate-900/45"></div>
    </div>

    <!-- Floating Blur Orbs -->
    <div class="absolute top-24 left-10 w-72 h-72 rounded-full blur-3xl"
         style="background-color: rgba(1, 157, 222, 0.22);"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 rounded-full blur-3xl"
         style="background-color: rgba(243, 22, 113, 0.16);"></div>

    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-6 py-32 grid md:grid-cols-2 gap-16 items-center">

        <!-- Text Content -->
        <div class="text-white space-y-8 animate-fade-up">
            <p class="text-sm uppercase tracking-[0.28em] text-pink-300 font-semibold">
              
            </p>
<div class="text-left mb-12 lg:mb-14 ml-2">
            <p class="text-xl uppercase tracking-[0.3em] text-[#d97706] font-semibold mb-4 animate-on-scroll">
                Impact Since 2019
            </p></div>
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold leading-tight">
                Main Streaming Women Professionals
                <span class="text-cyan-brand">Through Partnership</span>
            </h1>

            <p class="text-xl md:text-2xl text-gray-200 max-w-2xl leading-relaxed">
                A collaborative initiative advancing women’s participation, inclusive workforce development, and sustainable growth across South Asia
            </p>

            <div class="flex flex-wrap gap-6 pt-4">
                <a href="#insights"
                   class="px-8 py-4 bg-pink-brand hover:opacity-90 text-white rounded-xl font-semibold text-lg shadow-xl transition transform hover:scale-105">
                    Explore Insights →
                </a>

                <a href="#report"
                   class="px-8 py-4 border border-white/40 text-white rounded-xl font-semibold text-lg backdrop-blur hover:bg-white/10 transition">
                    Read Full Report
                </a>
            </div>
        </div>

        <!-- Glass Highlight Card -->
        <div class="hidden md:block animate-fade-up-delay">
            <div class="backdrop-blur-2xl bg-white/10 border border-white/20 rounded-3xl p-10 shadow-2xl text-white transition duration-500">

                <h3 class="text-2xl font-bold mb-8 flex items-center gap-3">
                    <span class="text-cyan-brand text-3xl"></span>
                    Key Findings from the Gender Assessment 2024-2025
                </h3>

                <div class="space-y-6 text-lg">
                    <div class="flex items-start gap-4">
                        <span class="w-10 h-10 flex items-center justify-center rounded-full text-pink-200 font-bold"
                              style="background-color: rgba(243, 22, 113, 0.20);">9%</span>
                        <div>
                            <p class="font-semibold">Women in the total workforce</p>
                            <p class="text-white/70 text-sm mt-1">Across surveyed power utilities in South Asia</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <span class="w-10 h-10 flex items-center justify-center rounded-full text-orange-200 font-bold"
                              style="background-color: rgba(233, 146, 16, 0.22);">3.1%</span>
                        <div>
                            <p class="font-semibold">Women in technical roles</p>
                            <p class="text-white/70 text-sm mt-1">The biggest gap remains in technical participation</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <span class="w-10 h-10 flex items-center justify-center rounded-full text-cyan-200 font-bold"
                              style="background-color: rgba(1, 157, 222, 0.22);">6%</span>
                        <div>
                            <p class="font-semibold">Of promotions went to women</p>
                            <p class="text-white/70 text-sm mt-1">Advancement remains narrower than entry</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <span class="w-10 h-10 flex items-center justify-center rounded-full text-pink-200 font-bold"
                              style="background-color: rgba(243, 22, 113, 0.20);">3.7–24.4%</span>
                        <div>
                            <p class="font-semibold">Representation varies sharply by country</p>
                            <p class="text-white/70 text-sm mt-1">Showing uneven regional progress</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- ================= STATS STRIP ================= -->
<section id="insights" class="relative py-10 lg:py-14 bg-slate-950">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid sm:grid-cols-2 xl:grid-cols-4 gap-5">
            <div class="rounded-3xl p-6 bg-white/5 border border-white/10 backdrop-blur-xl animate-on-scroll">
                <p class="text-sm uppercase tracking-[0.2em] text-white/50 mb-3">Jobs Created</p>
                <h3 class="text-4xl font-extrabold text-pink-brand mb-2">2,000+</h3>
                <p class="text-white/70 leading-relaxed">Women were hired between 2022 and 2024 across surveyed organizations.</p>
            </div>

            <div class="rounded-3xl p-6 bg-white/5 border border-white/10 backdrop-blur-xl animate-on-scroll" style="transition-delay: 0.1s;">
                <p class="text-sm uppercase tracking-[0.2em] text-white/50 mb-3">Technical Training</p>
                <h3 class="text-4xl font-extrabold text-cyan-brand mb-2">86,000+</h3>
                <p class="text-white/70 leading-relaxed">Staff received technical training, but women remain underrepresented in field-based training.</p>
            </div>

            <div class="rounded-3xl p-6 bg-white/5 border border-white/10 backdrop-blur-xl animate-on-scroll" style="transition-delay: 0.2s;">
                <p class="text-sm uppercase tracking-[0.2em] text-white/50 mb-3">Leadership Gap</p>
                <h3 class="text-4xl font-extrabold text-orange-brand mb-2">12%</h3>
                <p class="text-white/70 leading-relaxed">Only 12 percent of leadership program participants were women.</p>
            </div>

            <div class="rounded-3xl p-6 bg-white/5 border border-white/10 backdrop-blur-xl animate-on-scroll" style="transition-delay: 0.3s;">
                <p class="text-sm uppercase tracking-[0.2em] text-white/50 mb-3">Participation Reached</p>
                <h3 class="text-4xl font-extrabold text-pink-brand mb-2">208,000+</h3>
                <p class="text-white/70 leading-relaxed">Participants reached through 11,443 gender activities across the network.</p>
            </div>
        </div>
    </div>
</section>
<!-- ================= WHY IT MATTERS (COMPACT) ================= -->
<section id="about" class="relative overflow-hidden bg-[#f8f4ee] py-16 lg:py-20">
    
    <!-- Background -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 left-0 w-full h-40 bg-gradient-to-b from-[#f3e8ff]/60 to-transparent"></div>
        <div class="absolute -top-16 right-[-6rem] w-72 h-72 rounded-full bg-pink-200/20 blur-3xl"></div>
        <div class="absolute bottom-[-5rem] left-[-5rem] w-64 h-64 rounded-full bg-sky-200/20 blur-3xl"></div>
    </div>

    <div class="relative max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center mb-12 lg:mb-14">
            <p class="text-xs uppercase tracking-[0.3em] text-[#d97706] font-semibold mb-4 animate-on-scroll">
                Why This Matters
            </p>

            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-tight text-slate-900 animate-on-scroll">
                Progress Is Real
                <span class="block text-[#db2777] mt-1">But Uneven</span>
            </h2>

            <p class="mt-5 max-w-3xl mx-auto text-base sm:text-lg text-slate-700 leading-relaxed animate-on-scroll">
                More women are qualifying for the technical roles in the power sector, but barriers in opportunity,
                safety, and advancement remain uneven across roles and countries.
            </p>
        </div>

        <!-- Compact strips -->
        <div class="space-y-5">

            <!-- Strip 1 -->
            <div class="rounded-2xl bg-white shadow-md overflow-hidden animate-on-scroll">
                <div class="grid lg:grid-cols-[1fr_1.4fr]">
                    
                    <div class="bg-[#0f172a] text-white p-6 lg:p-8">
                        <p class="text-xs uppercase tracking-[0.25em] text-cyan-300 mb-2">Participation</p>
                        <h3 class="text-xl sm:text-2xl lg:text-3xl font-bold">
                            Representation is rising
                        </h3>
                    </div>

                    <div class="p-6 lg:p-8 bg-gradient-to-r from-cyan-50 to-white flex items-center gap-4">
                        <div class="text-3xl sm:text-4xl">📈</div>
                        <p class="text-sm sm:text-base text-slate-700 leading-relaxed">
                            Gains are constrained because participation remains limited.
                        </p>
                    </div>

                </div>
            </div>

            <!-- Strip 2 -->
            <div class="rounded-2xl bg-white shadow-md overflow-hidden animate-on-scroll" style="transition-delay: 0.1s;">
                <div class="grid lg:grid-cols-[1.4fr_1fr]">

                    <div class="p-6 lg:p-8 bg-gradient-to-r from-orange-50 to-white flex items-center gap-4 order-2 lg:order-1">
                        <div class="text-3xl sm:text-4xl">⚠️</div>
                        <p class="text-sm sm:text-base text-slate-700 leading-relaxed">
                            Bias, caregiving burdens, and safety risks still limit career progression.
                        </p>
                    </div>

                    <div class="bg-[#7c2d12] text-white p-6 lg:p-8 order-1 lg:order-2">
                        <p class="text-xs uppercase tracking-[0.25em] text-orange-200 mb-2">Barriers</p>
                        <h3 class="text-xl sm:text-2xl lg:text-3xl font-bold">
                            Structural challenges persist
                        </h3>
                    </div>

                </div>
            </div>

            <!-- Strip 3 -->
            <div class="rounded-2xl bg-white shadow-md overflow-hidden animate-on-scroll" style="transition-delay: 0.2s;">
                <div class="grid lg:grid-cols-[1fr_1.4fr]">

                    <div class="bg-[#4c1d95] text-white p-6 lg:p-8">
                        <p class="text-xs uppercase tracking-[0.25em] text-pink-200 mb-2">Response</p>
                        <h3 class="text-xl sm:text-2xl lg:text-3xl font-bold">
                            Institutions are adapting
                        </h3>
                    </div>

                    <div class="p-6 lg:p-8 bg-gradient-to-r from-pink-50 to-white flex items-center gap-4">
                        <div class="text-3xl sm:text-4xl">🛠️</div>
                        <p class="text-sm sm:text-base text-slate-700 leading-relaxed">
                            Policies, mentorship, and support systems are expanding—though unevenly.
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- NEW IMPACT METRICS SECTION (replaces the old key areas cards) -->
<!-- FULL-PAGE VOICES SECTION -->
<div class="px-8 lg:px-10">
    <section class="relative min-h-[80vh] lg:min-h-[100vh] flex items-end overflow-hidden bg-slate-950">

        <!-- Background image -->
        <div class="absolute inset-0">
            <img
                src="{{ asset('images/bg.jpeg') }}" 
                class="w-full h-full object-cover scale-105 transition-transform duration-[25s] hover:scale-100"
                alt="Women engineer in energy sector"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/70 to-black/30"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10 w-full px-6 pb-16 lg:pb-24">
            <div class="max-w-7xl mx-auto">

                <!-- Top intro -->
                <div class="flex flex-col items-center justify-center text-center">
                    <p class="text-sm uppercase tracking-[0.25em] text-pink-brand mb-4">
                        Voices of Change
                    </p>

                    <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-cyan-brand leading-tight mb-5">
                        Women Beyond Boundaries
                    </h2>

                    <p class="text-lg sm:text-s text-blue-100 leading-relaxed mb-14">
                        Across South Asia’s energy sector, women are challenging norms, proving capability, and exposing the barriers that still shape their careers.
                    </p>
                </div>

                <!-- Quote layout -->
                <div class="grid lg:grid-cols-2 gap-10 lg:gap-16">

                    <!-- Quote 1 -->
                    <div class="border-t border-white/20 pt-8">
                        <p class="text-2xl sm:text-3xl lg:text-4xl font-light leading-relaxed text-white">
                            <span class="text-cyan-brand text-5xl font-serif mr-2 align-top">&ldquo;</span>
                            They used to think women couldn’t run the plant. Now we do all three shifts—even the night ones.
                            <span class="text-cyan-brand text-5xl font-serif ml-2 align-top">&rdquo;</span>
                        </p>

                        <div class="mt-6">
                            <p class="text-sm uppercase tracking-[0.18em] text-white/60">
                                Women Engineer
                            </p>
                            <p class="text-base text-cyan-brand font-medium mt-1">
                                India
                            </p>
                        </div>
                    </div>

                    <!-- Quote 2 -->
                    <div class="border-t border-white/20 pt-8">
                        <p class="text-2xl sm:text-3xl lg:text-4xl font-light leading-relaxed text-white">
                            <span class="text-pink-brand text-5xl font-serif mr-2 align-top">&ldquo;</span>
                            You may have delivered results for five years, but your maternity leave is what they remember.
                            <span class="text-pink-brand text-5xl font-serif ml-2 align-top">&rdquo;</span>
                        </p>

                        <div class="mt-6">
                            <p class="text-sm uppercase tracking-[0.18em] text-white/60">
                                Women Engineer
                            </p>
                            <p class="text-base text-pink-brand font-medium mt-1">
                                Pakistan
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </section>
</div>

<!-- ================= CHALLENGES ================= -->
<section class="py-20 lg:py-28 bg-slate-100 text-slate-900 overflow-hidden">
    <div class="max-w-screen-2xl mx-auto px-5 sm:px-8 lg:px-12">
        <div class="text-center max-w-4xl mx-auto mb-14">
            <p class="text-sm uppercase tracking-[0.25em] text-pink-brand mb-4 animate-on-scroll">
                Main Barriers
            </p>
            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-5 animate-on-scroll text-orange-brand">
                What Still Holds Women Back
            </h2>
            <p class="text-lg sm:text-xl text-slate-600 leading-relaxed animate-on-scroll" style="transition-delay: 0.15s;">
                The World Bank report identifies a recurring set of barriers that limit women’s entry, retention,
                mobility, and advancement in the power sector.
            </p>
        </div>

        <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">
            <div class="bg-white rounded-2xl p-8 shadow-2xl card-hover border border-slate-200 animate-on-scroll">
                <div class="text-5xl mb-5">🏠</div>
                <h3 class="text-2xl font-bold mb-3 text-pink-brand">Caregiving Burden</h3>
                <p class="text-slate-600 leading-relaxed">
                    Women continue to carry the dual burden of paid work and unpaid care responsibilities at home.
                </p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-2xl card-hover border border-slate-200 animate-on-scroll" style="transition-delay: 0.1s;">
                <div class="text-5xl mb-5">🧭</div>
                <h3 class="text-2xl font-bold mb-3 text-orange-brand">Fieldwork Constraints</h3>
                <p class="text-slate-600 leading-relaxed">
                    Travel, irregular hours, remote sites, and assumptions about who should do technical work limit access.
                </p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-2xl card-hover border border-slate-200 animate-on-scroll" style="transition-delay: 0.2s;">
                <div class="text-5xl mb-5">🛡️</div>
                <h3 class="text-2xl font-bold mb-3 text-cyan-brand">Safety & Harassment</h3>
                <p class="text-slate-600 leading-relaxed">
                    Inadequate transport, lodging, reporting mechanisms, and workplace culture continue to create risk.
                </p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-2xl card-hover border border-slate-200 animate-on-scroll" style="transition-delay: 0.3s;">
                <div class="text-5xl mb-5">⬆️</div>
                <h3 class="text-2xl font-bold mb-3 text-pink-brand">Limited Advancement</h3>
                <p class="text-slate-600 leading-relaxed">
                    Hiring bias, fewer training opportunities, exclusion from networks, and doubts about leadership slow progression.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= INSTITUTIONAL RESPONSE / SPLIT CONNECTED ================= -->
<section class="py-24 lg:py-32 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">

        <!-- Header -->
        <div class="max-w-3xl mb-16">
            <p class="text-sm uppercase tracking-[0.25em] text-cyan-brand mb-4 animate-on-scroll">
                What’s Changing
            </p>

            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-slate-900 mb-6 animate-on-scroll">
                Institutional Responses and Emerging Good Practices
            </h2>

            <p class="text-lg sm:text-xl text-slate-600 leading-relaxed animate-on-scroll">
                Utilities across the region are beginning to respond with targeted hiring, family-friendly policies,
                mentorship, training, and stronger workplace systems.
            </p>
        </div>

        <!-- Connected Block -->
        <div class="grid lg:grid-cols-2 items-stretch rounded-[2rem] overflow-hidden shadow-2xl animate-on-scroll">

            <!-- LEFT IMAGE -->
            <div class="relative">
                <img
                    src="{{ asset('images/bg_group.jpeg') }}"
                    alt="Energy sector workforce"
                    class="w-full h-full object-cover min-h-[420px] lg:min-h-[560px]"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 via-transparent to-transparent"></div>
            </div>

            <!-- RIGHT TEXT -->
            <!-- RIGHT TEXT / STATS -->
<div class="bg-white p-8 sm:p-10 lg:p-12 flex flex-col justify-center space-y-12">

    <!-- ================= POLICIES ================= -->
    <div>
        <p class="text-sm uppercase tracking-[0.2em] text-pink-brand mb-6">
            Policies
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 text-center">

            <!-- Item -->
            <div class="flex flex-col items-center">
                <div class="w-28 h-28 rounded-full border-[6px] border-pink-brand flex items-center justify-center text-2xl font-bold text-pink-brand">
                    70%
                </div>
                <p class="mt-3 text-sm text-slate-600 leading-tight">
                    Gender Non-Discrimination
                </p>
            </div>

            <!-- Item -->
            <div class="flex flex-col items-center">
                <div class="w-28 h-28 rounded-full border-[6px] border-orange-brand flex items-center justify-center text-2xl font-bold text-orange-brand">
                    87%
                </div>
                <p class="mt-3 text-sm text-slate-600 leading-tight">
                    Anti-Harassment / GBV
                </p>
            </div>

            <!-- Item -->
            <div class="flex flex-col items-center">
                <div class="w-28 h-28 rounded-full border-[6px] border-cyan-brand flex items-center justify-center text-2xl font-bold text-cyan-brand">
                    53%
                </div>
                <p class="mt-3 text-sm text-slate-600 leading-tight">
                    Gender Equity Strategy
                </p>
            </div>

        </div>
    </div>


<!-- ================= RETENTION SUPPORT ================= -->
<div class="border-t border-slate-200 pt-8">
    <p class="text-sm uppercase tracking-[0.2em] text-orange-brand mb-6">
        Retention Support
    </p>

    <div class="space-y-6">

        <!-- Item -->
        <div>
            <div class="flex justify-between text-sm mb-2">
                <span class="text-slate-600">Childcare Facilities</span>
                <span class="font-semibold text-orange-brand">50%</span>
            </div>
            <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                <div class="h-full bg-orange-brand rounded-full" style="width: 50%"></div>
            </div>
        </div>

        <!-- Item -->
        <div>
            <div class="flex justify-between text-sm mb-2">
                <span class="text-slate-600">Flexible Work</span>
                <span class="font-semibold text-pink-brand">42%</span>
            </div>
            <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                <div class="h-full bg-pink-brand rounded-full" style="width: 42%"></div>
            </div>
        </div>

    </div>
</div>


   <!-- ================= GROWTH & SAFETY ================= -->
<div class="border-t border-slate-200 pt-8">
    <p class="text-sm uppercase tracking-[0.2em] text-cyan-brand mb-6">
        Growth & Safety
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

        <!-- Card -->
        <div class="p-6 rounded-xl bg-cyan-50 border border-cyan-100">
            <p class="text-3xl font-bold text-cyan-brand mb-2">68%</p>
            <p class="text-sm text-slate-600">Leadership Training</p>
        </div>

        <!-- Card -->
        <div class="p-6 rounded-xl bg-orange-50 border border-orange-100">
            <p class="text-3xl font-bold text-orange-brand mb-2">29%</p>
            <p class="text-sm text-slate-600">Mentorship Programs</p>
        </div>

    </div>
</div>

</div>

            </div>
        </div>

    </div>
</section>

<!-- ================= REPORT CTA ================= -->
<section id="report" class="py-20 lg:py-28 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="rounded-[2rem] overflow-hidden shadow-[0_30px_80px_-20px_rgba(15,23,42,0.18)] border border-slate-200 bg-gradient-to-br from-white via-slate-50 to-cyan-50/30">
            <div class="grid lg:grid-cols-2 items-center">
                <div class="p-10 lg:p-14">
                    <p class="text-sm uppercase tracking-[0.25em] text-orange-brand mb-4 font-semibold">
                        Full Assessment
                    </p>
                    <h2 class="text-4xl sm:text-5xl font-bold text-slate-900 leading-tight mb-6">
                        Read the report behind the insights
                    </h2>
                    <p class="text-lg text-slate-600 leading-relaxed mb-8">
                        Explore the full WePOWER Assessment 2024–25 to see the regional data,
                        workplace voices, institutional responses, and recommendations in detail.
                    </p>

                   <div class="flex flex-wrap gap-4">

                        <!-- Download -->
                        <a href="{{ asset('files/gender.pdf') }}"
                        download
                        class="px-7 py-4 bg-pink-brand hover:opacity-90 text-white rounded-xl font-semibold shadow-lg transition transform hover:scale-105">
                            Download Report
                        </a>

                        <!-- View -->
                        <a href="{{ asset('files/gender.pdf') }}"
                        target="_blank"
                        class="px-7 py-4 border border-slate-300 text-slate-800 rounded-xl font-semibold hover:bg-slate-100 transition">
                            View Report
                        </a>

                    </div>
                </div>

                <div class="h-full min-h-[320px] lg:min-h-[420px] relative">
                    <img src="{{ asset('images/bgg.jpeg') }}"
                         alt="WePOWER assessment cover visual"
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/55 via-slate-900/20 to-transparent"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            e.preventDefault();
            target.scrollIntoView({ behavior: 'smooth' });
        }
    });
});

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, { threshold: 0.15 });

document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));
</script>

@endsection