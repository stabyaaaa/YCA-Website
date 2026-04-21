@extends('layouts.app')

@section('title', 'Our Partners')

@section('content')

<style>
    :root {
        --pink: #F31671;
        --orange: #E99210;
        --cyan: #019DDE;

        --slate-950: #020617;
        --slate-900: #0f172a;
        --slate-800: #1e293b;
        --slate-700: #334155;
        --slate-600: #475569;
        --slate-500: #64748b;
        --slate-200: #e2e8f0;
        --slate-100: #f1f5f9;
    }
</style>

<div class="relative overflow-hidden bg-gradient-to-br from-slate-50 via-white to-indigo-50/40">

    <!-- Soft background -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-24 -left-24 w-72 h-72 bg-indigo-200/30 rounded-full blur-3xl"></div>
        <div class="absolute top-1/3 -right-24 w-80 h-80 bg-cyan-200/25 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-1/3 w-72 h-72 bg-purple-200/20 rounded-full blur-3xl"></div>
    </div>

    <!-- Page wrapper -->
    <section class="relative pt-28 sm:pt-32 lg:pt-36 pb-16 sm:pb-20 lg:pb-24">
        <div class="max-w-screen-2xl mx-auto px-5 sm:px-8 lg:px-12">

            <!-- ================= INTRO ================= -->
            <div class="max-w-3xl mx-auto text-center mb-12 lg:mb-14">
                <p class="text-[11px] sm:text-xs uppercase tracking-[0.32em] text-[var(--pink)] font-semibold mb-4">
                    Our Network
                </p>

                <h1 class="text-3xl sm:text-4xl lg:text-[44px] font-semibold tracking-tight leading-[1.2] text-slate-900">
                    Partners Driving Change  
                    <span class="block text-[var(--cyan)] mt-5">
                        Across the Power Sector
                    </span>
                </h1>

                <div class="mt-6 mb-6 flex justify-center">
                    <div class="h-[2px] w-16 rounded-full bg-gradient-to-r from-[var(--pink)] via-[var(--orange)] to-[var(--cyan)] opacity-80"></div>
                </div>

                <p class="text-sm sm:text-base text-slate-600 leading-relaxed max-w-2xl mx-auto">
                    WePOWER brings together utilities, government institutions, universities, and development partners
                    working collectively to strengthen women’s participation and leadership across the energy sector.
                </p>
            </div>

            <!-- ================= STATS ================= -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 lg:gap-6 mb-10 lg:mb-14">
                <div class="rounded-3xl border border-[rgba(1,157,222,0.15)] bg-white/80 backdrop-blur-xl shadow-sm px-6 py-6 text-center">
                    <div class="h-1 w-10 rounded-full bg-[var(--cyan)] mx-auto mb-3"></div>
                    <div class="text-3xl lg:text-4xl font-bold text-slate-900">61</div>
                    <p class="mt-2 text-xs uppercase tracking-[0.18em] text-slate-500">Partner Institutions</p>
                </div>

                <div class="rounded-3xl border border-[rgba(233,146,16,0.15)] bg-white/80 backdrop-blur-xl shadow-sm px-6 py-6 text-center">
                    <div class="h-1 w-10 rounded-full bg-[var(--orange)] mx-auto mb-3"></div>
                    <div class="text-3xl lg:text-4xl font-bold text-slate-900">Regional</div>
                    <p class="mt-2 text-xs uppercase tracking-[0.18em] text-slate-500">South Asia Network</p>
                </div>

                <div class="rounded-3xl border border-[rgba(243,22,113,0.15)] bg-white/80 backdrop-blur-xl shadow-sm px-6 py-6 text-center">
                    <div class="h-1 w-10 rounded-full bg-[var(--pink)] mx-auto mb-3"></div>
                    <div class="text-3xl lg:text-4xl font-bold text-slate-900">Shared</div>
                    <p class="mt-2 text-xs uppercase tracking-[0.18em] text-slate-500">Commitment to Inclusion</p>
                </div>
            </div>

            <!-- Filter / Search Bar -->
            <div class="mb-10 lg:mb-14 animate-on-scroll">
                <div class="rounded-[2rem] border border-[rgba(1,157,222,0.15)] bg-white/85 backdrop-blur-xl shadow-[0_16px_50px_rgba(15,23,42,0.07)] p-4 sm:p-5 lg:p-6">
                    <div class="flex flex-col lg:flex-row gap-4 lg:items-center lg:justify-between">
                        <div class="flex flex-wrap gap-3">
                            <button class="px-4 py-2 rounded-full text-white text-sm font-medium transition bg-[var(--cyan)] hover:opacity-90 shadow-[0_6px_20px_rgba(1,157,222,0.25)]">
                                All Partners
                            </button>
                            <button class="px-4 py-2 rounded-full text-sm font-medium transition bg-[rgba(1,157,222,0.08)] text-[var(--cyan)] hover:bg-[var(--cyan)] hover:text-white">
                                Utilities
                            </button>
                            <button class="px-4 py-2 rounded-full text-sm font-medium transition bg-[rgba(243,22,113,0.08)] text-[var(--pink)] hover:bg-[var(--pink)] hover:text-white">
                                Government
                            </button>
                            <button class="px-4 py-2 rounded-full text-sm font-medium transition bg-[rgba(233,146,16,0.08)] text-[var(--orange)] hover:bg-[var(--orange)] hover:text-white">
                                Academia
                            </button>
                            <button class="px-4 py-2 rounded-full text-sm font-medium transition bg-slate-100 text-slate-600 hover:bg-slate-900 hover:text-white">
                                Development Partners
                            </button>
                        </div>

                        <div class="w-full lg:w-[320px]">
                            <input 
                                type="text" 
                                placeholder="Search partner..."
                                class="w-full rounded-full border border-[rgba(1,157,222,0.2)] bg-white px-5 py-3 text-sm text-slate-700 
                                       placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-[var(--cyan)]/30 focus:border-[var(--cyan)] transition"
                            >
                        </div>
                    </div>
                </div>
            </div>

            <!-- Logo grid wrapper -->
            <div class="rounded-[2rem] border border-white/70 bg-white/75 backdrop-blur-xl shadow-[0_20px_60px_rgba(15,23,42,0.08)] p-5 sm:p-6 lg:p-8">
                
                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-6 lg:mb-8">
                    <div>
                        <p class="text-sm uppercase tracking-[0.22em] text-slate-500 mb-2">
                            Partner Organizations
                        </p>
                        <h2 class="text-2xl sm:text-3xl font-bold text-slate-900">
                            A Collective Network for Impact
                        </h2>
                    </div>
                </div>

                @php
    // WePOWER South Asia Partners - Updated from your serial list
    $partnerData = [
        4  => ['name' => 'IEEE Women in Engineering (WIE)', 'website' => 'https://wie.ieee.org/'],
        5  => ['name' => 'Asian Development Bank (ADB)', 'website' => 'https://www.adb.org'],
        6  => ['name' => 'Fenaka Corporation Limited', 'website' => 'https://fenaka.mv'],
        7  => ['name' => 'Lanka Electricity Company (LECO)', 'website' => 'https://www.leco.lk'],
        8  => ['name' => 'Partner 8', 'website' => '#'],                    // xxxxx
        9  => ['name' => 'K-Electric (KE)', 'website' => '#'],
        10 => ['name' => 'Dhaka Electric Supply Company (DESCO)', 'website' => '#'],
        11 => ['name' => 'Partner 11', 'website' => '#'],                    // xxxx
        12 => ['name' => 'American International University-Bangladesh (AIUB)', 'website' => 'https://www.aiub.edu'],
        13 => ['name' => 'Partner 13', 'website' => '#'],                    // xxxxxx
        14 => ['name' => 'Vision Mechatronics Pvt. Ltd.', 'website' => 'https://www.vmechatronics.com'],
        15 => ['name' => "Nepal Engineers' Association", 'website' => 'https://www.neanepal.org.np'],
        16 => ['name' => 'Partner 16', 'website' => '#'],                    // xxxx
        17 => ['name' => 'Skill Council for Green Jobs (SCGJ)', 'website' => 'https://sscgj.in'],
        18 => ['name' => 'BSES Yamuna Power Limited (BYPL)', 'website' => 'https://www.bsesdelhi.com/web/bypl/home'],
        19 => ['name' => 'Multan Electric Power Company (MEPCO)', 'website' => '#'],
        20 => ['name' => 'Women in Engineering Pakistan', 'website' => '#'],  // or Women Engineers Pakistan #########
        21 => ['name' => 'IEEE Bangladesh Section', 'website' => '#'],
        22 => ['name' => 'Nepal Electricity Authority (NEA)', 'website' => 'https://nea.org.np'],
        23 => ['name' => 'Institute of Engineering, Tribhuvan University (IOE / TU Nepal)', 'website' => 'https://ioe.tu.edu.np'],
        24 => ['name' => 'BSES Rajdhani Power Limited (BRPL)', 'website' => 'https://www.bsesdelhi.com/web/brpl/home'],
        25 => ['name' => 'Partner 25', 'website' => '#'],                    // xxxx
        26 => ['name' => 'Partner 26', 'website' => '#'],                    // xxxxx
        27 => ['name' => 'Lahore Electric Supply Company (LESCO)', 'website' => '#'],
        28 => ['name' => 'Samudayik Upavokta Samiti / Community Electricity Users Group Nepal', 'website' => '#'],
        29 => ['name' => 'Grameen Shakti', 'website' => '#'],
        30 => ['name' => 'Partner 30', 'website' => '#'],                    // xxxxxx
        31 => ['name' => 'Partner 31', 'website' => '#'],                    // xxxxx
        32 => ['name' => 'United States Agency for International Development (USAID)', 'website' => 'https://www.usaid.gov'],
        33 => ['name' => 'Druk Green Power Corporation', 'website' => 'https://www.drukgreen.bt'],
        34 => ['name' => 'Tata Power Delhi Distribution Limited (Tata Power DDL)', 'website' => '#'],
        35 => ['name' => 'Energy Efficiency Services Limited (EESL)', 'website' => '#'],
        36 => ['name' => 'Bhutan Power Corporation (BPC)', 'website' => 'https://www.bpc.bt'],
        37 => ['name' => 'Infrastructure Development Company Limited (IDCOL)', 'website' => 'https://www.idcol.org'],
        38 => ['name' => 'Partner 39', 'website' => '#'],                    // xxxx

        39 => ['name' => 'Peshawar Electric Supply Company (PESCO)', 'website' => 'https://www.pesco.gov.pk'],
        40 => ['name' => 'Partner 39', 'website' => '#'],                    // xxxx
        41 => ['name' => 'National Power Training Institute (NPTI)', 'website' => 'https://npti.gov.in'],
        42 => ['name' => 'Partner 41', 'website' => '#'],                    // xxxx
        43 => ['name' => 'NTPC Limited', 'website' => 'https://www.ntpc.co.in'],
        44 => ['name' => 'Hyderabad Electric Supply Company (HESCO)', 'website' => '#'],
        45 => ['name' => 'Electricity Generation Company of Bangladesh (EGCB)', 'website' => 'https://www.egcb.com.bd'],
        46 => ['name' => 'Partner 45', 'website' => '#'],                    // xxxx
        47 => ['name' => 'Feedback Energy Distribution Company (FEDCO)', 'website' => '#'],
        48 => ['name' => 'Grassroots Trading Network for Women (GTNfW)', 'website' => '#'],
        49 => ['name' => 'Bangladesh Power Management Institute (BPMI)', 'website' => 'https://bpmi.gov.bd'],
        50 => ['name' => 'Power Grid Corporation of India (POWERGRID)', 'website' => 'https://www.powergrid.in'],
        51 => ['name' => 'Central Power Purchasing Agency (CPPA-G)', 'website' => '#'],
        52 => ['name' => 'Partner 51', 'website' => '#'],                    // xxxx
        53 => ['name' => 'National Power Control Centre (NPCC)', 'website' => '#'],
        54 => ['name' => 'Partner 53', 'website' => '#'],                    // kbpra (possibly KB PRA or similar)
        55 => ['name' => 'भारतीय प्रौद्योगिकी संस्थान कानपुर', 'website' => 'https://iitk.ac.in/new/hindi/'],  // bharatiya pradho...
        56 => ['name' => 'Partner 55', 'website' => '#'],                    // xxx
        57 => ['name' => 'Independent Power Producers Association Nepal (IPPAN)', 'website' => 'https://www.ippan.org.np'],
        58 => ['name' => 'Partner 57', 'website' => '#'],                    // xxxxxx
        59 => ['name' => 'Butwal Power Company / Butwal Power Grid', 'website' => ''],
        60 => ['name' => 'Women Network for Energy and Environment (WoNEE)', 'website' => 'https://wonee.org.np'],
        61 => ['name' => 'Partner 60', 'website' => '#'],                    // extra if needed
    ];
@endphp

                <!-- Partner logos grid - only render if image exists -->
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-4 sm:gap-5 lg:gap-6">
                    @for ($i = 4; $i <= 60; $i++)
                        @php
                            $data    = $partnerData[$i] ?? ['name' => "Partner {$i}", 'website' => '#'];
                            $name    = $data['name'];
                            $website = $data['website'];

                            $logoJpg = "images/partners/image{$i}.jpg";
                            $logoPng = "images/partners/image{$i}.png";

                            // Check if at least one image file exists
                            $hasImage = file_exists(public_path($logoJpg)) || file_exists(public_path($logoPng));
                        @endphp

                        @if($hasImage)
                            <a href="{{ $website }}" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               title="Visit {{ $name }} website"
                               class="group rounded-2xl border border-slate-200/70 bg-white min-h-[150px] sm:min-h-[160px] flex flex-col items-center justify-center p-5 sm:p-6 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 overflow-hidden relative">
                                
                                <!-- Logo -->
                                <div class="flex-1 flex items-center justify-center pb-2">
                                    <img
                                        src="{{ asset($logoJpg) }}"
                                        alt="{{ $name }}"
                                        onerror="this.onerror=null; this.src='{{ asset($logoPng) }}';"
                                        class="h-12 sm:h-14 lg:h-16 w-auto object-contain opacity-90 group-hover:opacity-100 transition duration-300"
                                    >
                                </div>

                                <!-- Partner Name (visible on hover) -->
                                <div class="mt-2 text-center opacity-0 group-hover:opacity-100 transition-all duration-300 px-2">
                                    <p class="text-xs font-medium text-slate-700 leading-tight line-clamp-2">
                                        {{ $name }}
                                    </p>
                                </div>
                            </a>
                        @endif
                    @endfor
                </div>
            </div>

            <!-- Bottom block -->
            <div class="mt-12 lg:mt-16">
                <div class="relative overflow-hidden rounded-[2rem] bg-slate-900 text-white px-6 sm:px-8 lg:px-12 py-10 lg:py-12 shadow-[0_20px_70px_rgba(15,23,42,0.18)]">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(99,102,241,0.26),transparent_30%),radial-gradient(circle_at_bottom_left,rgba(6,182,212,0.18),transparent_30%)]"></div>
                    <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                        <div class="max-w-2xl">
                            <p class="text-sm uppercase tracking-[0.22em] text-cyan-300 mb-3">
                                Collaboration Matters
                            </p>
                            <h3 class="text-2xl sm:text-3xl font-semibold leading-tight">
                                Strong partnerships help turn dialogue into lasting institutional change.
                            </h3>
                            <p class="mt-3 text-white/75 leading-relaxed">
                                Through joint action, knowledge exchange, and long-term commitment,
                                our partners help expand pathways for women across the power and energy sector.
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="{{ url('/contact') }}"
                               class="inline-flex items-center justify-center rounded-full bg-white text-slate-900 px-6 py-3 text-sm font-semibold hover:bg-slate-100 transition">
                                Connect With Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

@endsection