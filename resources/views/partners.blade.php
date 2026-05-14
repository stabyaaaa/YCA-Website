@extends('layouts.app')

@section('title', 'Our Partners')

@section('content')

<style>
    :root {
        --pink: #F31671;
        --orange: #E99210;
        --cyan: #019DDE;
    }

    .partner-card {
        position: relative;
        overflow: hidden;
        isolation: isolate;
    }

    .partner-card::before {
        content: "";
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at top right, rgba(1,157,222,0.18), transparent 35%),
            radial-gradient(circle at bottom left, rgba(243,22,113,0.12), transparent 35%);
        opacity: 0;
        transition: opacity .4s ease;
        z-index: -1;
    }

    .partner-card:hover::before {
        opacity: 1;
    }

    .partner-card.hide {
        display: none;
    }
</style>

<div class="relative overflow-hidden bg-gradient-to-br from-slate-50 via-white to-indigo-50/40">

    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-24 -left-24 w-72 h-72 bg-indigo-200/30 rounded-full blur-3xl"></div>
        <div class="absolute top-1/3 -right-24 w-80 h-80 bg-cyan-200/25 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-1/3 w-72 h-72 bg-purple-200/20 rounded-full blur-3xl"></div>
    </div>

    <section class="relative pt-28 sm:pt-32 lg:pt-36 pb-16 sm:pb-20 lg:pb-24">
        <div class="max-w-screen-2xl mx-auto px-5 sm:px-8 lg:px-12">

            <!-- INTRO -->
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

            <!-- STATS -->
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
<!-- FILTER / SEARCH -->
<div class="mb-10 lg:mb-14">
    <div class="rounded-[2rem] border border-[rgba(1,157,222,0.15)] bg-white/85 backdrop-blur-xl shadow-[0_16px_50px_rgba(15,23,42,0.07)] p-4 sm:p-5 lg:p-6">
        <div class="flex flex-col lg:flex-row gap-4 lg:items-center lg:justify-between">
            <div class="flex flex-wrap gap-3">
                <button data-filter="all" class="partner-filter px-4 py-2 rounded-full text-white text-sm font-medium transition bg-[var(--cyan)] hover:opacity-90 shadow-[0_6px_20px_rgba(1,157,222,0.25)]">
                    All Partners
                </button>

                <button data-filter="Private Utility" class="partner-filter px-4 py-2 rounded-full text-sm font-medium transition bg-[rgba(1,157,222,0.08)] text-[var(--cyan)] hover:bg-[var(--cyan)] hover:text-white">
                    Private Utility
                </button>

                <button data-filter="Public Utility" class="partner-filter px-4 py-2 rounded-full text-sm font-medium transition bg-[rgba(243,22,113,0.08)] text-[var(--pink)] hover:bg-[var(--pink)] hover:text-white">
                    Public Utility
                </button>

                <button data-filter="Academia" class="partner-filter px-4 py-2 rounded-full text-sm font-medium transition bg-[rgba(233,146,16,0.08)] text-[var(--orange)] hover:bg-[var(--orange)] hover:text-white">
                    Academia
                </button>

                <button data-filter="Government" class="partner-filter px-4 py-2 rounded-full text-sm font-medium transition bg-[rgba(99,102,241,0.08)] text-indigo-500 hover:bg-indigo-500 hover:text-white">
                    Government
                </button>

                <button data-filter="Association" class="partner-filter px-4 py-2 rounded-full text-sm font-medium transition bg-[rgba(16,185,129,0.08)] text-emerald-600 hover:bg-emerald-600 hover:text-white">
                    Association
                </button>

                <button data-filter="Private Company" class="partner-filter px-4 py-2 rounded-full text-sm font-medium transition bg-cyan-50 text-cyan-600 hover:bg-cyan-600 hover:text-white">
                    Private Company
                </button>

                <button data-filter="Public Company" class="partner-filter px-4 py-2 rounded-full text-sm font-medium transition bg-pink-50 text-pink-600 hover:bg-pink-600 hover:text-white">
                    Public Company
                </button>

                <button data-filter="NPO/NGO" class="partner-filter px-4 py-2 rounded-full text-sm font-medium transition bg-violet-50 text-violet-600 hover:bg-violet-600 hover:text-white">
                    NPO/NGO
                </button>
            </div>

            <div class="w-full lg:w-[320px]">
                <input
                    id="partnerSearch"
                    type="text"
                    placeholder="Search partner..."
                    class="w-full rounded-full border border-[rgba(1,157,222,0.2)] bg-white px-5 py-3 text-sm text-slate-700 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-[var(--cyan)]/30 focus:border-[var(--cyan)] transition"
                >
            </div>
        </div>
    </div>
</div>

            <!-- PARTNERS -->
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
                    $partnerData = [
                        4  => ['name' => 'IEEE Women in Engineering (WIE)', 'category' => 'P', 'website' => 'https://wie.ieee.org/'],
                        5  => ['name' => 'Asian Development Bank (ADB)', 'category' => 'International Organization', 'website' => 'https://www.adb.org'],
                        6  => ['name' => 'Fenaka Corporation Limited', 'category' => 'Public Utility', 'website' => 'https://fenaka.mv'],
                        7  => ['name' => 'Lanka Electricity Company (LECO)', 'category' => 'Private Utility', 'website' => 'https://www.leco.lk'],
                        8  => ['name' => 'Ceylon Electricity Board', 'category' => 'Public Utility', 'website' => '#'],
                        9  => ['name' => 'K-Electric (KE)', 'category' => 'Private Utility', 'website' => '#'],
                        10 => ['name' => 'Dhaka Electric Supply Company (DESCO)', 'category' => 'Public Utility', 'website' => '#'],
                        11 => ['name' => 'Power Grid Bangladesh (PLC)', 'category' => 'Public Utility', 'website' => '#'],
                        12 => ['name' => 'American International University-Bangladesh (AIUB)', 'category' => 'Academia', 'website' => 'https://www.aiub.edu'],
                        13 => ['name' => 'University of Ruhuna', 'category' => 'Academia', 'website' => '#'],
                        14 => ['name' => 'Vision Mechatronics Pvt. Ltd.', 'category' => 'Private Company', 'website' => 'https://www.vmechatronics.com'],
                        15 => ['name' => "Nepal Engineers' Association", 'category' => 'Association', 'website' => 'https://www.neanepal.org.np'],
                        16 => ['name' => 'Sri Lanka Sustainable Energy Authority', 'category' => 'Government', 'website' => '#'],
                        17 => ['name' => 'Skill Council for Green Jobs (SCGJ)', 'category' => 'Academia', 'website' => 'https://sscgj.in'],
                        18 => ['name' => 'BSES Yamuna Power Limited (BYPL)', 'category' => 'Private Utility', 'website' => 'https://www.bsesdelhi.com/web/bypl/home'],
                        19 => ['name' => 'Multan Electric Power Company (MEPCO)', 'category' => 'Public Utility', 'website' => '#'],
                        20 => ['name' => 'Women in Engineering Pakistan', 'category' => 'Civil Society Organization', 'website' => '#'],
                        21 => ['name' => 'IEEE Bangladesh Section', 'category' => 'Association', 'website' => '#'],
                        22 => ['name' => 'Nepal Electricity Authority (NEA)', 'category' => 'Public Utility', 'website' => 'https://nea.org.np'],
                        23 => ['name' => 'Institute of Engineering, Tribhuvan University (IOE / TU Nepal)', 'category' => 'Academia', 'website' => 'https://ioe.tu.edu.np'],
                        24 => ['name' => 'BSES Rajdhani Power Limited (BRPL)', 'category' => 'Private Utility', 'website' => 'https://www.bsesdelhi.com/web/brpl/home'],
                        26 => ['name' => 'Pakhtunkhwa Energy Development Authority', 'category' => 'P', 'website' => '#'],
                        27 => ['name' => 'Lahore Electric Supply Company (LESCO)', 'category' => 'Public Utility', 'website' => '#'],
                        28 => ['name' => 'Samudayik Upavokta Samiti / Community Electricity Users Group Nepal', 'category' => 'Association', 'website' => '#'],
                        29 => ['name' => 'Grameen Shakti', 'category' => 'NPO/NGO', 'website' => '#'],
                        30 => ['name' => 'Bangladesh Rural Electrification Board', 'category' => 'Public Utility', 'website' => '#'],
                        31 => ['name' => 'Water and Power Development Authority', 'category' => 'Public Utility', 'website' => '#'],
                        32 => ['name' => 'United States Agency for International Development (USAID)', 'category' => 'H', 'website' => 'https://www.usaid.gov'],
                        33 => ['name' => 'Druk Green Power Corporation', 'category' => 'Public Utility', 'website' => 'https://www.drukgreen.bt'],
                        34 => ['name' => 'Tata Power Delhi Distribution Limited (Tata Power DDL)', 'category' => 'Private Utility', 'website' => '#'],
                        35 => ['name' => 'Energy Efficiency Services Limited (EESL)', 'category' => 'Public Utility', 'website' => '#'],
                        36 => ['name' => 'Bhutan Power Corporation (BPC)', 'category' => 'Public Utility', 'website' => 'https://www.bpc.bt'],
                        37 => ['name' => 'Infrastructure Development Company Limited (IDCOL)', 'category' => 'Public Utility', 'website' => 'https://www.idcol.org'],
                        38 => ['name' => 'Bangladesh Power Development Board', 'category' => 'Public Utility', 'website' => '#'],
                        39 => ['name' => 'Peshawar Electric Supply Company (PESCO)', 'category' => 'Public Utility', 'website' => 'https://www.pesco.gov.pk'],
                        40 => ['name' => 'University of Sri Jayewardenepura', 'category' => 'Academia', 'website' => '#'],
                        41 => ['name' => 'National Power Training Institute (NPTI)', 'category' => 'Academia', 'website' => 'https://npti.gov.in'],
                        42 => ['name' => 'Alternative Energy Promition Center (ADPC)', 'category' => 'Government', 'website' => '#'],
                        43 => ['name' => 'NTPC Limited', 'category' => 'Public Utility', 'website' => 'https://www.ntpc.co.in'],
                        44 => ['name' => 'Hyderabad Electric Supply Company (HESCO)', 'category' => 'Public Utility', 'website' => '#'],
                        45 => ['name' => 'Electricity Generation Company of Bangladesh (EGCB)', 'category' => 'Private Utility', 'website' => 'https://www.egcb.com.bd'],
                        46 => ['name' => 'Engro Energy Limited', 'category' => 'Private Company', 'website' => '#'],
                        47 => ['name' => 'Feedback Energy Distribution Company (FEDCO)', 'category' => 'Private Utility', 'website' => '#'],
                        48 => ['name' => 'Grassroots Trading Network for Women (GTNfW)', 'category' => 'Public Company', 'website' => '#'],
                        49 => ['name' => 'Bangladesh Power Management Institute (BPMI)', 'category' => 'Public Utility', 'website' => 'https://bpmi.gov.bd'],
                        50 => ['name' => 'Power Grid Corporation of India (POWERGRID)', 'category' => 'Public Utility', 'website' => 'https://www.powergrid.in'],
                        51 => ['name' => 'Central Power Purchasing Agency (CPPA-G)', 'category' => 'Public Utility', 'website' => '#'],
                        52 => ['name' => 'Partner 52', 'category' => 'Academia', 'website' => '#'],
                        53 => ['name' => 'NTPC-Sail Power Company Limited', 'category' => 'Public Utility', 'website' => '#'],
                        54 => ['name' => 'Partner 54', 'category' => 'Public Utility', 'website' => '#'],
                        55 => ['name' => 'Indian Institute of Technology Kanpur', 'category' => 'Academia', 'website' => 'https://iitk.ac.in'],
                        56 => ['name' => 'Partner 56', 'category' => 'Private Utility', 'website' => '#'],
                        57 => ['name' => 'Independent Power Producers Association Nepal (IPPAN)', 'category' => 'Association', 'website' => 'https://www.ippan.org.np'],
                        58 => ['name' => 'Electricity Regulatory Authority', 'category' => 'Government', 'website' => '#'],
                        59 => ['name' => 'Butwal Power Company / Butwal Power Grid', 'category' => 'Private Utility', 'website' => '#'],
                        60 => ['name' => 'Women Network for Energy and Environment (WoNEE)', 'category' => 'Academia', 'website' => 'https://wonee.org.np'],
                    ];

                    function partnerBadgeClass($category) {
                        return match ($category) {
                            'Public Utility' => 'bg-[rgba(243,22,113,0.10)] text-[var(--pink)]',
                            'Private Utility' => 'bg-[rgba(1,157,222,0.10)] text-[var(--cyan)]',
                            'Academia' => 'bg-[rgba(233,146,16,0.12)] text-[var(--orange)]',
                            'Government' => 'bg-indigo-50 text-indigo-600',
                            'Association' => 'bg-emerald-50 text-emerald-600',
                            'Development Partner' => 'bg-slate-100 text-slate-600',
                            default => 'bg-slate-100 text-slate-600',
                        };
                    }
                @endphp

                <div id="partnerGrid" class="grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-5 lg:gap-6">
                    @for ($i = 4; $i <= 60; $i++)
                        @php
                            $data = $partnerData[$i] ?? ['name' => "Partner {$i}", 'category' => 'Public Utility', 'website' => '#'];
                            $name = $data['name'];
                            $category = $data['category'];
                            $website = $data['website'] ?: '#';

                            $logoJpg = "images/partners/image{$i}.jpg";
                            $logoPng = "images/partners/image{$i}.png";
                            $hasImage = file_exists(public_path($logoJpg)) || file_exists(public_path($logoPng));
                        @endphp

                        @if($hasImage)
                            <a href="{{ $website }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               title="Visit {{ $name }} website"
                               data-name="{{ strtolower($name) }}"
                               data-category="{{ $category }}"
                               class="partner-card group rounded-[1.6rem] border border-slate-200/70 bg-white min-h-[220px] sm:min-h-[240px] flex flex-col items-center justify-center p-6 shadow-[0_10px_30px_rgba(15,23,42,0.06)] hover:shadow-[0_22px_55px_rgba(15,23,42,0.14)] hover:-translate-y-1 transition-all duration-300">

                                <!-- Badge -->
                                <div class="absolute top-4 left-4 z-20">
                                    <span class="inline-flex items-center rounded-full px-3 py-1 text-[10px] font-semibold tracking-wide {{ partnerBadgeClass($category) }}">
                                        {{ $category }}
                                    </span>
                                </div>

                                <!-- Decorative Glow -->
                                <div class="absolute -top-12 -right-12 w-32 h-32 rounded-full bg-[var(--cyan)]/10 blur-2xl opacity-0 group-hover:opacity-100 transition duration-500"></div>
                                <div class="absolute -bottom-12 -left-12 w-32 h-32 rounded-full bg-[var(--pink)]/10 blur-2xl opacity-0 group-hover:opacity-100 transition duration-500"></div>

                                <!-- Logo -->
                                <div class="relative z-10 flex flex-1 items-center justify-center w-full pt-8">
                                    <img
                                        src="{{ asset($logoJpg) }}"
                                        alt="{{ $name }}"
                                        onerror="this.onerror=null; this.src='{{ asset($logoPng) }}';"
                                        class="max-h-24 sm:max-h-28 lg:max-h-32 max-w-[85%] object-contain transition duration-500 group-hover:scale-110"
                                    >
                                </div>

                                <!-- Name -->
                                <div class="relative z-10 mt-5 text-center">
                                    <p class="text-sm font-semibold text-slate-800 leading-snug line-clamp-2">
                                        {{ $name }}
                                    </p>
                                </div>

                                <!-- Hover Overlay -->
                                <div class="absolute inset-0 z-30 flex flex-col items-center justify-center text-center px-5 bg-white/92 backdrop-blur-md opacity-0 group-hover:opacity-100 transition duration-300">
                                    <p class="text-base font-bold text-slate-900 leading-snug">
                                        {{ $name }}
                                    </p>

                                    <p class="mt-2 text-xs text-slate-500">
                                        {{ $category }}
                                    </p>

                                    <span class="mt-5 inline-flex items-center justify-center rounded-full bg-slate-900 text-white px-4 py-2 text-xs font-semibold shadow-lg">
                                        Visit Website →
                                    </span>
                                </div>
                            </a>
                        @endif
                    @endfor
                </div>
            </div>

            <!-- CTA -->
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const filterButtons = document.querySelectorAll('.partner-filter');
        const cards = document.querySelectorAll('.partner-card');
        const searchInput = document.getElementById('partnerSearch');

        let activeFilter = 'all';

        function filterPartners() {
            const searchValue = searchInput.value.toLowerCase().trim();

            cards.forEach(card => {
                const name = card.dataset.name || '';
                const category = card.dataset.category || '';

                const matchesFilter = activeFilter === 'all' || category === activeFilter;
                const matchesSearch = name.includes(searchValue);

                card.classList.toggle('hide', !(matchesFilter && matchesSearch));
            });
        }

        filterButtons.forEach(button => {
            button.addEventListener('click', function () {
                activeFilter = this.dataset.filter;

                filterButtons.forEach(btn => {
                    btn.classList.remove('bg-[var(--cyan)]', 'text-white', 'shadow-[0_6px_20px_rgba(1,157,222,0.25)]');
                });

                this.classList.add('bg-[var(--cyan)]', 'text-white', 'shadow-[0_6px_20px_rgba(1,157,222,0.25)]');

                filterPartners();
            });
        });

        searchInput.addEventListener('input', filterPartners);
    });
</script>

@endsection