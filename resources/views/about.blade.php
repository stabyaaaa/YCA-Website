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

<!-- ================= WHO WE ARE ================= -->
<section id="who-we-are" class="relative py-20 lg:py-28 bg-white">

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