@extends('layouts.app')

@section('title', 'Our Partners')

@section('content')

<style>
    :root {
        --pink: #F31671;
        --orange: #E99210;
        --cyan: #019DDE;
    }

    body {
        overflow-x: hidden;
    }

    .partner-card {
        position: relative;
        overflow: hidden;
        isolation: isolate;
        height: 100%;
    }

    .partner-card::before {
        content: "";
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at top right, rgba(1,157,222,0.10), transparent 38%),
            radial-gradient(circle at bottom left, rgba(243,22,113,0.08), transparent 38%);
        opacity: 0;
        transition: opacity .35s ease;
        z-index: -1;
    }

    .partner-card:hover::before {
        opacity: 1;
    }

    .partner-card.hide {
        display: none !important;
    }

    .partner-overlay {
        background:
            linear-gradient(
                180deg,
                rgba(255,255,255,0.96) 0%,
                rgba(255,255,255,0.985) 100%
            );
        backdrop-filter: blur(10px);
    }

    .partner-filter-active {
        background: #0f172a !important;
        color: white !important;
        box-shadow: 0 10px 25px rgba(15,23,42,0.22);
    }

    #partnerGrid {
        align-items: stretch;
    }

    .partner-card-inner {
        min-height: 245px;
        height: 100%;
    }

    @media (min-width: 1024px) {
        .partner-card-inner {
            min-height: 260px;
        }
    }

    .partner-filter {
        transition: all .25s ease;
    }

    .partner-filter:hover {
        transform: translateX(4px);
    }
</style>

<div class="relative overflow-hidden bg-gradient-to-br from-slate-50 via-white to-indigo-50/40">

    <!-- BACKGROUND -->
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

            <!-- FILTER / SEARCH -->
<div class="mb-10 lg:mb-14">

    <div class="rounded-[2rem] border border-[rgba(1,157,222,0.15)] bg-white/85 backdrop-blur-xl shadow-[0_16px_50px_rgba(15,23,42,0.07)] p-4 sm:p-5 lg:p-6">

        <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-5">

            <!-- LEFT -->
            <div class="flex items-center gap-4 flex-wrap">

                <!-- MAIN FILTER BUTTON -->
                <div class="relative">

                    <button
                        id="partnerFilterToggle"
                        class="group relative overflow-hidden flex items-center gap-3 rounded-2xl border border-white/60 bg-white px-5 py-3 shadow-[0_12px_35px_rgba(15,23,42,0.08)] transition-all duration-300 hover:shadow-[0_18px_45px_rgba(1,157,222,0.18)] hover:-translate-y-[2px]"
                    >

                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition duration-500 bg-gradient-to-r from-cyan-500/10 via-sky-400/10 to-pink-500/10"></div>

                        <!-- ICON -->
                        <div class="relative flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-br from-cyan-500 to-sky-500 text-white shadow-lg shadow-cyan-500/30">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 4a1 1 0 011-1h16a1 1 0 01.8 1.6L14 13v5a1 1 0 01-1.447.894l-2-1A1 1 0 0110 17v-4L3.2 4.6A1 1 0 013 4z"/>

                            </svg>

                        </div>

                        <!-- TEXT -->
                        <div class="relative text-left">

                            <p class="text-[11px] uppercase tracking-[0.22em] text-slate-400 font-semibold">
                                 Filter
                            </p>

                            <p class="text-sm font-semibold text-slate-800">
                                 Partners
                            </p>

                        </div>

                        <!-- ARROW -->
                        <svg id="filterArrow"
                            xmlns="http://www.w3.org/2000/svg"
                            class="relative w-5 h-5 text-slate-500 transition duration-300"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 9l-7 7-7-7"/>

                        </svg>

                    </button>

                </div>

                <!-- FILTER TAGS -->
                <div
                    id="partnerFilterTags"
                    class="hidden flex-wrap items-center gap-3"
                >

                    <button data-filter="all"
                        class="partner-filter partner-filter-active px-5 py-3 rounded-full text-sm font-medium transition bg-[var(--cyan)] text-white shadow-[0_6px_20px_rgba(1,157,222,0.25)]">
                        All Partners
                    </button>

                    <button data-filter="Private Utility"
                        class="partner-filter px-5 py-3 rounded-full text-sm font-medium transition bg-[rgba(1,157,222,0.08)] text-[var(--cyan)] hover:bg-[var(--cyan)] hover:text-white">
                        Private Utility
                    </button>

                    <button data-filter="Public Utility"
                        class="partner-filter px-5 py-3 rounded-full text-sm font-medium transition bg-[rgba(243,22,113,0.08)] text-[var(--pink)] hover:bg-[var(--pink)] hover:text-white">
                        Public Utility
                    </button>

                    <button data-filter="Academia"
                        class="partner-filter px-5 py-3 rounded-full text-sm font-medium transition bg-[rgba(233,146,16,0.08)] text-[var(--orange)] hover:bg-[var(--orange)] hover:text-white">
                        Academia
                    </button>

                    <button data-filter="Government"
                        class="partner-filter px-5 py-3 rounded-full text-sm font-medium transition bg-indigo-50 text-indigo-600 hover:bg-indigo-600 hover:text-white">
                        Government
                    </button>

                    <button data-filter="Association"
                        class="partner-filter px-5 py-3 rounded-full text-sm font-medium transition bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white">
                        Association
                    </button>

                    <button data-filter="Private Company"
                        class="partner-filter px-5 py-3 rounded-full text-sm font-medium transition bg-cyan-50 text-cyan-600 hover:bg-cyan-600 hover:text-white">
                        Private Company
                    </button>

                    <button data-filter="Public Company"
                        class="partner-filter px-5 py-3 rounded-full text-sm font-medium transition bg-pink-50 text-pink-600 hover:bg-pink-600 hover:text-white">
                        Public Company
                    </button>

                    <button data-filter="NPO/NGO"
                        class="partner-filter px-5 py-3 rounded-full text-sm font-medium transition bg-violet-50 text-violet-600 hover:bg-violet-600 hover:text-white">
                        NPO/NGO
                    </button>

                </div>

            </div>

            <!-- SEARCH -->
            <div class="w-full xl:w-[380px]">

                <div class="relative">

                    <input
                        id="partnerSearch"
                        type="text"
                        placeholder="Search partner..."
                        class="w-full rounded-full border border-[rgba(1,157,222,0.2)] bg-white px-5 py-3 pr-12 text-sm text-slate-700 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-[var(--cyan)]/30 focus:border-[var(--cyan)] transition"
                    >

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="absolute right-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z"/>

                    </svg>

                </div>

            </div>

        </div>

    </div>

</div>


           @php
    $partnerData = [

        5  => [
            'name' => 'Asian Development Bank (ADB)',
            'category' => 'International Organization',
            'country' => 'Philippines',
            'website' => 'https://www.adb.org'
        ],

        42 => [
            'name' => 'Alternative Energy Promition Center (AEPC)',
            'category' => 'Government',
            'country' => 'Nepal',
            'website' => '#'
        ],

        12 => [
            'name' => 'American International University-Bangladesh (AIUB)',
            'category' => 'Academia',
            'country' => 'Bangladesh',
            'website' => 'https://www.aiub.edu'
        ],

        30 => [
            'name' => 'Bangladesh Rural Electrification Board',
            'category' => 'Public Utility',
            'country' => 'Bangladesh',
            'website' => '#'
        ],

        38 => [
            'name' => 'Bangladesh Power Development Board',
            'category' => 'Public Utility',
            'country' => 'Bangladesh',
            'website' => '#'
        ],

        49 => [
            'name' => 'Bangladesh Power Management Institute (BPMI)',
            'category' => 'Public Utility',
            'country' => 'Bangladesh',
            'website' => 'https://bpmi.gov.bd'
        ],

        36 => [
            'name' => 'Bhutan Power Corporation (BPC)',
            'category' => 'Public Utility',
            'country' => 'Bhutan',
            'website' => 'https://www.bpc.bt'
        ],

        24 => [
            'name' => 'BSES Rajdhani Power Limited (BRPL)',
            'category' => 'Private Utility',
            'country' => 'India',
            'website' => 'https://www.bsesdelhi.com/web/brpl/home'
        ],

        18 => [
            'name' => 'BSES Yamuna Power Limited (BYPL)',
            'category' => 'Private Utility',
            'country' => 'India',
            'website' => 'https://www.bsesdelhi.com/web/bypl/home'
        ],

        59 => [
            'name' => 'Butwal Power Company / Butwal Power Grid',
            'category' => 'Private Utility',
            'country' => 'Nepal',
            'website' => '#'
        ],

        51 => [
            'name' => 'Central Power Purchasing Agency (CPPA-G)',
            'category' => 'Public Utility',
            'country' => 'Pakistan',
            'website' => '#'
        ],

        8  => [
            'name' => 'Ceylon Electricity Board',
            'category' => 'Public Utility',
            'country' => 'Sri Lanka',
            'website' => '#'
        ],

        10 => [
            'name' => 'Dhaka Electric Supply Company (DESCO)',
            'category' => 'Public Utility',
            'country' => 'Bangladesh',
            'website' => '#'
        ],

        33 => [
            'name' => 'Druk Green Power Corporation',
            'category' => 'Public Utility',
            'country' => 'Bhutan',
            'website' => 'https://www.drukgreen.bt'
        ],

        58 => [
            'name' => 'Electricity Regulatory Authority',
            'category' => 'Government',
            'country' => 'Bhutan',
            'website' => '#'
        ],

        45 => [
            'name' => 'Electricity Generation Company of Bangladesh (EGCB)',
            'category' => 'Private Utility',
            'country' => 'Bangladesh',
            'website' => 'https://www.egcb.com.bd'
        ],

        35 => [
            'name' => 'Energy Efficiency Services Limited (EESL)',
            'category' => 'Public Utility',
            'country' => 'India',
            'website' => '#'
        ],

        46 => [
            'name' => 'Engro Energy Limited',
            'category' => 'Private Company',
            'country' => 'Pakistan',
            'website' => '#'
        ],

        47 => [
            'name' => 'Feedback Energy Distribution Company (FEDCO)',
            'category' => 'Private Utility',
            'country' => 'India',
            'website' => '#'
        ],

        6  => [
            'name' => 'Fenaka Corporation Limited',
            'category' => 'Public Utility',
            'country' => 'Maldives',
            'website' => 'https://fenaka.mv'
        ],

        29 => [
            'name' => 'Grameen Shakti',
            'category' => 'NPO/NGO',
            'country' => 'Bangladesh',
            'website' => '#'
        ],

        48 => [
            'name' => 'Grassroots Trading Network for Women (GTNfW)',
            'category' => 'Public Company',
            'country' => 'India',
            'website' => '#'
        ],

        44 => [
            'name' => 'Hyderabad Electric Supply Company (HESCO)',
            'category' => 'Public Utility',
            'country' => '****Pakistan********',
            'website' => '#'
        ],

        4  => [
            'name' => 'IEEE Women in Engineering (WIE)',
            'category' => 'Association',
            'country' => 'India',
            'website' => 'https://wie.ieee.org/'
        ],

        21 => [
            'name' => 'IEEE Bangladesh Section',
            'category' => 'Association',
            'country' => 'Bangladesh',
            'website' => '#'
        ],

        57 => [
            'name' => 'Independent Power Producers Association Nepal (IPPAN)',
            'category' => 'Association',
            'country' => 'Nepal',
            'website' => 'https://www.ippan.org.np'
        ],

        23 => [
            'name' => 'Institute of Engineering, Tribhuvan University (IOE / TU Nepal)',
            'category' => 'Academia',
            'country' => 'Nepal',
            'website' => 'https://ioe.tu.edu.np'
        ],

        37 => [
            'name' => 'Infrastructure Development Company Limited (IDCOL)',
            'category' => 'Public Utility',
            'country' => 'Bangladesh',
            'website' => 'https://www.idcol.org'
        ],

        55 => [
            'name' => 'Indian Institute of Technology Kanpur',
            'category' => 'Academia',
            'country' => 'India',
            'website' => 'https://iitk.ac.in'
        ],

        9  => [
            'name' => 'K-Electric (KE)',
            'category' => 'Private Utility',
            'country' => 'Pakistan',
            'website' => '#'
        ],

        7  => [
            'name' => 'Lanka Electricity Company (LECO)',
            'category' => 'Private Utility',
            'country' => 'Sri Lanka',
            'website' => 'https://www.leco.lk'
        ],

        27 => [
            'name' => 'Lahore Electric Supply Company (LESCO)',
            'category' => 'Public Utility',
            'country' => 'Pakistan',
            'website' => '#'
        ],

        19 => [
            'name' => 'Multan Electric Power Company (MEPCO)',
            'category' => 'Public Utility',
            'country' => 'Pakistan',
            'website' => '#'
        ],

        41 => [
            'name' => 'National Power Training Institute (NPTI)',
            'category' => 'Academia',
            'country' => 'India',
            'website' => 'https://npti.gov.in'
        ],

        22 => [
            'name' => 'Nepal Electricity Authority (NEA)',
            'category' => 'Public Utility',
            'country' => 'Nepal',
            'website' => 'https://nea.org.np'
        ],

        15 => [
            'name' => "Nepal Engineers' Association",
            'category' => 'Association',
            'country' => 'Nepal',
            'website' => 'https://www.neanepal.org.np'
        ],

        43 => [
            'name' => 'NTPC Limited',
            'category' => 'Public Utility',
            'country' => 'India',
            'website' => 'https://www.ntpc.co.in'
        ],

        53 => [
            'name' => 'NTPC-Sail Power Company Limited',
            'category' => 'Public Utility',
            'country' => 'India',
            'website' => '#'
        ],

        26 => [
            'name' => 'Pakhtunkhwa Energy Development Authority',
            'category' => 'P',
            'country' => 'Pakistan',
            'website' => '#'
        ],

        52 => [
            'name' => 'Partner 52',
            'category' => 'Academia',
            'country' => 'Unknown',
            'website' => '#'
        ],

        54 => [
            'name' => 'Partner 54',
            'category' => 'Public Utility',
            'country' => 'Unknown',
            'website' => '#'
        ],

        56 => [
            'name' => 'Partner 56',
            'category' => 'Private Utility',
            'country' => 'Unknown',
            'website' => '#'
        ],

        39 => [
            'name' => 'Peshawar Electric Supply Company (PESCO)',
            'category' => 'Public Utility',
            'country' => 'Pakistan',
            'website' => 'https://www.pesco.gov.pk'
        ],

        50 => [
            'name' => 'Power Grid Corporation of India (POWERGRID)',
            'category' => 'Public Utility',
            'country' => 'India',
            'website' => 'https://www.powergrid.in'
        ],

        11 => [
            'name' => 'Power Grid Bangladesh (PLC)',
            'category' => 'Public Utility',
            'country' => 'Bangladesh',
            'website' => '#'
        ],

        28 => [
            'name' => 'Samudayik Upavokta Samiti / Community Electricity Users Group Nepal',
            'category' => 'Association',
            'country' => 'Nepal',
            'website' => '#'
        ],

        16 => [
            'name' => 'Sri Lanka Sustainable Energy Authority',
            'category' => 'Government',
            'country' => 'Sri Lanka',
            'website' => '#'
        ],

        17 => [
            'name' => 'Skill Council for Green Jobs (SCGJ)',
            'category' => 'Academia',
            'country' => 'India',
            'website' => 'https://sscgj.in'
        ],

        34 => [
            'name' => 'Tata Power Delhi Distribution Limited (Tata Power DDL)',
            'category' => 'Private Utility',
            'country' => 'India',
            'website' => '#'
        ],

        32 => [
            'name' => 'United States Agency for International Development (USAID)',
            'category' => 'H',
            'country' => 'United States',
            'website' => 'https://www.usaid.gov'
        ],

        13 => [
            'name' => 'University of Ruhuna',
            'category' => 'Academia',
            'country' => 'Sri Lanka',
            'website' => '#'
        ],

        40 => [
            'name' => 'University of Sri Jayewardenepura',
            'category' => 'Academia',
            'country' => 'Sri Lanka',
            'website' => '#'
        ],

        14 => [
            'name' => 'Vision Mechatronics Pvt. Ltd.',
            'category' => 'Private Company',
            'country' => 'India',
            'website' => 'https://www.vmechatronics.com'
        ],

        31 => [
            'name' => 'Water and Power Development Authority',
            'category' => 'Public Utility',
            'country' => 'Pakistan',
            'website' => '#'
        ],

        20 => [
            'name' => 'Women in Energy Pakistan',
            'category' => 'Civil Society Organization',
            'country' => 'Pakistan',
            'website' => '#'
        ],

        60 => [
            'name' => 'Women Network for Energy and Environment (WoNEE)',
            'category' => 'Academia',
            'country' => 'Nepal',
            'website' => 'https://wonee.org.np'
        ],

    ];

                function partnerBadgeClass($category) {
                    return match ($category) {
                        'Public Utility' => 'bg-[rgba(243,22,113,0.10)] text-[var(--pink)]',
                        'Private Utility' => 'bg-[rgba(1,157,222,0.10)] text-[var(--cyan)]',
                        'Academia' => 'bg-[rgba(233,146,16,0.12)] text-[var(--orange)]',
                        'Government' => 'bg-indigo-50 text-indigo-600',
                        'Association' => 'bg-emerald-50 text-emerald-600',
                        'Private Company' => 'bg-cyan-50 text-cyan-600',
                        'Public Company' => 'bg-pink-50 text-pink-600',
                        'NPO/NGO' => 'bg-violet-50 text-violet-600',
                        default => 'bg-slate-100 text-slate-600',
                    };
                }

            @endphp

            <!-- GRID -->
            <div id="partnerGrid"
                class="grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-5 lg:gap-6">

                @foreach($partnerData as $i => $data)

                    @php

                        $name = $data['name'];
                        $category = $data['category'];
                        $country = $data['country'];
                        $website = $data['website'];

                        $logoJpg = "images/partners/image{$i}.jpg";
                        $logoPng = "images/partners/image{$i}.png";

                        $hasImage =
                            file_exists(public_path($logoJpg)) ||
                            file_exists(public_path($logoPng));

                    @endphp

                    @if($hasImage)

                        <a href="{{ $website }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            data-name="{{ strtolower($name) }}"
                            data-category="{{ $category }}"
                            class="partner-card group">

                            <div class="partner-card-inner rounded-[1.6rem] border border-slate-200/70 bg-white p-6 shadow-[0_10px_30px_rgba(15,23,42,0.06)] hover:shadow-[0_22px_55px_rgba(15,23,42,0.14)] transition-all duration-300 flex flex-col">

                                <!-- BADGE -->
                                <div class="absolute top-4 left-4 z-20">
                                    <span class="inline-flex items-center rounded-full px-3 py-1 text-[10px] font-semibold tracking-wide {{ partnerBadgeClass($category) }}">
                                        {{ $category }}
                                    </span>
                                </div>

                                <!-- LOGO -->
                                <div class="flex-1 flex items-center justify-center pt-8">

                                    <img
                                        src="{{ asset($logoJpg) }}"
                                        alt="{{ $name }}"
                                        onerror="this.onerror=null; this.src='{{ asset($logoPng) }}';"
                                        class="max-h-24 sm:max-h-28 lg:max-h-32 max-w-[85%] object-contain transition duration-500 group-hover:scale-110"
                                    >

                                </div>

                                <!-- TEXT -->
                                <div class="mt-5 text-center">

                                    <p class="text-sm font-semibold text-slate-800 leading-snug line-clamp-2">
                                        {{ $name }}
                                    </p>

                                    <p class="mt-2 text-[11px] uppercase tracking-[0.18em] text-slate-400">
                                        {{ $country }}
                                    </p>

                                </div>

                                <!-- OVERLAY -->
                                <div class="partner-overlay absolute inset-0 z-30 flex flex-col items-center justify-center text-center px-5 opacity-0 group-hover:opacity-100 transition duration-300">

                                    <p class="text-base font-bold text-slate-900 leading-snug">
                                        {{ $name }}
                                    </p>

                                    <p class="mt-2 text-xs text-slate-500">
                                        {{ $country }}
                                    </p>

                                    <span class="mt-5 inline-flex items-center justify-center rounded-full bg-slate-900 text-white px-4 py-2 text-xs font-semibold shadow-lg">
                                        Visit Website →
                                    </span>

                                </div>

                            </div>

                        </a>

                    @endif

                @endforeach

            </div>

        </div>

    </section>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const filterToggle = document.getElementById('partnerFilterToggle');
    const filterTags = document.getElementById('partnerFilterTags');
    const filterArrow = document.getElementById('filterArrow');

    const filterButtons = document.querySelectorAll('.partner-filter');
    const cards = document.querySelectorAll('.partner-card');
    const searchInput = document.getElementById('partnerSearch');

    let activeFilter = 'all';

    // TOGGLE FILTER TAGS
    filterToggle.addEventListener('click', () => {

        filterTags.classList.toggle('hidden');
        filterTags.classList.toggle('flex');

        filterArrow.classList.toggle('rotate-180');

    });

    // FILTER FUNCTION
    function filterPartners() {

        const searchValue = searchInput.value.toLowerCase().trim();

        cards.forEach(card => {

            const name = card.dataset.name || '';
            const category = card.dataset.category || '';

            const matchesFilter =
                activeFilter === 'all' ||
                category === activeFilter;

            const matchesSearch =
                name.includes(searchValue);

            if (matchesFilter && matchesSearch) {
                card.classList.remove('hide');
            } else {
                card.classList.add('hide');
            }

        });

    }

    // FILTER BUTTONS
    filterButtons.forEach(button => {

        button.addEventListener('click', function () {

            activeFilter = this.dataset.filter;

            filterButtons.forEach(btn => {

                btn.classList.remove(
                    'partner-filter-active',
                    'bg-[var(--cyan)]',
                    'text-white',
                    'shadow-[0_6px_20px_rgba(1,157,222,0.25)]'
                );

            });

            this.classList.add(
                'partner-filter-active',
                'bg-[var(--cyan)]',
                'text-white',
                'shadow-[0_6px_20px_rgba(1,157,222,0.25)]'
            );

            filterPartners();

        });

    });

    // SEARCH
    searchInput.addEventListener('input', filterPartners);

});
</script>

@endsection