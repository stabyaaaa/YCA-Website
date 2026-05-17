@extends('layouts.app')

@section('title', $page->title ?? 'Home')

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

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(50px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes heroZoom {
        from { transform: scale(1.05); }
        to { transform: scale(1); }
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
}
    .cms-inline-edit {
        transition: all 0.25s ease;
        border-radius: 8px;
    }

    .cms-editable-active {
        outline: 2px dashed rgba(255,255,255,0.55);
        outline-offset: 6px;
        cursor: text;
        background: rgba(255,255,255,0.06);
    }

    .cms-editable-active:focus {
        outline: 2px solid #019DDE;
        background: rgba(1,157,222,0.16);
    }

</style>

<!-- HERO -->
<section id="hero" class="relative min-h-screen flex items-center overflow-hidden">

    @if(canEditCms())
        <div class="absolute top-6 right-6 z-[9999] flex gap-3">

            <button
                type="button"
                id="enableHeroEdit"
                class="px-5 py-2.5 rounded-xl bg-white/10 backdrop-blur-xl bg-pink-brand border border-white/20 text-white font-semibold shadow-lg hover:bg-white/20 transition">
                Edit Hero
            </button>

            <button
                type="button"
                id="saveHeroEdit"
                class="hidden px-5 py-2.5 rounded-xl bg-cyan-brand text-white font-semibold shadow-2xl hover:scale-105 transition">
                Save Changes
            </button>

            <button
                type="button"
                id="cancelHeroEdit"
                class="hidden px-5 py-2.5 rounded-xl bg-white border border-slate-200 text-slate-700 font-semibold shadow-lg hover:bg-slate-100 transition">
                Cancel
            </button>

            <label
                id="heroImageUploadLabel"
                class="hidden px-5 py-2.5 rounded-xl bg-white/10 backdrop-blur-xl border border-white/20 text-white font-semibold shadow-2xl hover:bg-white/20 transition cursor-pointer">
                Change Image

                <input
                    type="file"
                    id="heroImageUpload"
                    accept="image/*"
                    class="hidden">
            </label>

        </div>
    @endif

    <div class="absolute inset-0">
        <img id="heroBackgroundImage"
            src="{{ asset(cms($cms, 'hero', 'background_image', 'images/bgg.jpeg')) }}"
            class="w-full h-full object-cover scale-105 animate-hero-zoom"
            alt="{{ cms($cms, 'hero', 'image_alt', 'Women in the South Asia power sector') }}">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/85 via-slate-900/70 to-slate-900/45"></div>
    </div>

    <div class="absolute top-24 left-10 w-72 h-72 rounded-full blur-3xl"
         style="background-color: rgba(1, 157, 222, 0.22);"></div>

    <div class="absolute bottom-20 right-10 w-96 h-96 rounded-full blur-3xl"
         style="background-color: rgba(243, 22, 113, 0.16);"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 py-32 grid md:grid-cols-2 gap-16 items-center">

        <div class="text-white space-y-8 animate-fade-up">

            <div class="text-left mb-12 lg:mb-14 ml-2">
                <p
                    contenteditable="{{ canEditCms() ? 'true' : 'false' }}"
                    data-section="hero"
                    data-field="eyebrow"
                    class="cms-inline-edit text-xl uppercase tracking-[0.3em] text-[#d97706] font-semibold mb-4 animate-on-scroll"
                >{{ cms($cms, 'hero', 'eyebrow', 'Impact Since 2019') }}</p>
            </div>

            <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold leading-tight">
                <span
                    contenteditable="{{ canEditCms() ? 'true' : 'false' }}"
                    data-section="hero"
                    data-field="title"
                    class="cms-inline-edit {{ canEditCms() ? 'cms-editable' : '' }}"
                >{{ cms($cms, 'hero', 'title', 'Main Streaming Women Professionals') }}</span>

                <span
                    contenteditable="{{ canEditCms() ? 'true' : 'false' }}"
                    data-section="hero"
                    data-field="highlight"
                    class="cms-inline-edit {{ canEditCms() ? 'cms-editable' : '' }} text-cyan-brand"
                >{{ cms($cms, 'hero', 'highlight', 'Through Partnership') }}</span>
            </h1>

            <p
                contenteditable="{{ canEditCms() ? 'true' : 'false' }}"
                data-section="hero"
                data-field="description"
                class="cms-inline-edit {{ canEditCms() ? 'cms-editable' : '' }} text-xl md:text-2xl text-gray-200 max-w-2xl leading-relaxed"
            >{{ cms($cms, 'hero', 'description', 'A collaborative initiative advancing women’s participation, inclusive workforce development, and sustainable growth across South Asia') }}</p>

            <div class="flex flex-wrap gap-6 pt-4">
                <a href="{{ cms($cms, 'hero', 'primary_button_link', '#insights') }}"
                   class="px-8 py-4 bg-pink-brand hover:opacity-90 text-white rounded-xl font-semibold text-lg shadow-xl transition transform hover:scale-105">
                    <span
                        contenteditable="{{ canEditCms() ? 'true' : 'false' }}"
                        data-section="hero"
                        data-field="primary_button_text"
                        class="cms-inline-edit {{ canEditCms() ? 'cms-editable' : '' }}"
                    >{{ cms($cms, 'hero', 'primary_button_text', 'Explore Insights →') }}</span>
                </a>

                <a href="{{ cms($cms, 'hero', 'secondary_button_link', '#report') }}"
                   class="px-8 py-4 border border-white/40 text-white rounded-xl font-semibold text-lg backdrop-blur hover:bg-white/10 transition">
                    <span
                        contenteditable="{{ canEditCms() ? 'true' : 'false' }}"
                        data-section="hero"
                        data-field="secondary_button_text"
                        class="cms-inline-edit {{ canEditCms() ? 'cms-editable' : '' }}"
                    >{{ cms($cms, 'hero', 'secondary_button_text', 'Read Full Report') }}</span>
                </a>
            </div>
        </div>

        <div class="hidden md:block animate-fade-up-delay">
            <div class="backdrop-blur-2xl bg-white/10 border border-white/20 rounded-3xl p-10 shadow-2xl text-white transition duration-500">

                <h3
                    contenteditable="{{ canEditCms() ? 'true' : 'false' }}"
                    data-section="hero_card"
                    data-field="title"
                    class="cms-inline-edit {{ canEditCms() ? 'cms-editable' : '' }} text-2xl font-bold mb-8 flex items-center gap-3"
                >{{ cms($cms, 'hero_card', 'title', 'Key Findings from the Gender Assessment 2024-2025') }}</h3>

                <div class="space-y-6 text-lg">
                    @for($i = 1; $i <= 4; $i++)
                        <div class="flex items-start gap-4">
                            <span
                                contenteditable="{{ canEditCms() ? 'true' : 'false' }}"
                                data-section="hero_card"
                                data-field="item_{{ $i }}_number"
                                class="cms-inline-edit {{ canEditCms() ? 'cms-editable' : '' }} w-10 h-10 flex items-center justify-center rounded-full font-bold text-cyan-200"
                                style="background-color: rgba(1, 157, 222, 0.22);"
                            >{{ cms($cms, 'hero_card', "item_{$i}_number") }}</span>

                            <div>
                                <p
                                    contenteditable="{{ canEditCms() ? 'true' : 'false' }}"
                                    data-section="hero_card"
                                    data-field="item_{{ $i }}_title"
                                    class="cms-inline-edit {{ canEditCms() ? 'cms-editable' : '' }} font-semibold"
                                >{{ cms($cms, 'hero_card', "item_{$i}_title") }}</p>

                                <p
                                    contenteditable="{{ canEditCms() ? 'true' : 'false' }}"
                                    data-section="hero_card"
                                    data-field="item_{{ $i }}_text"
                                    class="cms-inline-edit {{ canEditCms() ? 'cms-editable' : '' }} text-white/70 text-sm mt-1"
                                >{{ cms($cms, 'hero_card', "item_{$i}_text") }}</p>
                            </div>
                        </div>
                    @endfor
                </div>

            </div>
        </div>

    </div>
</section>
<!-- STATS STRIP -->
<section id="insights" class="relative py-10 lg:py-14 bg-slate-950">

    @if(canEditCms())
        <div class="absolute top-6 right-6 z-[9999] flex gap-3">
            <button
                type="button"
                id="enableStatsEdit"
                class="px-5 py-2.5 rounded-xl bg-pink-brand border border-white/20 text-white font-semibold shadow-lg hover:bg-white/20 transition">
                Edit Stats
            </button>

            <button
                type="button"
                id="saveStatsEdit"
                class="hidden px-5 py-2.5 rounded-xl bg-cyan-brand text-white font-semibold shadow-2xl hover:scale-105 transition">
                Save Changes
            </button>

            <button
                type="button"
                id="cancelStatsEdit"
                class="hidden px-5 py-2.5 rounded-xl bg-white border border-slate-200 text-slate-700 font-semibold shadow-lg hover:bg-slate-100 transition">
                Cancel
            </button>
        </div>
    @endif

    <div class="max-w-7xl mx-auto px-6">
        <div class="grid sm:grid-cols-2 xl:grid-cols-4 gap-5">

            @php
                $numberColors = [
                    'text-pink-brand',
                    'text-cyan-brand',
                    'text-orange-brand',
                    'text-pink-brand',
                ];
            @endphp

            @for($i = 1; $i <= 4; $i++)
                <div
                    class="rounded-3xl p-6 bg-white/5 border border-white/10 backdrop-blur-xl animate-on-scroll"
                    style="transition-delay: {{ ($i - 1) * 0.1 }}s;"
                >
                    <p
                        contenteditable="false"
                        data-section="stats"
                        data-field="stat_{{ $i }}_label"
                        class="cms-inline-edit text-sm uppercase tracking-[0.2em] text-white/50 mb-3"
                    >{{ cms($cms, 'stats', "stat_{$i}_label") }}</p>

                    <h3
                        contenteditable="false"
                        data-section="stats"
                        data-field="stat_{{ $i }}_number"
                        class="cms-inline-edit text-4xl font-extrabold mb-2 {{ $numberColors[$i - 1] }}"
                    >{{ cms($cms, 'stats', "stat_{$i}_number") }}</h3>

                    <p
                        contenteditable="false"
                        data-section="stats"
                        data-field="stat_{{ $i }}_text"
                        class="cms-inline-edit text-white/70 leading-relaxed"
                    >{{ cms($cms, 'stats', "stat_{$i}_text") }}</p>
                </div>
            @endfor

        </div>
    </div>
</section>

<!-- ================= WHY IT MATTERS (COMPACT) ================= -->
<section id="about" class="relative overflow-hidden bg-[#f8f4ee] py-16 lg:py-20">

    @if(canEditCms())
        <div class="absolute top-6 right-6 z-[9999] flex gap-3">
            <button
                type="button"
                id="enableWhyEdit"
                class="px-5 py-2.5 rounded-xl bg-pink-brand border border-white/20 text-white font-semibold shadow-lg hover:bg-white/20 transition">
                Edit Why
            </button>

            <button
                type="button"
                id="saveWhyEdit"
                class="hidden px-5 py-2.5 rounded-xl bg-cyan-brand text-white font-semibold shadow-2xl hover:scale-105 transition">
                Save Changes
            </button>

            <button
                type="button"
                id="cancelWhyEdit"
                class="hidden px-5 py-2.5 rounded-xl bg-white border border-slate-200 text-slate-700 font-semibold shadow-lg hover:bg-slate-100 transition">
                Cancel
            </button>
        </div>
    @endif

    <!-- Background -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 left-0 w-full h-40 bg-gradient-to-b from-[#f3e8ff]/60 to-transparent"></div>
        <div class="absolute -top-16 right-[-6rem] w-72 h-72 rounded-full bg-pink-200/20 blur-3xl"></div>
        <div class="absolute bottom-[-5rem] left-[-5rem] w-64 h-64 rounded-full bg-sky-200/20 blur-3xl"></div>
    </div>

    <div class="relative max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="text-center mb-12 lg:mb-14">

            <p
                contenteditable="false"
                data-section="why"
                data-field="eyebrow"
                class="cms-inline-edit text-xs uppercase tracking-[0.3em] text-[#d97706] font-semibold mb-4 animate-on-scroll"
            >
                {{ cms($cms, 'why', 'eyebrow', 'Why This Matters') }}
            </p>

            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-tight text-slate-900 animate-on-scroll">

                <span
                    contenteditable="false"
                    data-section="why"
                    data-field="title_line_1"
                    class="cms-inline-edit inline-block"
                >
                    {{ cms($cms, 'why', 'title_line_1', 'Progress Is Real') }}
                </span>

                <span
                    contenteditable="false"
                    data-section="why"
                    data-field="title_line_2"
                    class="cms-inline-edit block text-[#db2777] mt-1"
                >
                    {{ cms($cms, 'why', 'title_line_2', 'But Uneven') }}
                </span>

            </h2>

            <p
                contenteditable="false"
                data-section="why"
                data-field="description"
                class="cms-inline-edit mt-5 max-w-3xl mx-auto text-base sm:text-lg text-slate-700 leading-relaxed animate-on-scroll"
            >
                {{ cms($cms, 'why', 'description') }}
            </p>
        </div>

        <!-- Compact strips -->
        <div class="space-y-5">

            <!-- Strip 1 -->
            <div class="rounded-2xl bg-white shadow-md overflow-hidden animate-on-scroll">
                <div class="grid lg:grid-cols-[1fr_1.4fr]">

                    <div class="bg-[#0f172a] text-white p-6 lg:p-8">

                        <p
                            contenteditable="false"
                            data-section="why"
                            data-field="strip_1_label"
                            class="cms-inline-edit text-xs uppercase tracking-[0.25em] text-cyan-300 mb-2"
                        >
                            {{ cms($cms, 'why', 'strip_1_label') }}
                        </p>

                        <h3
                            contenteditable="false"
                            data-section="why"
                            data-field="strip_1_title"
                            class="cms-inline-edit text-xl sm:text-2xl lg:text-3xl font-bold"
                        >
                            {{ cms($cms, 'why', 'strip_1_title') }}
                        </h3>
                    </div>

                    <div class="p-6 lg:p-8 bg-gradient-to-r from-cyan-50 to-white flex items-center gap-4">

                        <div
                            contenteditable="false"
                            data-section="why"
                            data-field="strip_1_icon"
                            class="cms-inline-edit text-3xl sm:text-4xl"
                        >
                            {{ cms($cms, 'why', 'strip_1_icon') }}
                        </div>

                        <p
                            contenteditable="false"
                            data-section="why"
                            data-field="strip_1_text"
                            class="cms-inline-edit text-sm sm:text-base text-slate-700 leading-relaxed"
                        >
                            {{ cms($cms, 'why', 'strip_1_text') }}
                        </p>
                    </div>

                </div>
            </div>

            <!-- Strip 2 -->
            <div class="rounded-2xl bg-white shadow-md overflow-hidden animate-on-scroll" style="transition-delay: 0.1s;">
                <div class="grid lg:grid-cols-[1.4fr_1fr]">

                    <div class="p-6 lg:p-8 bg-gradient-to-r from-orange-50 to-white flex items-center gap-4 order-2 lg:order-1">

                        <div
                            contenteditable="false"
                            data-section="why"
                            data-field="strip_2_icon"
                            class="cms-inline-edit text-3xl sm:text-4xl"
                        >
                            {{ cms($cms, 'why', 'strip_2_icon') }}
                        </div>

                        <p
                            contenteditable="false"
                            data-section="why"
                            data-field="strip_2_text"
                            class="cms-inline-edit text-sm sm:text-base text-slate-700 leading-relaxed"
                        >
                            {{ cms($cms, 'why', 'strip_2_text') }}
                        </p>
                    </div>

                    <div class="bg-[#7c2d12] text-white p-6 lg:p-8 order-1 lg:order-2">

                        <p
                            contenteditable="false"
                            data-section="why"
                            data-field="strip_2_label"
                            class="cms-inline-edit text-xs uppercase tracking-[0.25em] text-orange-200 mb-2"
                        >
                            {{ cms($cms, 'why', 'strip_2_label') }}
                        </p>

                        <h3
                            contenteditable="false"
                            data-section="why"
                            data-field="strip_2_title"
                            class="cms-inline-edit text-xl sm:text-2xl lg:text-3xl font-bold"
                        >
                            {{ cms($cms, 'why', 'strip_2_title') }}
                        </h3>
                    </div>

                </div>
            </div>

            <!-- Strip 3 -->
            <div class="rounded-2xl bg-white shadow-md overflow-hidden animate-on-scroll" style="transition-delay: 0.2s;">
                <div class="grid lg:grid-cols-[1fr_1.4fr]">

                    <div class="bg-[#4c1d95] text-white p-6 lg:p-8">

                        <p
                            contenteditable="false"
                            data-section="why"
                            data-field="strip_3_label"
                            class="cms-inline-edit text-xs uppercase tracking-[0.25em] text-pink-200 mb-2"
                        >
                            {{ cms($cms, 'why', 'strip_3_label') }}
                        </p>

                        <h3
                            contenteditable="false"
                            data-section="why"
                            data-field="strip_3_title"
                            class="cms-inline-edit text-xl sm:text-2xl lg:text-3xl font-bold"
                        >
                            {{ cms($cms, 'why', 'strip_3_title') }}
                        </h3>
                    </div>

                    <div class="p-6 lg:p-8 bg-gradient-to-r from-pink-50 to-white flex items-center gap-4">

                        <div
                            contenteditable="false"
                            data-section="why"
                            data-field="strip_3_icon"
                            class="cms-inline-edit text-3xl sm:text-4xl"
                        >
                            {{ cms($cms, 'why', 'strip_3_icon') }}
                        </div>

                        <p
                            contenteditable="false"
                            data-section="why"
                            data-field="strip_3_text"
                            class="cms-inline-edit text-sm sm:text-base text-slate-700 leading-relaxed"
                        >
                            {{ cms($cms, 'why', 'strip_3_text') }}
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- FULL-PAGE VOICES SECTION -->
<div class="px-8 lg:px-10">
    <section id="voices" class="relative min-h-[80vh] lg:min-h-[100vh] flex items-end overflow-hidden bg-slate-950">

        @if(canEditCms())
            <div class="absolute top-6 right-6 z-[9999] flex gap-3">

                <button
                    type="button"
                    id="enableVoicesEdit"
                    class="px-5 py-2.5 rounded-xl bg-pink-brand border border-white/20 text-white font-semibold shadow-lg hover:bg-white/20 transition">
                    Edit Voices
                </button>

                <button
                    type="button"
                    id="saveVoicesEdit"
                    class="hidden px-5 py-2.5 rounded-xl bg-cyan-brand text-white font-semibold shadow-2xl hover:scale-105 transition">
                    Save Changes
                </button>

            <button
                type="button"
                id="cancelVoicesEdit"
                class="hidden px-5 py-2.5 rounded-xl bg-white border border-slate-200 text-slate-700 font-semibold shadow-lg hover:bg-slate-100 transition">
                Cancel
            </button>

                <label
                    id="voicesImageUploadLabel"
                    for="voicesImageUpload"
                    class="hidden px-5 py-2.5 rounded-xl bg-white/10 backdrop-blur-xl border border-white/20 text-white font-semibold shadow-2xl hover:bg-white/20 transition cursor-pointer">
                    Change Image

                    <input
                        type="file"
                        id="voicesImageUpload"
                        accept="image/*"
                        class="hidden">
                </label>

            </div>
        @endif

        <!-- Background image -->
        <div class="absolute inset-0">
            <img
                id="voicesBackgroundImage"
                src="{{ asset(cms($cms, 'voices', 'background_image', 'images/bg.jpeg')) }}"
                class="w-full h-full object-cover scale-105 transition-transform duration-[25s] hover:scale-100"
                alt="{{ cms($cms, 'voices', 'image_alt', 'Women engineer in energy sector') }}"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/70 to-black/30"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10 w-full px-6 pb-16 lg:pb-24">
            <div class="max-w-7xl mx-auto">

                <!-- Top intro -->
                <div class="flex flex-col items-center justify-center text-center">

                    <p
                        contenteditable="false"
                        data-section="voices"
                        data-field="eyebrow"
                        class="cms-inline-edit text-sm uppercase tracking-[0.25em] text-pink-brand mb-4"
                    >
                        {{ cms($cms, 'voices', 'eyebrow', 'Voices of Change') }}
                    </p>

                    <h2
                        contenteditable="false"
                        data-section="voices"
                        data-field="title"
                        class="cms-inline-edit text-4xl sm:text-5xl lg:text-6xl font-bold text-cyan-brand leading-tight mb-5"
                    >
                        {{ cms($cms, 'voices', 'title', 'Women Beyond Boundaries') }}
                    </h2>

                    <p
                        contenteditable="false"
                        data-section="voices"
                        data-field="description"
                        class="cms-inline-edit text-lg sm:text-xl text-blue-100 leading-relaxed mb-14"
                    >
                        {{ cms($cms, 'voices', 'description', 'Across South Asia’s energy sector, women are challenging norms, proving capability, and exposing the barriers that still shape their careers.') }}
                    </p>

                </div>

                <!-- Quote layout -->
                <div class="grid lg:grid-cols-2 gap-10 lg:gap-16">

                    <!-- Quote 1 -->
                    <div class="border-t border-white/20 pt-8">
                        <p class="text-2xl sm:text-3xl lg:text-4xl font-light leading-relaxed text-white">
                            <span class="text-cyan-brand text-5xl font-serif mr-2 align-top">&ldquo;</span>

                            <span
                                contenteditable="false"
                                data-section="voices"
                                data-field="quote_1_text"
                                class="cms-inline-edit"
                            >{{ cms($cms, 'voices', 'quote_1_text', 'They used to think women couldn’t run the plant. Now we do all three shifts—even the night ones.') }}</span>

                            <span class="text-cyan-brand text-5xl font-serif ml-2 align-top">&rdquo;</span>
                        </p>

                        <div class="mt-6">
                            <p
                                contenteditable="false"
                                data-section="voices"
                                data-field="quote_1_person"
                                class="cms-inline-edit text-sm uppercase tracking-[0.18em] text-white/60"
                            >
                                {{ cms($cms, 'voices', 'quote_1_person', 'Women Engineer') }}
                            </p>

                            <p
                                contenteditable="false"
                                data-section="voices"
                                data-field="quote_1_country"
                                class="cms-inline-edit text-base text-cyan-brand font-medium mt-1"
                            >
                                {{ cms($cms, 'voices', 'quote_1_country', 'India') }}
                            </p>
                        </div>
                    </div>

                    <!-- Quote 2 -->
                    <div class="border-t border-white/20 pt-8">
                        <p class="text-2xl sm:text-3xl lg:text-4xl font-light leading-relaxed text-white">
                            <span class="text-pink-brand text-5xl font-serif mr-2 align-top">&ldquo;</span>

                            <span
                                contenteditable="false"
                                data-section="voices"
                                data-field="quote_2_text"
                                class="cms-inline-edit"
                            >{{ cms($cms, 'voices', 'quote_2_text', 'You may have delivered results for five years, but your maternity leave is what they remember.') }}</span>

                            <span class="text-pink-brand text-5xl font-serif ml-2 align-top">&rdquo;</span>
                        </p>

                        <div class="mt-6">
                            <p
                                contenteditable="false"
                                data-section="voices"
                                data-field="quote_2_person"
                                class="cms-inline-edit text-sm uppercase tracking-[0.18em] text-white/60"
                            >
                                {{ cms($cms, 'voices', 'quote_2_person', 'Women Engineer') }}
                            </p>

                            <p
                                contenteditable="false"
                                data-section="voices"
                                data-field="quote_2_country"
                                class="cms-inline-edit text-base text-pink-brand font-medium mt-1"
                            >
                                {{ cms($cms, 'voices', 'quote_2_country', 'Pakistan') }}
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </section>
</div>


<!-- CHALLENGES - HORIZONTAL SCROLL CAROUSEL -->
<section id="challenges" class="py-20 lg:py-24 bg-slate-50 text-slate-900 overflow-hidden">

    @if(canEditCms())
        <div class="absolute top-6 right-6 z-[9999] flex gap-3">
            <button type="button" id="enableChallengesEdit"
                class="px-5 py-2.5 rounded-2xl bg-pink-600 text-white font-semibold shadow hover:bg-pink-700 transition">
                Edit Challenges
            </button>
            <button type="button" id="saveChallengesEdit"
                class="hidden px-5 py-2.5 rounded-2xl bg-emerald-600 text-white font-semibold shadow hover:bg-emerald-700 transition">
                Save Changes
            </button>
            <button type="button" id="cancelChallengesEdit"
                class="hidden px-5 py-2.5 rounded-2xl bg-slate-200 text-slate-700 font-semibold hover:bg-slate-300 transition">
                Cancel
            </button>
        </div>
    @endif

    <div class="max-w-screen-2xl mx-auto px-6 lg:px-12">

        <div class="text-center mb-12">
            <p 
                contenteditable="false"
                data-section="challenges"
                data-field="eyebrow"
                class="cms-inline-edit uppercase tracking-widest text-pink-600 text-sm font-medium mb-3">
                {{ cms($cms, 'challenges', 'eyebrow') }}
            </p>
            
            <h2 
                contenteditable="false"
                data-section="challenges"
                data-field="title"
                class="cms-inline-edit text-4xl lg:text-5xl font-semibold text-slate-900">
                {{ cms($cms, 'challenges', 'title') }}
            </h2>
            
            <p 
                contenteditable="false"
                data-section="challenges"
                data-field="description"
                class="cms-inline-edit mt-4 text-lg text-slate-600 max-w-xl mx-auto">
                {{ cms($cms, 'challenges', 'description') }}
            </p>
        </div>

        <!-- Horizontal Scrollable Cards -->
        <div class="relative">
            <div id="challenges-slider" 
                 class="flex gap-6 overflow-x-auto pb-8 snap-x snap-mandatory scrollbar-hide scroll-smooth">
                
                @for($i = 1; $i <= 4; $i++)
                    <div 
                        class="flex-shrink-0 w-[280px] md:w-[320px] snap-center transition-all duration-500 group"
                        style="scroll-margin: 0 20px;"
                    >
                        <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100 hover:shadow-xl h-full flex flex-col transition-all group-hover:scale-105">
                            
                            <!-- Icon -->
                            <div 
                                contenteditable="false"
                                data-section="challenges"
                                data-field="card_{{ $i }}_icon"
                                class="cms-inline-edit text-6xl mb-6 transition-transform group-hover:rotate-12">
                                {{ cms($cms, 'challenges', "card_{$i}_icon") }}
                            </div>

                            <!-- Title -->
                            <h3 
                                contenteditable="false"
                                data-section="challenges"
                                data-field="card_{{ $i }}_title"
                                class="cms-inline-edit text-2xl font-semibold mb-4 text-slate-900">
                                {{ cms($cms, 'challenges', "card_{$i}_title") }}
                            </h3>

                            <!-- Description -->
                            <p 
                                contenteditable="false"
                                data-section="challenges"
                                data-field="card_{{ $i }}_text"
                                class="cms-inline-edit text-slate-600 leading-relaxed flex-1">
                                {{ cms($cms, 'challenges', "card_{$i}_text") }}
                            </p>

                        </div>
                    </div>
                @endfor

            </div>

        </div>

    </div>
</section>

<!-- ================= INSTITUTIONAL RESPONSE / SPLIT CONNECTED ================= -->
<section id="institutional" class="relative py-24 lg:py-32 bg-slate-50">

    @if(canEditCms())
        <div class="absolute top-6 right-6 z-[9999] flex gap-3">
            <button
                type="button"
                id="enableInstitutionalEdit"
                class="px-5 py-2.5 rounded-xl bg-pink-brand border border-white/20 text-white font-semibold shadow-lg hover:bg-white/20 transition">
                Edit Institutional
            </button>

            <button
                type="button"
                id="saveInstitutionalEdit"
                class="hidden px-5 py-2.5 rounded-xl bg-cyan-brand text-white font-semibold shadow-2xl hover:scale-105 transition">
                Save Changes
            </button>

            <button
                type="button"
                id="cancelInstitutionalEdit"
                class="hidden px-5 py-2.5 rounded-xl bg-white border border-slate-200 text-slate-700 font-semibold shadow-lg hover:bg-slate-100 transition">
                Cancel
            </button>

            <label
                id="institutionalImageUploadLabel"
                for="institutionalImageUpload"
                class="hidden px-5 py-2.5 rounded-xl bg-white border border-slate-200 text-slate-700 font-semibold shadow-lg hover:bg-slate-100 transition cursor-pointer">
                Change Image

                <input
                    type="file"
                    id="institutionalImageUpload"
                    accept="image/*"
                    class="hidden">
            </label>
        </div>
    @endif

    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">

        <div class="max-w-3xl mb-16">
            <p contenteditable="false" data-section="institutional" data-field="eyebrow"
               class="cms-inline-edit text-sm uppercase tracking-[0.25em] text-cyan-brand mb-4 animate-on-scroll">
                {{ cms($cms, 'institutional', 'eyebrow', 'What’s Changing') }}
            </p>

            <h2 contenteditable="false" data-section="institutional" data-field="title"
                class="cms-inline-edit text-4xl sm:text-5xl lg:text-6xl font-bold text-slate-900 mb-6 animate-on-scroll">
                {{ cms($cms, 'institutional', 'title', 'Institutional Responses and Emerging Good Practices') }}
            </h2>

            <p contenteditable="false" data-section="institutional" data-field="description"
               class="cms-inline-edit text-lg sm:text-xl text-slate-600 leading-relaxed animate-on-scroll">
                {{ cms($cms, 'institutional', 'description', 'Utilities across the region are beginning to respond with targeted hiring, family-friendly policies, mentorship, training, and stronger workplace systems.') }}
            </p>
        </div>

        <div class="grid lg:grid-cols-2 items-stretch rounded-[2rem] overflow-hidden shadow-2xl animate-on-scroll">

            <div class="relative">
                <img
                    id="institutionalImage"
                    src="{{ asset(cms($cms, 'institutional', 'image', 'images/bg_group.jpeg')) }}"
                    alt="{{ cms($cms, 'institutional', 'image_alt', 'Energy sector workforce') }}"
                    class="w-full h-full object-cover min-h-[420px] lg:min-h-[560px]"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 via-transparent to-transparent"></div>
            </div>

            <div class="bg-white p-8 sm:p-10 lg:p-12 flex flex-col justify-center space-y-12">

                <div>
                    <p contenteditable="false" data-section="institutional" data-field="policy_title"
                       class="cms-inline-edit text-sm uppercase tracking-[0.2em] text-pink-brand mb-6">
                        {{ cms($cms, 'institutional', 'policy_title', 'Policies') }}
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 text-center">
                        @php
                            $policyColors = [
                                'border-pink-brand text-pink-brand',
                                'border-orange-brand text-orange-brand',
                                'border-cyan-brand text-cyan-brand',
                            ];
                        @endphp

                        @for($i = 1; $i <= 3; $i++)
                            <div class="flex flex-col items-center">
                                <div contenteditable="false"
                                     data-section="institutional"
                                     data-field="policy_{{ $i }}_number"
                                     class="cms-inline-edit w-28 h-28 rounded-full border-[6px] {{ $policyColors[$i - 1] }} flex items-center justify-center text-2xl font-bold">
                                    {{ cms($cms, 'institutional', "policy_{$i}_number") }}
                                </div>

                                <p contenteditable="false"
                                   data-section="institutional"
                                   data-field="policy_{{ $i }}_label"
                                   class="cms-inline-edit mt-3 text-sm text-slate-600 leading-tight">
                                    {{ cms($cms, 'institutional', "policy_{$i}_label") }}
                                </p>
                            </div>
                        @endfor
                    </div>
                </div>
<!-- ================= RETENTION SUPPORT ================= -->
<div class="border-t border-slate-200 pt-8">
    <p contenteditable="false" data-section="institutional" data-field="retention_title"
       class="cms-inline-edit text-sm uppercase tracking-[0.2em] text-orange-brand mb-6">
        {{ cms($cms, 'institutional', 'retention_title', 'Retention Support') }}
    </p>

    <div class="space-y-6">
        @for($i = 1; $i <= 2; $i++)
            <div>
                <div class="flex justify-between text-sm mb-2">
                    <span contenteditable="false" data-section="institutional" data-field="retention_{{ $i }}_label"
                          class="cms-inline-edit text-slate-600">
                        {{ cms($cms, 'institutional', "retention_{$i}_label") }}
                    </span>

                    <span contenteditable="false" data-section="institutional" data-field="retention_{{ $i }}_number"
                          class="cms-inline-edit font-semibold {{ $i == 1 ? 'text-orange-brand' : 'text-pink-brand' }}">
                        {{ cms($cms, 'institutional', "retention_{$i}_number") }}
                    </span>
                </div>

                <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                    <div class="h-full {{ $i == 1 ? 'bg-orange-brand' : 'bg-pink-brand' }} rounded-full"
                         style="width: {{ cms($cms, 'institutional', "retention_{$i}_number") }}"></div>
                </div>
            </div>
        @endfor
    </div>
</div>


<!-- ================= GROWTH & SAFETY ================= -->
<div class="border-t border-slate-200 pt-8">
    <p contenteditable="false" data-section="institutional" data-field="growth_title"
       class="cms-inline-edit text-sm uppercase tracking-[0.2em] text-cyan-brand mb-6">
        {{ cms($cms, 'institutional', 'growth_title', 'Growth & Safety') }}
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        @for($i = 1; $i <= 2; $i++)
            <div class="p-6 rounded-xl {{ $i == 1 ? 'bg-cyan-50 border-cyan-100' : 'bg-orange-50 border-orange-100' }} border">
                <p contenteditable="false" data-section="institutional" data-field="growth_{{ $i }}_number"
                   class="cms-inline-edit text-3xl font-bold {{ $i == 1 ? 'text-cyan-brand' : 'text-orange-brand' }} mb-2">
                    {{ cms($cms, 'institutional', "growth_{$i}_number") }}
                </p>

                <p contenteditable="false" data-section="institutional" data-field="growth_{{ $i }}_label"
                   class="cms-inline-edit text-sm text-slate-600">
                    {{ cms($cms, 'institutional', "growth_{$i}_label") }}
                </p>
            </div>
        @endfor
    </div>
</div>

           
    </div>
</section>

<!-- ================= REPORT CTA ================= -->
<section id="report" class="relative py-20 lg:py-28 bg-white">

    @if(canEditCms())
        <div class="absolute top-6 right-6 z-[9999] flex gap-3">
            <button
                type="button"
                id="enableReportEdit"
                class="px-5 py-2.5 rounded-xl bg-pink-brand border border-white/20 text-white font-semibold shadow-lg hover:bg-white/20 transition">
                Edit Report
            </button>

            <button
                type="button"
                id="saveReportEdit"
                class="hidden px-5 py-2.5 rounded-xl bg-cyan-brand text-white font-semibold shadow-2xl hover:scale-105 transition">
                Save Changes
            </button>

            <button
                type="button"
                id="cancelReportEdit"
                class="hidden px-5 py-2.5 rounded-xl bg-white border border-slate-200 text-slate-700 font-semibold shadow-lg hover:bg-slate-100 transition">
                Cancel
            </button>

            <label
                id="reportImageUploadLabel"
                for="reportImageUpload"
                class="hidden px-5 py-2.5 rounded-xl bg-white border border-slate-200 text-slate-700 font-semibold shadow-lg hover:bg-slate-100 transition cursor-pointer">
                Change Image

                <input type="file" id="reportImageUpload" accept="image/*" class="hidden">
            </label>

            <label
                id="reportFileUploadLabel"
                for="reportFileUpload"
                class="hidden px-5 py-2.5 rounded-xl bg-white border border-slate-200 text-slate-700 font-semibold shadow-lg hover:bg-slate-100 transition cursor-pointer">
                Change PDF

                <input type="file" id="reportFileUpload" accept="application/pdf" class="hidden">
            </label>
        </div>
    @endif

    <div class="max-w-6xl mx-auto px-6">
        <div class="rounded-[2rem] overflow-hidden shadow-[0_30px_80px_-20px_rgba(15,23,42,0.18)] border border-slate-200 bg-gradient-to-br from-white via-slate-50 to-cyan-50/30">
            <div class="grid lg:grid-cols-2 items-center">
                <div class="p-10 lg:p-14">

                    <p contenteditable="false" data-section="report" data-field="eyebrow"
                       class="cms-inline-edit text-sm uppercase tracking-[0.25em] text-orange-brand mb-4 font-semibold">
                        {{ cms($cms, 'report', 'eyebrow', 'Full Assessment') }}
                    </p>

                    <h2 contenteditable="false" data-section="report" data-field="title"
                        class="cms-inline-edit text-4xl sm:text-5xl font-bold text-slate-900 leading-tight mb-6">
                        {{ cms($cms, 'report', 'title', 'Read the report behind the insights') }}
                    </h2>

                    <p contenteditable="false" data-section="report" data-field="description"
                       class="cms-inline-edit text-lg text-slate-600 leading-relaxed mb-8">
                        {{ cms($cms, 'report', 'description', 'Explore the full WePOWER Assessment 2024–25 to see the regional data, workplace voices, institutional responses, and recommendations in detail.') }}
                    </p>

                    <div class="flex flex-wrap gap-4">
                        <a id="reportDownloadLink"
                           href="{{ asset(cms($cms, 'report', 'file', 'files/gender.pdf')) }}"
                           download
                           class="px-7 py-4 bg-pink-brand hover:opacity-90 text-white rounded-xl font-semibold shadow-lg transition transform hover:scale-105">
                            <span contenteditable="false" data-section="report" data-field="download_text" class="cms-inline-edit">
                                {{ cms($cms, 'report', 'download_text', 'Download Report') }}
                            </span>
                        </a>

                        <a id="reportViewLink"
                           href="{{ asset(cms($cms, 'report', 'file', 'files/gender.pdf')) }}"
                           target="_blank"
                           class="px-7 py-4 border border-slate-300 text-slate-800 rounded-xl font-semibold hover:bg-slate-100 transition">
                            <span contenteditable="false" data-section="report" data-field="view_text" class="cms-inline-edit">
                                {{ cms($cms, 'report', 'view_text', 'View Report') }}
                            </span>
                        </a>
                    </div>
                </div>

                <div class="h-full min-h-[320px] lg:min-h-[420px] relative">
                    <img id="reportImage"
                         src="{{ asset(cms($cms, 'report', 'image', 'images/bgg.jpeg')) }}"
                         alt="{{ cms($cms, 'report', 'image_alt', 'WePOWER assessment cover visual') }}"
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/55 via-slate-900/20 to-transparent"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
/*
|--------------------------------------------------------------------------
| Inline CMS Editor with Cancel + Preview-only Uploads
|--------------------------------------------------------------------------
| Text changes are saved only after clicking Save Changes.
| Image/PDF changes are also saved only after clicking Save Changes.
| Cancel restores original text and image preview without saving anything.
*/

function setupCmsEditor(config) {
    const fields = document.querySelectorAll(config.selector);
    const enableBtn = document.getElementById(config.enableBtnId);
    const saveBtn = document.getElementById(config.saveBtnId);
    const cancelBtn = document.getElementById(config.cancelBtnId);

    if (!enableBtn || !saveBtn) return;

    let originalValues = {};
    let selectedUploads = {};
    let originalMedia = {};
    let objectUrls = [];

    const uploads = config.uploads || [];

    function setEditing(isEditing) {
        fields.forEach((el) => {
            el.setAttribute('contenteditable', isEditing ? 'true' : 'false');
            el.classList.toggle('cms-editable-active', isEditing);
        });

        config.onToggle?.(isEditing);

        enableBtn.classList.toggle('hidden', isEditing);
        saveBtn.classList.toggle('hidden', !isEditing);
        cancelBtn?.classList.toggle('hidden', !isEditing);
    }

    function rememberOriginalState() {
        originalValues = {};

        fields.forEach((el) => {
            const key = `${el.dataset.section}.${el.dataset.field}`;
            originalValues[key] = el.innerText;
        });

        originalMedia = {};
        selectedUploads = {};
        objectUrls.forEach((url) => URL.revokeObjectURL(url));
        objectUrls = [];

        uploads.forEach((upload) => {
            const previewEl = document.getElementById(upload.previewId);

            if (!previewEl) return;

            if (upload.previewAttr === 'href') {
                originalMedia[upload.previewId] = previewEl.href;
            } else {
                originalMedia[upload.previewId] = previewEl.src;
            }
        });
    }

    function restoreOriginalState() {
        fields.forEach((el) => {
            const key = `${el.dataset.section}.${el.dataset.field}`;
            if (originalValues[key] !== undefined) {
                el.innerText = originalValues[key];
            }
        });

        uploads.forEach((upload) => {
            const previewEl = document.getElementById(upload.previewId);
            if (!previewEl || originalMedia[upload.previewId] === undefined) return;

            if (upload.previewAttr === 'href') {
                previewEl.href = originalMedia[upload.previewId];
            } else {
                previewEl.src = originalMedia[upload.previewId];
            }
        });

        selectedUploads = {};
        objectUrls.forEach((url) => URL.revokeObjectURL(url));
        objectUrls = [];
    }

    fields.forEach((el) => {
        el.setAttribute('contenteditable', 'false');
    });

    uploads.forEach((upload) => {
        const input = document.getElementById(upload.inputId);
        const previewEl = document.getElementById(upload.previewId);

        if (!input) return;

        input.addEventListener('change', () => {
            const file = input.files[0];
            if (!file) return;

            selectedUploads[upload.inputId] = file;

            // Images preview immediately but are NOT saved until Save Changes.
            if (upload.type === 'image' && previewEl) {
                const objectUrl = URL.createObjectURL(file);
                objectUrls.push(objectUrl);
                previewEl.src = objectUrl;
            }

            // PDFs/files are only stored in memory until Save Changes.
            // Link href is intentionally not changed before save.
        });
    });

    enableBtn.addEventListener('click', () => {
        rememberOriginalState();
        setEditing(true);
    });

    cancelBtn?.addEventListener('click', () => {
        restoreOriginalState();
        setEditing(false);
        saveBtn.innerText = 'Save Changes';
    });

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
                const error = await response.json();
                console.log(error);
                saveBtn.innerText = error.message ?? 'Save Failed';
                return;
            }
        }

        for (const upload of uploads) {
            const file = selectedUploads[upload.inputId];
            if (!file) continue;

            const formData = new FormData();
            formData.append('page_id', "{{ $page->id }}");
            formData.append('section', upload.section);
            formData.append('field', upload.field);
            formData.append(upload.payloadName, file);

            const response = await fetch(upload.route, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: formData
            });

            const data = await response.json();

            if (!response.ok || !data.success) {
                alert(data.message ?? 'Upload failed');
                saveBtn.innerText = 'Save Failed';
                return;
            }

            if (upload.afterSave) {
                upload.afterSave(data);
            } else {
                const previewEl = document.getElementById(upload.previewId);
                if (previewEl && data.path) {
                    if (upload.previewAttr === 'href') {
                        previewEl.href = data.path;
                    } else {
                        previewEl.src = data.path;
                    }
                }
            }
        }

        selectedUploads = {};
        objectUrls.forEach((url) => URL.revokeObjectURL(url));
        objectUrls = [];

        setEditing(false);

        saveBtn.innerText = 'Saved ✓';

        setTimeout(() => {
            saveBtn.innerText = 'Save Changes';
        }, 1200);
    });
}

// HERO
setupCmsEditor({
    selector: '#hero .cms-inline-edit',
    enableBtnId: 'enableHeroEdit',
    saveBtnId: 'saveHeroEdit',
    cancelBtnId: 'cancelHeroEdit',
    onToggle: (isEditing) => {
        document.getElementById('heroImageUploadLabel')?.classList.toggle('hidden', !isEditing);
    },
    uploads: [
        {
            type: 'image',
            inputId: 'heroImageUpload',
            previewId: 'heroBackgroundImage',
            section: 'hero',
            field: 'background_image',
            payloadName: 'image',
            route: "{{ route('cms.inline.image.update') }}"
        }
    ]
});

// STATS
setupCmsEditor({
    selector: '#insights .cms-inline-edit',
    enableBtnId: 'enableStatsEdit',
    saveBtnId: 'saveStatsEdit',
    cancelBtnId: 'cancelStatsEdit'
});

// WHY
setupCmsEditor({
    selector: '#about .cms-inline-edit',
    enableBtnId: 'enableWhyEdit',
    saveBtnId: 'saveWhyEdit',
    cancelBtnId: 'cancelWhyEdit'
});

// VOICES
setupCmsEditor({
    selector: '#voices .cms-inline-edit',
    enableBtnId: 'enableVoicesEdit',
    saveBtnId: 'saveVoicesEdit',
    cancelBtnId: 'cancelVoicesEdit',
    onToggle: (isEditing) => {
        document.getElementById('voicesImageUploadLabel')?.classList.toggle('hidden', !isEditing);
    },
    uploads: [
        {
            type: 'image',
            inputId: 'voicesImageUpload',
            previewId: 'voicesBackgroundImage',
            section: 'voices',
            field: 'background_image',
            payloadName: 'image',
            route: "{{ route('cms.inline.image.update') }}"
        }
    ]
});

// CHALLENGES
setupCmsEditor({
    selector: '#challenges .cms-inline-edit',
    enableBtnId: 'enableChallengesEdit',
    saveBtnId: 'saveChallengesEdit',
    cancelBtnId: 'cancelChallengesEdit'
});

// INSTITUTIONAL
setupCmsEditor({
    selector: '#institutional .cms-inline-edit',
    enableBtnId: 'enableInstitutionalEdit',
    saveBtnId: 'saveInstitutionalEdit',
    cancelBtnId: 'cancelInstitutionalEdit',
    onToggle: (isEditing) => {
        document.getElementById('institutionalImageUploadLabel')?.classList.toggle('hidden', !isEditing);
    },
    uploads: [
        {
            type: 'image',
            inputId: 'institutionalImageUpload',
            previewId: 'institutionalImage',
            section: 'institutional',
            field: 'image',
            payloadName: 'image',
            route: "{{ route('cms.inline.image.update') }}"
        }
    ]
});

// REPORT
setupCmsEditor({
    selector: '#report .cms-inline-edit',
    enableBtnId: 'enableReportEdit',
    saveBtnId: 'saveReportEdit',
    cancelBtnId: 'cancelReportEdit',
    onToggle: (isEditing) => {
        document.getElementById('reportImageUploadLabel')?.classList.toggle('hidden', !isEditing);
        document.getElementById('reportFileUploadLabel')?.classList.toggle('hidden', !isEditing);
    },
    uploads: [
        {
            type: 'image',
            inputId: 'reportImageUpload',
            previewId: 'reportImage',
            section: 'report',
            field: 'image',
            payloadName: 'image',
            route: "{{ route('cms.inline.image.update') }}"
        },
        {
            type: 'file',
            inputId: 'reportFileUpload',
            previewId: 'reportDownloadLink',
            previewAttr: 'href',
            section: 'report',
            field: 'file',
            payloadName: 'file',
            route: "{{ route('cms.inline.file.update') }}",
            afterSave: (data) => {
                const downloadLink = document.getElementById('reportDownloadLink');
                const viewLink = document.getElementById('reportViewLink');

                if (downloadLink && data.path) downloadLink.href = data.path;
                if (viewLink && data.path) viewLink.href = data.path;
            }
        }
    ]
});

/*
|--------------------------------------------------------------------------
| Smooth Scroll
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
| Scroll Animation Observer
|--------------------------------------------------------------------------
*/
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