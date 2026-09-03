@extends('layouts.app', ['imageNav' => true])
@section('title', 'About Us')

@section('content')
@php
    if (! function_exists('cms')) {
        function cms($cms, $section, $field, $default = '') {
            return $cms[$section][$field] ?? $default;
        }
    }

    if (! function_exists('canEditCms')) {
        function canEditCms() {
            return auth()->check()
                && in_array(auth()->user()->role, ['admin', 'super_admin']);
        }
    }
@endphp
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

    * { scroll-behavior: smooth; }

    .text-pink-brand { color: var(--pink); }
    .text-orange-brand { color: var(--orange); }
    .text-cyan-brand { color: var(--cyan); }

    .bg-pink-brand { background-color: var(--pink); }
    .bg-orange-brand { background-color: var(--orange); }
    .bg-cyan-brand { background-color: var(--cyan); }

    .page-shell {
        max-width: 1280px;
        margin-left: auto;
        margin-right: auto;
        padding-left: 1.5rem;
        padding-right: 1.5rem;
        width: 100%;
    }

    @media (min-width: 640px) {
        .page-shell {
            padding-left: 2rem;
            padding-right: 2rem;
        }
    }

    @media (min-width: 1024px) {
        .page-shell {
            padding-left: 3rem;
            padding-right: 3rem;
        }
    }

    @keyframes heroZoom {
        from { transform: scale(1.08); }
        to { transform: scale(1); }
    }

    .animate-hero-zoom {
        animation: heroZoom 18s ease-out forwards;
    }

    .animate-on-scroll {
        opacity: 0;
        transform: translateY(40px);
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
        box-shadow: 0 20px 45px -14px rgba(15, 23, 42, 0.18);
    }

    .glass-card {
        backdrop-filter: blur(18px);
        background: rgba(255,255,255,0.08);
        border: 1px solid rgba(255,255,255,0.18);
    }

    @media (max-width: 640px) {
        h1 { font-size: 2.8rem !important; line-height: 1.1 !important; }
        h2 { font-size: 2.2rem !important; line-height: 1.15 !important; }
    }

.node-premium {
    display: flex;
    align-items: center;
    gap: 0.72rem;
    min-width: 148px;
    justify-content: flex-start;
    padding: 0.78rem 1rem;
    background: rgba(255, 255, 255, 0.94);
    border: 1px solid rgba(226, 232, 240, 0.95);
    border-radius: 999px;
    box-shadow:
        0 10px 30px rgba(15, 23, 42, 0.08),
        0 1px 0 rgba(255,255,255,0.7) inset;
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    font-size: 0.88rem;
    font-weight: 600;
    color: #0f172a;
    white-space: nowrap;
    transition: all 0.3s ease;
}

.node-premium:hover {
    transform: translateY(-4px);
    box-shadow:
        0 18px 38px rgba(15, 23, 42, 0.13),
        0 1px 0 rgba(255,255,255,0.8) inset;
}

.node-premium-active {
    border: 1.5px solid rgba(1,157,222,0.35);
    box-shadow:
        0 16px 40px rgba(1,157,222,0.14),
        0 1px 0 rgba(255,255,255,0.75) inset;
}

.flag-rect {
    width: 28px;
    height: 20px;
    object-fit: cover;
    border-radius: 4px;
    flex-shrink: 0;
    border: 1px solid rgba(15, 23, 42, 0.08);
    box-shadow: 0 2px 8px rgba(15, 23, 42, 0.10);
}

    .cms-inline-edit {
        transition: all 0.25s ease;
        border-radius: 8px;
    }

    .cms-editable-active {
        outline: 2px dashed rgba(1,157,222,0.55);
        outline-offset: 6px;
        cursor: text;
        background: rgba(1,157,222,0.08);
    }

    .cms-editable-active:focus {
        outline: 2px solid #019DDE;
        background: rgba(1,157,222,0.14);
    }
</style>
<!-- ================= HERO ================= -->
<section id="aboutHero" class="relative overflow-hidden bg-white">

    @if(canEditCms())
        <div class="absolute top-6 right-6 z-[9999] flex gap-3">
            <button
                type="button"
                id="enableAboutHeroEdit"
                class="px-5 py-2.5 rounded-xl bg-pink-brand border border-white/20 text-white font-semibold shadow-lg hover:bg-white/20 transition">
                Edit Hero
            </button>

            <button
                type="button"
                id="saveAboutHeroEdit"
                class="hidden px-5 py-2.5 rounded-xl bg-cyan-brand text-white font-semibold shadow-2xl hover:scale-105 transition">
                Save Changes
            </button>

            <button
                type="button"
                id="cancelAboutHeroEdit"
                class="hidden px-5 py-2.5 rounded-xl bg-white border border-slate-200 text-slate-700 font-semibold shadow-lg hover:bg-slate-100 transition">
                Cancel
            </button>



            <label
                id="aboutHeroImageUploadLabel"
                for="aboutHeroImageUpload"
                class="hidden px-5 py-2.5 rounded-xl bg-white border border-slate-200 text-slate-700 font-semibold shadow-lg hover:bg-slate-100 transition cursor-pointer">
                Change Image

                <input
                    type="file"
                    id="aboutHeroImageUpload"
                    accept="image/*"
                    class="hidden">
            </label>
        </div>
    @endif

    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-[linear-gradient(135deg,#fff_0%,#f8fafc_35%,#eef6fb_100%)]"></div>
        <div class="absolute top-0 right-0 w-[42rem] h-[42rem] rounded-full blur-3xl opacity-30"
             style="background: radial-gradient(circle, rgba(1,157,222,0.22) 0%, rgba(1,157,222,0) 70%);"></div>
        <div class="absolute bottom-[-8rem] left-[-8rem] w-[30rem] h-[30rem] rounded-full blur-3xl opacity-30"
             style="background: radial-gradient(circle, rgba(243,22,113,0.18) 0%, rgba(243,22,113,0) 70%);"></div>
    </div>

    <div class="relative z-10 page-shell pt-20 pb-20 lg:pt-24 lg:pb-28">
        <div class="grid lg:grid-cols-12 gap-10 lg:gap-14 items-center">

            <div class="lg:col-span-7">
                <p class="inline-flex items-center gap-3 text-sm uppercase tracking-[0.28em] text-slate-500 mb-6 animate-on-scroll">
                    <span class="w-10 h-px bg-pink-brand"></span>

                    <span
                        contenteditable="false"
                        data-section="about_hero"
                        data-field="eyebrow"
                        class="cms-inline-edit">
                        {{ cms($cms, 'about_hero', 'eyebrow', 'About WePOWER') }}
                    </span>
                </p>

                <h1 class="text-5xl md:text-6xl xl:text-7xl font-extrabold text-slate-900 leading-[1.02] mb-7 animate-on-scroll">
                    <span
                        contenteditable="false"
                        data-section="about_hero"
                        data-field="title_line_1"
                        class="cms-inline-edit">
                        {{ cms($cms, 'about_hero', 'title_line_1', 'Powering Inclusion') }}
                    </span>

                    <span
                        contenteditable="false"
                        data-section="about_hero"
                        data-field="title_line_2"
                        class="cms-inline-edit block text-cyan-brand">
                        {{ cms($cms, 'about_hero', 'title_line_2', 'Across South Asia') }}
                    </span>
                </h1>

                <p
                    contenteditable="false"
                    data-section="about_hero"
                    data-field="description"
                    class="cms-inline-edit text-lg sm:text-xl text-slate-600 leading-relaxed mb-8 animate-on-scroll"
                    style="transition-delay: 0.12s;">
                    {{ cms($cms, 'about_hero', 'description', "WePOWER is a women's regional network connecting institutions, utilities, universities, and professional partners to create stronger pathways for women in the energy sector — from participation and progression to leadership and institutional change.") }}
                </p>

                <div class="flex flex-wrap gap-4 animate-on-scroll" style="transition-delay: 0.2s;">
                    <a href="{{ cms($cms, 'about_hero', 'primary_button_link', '#who-we-are') }}"
                       class="px-7 py-4 bg-slate-900 hover:bg-slate-800 text-white rounded-2xl font-semibold shadow-lg transition">
                        <span
                            contenteditable="false"
                            data-section="about_hero"
                            data-field="primary_button_text"
                            class="cms-inline-edit">
                            {{ cms($cms, 'about_hero', 'primary_button_text', 'Learn About WePOWER') }}
                        </span>
                    </a>

                    <a href="{{ cms($cms, 'about_hero', 'secondary_button_link', '#our-framework') }}"
                       class="px-7 py-4 border border-slate-300 text-slate-800 rounded-2xl font-semibold hover:border-slate-400 hover:bg-slate-50 transition">
                        <span
                            contenteditable="false"
                            data-section="about_hero"
                            data-field="secondary_button_text"
                            class="cms-inline-edit">
                            {{ cms($cms, 'about_hero', 'secondary_button_text', 'View Our Frameworks') }}
                        </span>
                    </a>
                </div>

                <div class="grid sm:grid-cols-3 gap-4 mt-10 animate-on-scroll" style="transition-delay: 0.28s;">
                    @for($i = 1; $i <= 3; $i++)
                        <div class="rounded-2xl bg-white border border-slate-200 px-5 py-4 shadow-sm">
                            <p
                                contenteditable="false"
                                data-section="about_hero"
                                data-field="stat_{{ $i }}_number"
                                class="cms-inline-edit text-2xl font-bold {{ $i == 1 ? 'text-pink-brand' : ($i == 2 ? 'text-cyan-brand' : 'text-orange-brand') }}">
                                {{ cms($cms, 'about_hero', "stat_{$i}_number") }}
                            </p>

                            <p
                                contenteditable="false"
                                data-section="about_hero"
                                data-field="stat_{{ $i }}_label"
                                class="cms-inline-edit text-sm text-slate-500 mt-1">
                                {{ cms($cms, 'about_hero', "stat_{$i}_label") }}
                            </p>
                        </div>
                    @endfor
                </div>
            </div>

            <div class="lg:col-span-5 animate-on-scroll">
                <div class="relative max-w-xl mx-auto lg:ml-auto">
                    <div class="relative rounded-[2rem] overflow-hidden shadow-2xl">
                        <img
                             id="aboutHeroImage"
                             src="{{ asset(cms($cms, 'about_hero', 'image', 'images/bgg.jpeg')) }}"
                             alt="{{ cms($cms, 'about_hero', 'image_alt', 'Women in the South Asia power sector') }}"
                             class="w-full h-[480px] sm:h-[560px] object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-slate-900/10 to-transparent"></div>
                    </div>

                    <div class="hidden sm:block absolute -right-6 top-10 w-20 h-72 rounded-[1.75rem] bg-gradient-to-b from-pink-brand via-orange-brand to-cyan-brand shadow-xl"></div>

                    <div class="absolute -top-6 -left-6 sm:left-auto sm:-right-10 bg-white rounded-2xl shadow-xl border border-slate-200 px-5 py-4 w-56">
                        <p
                            contenteditable="false"
                            data-section="about_hero"
                            data-field="small_card_1_title"
                            class="cms-inline-edit text-xs uppercase tracking-[0.22em] text-slate-400 mb-2">
                            {{ cms($cms, 'about_hero', 'small_card_1_title', 'Regional Vision') }}
                        </p>

                        <p
                            contenteditable="false"
                            data-section="about_hero"
                            data-field="small_card_1_text"
                            class="cms-inline-edit text-sm text-slate-700 leading-relaxed">
                            {{ cms($cms, 'about_hero', 'small_card_1_text', 'Advancing women’s participation in technical and leadership roles.') }}
                        </p>
                    </div>

                    <div class="absolute bottom-6 -left-6 sm:-left-10 bg-slate-900 text-white rounded-2xl shadow-2xl px-6 py-5 w-64">
                        <p
                            contenteditable="false"
                            data-section="about_hero"
                            data-field="small_card_2_title"
                            class="cms-inline-edit text-xs uppercase tracking-[0.22em] text-white/50 mb-2">
                            {{ cms($cms, 'about_hero', 'small_card_2_title', 'Why It Matters') }}
                        </p>

                        <p
                            contenteditable="false"
                            data-section="about_hero"
                            data-field="small_card_2_text"
                            class="cms-inline-edit text-sm leading-relaxed text-white/85">
                            {{ cms($cms, 'about_hero', 'small_card_2_text', 'A stronger energy sector needs more inclusive institutions, opportunities, and career pathways.') }}
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ================= ABOUT YUNUS CENTER AIT ================= -->
<section id="about-yca" class="relative py-20 lg:py-28 bg-white overflow-hidden">

    @if(canEditCms())
        <div class="absolute top-6 right-6 z-[9999] flex gap-3">
            <button type="button" id="enableYcaEdit"
                class="px-5 py-2.5 rounded-xl bg-pink-brand text-white font-semibold shadow-lg hover:bg-pink-600 transition">
                Edit Yunus Center
            </button>

            <button type="button" id="saveYcaEdit"
                class="hidden px-5 py-2.5 rounded-xl bg-cyan-brand text-white font-semibold shadow-2xl hover:scale-105 transition">
                Save Changes
            </button>

            <button type="button" id="cancelYcaEdit"
                class="hidden px-5 py-2.5 rounded-xl bg-white border border-slate-200 text-slate-700 font-semibold shadow-lg hover:bg-slate-100 transition">
                Cancel
            </button>

            <label id="ycaImageUploadLabel" for="ycaImageUpload"
                class="hidden px-5 py-2.5 rounded-xl bg-white border border-slate-200 text-slate-700 font-semibold shadow-lg hover:bg-slate-100 transition cursor-pointer">
                Change Image
                <input type="file" id="ycaImageUpload" accept="image/*" class="hidden">
            </label>
        </div>
    @endif

    <div class="absolute inset-0 bg-[linear-gradient(135deg,#ffffff_0%,#f8fafc_42%,#eef9ff_100%)]"></div>
    <div class="absolute -top-32 -right-32 w-[34rem] h-[34rem] rounded-full blur-3xl bg-cyan-brand/15"></div>
    <div class="absolute -bottom-32 -left-32 w-[30rem] h-[30rem] rounded-full blur-3xl bg-pink-brand/10"></div>

    <div class="page-shell relative z-10">

        <div class="grid lg:grid-cols-12 gap-10 lg:gap-16 items-center">

            <!-- Image Block -->
            <div class="lg:col-span-5 animate-on-scroll">
                <div class="relative max-w-xl mx-auto lg:mx-0">

                    <div class="absolute -top-6 -left-6 w-24 h-24 rounded-3xl bg-pink-brand/10"></div>
                    <div class="absolute -bottom-6 -right-6 w-32 h-32 rounded-full bg-cyan-brand/10"></div>

                    <div class="relative rounded-[2.2rem] overflow-hidden shadow-2xl border border-white bg-white p-3">
                        <img
                            id="ycaImage"
                            src="{{ asset(cms($cms, 'about_yca', 'image', 'images/yca.jpg')) }}"
                            alt="{{ cms($cms, 'about_yca', 'image_alt', 'Yunus Center AIT') }}"
                            class="w-full h-[430px] lg:h-[560px] object-cover rounded-[1.7rem]">

                        <div class="absolute inset-3 rounded-[1.7rem] bg-gradient-to-t from-slate-950/65 via-slate-900/10 to-transparent"></div>

                        <div class="absolute left-8 right-8 bottom-8">
                            <div class="rounded-3xl bg-white/90 backdrop-blur-xl border border-white/70 p-5 shadow-xl">
                                <p
                                    contenteditable="false"
                                    data-section="about_yca"
                                    data-field="card_title"
                                    class="cms-inline-edit text-base font-bold text-slate-900">
                                    {{ cms($cms, 'about_yca', 'card_title', 'Yunus Center AIT') }}
                                </p>

                                <p
                                    contenteditable="false"
                                    data-section="about_yca"
                                    data-field="card_text"
                                    class="cms-inline-edit mt-1 text-sm leading-relaxed text-slate-600">
                                    {{ cms($cms, 'about_yca', 'card_text', 'Social business, innovation, and inclusive development.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Text Block -->
            <div class="lg:col-span-7 animate-on-scroll">

                <p class="inline-flex items-center gap-3 text-sm uppercase tracking-[0.28em] text-slate-500 mb-6">
                    <span class="w-10 h-px bg-pink-brand"></span>
                    <span
                        contenteditable="false"
                        data-section="about_yca"
                        data-field="eyebrow"
                        class="cms-inline-edit">
                        {{ cms($cms, 'about_yca', 'eyebrow', 'About Yunus Center') }}
                    </span>
                </p>

                <h2
                    contenteditable="false"
                    data-section="about_yca"
                    data-field="title"
                    class="cms-inline-edit text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 leading-[1.08] mb-7">
                    {{ cms($cms, 'about_yca', 'title', 'A Center for Social Business, Research, and Inclusive Impact') }}
                </h2>

                <div class="relative pl-6 border-l-4 border-cyan-brand/30 mb-8">
                    <p
                        contenteditable="false"
                        data-section="about_yca"
                        data-field="paragraph_1"
                        class="cms-inline-edit text-lg sm:text-xl text-slate-600 leading-relaxed">
                        {{ cms($cms, 'about_yca', 'paragraph_1', 'Yunus Center AIT (YCA) is a collaboration between Nobel Laureate Professor Muhammad Yunus and the Asian Institute of Technology. As the first Yunus Center established within an academic institution, YCA works with a vision to harness the power of social business to help create a poverty-free world.') }}
                    </p>
                </div>

                <div class="grid sm:grid-cols-2 gap-5 mb-8">
<div class="rounded-3xl bg-white border border-slate-200 p-6 shadow-sm text-justify">                        

                        <p
                            contenteditable="false"
                            data-section="about_yca"
                            data-field="paragraph_2"
                            class="cms-inline-edit text-slate-600 leading-relaxed">
                            {{ cms($cms, 'about_yca', 'paragraph_2', 'YCA follows an action-learning approach that supports the development and implementation of social business models informed by research, technology, and partnerships, with a strong focus on gender equality and inclusive impact.') }}
                        </p>
                    </div>

<div class="rounded-3xl bg-white border border-slate-200 p-6 shadow-sm text-justify">                        

                        <p
                            contenteditable="false"
                            data-section="about_yca"
                            data-field="paragraph_3"
                            class="cms-inline-edit text-slate-600 leading-relaxed">
                            {{ cms($cms, 'about_yca', 'paragraph_3', 'Drawing on the knowledge infrastructure and global research network of the Asian Institute of Technology, YCA connects with experts, institutions, and organizations across countries to promote practical, sustainable, and people-centered solutions.') }}
                        </p>
                    </div>
                </div>

                

            </div>

        </div>
    </div>
</section>

<!-- 
<section id="wepower-3d-earth" class="wepower-earth-section">
<style>
.wepower-earth-section {
    position: relative;
    overflow: hidden;
    padding: 5rem 1.25rem;
    background: linear-gradient(135deg, #06192f, #08285c 45%, #0a3352);
    color: white;
}

.earth-wrap {
    max-width: 1400px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 0.85fr 1.5fr;
    gap: 2.5rem;
    align-items: start;
}

.earth-kicker {
    text-transform: uppercase;
    letter-spacing: .28em;
    color: #7dd3fc;
    font-weight: 800;
    font-size: .78rem;
    margin-bottom: .85rem;
}

.earth-title {
    font-size: clamp(2.2rem, 4.5vw, 4rem);
    line-height: 1.05;
    font-weight: 800;
    margin-bottom: 1.1rem;
}

.earth-desc {
    font-size: 1rem;
    line-height: 1.8;
    color: rgba(255,255,255,.72);
    margin-bottom: 1.5rem;
    max-width: 480px;
}

.legend-block {
    background: rgba(255,255,255,.07);
    border: 1px solid rgba(255,255,255,.14);
    border-radius: 18px;
    padding: 1rem 1.2rem;
    margin-bottom: 1.2rem;
}

.legend-item {
    display: flex;
    align-items: center;
    gap: .65rem;
    font-size: .84rem;
    margin-bottom: .5rem;
}
.legend-item:last-child { margin-bottom: 0; }

.legend-dot {
    width: 11px;
    height: 11px;
    border-radius: 50%;
    flex-shrink: 0;
}

.active-card {
    border-radius: 18px;
    padding: 1rem 1.2rem;
    background: rgba(255,255,255,.06);
    border: 1px solid rgba(255,255,255,.18);
    min-height: 96px;
    transition: all .4s ease;
}

.ac-label {
    font-size: .68rem;
    text-transform: uppercase;
    letter-spacing: .2em;
    color: #7dd3fc;
    font-weight: 800;
    margin-bottom: .3rem;
}

.ac-name {
    font-size: 1.15rem;
    font-weight: 700;
    margin-bottom: .25rem;
}

.ac-sub {
    font-size: .82rem;
    color: rgba(255,255,255,.62);
    line-height: 1.5;
}

.progress-pills {
    display: flex;
    gap: 5px;
    margin-top: 1rem;
    flex-wrap: wrap;
}

.pp-pill {
    height: 4px;
    border-radius: 3px;
    flex: 1;
    min-width: 20px;
    background: rgba(255,255,255,.15);
    overflow: hidden;
    position: relative;
}

.pp-fill {
    position: absolute;
    left: 0; top: 0;
    height: 100%;
    background: #60a5fa;
    width: 0%;
}

.pp-done { background: rgba(96,165,250,.45) !important; }
.pp-done .pp-fill { width: 100%; }

#map-stage {
    border-radius: 22px;
    overflow: hidden;
    position: relative;
    background: #051525;
    border: 1px solid rgba(255,255,255,.1);
}

#map-svg {
    width: 100%;
    display: block;
}

/* Bigger Top Country Name Badge */
.map-badge {
    position: absolute;
    top: 1.1rem;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(5,21,37,0.95);
    border: 1px solid rgba(186,230,253,0.4);
    border-radius: 999px;
    padding: .65rem 1.6rem;
    font-size: 1.1rem;
    font-weight: 900;
    letter-spacing: .08em;
    text-transform: uppercase;
    color: #bae6fd;
    white-space: nowrap;
    opacity: 0;
    transition: all .5s ease;
    pointer-events: none;
    z-index: 10;
    box-shadow: 0 10px 35px rgba(0,0,0,0.5);
    text-shadow: 0 2px 8px rgba(0,0,0,0.6);
}

.map-badge.show { opacity: 1; }

@media (max-width: 900px) {
    .earth-wrap { grid-template-columns: 1fr; }
}
</style>

<div class="earth-wrap">
    <!-- LEFT PANEL -->
    <div>
        <p class="earth-kicker">Global Network</p>
        <h2 class="earth-title">From HQ to Regional Impact</h2>
        <p class="earth-desc">
            WePOWER connects World Bank headquarters in Washington DC through AIT Yunus Center as regional secretariat in Thailand, reaching seven partner countries across South Asia.
        </p>

        <div class="legend-block">
            <div class="legend-item">
                <div class="legend-dot" style="background:#facc15;box-shadow:0 0 0 3px rgba(250,204,21,.25)"></div>
                <span><strong>World Bank HQ</strong> — Washington, DC</span>
            </div>
            <div class="legend-item">
                <div class="legend-dot" style="background:#34d399;box-shadow:0 0 0 3px rgba(52,211,153,.25)"></div>
                <span><strong>AIT Yunus Center</strong> — Secretariat, Thailand</span>
            </div>
            <div class="legend-item">
                <div class="legend-dot" style="background:#60a5fa;box-shadow:0 0 0 3px rgba(96,165,250,.25)"></div>
                <span><strong>Partner countries</strong> — South Asia (7)</span>
            </div>
        </div>

        <div class="active-card">
            <div class="ac-label" id="acLabel">Loading</div>
            <div class="ac-name" id="acName">Initializing map…</div>
            <div class="ac-sub" id="acSub">Fetching high-resolution borders</div>
        </div>

        <div class="progress-pills" id="progressPills"></div>
    </div>

    <!-- MAP -->
    <div id="map-stage">
        <div class="map-badge" id="mapBadge">—</div>
        <svg id="map-svg" viewBox="0 0 960 540" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <filter id="glow-filter" x="-50%" y="-50%" width="200%" height="200%">
                    <feGaussianBlur stdDeviation="2.5" result="blur"/>
                    <feMerge><feMergeNode in="blur"/><feMergeNode in="SourceGraphic"/></feMerge>
                </filter>
            </defs>
            <rect width="960" height="540" fill="#051525"/>
            <g id="g-countries"></g>
            <g id="g-borders"></g>
            <g id="g-highlight-borders"></g>
            <g id="g-arcs"></g>
            <g id="g-nodes"></g>
            <g id="g-labels"></g>
        </svg>
    </div>
</div>

<!-- D3 + TopoJSON -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/7.8.5/d3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/topojson/3.0.2/topojson.min.js"></script>

<script>
(function() {

/* ── CONFIG ────────────────────────────────────────────── */
const W = 960, H = 540;
const COUNTRY_DURATION = 5000;

const NODES = {
    hq:  { lat: 38.9,   lon: -77.04, color: "#facc15", r: 7 },
    sec: { lat: 14.07,  lon: 100.61, color: "#34d399", r: 6 }
};

const PARTNERS = [
    { name:"Bangladesh", lat:23.69, lon:90.36,  text:"Key implementing partner — utilities and universities driving women's inclusion in the power sector." },
    { name:"Bhutan",     lat:27.51, lon:90.43,  text:"Partner focused on hydropower sector inclusion, with strong institutional commitment to gender targets." },
    { name:"India",      lat:20.59, lon:78.96,  text:"Largest partner network — spanning state utilities, engineering universities, and national policy bodies." },
    { name:"Maldives",   lat:4.18,  lon:73.51,  text:"Island-nation partner advancing women's roles in renewable energy and utilities management." },
    { name:"Nepal",      lat:28.39, lon:84.12,  text:"Partner building women's pathways in hydropower and rural electrification programs." },
    { name:"Pakistan",   lat:30.38, lon:69.35,  text:"Multi-institution partner with strong university and power utility engagement across provinces." },
    { name:"Sri Lanka",  lat:7.87,  lon:80.77,  text:"Partner advancing gender-responsive policy in the national utility and energy ministry." }
];

/* ISO 3166-1 numeric → display name mapping */
const ISO_MAP = {
    "840":"United States of America",
    "764":"Thailand",
    "050":"Bangladesh",
    "064":"Bhutan",
    "356":"India",
    "462":"Maldives",
    "524":"Nepal",
    "586":"Pakistan",
    "144":"Sri Lanka"
};

/* Role colors */
const ROLE_FILL = {
    "United States of America": "rgba(250,204,21,0.18)",
    "Thailand":                 "rgba(52,211,153,0.18)",
};
PARTNERS.forEach(p => { ROLE_FILL[p.name] = "rgba(96,165,250,0.10)"; });

const ROLE_STROKE = {
    "United States of America": "rgba(250,204,21,0.55)",
    "Thailand":                 "rgba(52,211,153,0.55)",
};
PARTNERS.forEach(p => { ROLE_STROKE[p.name] = "rgba(96,165,250,0.35)"; });

/* ── DOM refs ──────────────────────────────────────────── */
const acLabel  = document.getElementById("acLabel");
const acName   = document.getElementById("acName");
const acSub    = document.getElementById("acSub");
const badge    = document.getElementById("mapBadge");
const pillsBox = document.getElementById("progressPills");

function setCard(label, name, sub) {
    acLabel.textContent = label;
    acName.textContent  = name;
    acSub.textContent   = sub;
}

function showBadge(text) {
    badge.classList.remove("show");
    setTimeout(() => { badge.textContent = text; badge.classList.add("show"); }, 150);
}

function hideBadge() { badge.classList.remove("show"); }

/* progress pills */
const pills = [];
for (let i = 0; i < PARTNERS.length; i++) {
    const seg  = document.createElement("div"); seg.className = "pp-pill";
    const fill = document.createElement("div"); fill.className = "pp-fill";
    seg.appendChild(fill);
    pillsBox.appendChild(seg);
    pills.push({ seg, fill });
}

function animatePill(i) {
    pills[i].fill.style.transition = `width ${COUNTRY_DURATION}ms linear`;
    pills[i].fill.style.width = "100%";
    setTimeout(() => pills[i].seg.classList.add("pp-done"), COUNTRY_DURATION);
}

/* ── PROJECTION ────────────────────────────────────────── */
const projection = d3.geoNaturalEarth1()
    .scale(220)
    .translate([W / 2, H / 2 + 20]);

const geoPath = d3.geoPath().projection(projection);

function project(lat, lon) { return projection([lon, lat]); }

/* ── SVG groups ────────────────────────────────────────── */
const svg        = d3.select("#map-svg");
const gCountries = svg.select("#g-countries");
const gBorders   = svg.select("#g-borders");
const gHiBorders = svg.select("#g-highlight-borders");
const gArcs      = svg.select("#g-arcs");
const gNodes     = svg.select("#g-nodes");
const gLabels    = svg.select("#g-labels");

/* ── MAIN ──────────────────────────────────────────────── */
let started = false;

async function init() {
    let world110, world50;

    try {
        world110 = await d3.json("https://cdn.jsdelivr.net/npm/world-atlas@2/countries-110m.json");
    } catch(e) {
        console.warn("world-atlas 110m failed", e);
        setCard("Error", "Map data unavailable", "Please check your network connection.");
        return;
    }

    try {
        world50 = await d3.json("https://cdn.jsdelivr.net/npm/world-atlas@2/countries-50m.json");
    } catch(e) {
        world50 = world110;
    }

    const countries110 = topojson.feature(world110, world110.objects.countries);
    countries110.features.forEach(f => {
        const num = String(f.id).padStart(3, "0");
        f._name = ISO_MAP[num] || "";
    });

    gCountries.selectAll("path.c110")
        .data(countries110.features)
        .join("path")
        .attr("class", "c110")
        .attr("d", geoPath)
        .attr("fill", d => ROLE_FILL[d._name] || "#0b2035")
        .attr("stroke", d => ROLE_STROKE[d._name] || "rgba(255,255,255,0.05)")
        .attr("stroke-width", d => ROLE_STROKE[d._name] ? 0.7 : 0.25)
        .attr("data-name", d => d._name);

    const mesh110 = topojson.mesh(world110, world110.objects.countries, (a,b) => a !== b);
    gBorders.append("path")
        .attr("d", geoPath(mesh110))
        .attr("fill", "none")
        .attr("stroke", "rgba(255,255,255,0.07)")
        .attr("stroke-width", 0.3);

    const countries50 = topojson.feature(world50, world50.objects.countries);
    countries50.features.forEach(f => {
        const num = String(f.id).padStart(3, "0");
        f._name = ISO_MAP[num] || "";
    });

    const namedFeatures50 = countries50.features.filter(f => f._name);

    gHiBorders.selectAll("path.precise")
        .data(namedFeatures50)
        .join("path")
        .attr("class", "precise")
        .attr("d", geoPath)
        .attr("fill", d => ROLE_FILL[d._name] || "transparent")
        .attr("stroke", d => ROLE_STROKE[d._name] || "none")
        .attr("stroke-width", 0.9)
        .attr("stroke-linejoin", "round")
        .attr("data-name", d => d._name);

    setCard("Phase 01 — Headquarters", "Map loaded", "Starting journey in 1 second…");

    setTimeout(() => {
        startSequence(countries50, namedFeatures50);
    }, 1000);
}

function highlightCountry(name, fill, stroke, strokeW) {
    gHiBorders.selectAll("path.precise")
        .filter(d => d._name === name)
        .transition().duration(350)
        .attr("fill", fill)
        .attr("stroke", stroke)
        .attr("stroke-width", strokeW || 1.5);
    gCountries.selectAll("path.c110")
        .filter(d => d._name === name)
        .transition().duration(350)
        .attr("fill", fill)
        .attr("stroke", stroke)
        .attr("stroke-width", strokeW || 1.5);
}

function resetCountry(name) {
    const f  = ROLE_FILL[name]   || "transparent";
    const s  = ROLE_STROKE[name] || "none";
    gHiBorders.selectAll("path.precise")
        .filter(d => d._name === name)
        .transition().duration(500)
        .attr("fill", f)
        .attr("stroke", s)
        .attr("stroke-width", 0.9);
    gCountries.selectAll("path.c110")
        .filter(d => d._name === name)
        .transition().duration(500)
        .attr("fill", f)
        .attr("stroke", s)
        .attr("stroke-width", 0.7);
}

function drawNode(lat, lon, color, r) {
    const [x, y] = project(lat, lon);
    gNodes.append("circle")
        .attr("cx", x).attr("cy", y).attr("r", r + 7)
        .attr("fill", "none")
        .attr("stroke", color)
        .attr("stroke-width", 1)
        .attr("opacity", 0.3);
    gNodes.append("circle")
        .attr("cx", x).attr("cy", y).attr("r", r)
        .attr("fill", color)
        .attr("filter", "url(#glow-filter)");
}

function pulse(lat, lon, color) {
    const [x, y] = project(lat, lon);
    const c = gNodes.append("circle")
        .attr("cx", x).attr("cy", y).attr("r", 5)
        .attr("fill", "none")
        .attr("stroke", color)
        .attr("stroke-width", 1.8)
        .attr("opacity", 0.9);
    c.transition().duration(1500).attr("r", 22).attr("opacity", 0).remove();
}

function drawArc(fromLat, fromLon, toLat, toLon, color) {
    const p1 = project(fromLat, fromLon);
    const p2 = project(toLat, toLon);
    const mx = (p1[0] + p2[0]) / 2;
    const my = (p1[1] + p2[1]) / 2 - Math.hypot(p2[0]-p1[0], p2[1]-p1[1]) * 0.28;
    const d  = `M${p1[0]},${p1[1]} Q${mx},${my} ${p2[0]},${p2[1]}`;

    const arc = gArcs.append("path")
        .attr("d", d).attr("fill", "none")
        .attr("stroke", color).attr("stroke-width", 1.3)
        .attr("stroke-dasharray", "5 4")
        .attr("opacity", 0);
    arc.transition().duration(700).attr("opacity", 0.75);
}

function sleep(ms) { return new Promise(r => setTimeout(r, ms)); }

async function startSequence(countries50, namedFeatures50) {

    /* ── PHASE 1: HQ ── */
    setCard("Phase 01 — Headquarters", "World Bank HQ", "Washington, DC — Global coordination and funding hub");
    showBadge("World Bank HQ — Washington, DC");
    highlightCountry("United States of America", "rgba(250,204,21,0.55)", "#facc15", 1.8);
    drawNode(NODES.hq.lat, NODES.hq.lon, NODES.hq.color, NODES.hq.r);
    pulse(NODES.hq.lat, NODES.hq.lon, "#facc15");
    await sleep(700);
    pulse(NODES.hq.lat, NODES.hq.lon, "#facc15");

    await sleep(3200);

    /* ── PHASE 2: Secretariat ── */
    setCard("Phase 02 — Regional Secretariat", "AIT Yunus Center", "Thailand — Regional coordination and program management");
    showBadge("AIT Yunus Center — Thailand");
    highlightCountry("Thailand", "rgba(52,211,153,0.55)", "#34d399", 1.8);
    drawNode(NODES.sec.lat, NODES.sec.lon, NODES.sec.color, NODES.sec.r);
    drawArc(NODES.hq.lat, NODES.hq.lon, NODES.sec.lat, NODES.sec.lon, "#facc15");
    pulse(NODES.sec.lat, NODES.sec.lon, "#34d399");
    await sleep(700);
    pulse(NODES.sec.lat, NODES.sec.lon, "#34d399");

    await sleep(3200);

    /* ── PHASE 3: Partner countries ── */
    setCard("Phase 03 — Partner Countries", "South Asia Network", "7 partner countries — each spotlit for 5 seconds");
    showBadge("South Asia Partner Network");
    await sleep(1200);

    let prevName = null;

    for (let i = 0; i < PARTNERS.length; i++) {
        const p = PARTNERS[i];

        if (prevName) resetCountry(prevName);
        prevName = p.name;

        highlightCountry(p.name, "rgba(96,165,250,0.55)", "#60a5fa", 1.8);
        showBadge(p.name);                    // ← Big name on top only
        setCard(
            `Partner ${String(i+1).padStart(2,"0")} / ${PARTNERS.length}`,
            p.name,
            p.text
        );

        drawArc(NODES.sec.lat, NODES.sec.lon, p.lat, p.lon, "#34d399");

        const [px, py] = project(p.lat, p.lon);
        gNodes.append("circle")
            .attr("cx",px).attr("cy",py).attr("r",3.5)
            .attr("fill","#60a5fa")
            .attr("filter","url(#glow-filter)")
            .attr("opacity",0)
            .transition().duration(350).attr("opacity",1);
        gNodes.append("circle")
            .attr("cx",px).attr("cy",py).attr("r",9)
            .attr("fill","none")
            .attr("stroke","#60a5fa")
            .attr("stroke-width",0.9)
            .attr("opacity",0.45);

        // Removed addLabel() → No names near the map
        pulse(p.lat, p.lon, "#60a5fa");
        animatePill(i);

        await sleep(COUNTRY_DURATION);
        resetCountry(p.name);
    }

    /* ── FINAL: all lit up ── */
    hideBadge();
    setCard("Complete Network", "WePOWER Regional Map", "World Bank · AIT Yunus Center · 7 South Asia partner countries");

    highlightCountry("United States of America", "rgba(250,204,21,0.45)", "#facc15", 1.5);
    highlightCountry("Thailand",                 "rgba(52,211,153,0.45)",  "#34d399", 1.5);
    for (const p of PARTNERS) {
        highlightCountry(p.name, "rgba(96,165,250,0.32)", "rgba(96,165,250,0.7)", 1.2);
    }
    showBadge("Complete WePOWER Network");
}

/* ── INTERSECTION OBSERVER trigger ── */
const observer = new IntersectionObserver(entries => {
    if (!entries[0].isIntersecting || started) return;
    started = true;
    init();
}, { threshold: 0.2 });

observer.observe(document.getElementById("wepower-3d-earth"));

})();
</script>
</section> -->
<!-- ================= WHO WE ARE ================= -->
<section id="who-we-are" class="relative py-20 lg:py-28 bg-slate-100/60">
        @if(canEditCms())
        <div class="absolute top-6 right-6 z-[9999] flex gap-3">
            <button
                type="button"
                id="enableWhoEdit"
                class="px-5 py-2.5 rounded-xl bg-pink-brand border border-white/20 text-white font-semibold shadow-lg hover:bg-white/20 transition">
                Edit Who We Are
            </button>

            <button
                type="button"
                id="saveWhoEdit"
                class="hidden px-5 py-2.5 rounded-xl bg-cyan-brand text-white font-semibold shadow-2xl hover:scale-105 transition">
                Save Changes
            </button>

            <button
                type="button"
                id="cancelWhoEdit"
                class="hidden px-5 py-2.5 rounded-xl bg-white border border-slate-200 text-slate-700 font-semibold shadow-lg hover:bg-slate-100 transition">
                Cancel
            </button>



            <label
                id="whoImageUploadLabel"
                for="whoImageUpload"
                class="hidden px-5 py-2.5 rounded-xl bg-white border border-slate-200 text-slate-700 font-semibold shadow-lg hover:bg-slate-100 transition cursor-pointer">
                Change Image

                <input
                    type="file"
                    id="whoImageUpload"
                    accept="image/*"
                    class="hidden">
            </label>
        </div>
    @endif

    <div class="page-shell">

        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center mb-16">

            <div class="animate-on-scroll">
                <div class="rounded-3xl overflow-hidden shadow-xl">
                    <img
                        id="whoImage"
                        src="{{ asset(cms($cms, 'who_we_are', 'image', 'images/bg_group.jpeg')) }}"
                        alt="{{ cms($cms, 'who_we_are', 'image_alt', 'WePOWER network') }}"
                        class="w-full h-[420px] lg:h-[480px] object-cover">
                </div>
            </div>

            <div class="animate-on-scroll">
                <p
                    contenteditable="false"
                    data-section="who_we_are"
                    data-field="eyebrow"
                    class="cms-inline-edit text-sm uppercase tracking-[0.25em] text-cyan-brand mb-4">
                    {{ cms($cms, 'who_we_are', 'eyebrow', 'Who We Are') }}
                </p>

                <h2
                    contenteditable="false"
                    data-section="who_we_are"
                    data-field="title"
                    class="cms-inline-edit text-4xl sm:text-5xl lg:text-6xl font-bold text-slate-900 leading-tight mb-6">
                    {{ cms($cms, 'who_we_are', 'title', 'A Regional Network Advancing Women in the Power Sector') }}
                </h2>

                <p
                    contenteditable="false"
                    data-section="who_we_are"
                    data-field="paragraph_1"
                    class="cms-inline-edit text-lg text-slate-600 leading-relaxed mb-5">
                    {{ cms($cms, 'who_we_are', 'paragraph_1', 'WePOWER is the South Asia Women in Power Sector Professional Network, established in 2019 as a voluntary platform of utilities, universities, and professional associations. With 61 partners and growing, it works to increase women’s participation in energy-sector careers, especially in technical and leadership roles, through collaboration, research, and targeted initiatives supported by the World Bank’s South Asia Energy program.') }}
                </p>

                <p
                    contenteditable="false"
                    data-section="who_we_are"
                    data-field="paragraph_2"
                    class="cms-inline-edit text-lg text-slate-600 leading-relaxed">
                    {{ cms($cms, 'who_we_are', 'paragraph_2', 'The network operates through a data-driven approach, drawing on partner insights and regional assessments to address barriers to entry, retention, and advancement. Guided by a five-pillar framework spanning education, recruitment, professional development, retention, and policy reform, WePOWER supports coordinated action across countries, strengthening both regional collaboration and national-level impact.') }}
                </p>
            </div>
        </div>

    </div>
</section>

<!-- ================= WHY IT EXISTS ================= -->
<section id="why-exists" class="relative py-20 lg:py-28 bg-white">

    @if(canEditCms())
        <div class="absolute top-6 right-6 z-[9999] flex gap-3">
            <button type="button" id="enableWhyExistsEdit"
                class="px-5 py-2.5 rounded-xl bg-pink-brand border border-white/20 text-white font-semibold shadow-lg hover:bg-white/20 transition">
                Edit Why It Exists
            </button>

            <button type="button" id="saveWhyExistsEdit"
                class="hidden px-5 py-2.5 rounded-xl bg-cyan-brand text-white font-semibold shadow-2xl hover:scale-105 transition">
                Save Changes
            </button>

            <button type="button" id="cancelWhyExistsEdit"
                class="hidden px-5 py-2.5 rounded-xl bg-white border border-slate-200 text-slate-700 font-semibold shadow-lg hover:bg-slate-100 transition">
                Cancel
            </button>



            <label id="whyExistsImageUploadLabel" for="whyExistsImageUpload"
                class="hidden px-5 py-2.5 rounded-xl bg-white border border-slate-200 text-slate-700 font-semibold shadow-lg hover:bg-slate-100 transition cursor-pointer">
                Change Image
                <input type="file" id="whyExistsImageUpload" accept="image/*" class="hidden">
            </label>
        </div>
    @endif

    <div class="page-shell">
        <div class="grid lg:grid-cols-12 gap-16 lg:gap-20 items-start">

            <div class="lg:col-span-7">
                <div class="mb-12 animate-on-scroll">
                    <p contenteditable="false" data-section="why_exists" data-field="eyebrow"
                       class="cms-inline-edit text-sm uppercase tracking-[0.25em] text-pink-brand mb-4">
                        {{ cms($cms, 'why_exists', 'eyebrow', 'Why It Exists') }}
                    </p>

                    <h2 contenteditable="false" data-section="why_exists" data-field="title"
                        class="cms-inline-edit text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight text-slate-900">
                        {{ cms($cms, 'why_exists', 'title', 'Supporting Women Across the Full Energy Career Path') }}
                    </h2>

                    <p contenteditable="false" data-section="why_exists" data-field="description"
                       class="cms-inline-edit mt-6 text-lg text-slate-600 leading-relaxed">
                        {{ cms($cms, 'why_exists', 'description', 'WePOWER exists because improving women’s participation in the power sector requires more than one solution. It takes action across education, access to jobs, career development, and workplace systems.') }}
                    </p>
                </div>

                <div class="relative">
                    <div class="absolute left-8 top-10 bottom-8 w-1 bg-gradient-to-b from-pink-200 via-orange-200 via-cyan-200 to-pink-200 hidden lg:block"></div>

                    @php
                        $whyColors = [
                            ['bg-pink-100', 'text-pink-600'],
                            ['bg-orange-100', 'text-orange-600'],
                            ['bg-cyan-100', 'text-cyan-600'],
                            ['bg-pink-100', 'text-pink-600'],
                        ];
                    @endphp

                    @for($i = 1; $i <= 4; $i++)
                        <div class="relative flex gap-8 {{ $i < 4 ? 'mb-14' : '' }} animate-on-scroll"
                             style="transition-delay: {{ ($i - 1) * 0.08 }}s;">
                            <div class="flex-shrink-0">
                                <div contenteditable="false"
                                     data-section="why_exists"
                                     data-field="item_{{ $i }}_number"
                                     class="cms-inline-edit inline-flex h-14 w-14 items-center justify-center rounded-2xl {{ $whyColors[$i - 1][0] }} {{ $whyColors[$i - 1][1] }} text-xl font-bold z-10">
                                    {{ cms($cms, 'why_exists', "item_{$i}_number", '0' . $i) }}
                                </div>
                            </div>

                            <div class="pt-2">
                                <h3 contenteditable="false"
                                    data-section="why_exists"
                                    data-field="item_{{ $i }}_title"
                                    class="cms-inline-edit text-3xl font-semibold text-slate-900 mb-4">
                                    {{ cms($cms, 'why_exists', "item_{$i}_title") }}
                                </h3>

                                <p contenteditable="false"
                                   data-section="why_exists"
                                   data-field="item_{{ $i }}_text"
                                   class="cms-inline-edit text-slate-600 text-lg leading-relaxed">
                                    {{ cms($cms, 'why_exists', "item_{$i}_text") }}
                                </p>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <div class="lg:col-span-5 animate-on-scroll">
                <div class="lg:sticky lg:top-24">
                    <div class="aspect-[4/5] lg:h-[680px] bg-slate-100 rounded-3xl overflow-hidden shadow-2xl">
                        <img
                            id="whyExistsImage"
                            src="{{ asset(cms($cms, 'why_exists', 'image', 'images/bg_group.jpeg')) }}"
                            alt="{{ cms($cms, 'why_exists', 'image_alt', 'Women progressing through the energy career path - WePOWER') }}"
                            class="w-full h-full object-cover">
                    </div>

                    <p contenteditable="false"
                       data-section="why_exists"
                       data-field="image_caption"
                       class="cms-inline-edit mt-8 text-center text-sm text-slate-500 tracking-widest">
                        {{ cms($cms, 'why_exists', 'image_caption', 'ONE CONTINUOUS PATH — FROM INSPIRATION TO LEADERSHIP') }}
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ================= FRAMEWORK ================= -->
<section id="our-framework" class="relative py-20 lg:py-28 bg-slate-950 overflow-hidden">

    @if(canEditCms())
        <div class="absolute top-6 right-6 z-[9999] flex gap-3">
            <button
                type="button"
                id="enableFrameworkEdit"
                class="px-5 py-2.5 rounded-xl bg-pink-brand border border-white/20 text-white font-semibold shadow-lg hover:bg-white/20 transition">
                Edit Framework
            </button>

            <button
                type="button"
                id="saveFrameworkEdit"
                class="hidden px-5 py-2.5 rounded-xl bg-cyan-brand text-white font-semibold shadow-2xl hover:scale-105 transition">
                Save Changes
            </button>

            <button
                type="button"
                id="cancelFrameworkEdit"
                class="hidden px-5 py-2.5 rounded-xl bg-white border border-slate-200 text-slate-700 font-semibold shadow-lg hover:bg-slate-100 transition">
                Cancel
            </button>


        </div>
    @endif

    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(1,157,222,0.12),transparent_25%),radial-gradient(circle_at_bottom_right,rgba(243,22,113,0.12),transparent_25%)]"></div>

    <div class="relative z-10 page-shell">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <p
                contenteditable="false"
                data-section="framework"
                data-field="eyebrow"
                class="cms-inline-edit text-sm uppercase tracking-[0.25em] text-cyan-300 mb-4 animate-on-scroll">
                {{ cms($cms, 'framework', 'eyebrow', 'Our Framework') }}
            </p>

            <h2
                contenteditable="false"
                data-section="framework"
                data-field="title"
                class="cms-inline-edit text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-5 animate-on-scroll">
                {{ cms($cms, 'framework', 'title', 'The Five Pillars of WePOWER') }}
            </h2>

            <p
                contenteditable="false"
                data-section="framework"
                data-field="description"
                class="cms-inline-edit text-lg sm:text-xl text-white/70 leading-relaxed animate-on-scroll">
                {{ cms($cms, 'framework', 'description', 'WePOWER’s work is organized around five connected pillars that move from entry and access to retention, leadership, and institutional change.') }}
            </p>
        </div>

        <div class="grid md:grid-cols-2 xl:grid-cols-5 gap-8">

            @php
                $pillarColors = [
                    'bg-pink-brand',
                    'bg-orange-brand',
                    'bg-cyan-brand',
                    'bg-pink-brand',
                    'bg-orange-brand',
                ];
            @endphp

            @for($i = 1; $i <= 5; $i++)
                <div class="relative glass-card rounded-3xl p-7 pt-10 card-hover animate-on-scroll text-white"
                     style="transition-delay: {{ ($i - 1) * 0.08 }}s;">

                    <div
                        contenteditable="false"
                        data-section="framework"
                        data-field="pillar_{{ $i }}_letter"
                        class="cms-inline-edit absolute -top-4 left-6 w-10 h-10 rounded-xl {{ $pillarColors[$i - 1] }} flex items-center justify-center font-bold">
                        {{ cms($cms, 'framework', "pillar_{$i}_letter") }}
                    </div>

                    <h3
                        contenteditable="false"
                        data-section="framework"
                        data-field="pillar_{{ $i }}_title"
                        class="cms-inline-edit text-xl font-bold mb-3">
                        {{ cms($cms, 'framework', "pillar_{$i}_title") }}
                    </h3>

                    <p
                        contenteditable="false"
                        data-section="framework"
                        data-field="pillar_{{ $i }}_text"
                        class="cms-inline-edit text-white/75 text-sm">
                        {{ cms($cms, 'framework', "pillar_{$i}_text") }}
                    </p>
                </div>
            @endfor

        </div>
    </div>
</section>
<!-- ================= HOW IT WORKS ================= -->
<section id="how-it-works" class="relative py-20 lg:py-28 bg-white">

    @if(canEditCms())
        <div class="absolute top-6 right-6 z-[9999] flex gap-3">
            <button
                type="button"
                id="enableHowEdit"
                class="px-5 py-2.5 rounded-xl bg-pink-brand border border-white/20 text-white font-semibold shadow-lg hover:bg-white/20 transition">
                Edit How It Works
            </button>

            <button
                type="button"
                id="saveHowEdit"
                class="hidden px-5 py-2.5 rounded-xl bg-cyan-brand text-white font-semibold shadow-2xl hover:scale-105 transition">
                Save Changes
            </button>

            <button
                type="button"
                id="cancelHowEdit"
                class="hidden px-5 py-2.5 rounded-xl bg-white border border-slate-200 text-slate-700 font-semibold shadow-lg hover:bg-slate-100 transition">
                Cancel
            </button>



            <label
                id="howImageUploadLabel"
                for="howImageUpload"
                class="hidden px-5 py-2.5 rounded-xl bg-white border border-slate-200 text-slate-700 font-semibold shadow-lg hover:bg-slate-100 transition cursor-pointer">
                Change Image

                <input
                    type="file"
                    id="howImageUpload"
                    accept="image/*"
                    class="hidden">
            </label>
        </div>
    @endif

    <div class="page-shell">
        <div class="grid lg:grid-cols-2 gap-14 items-start">

            <div>
                <p
                    contenteditable="false"
                    data-section="how_it_works"
                    data-field="eyebrow"
                    class="cms-inline-edit text-sm uppercase tracking-[0.25em] text-orange-brand mb-4 animate-on-scroll">
                    {{ cms($cms, 'how_it_works', 'eyebrow', 'How It Works') }}
                </p>

                <h2
                    contenteditable="false"
                    data-section="how_it_works"
                    data-field="title"
                    class="cms-inline-edit text-4xl sm:text-5xl lg:text-6xl font-bold text-slate-900 mb-6 animate-on-scroll">
                    {{ cms($cms, 'how_it_works', 'title', 'A Network Built on Partners, Evidence, and Action') }}
                </h2>

                <p
                    contenteditable="false"
                    data-section="how_it_works"
                    data-field="description"
                    class="cms-inline-edit text-lg text-slate-600 leading-relaxed mb-6 animate-on-scroll"
                    style="transition-delay: 0.1s;">
                    {{ cms($cms, 'how_it_works', 'description', 'WePOWER’s model is collaborative. It combines research, local engagement, peer learning, and structured partner activities to turn ideas into measurable action.') }}
                </p>

                <div class="space-y-5">

                    @php
                        $howStepColors = [
                            ['bg-pink-100', 'text-pink-600'],
                            ['bg-cyan-100', 'text-cyan-700'],
                            ['bg-orange-100', 'text-orange-700'],
                            ['bg-pink-100', 'text-pink-600'],
                        ];
                    @endphp

                    @for($i = 1; $i <= 4; $i++)
                        <div class="flex gap-4 animate-on-scroll"
                             style="transition-delay: {{ 0.08 + ($i * 0.06) }}s;">

                            <div
                                contenteditable="false"
                                data-section="how_it_works"
                                data-field="step_{{ $i }}_number"
                                class="cms-inline-edit w-12 h-12 rounded-2xl {{ $howStepColors[$i - 1][0] }} {{ $howStepColors[$i - 1][1] }} flex items-center justify-center font-bold shrink-0">
                                {{ cms($cms, 'how_it_works', "step_{$i}_number", '0' . $i) }}
                            </div>

                            <div>
                                <h3
                                    contenteditable="false"
                                    data-section="how_it_works"
                                    data-field="step_{{ $i }}_title"
                                    class="cms-inline-edit text-xl font-bold text-slate-900 mb-1">
                                    {{ cms($cms, 'how_it_works', "step_{$i}_title") }}
                                </h3>

                                <p
                                    contenteditable="false"
                                    data-section="how_it_works"
                                    data-field="step_{{ $i }}_text"
                                    class="cms-inline-edit text-slate-600 leading-relaxed">
                                    {{ cms($cms, 'how_it_works', "step_{$i}_text") }}
                                </p>
                            </div>
                        </div>
                    @endfor

                </div>
            </div>

            <div class="animate-on-scroll flex items-center h-full">
                <div class="w-full overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-2xl">

                    <!-- top image -->
                    <div class="relative h-40 sm:h-48 overflow-hidden">
                        <img
                            id="howImage"
                            src="{{ asset(cms($cms, 'how_it_works', 'image', 'images/bgg.jpeg')) }}"
                            alt="{{ cms($cms, 'how_it_works', 'image_alt', 'Women in energy') }}"
                            class="w-full h-full object-cover">

                        <div class="absolute inset-0.2 bg-gradient-to-t from-white via-white/30 to-transparent"></div>
                    </div>

                    <!-- content -->
                    <div class="p-8 sm:p-10 -mt-2 relative z-10">
                        <h3
                            contenteditable="false"
                            data-section="how_it_works"
                            data-field="card_title"
                            class="cms-inline-edit text-2xl font-bold text-slate-900 mb-6">
                            {{ cms($cms, 'how_it_works', 'card_title', 'What makes the approach different') }}
                        </h3>

                        <div class="space-y-5">
                            @for($i = 1; $i <= 4; $i++)
                                <div class="{{ $i < 4 ? 'pb-5 border-b border-slate-200' : '' }}">
                                    <p
                                        contenteditable="false"
                                        data-section="how_it_works"
                                        data-field="feature_{{ $i }}_title"
                                        class="cms-inline-edit text-lg font-semibold text-slate-900">
                                        {{ cms($cms, 'how_it_works', "feature_{$i}_title") }}
                                    </p>

                                    <p
                                        contenteditable="false"
                                        data-section="how_it_works"
                                        data-field="feature_{{ $i }}_text"
                                        class="cms-inline-edit text-slate-600 mt-1">
                                        {{ cms($cms, 'how_it_works', "feature_{$i}_text") }}
                                    </p>
                                </div>
                            @endfor
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>



<script>
/*
|--------------------------------------------------------------------------
| Inline CMS editor with Cancel + delayed media save
|--------------------------------------------------------------------------
| Text changes are saved only when Save Changes is clicked.
| Image changes are previewed first and uploaded only when Save Changes is clicked.
| Cancel restores original text and original image without saving anything.
*/

function setupInlineCmsSection(config) {
    const fields = document.querySelectorAll(config.selector);
    const enableBtn = document.getElementById(config.enableBtnId);
    const saveBtn = document.getElementById(config.saveBtnId);
    const cancelBtn = document.getElementById(config.cancelBtnId);

    const imageLabel = config.image ? document.getElementById(config.image.labelId) : null;
    const imageInput = config.image ? document.getElementById(config.image.inputId) : null;
    const imageEl = config.image ? document.getElementById(config.image.imageId) : null;

    if (!enableBtn || !saveBtn || !cancelBtn) return;

    let originalValues = {};
    let originalImageSrc = null;
    let selectedImageFile = null;
    let previewUrl = null;

    function setEditing(isEditing) {
        fields.forEach((el) => {
            el.setAttribute('contenteditable', isEditing ? 'true' : 'false');
            el.classList.toggle('cms-editable-active', isEditing);
        });

        if (imageLabel) {
            imageLabel.classList.toggle('hidden', !isEditing);
        }

        enableBtn.classList.toggle('hidden', isEditing);
        saveBtn.classList.toggle('hidden', !isEditing);
        cancelBtn.classList.toggle('hidden', !isEditing);
    }

    function clearPreviewUrl() {
        if (previewUrl) {
            URL.revokeObjectURL(previewUrl);
            previewUrl = null;
        }
    }

    function resetSelectedImage() {
        selectedImageFile = null;
        clearPreviewUrl();

        if (imageInput) {
            imageInput.value = '';
        }
    }

    fields.forEach((el) => {
        el.setAttribute('contenteditable', 'false');
    });

    enableBtn.addEventListener('click', () => {
        originalValues = {};

        fields.forEach((el) => {
            const key = `${el.dataset.section}.${el.dataset.field}`;
            originalValues[key] = el.innerText;
        });

        originalImageSrc = imageEl ? imageEl.src : null;
        resetSelectedImage();
        setEditing(true);
    });

    cancelBtn.addEventListener('click', () => {
        fields.forEach((el) => {
            const key = `${el.dataset.section}.${el.dataset.field}`;
            if (Object.prototype.hasOwnProperty.call(originalValues, key)) {
                el.innerText = originalValues[key];
            }
        });

        if (imageEl && originalImageSrc) {
            imageEl.src = originalImageSrc;
        }

        resetSelectedImage();
        saveBtn.innerText = 'Save Changes';
        setEditing(false);
    });

    if (imageInput && imageEl) {
        imageInput.addEventListener('change', () => {
            const file = imageInput.files[0];
            if (!file) return;

            selectedImageFile = file;
            clearPreviewUrl();

            previewUrl = URL.createObjectURL(file);
            imageEl.src = previewUrl;
        });
    }

    saveBtn.addEventListener('click', async () => {
        saveBtn.innerText = 'Saving...';

        for (const el of fields) {
            const response = await fetch("{{ route('cms.inline.update') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    page_id: "{{ $page->id }}",
                    section: el.dataset.section,
                    field: el.dataset.field,
                    value: el.innerText.trim()
                })
            });

            if (!response.ok) {
                let error = {};
                try {
                    error = await response.json();
                } catch (e) {}

                console.log(error);
                saveBtn.innerText = error.message ?? 'Save Failed';
                return;
            }
        }

        if (config.image && selectedImageFile) {
            const formData = new FormData();

            formData.append('page_id', "{{ $page->id }}");
            formData.append('section', config.image.section);
            formData.append('field', config.image.field);
            formData.append('image', selectedImageFile);

            const imageResponse = await fetch("{{ route('cms.inline.image.update') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: formData
            });

            const imageData = await imageResponse.json();

            if (imageResponse.ok && imageData.success) {
                clearPreviewUrl();
                imageEl.src = imageData.path;
                originalImageSrc = imageData.path;
                selectedImageFile = null;

                if (imageInput) {
                    imageInput.value = '';
                }
            } else {
                alert(imageData.message ?? 'Image upload failed');
                saveBtn.innerText = 'Save Failed';
                return;
            }
        }

        fields.forEach((el) => {
            el.setAttribute('contenteditable', 'false');
            el.classList.remove('cms-editable-active');
        });

        saveBtn.innerText = 'Saved ✓';

        setTimeout(() => {
            saveBtn.innerText = 'Save Changes';
            setEditing(false);
        }, 1200);
    });
}

setupInlineCmsSection({
    selector: '#aboutHero .cms-inline-edit',
    enableBtnId: 'enableAboutHeroEdit',
    saveBtnId: 'saveAboutHeroEdit',
    cancelBtnId: 'cancelAboutHeroEdit',
    image: {
        labelId: 'aboutHeroImageUploadLabel',
        inputId: 'aboutHeroImageUpload',
        imageId: 'aboutHeroImage',
        section: 'about_hero',
        field: 'image'
    }
});

setupInlineCmsSection({
    selector: '#who-we-are .cms-inline-edit',
    enableBtnId: 'enableWhoEdit',
    saveBtnId: 'saveWhoEdit',
    cancelBtnId: 'cancelWhoEdit',
    image: {
        labelId: 'whoImageUploadLabel',
        inputId: 'whoImageUpload',
        imageId: 'whoImage',
        section: 'who_we_are',
        field: 'image'
    }
});

setupInlineCmsSection({
    selector: '#why-exists .cms-inline-edit',
    enableBtnId: 'enableWhyExistsEdit',
    saveBtnId: 'saveWhyExistsEdit',
    cancelBtnId: 'cancelWhyExistsEdit',
    image: {
        labelId: 'whyExistsImageUploadLabel',
        inputId: 'whyExistsImageUpload',
        imageId: 'whyExistsImage',
        section: 'why_exists',
        field: 'image'
    }
});

setupInlineCmsSection({
    selector: '#our-framework .cms-inline-edit',
    enableBtnId: 'enableFrameworkEdit',
    saveBtnId: 'saveFrameworkEdit',
    cancelBtnId: 'cancelFrameworkEdit'
});

setupInlineCmsSection({
    selector: '#how-it-works .cms-inline-edit',
    enableBtnId: 'enableHowEdit',
    saveBtnId: 'saveHowEdit',
    cancelBtnId: 'cancelHowEdit',
    image: {
        labelId: 'howImageUploadLabel',
        inputId: 'howImageUpload',
        imageId: 'howImage',
        section: 'how_it_works',
        field: 'image'
    }
});
setupInlineCmsSection({
    selector: '#about-yca .cms-inline-edit',
    enableBtnId: 'enableYcaEdit',
    saveBtnId: 'saveYcaEdit',
    cancelBtnId: 'cancelYcaEdit',
    image: {
        labelId: 'ycaImageUploadLabel',
        inputId: 'ycaImageUpload',
        imageId: 'ycaImage',
        section: 'about_yca',
        field: 'image'
    }
});

/*
|--------------------------------------------------------------------------
| Smooth scroll
|--------------------------------------------------------------------------
*/
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        const target = document.querySelector(this.getAttribute('href'));

        if (target) {
            e.preventDefault();
            target.scrollIntoView({ behavior: 'smooth' });
        }
    });
});

/*
|--------------------------------------------------------------------------
| Scroll animation observer
|--------------------------------------------------------------------------
*/
document.addEventListener('DOMContentLoaded', function () {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.12 });

    document.querySelectorAll('.animate-on-scroll').forEach((el) => {
        observer.observe(el);
    });
});
</script>

@endsection