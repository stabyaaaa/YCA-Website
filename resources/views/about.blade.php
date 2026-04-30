@extends('layouts.app', ['imageNav' => true])
@section('title', 'About Us')

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
</style>

<!-- ================= HERO ================= -->
<section class="relative overflow-hidden bg-white">
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
                    About WePOWER
                </p>

                <h1 class="text-5xl md:text-6xl xl:text-7xl font-extrabold text-slate-900 leading-[1.02] mb-7 animate-on-scroll">
                    Powering Inclusion
                    <span class="block text-cyan-brand">Across South Asia</span>
                </h1>

                <p class="text-lg sm:text-xl text-slate-600 leading-relaxed mb-8 animate-on-scroll" style="transition-delay: 0.12s;">
                    WePOWER is a women's regional network connecting institutions, utilities, universities, and professional partners to create stronger pathways for women in the energy sector — from participation and progression to leadership and institutional change.
                </p>

                <div class="flex flex-wrap gap-4 animate-on-scroll" style="transition-delay: 0.2s;">
                    <a href="#who-we-are"
                       class="px-7 py-4 bg-slate-900 hover:bg-slate-800 text-white rounded-2xl font-semibold shadow-lg transition">
                        Learn About WePOWER
                    </a>

                    <a href="#our-framework"
                       class="px-7 py-4 border border-slate-300 text-slate-800 rounded-2xl font-semibold hover:border-slate-400 hover:bg-slate-50 transition">
                        View Our Frameworks
                    </a>
                </div>

                <div class="grid sm:grid-cols-3 gap-4 mt-10 animate-on-scroll" style="transition-delay: 0.28s;">
                    <div class="rounded-2xl bg-white border border-slate-200 px-5 py-4 shadow-sm">
                        <p class="text-2xl font-bold text-pink-brand">2019</p>
                        <p class="text-sm text-slate-500 mt-1">Network launched</p>
                    </div>
                    <div class="rounded-2xl bg-white border border-slate-200 px-5 py-4 shadow-sm">
                        <p class="text-2xl font-bold text-cyan-brand">61</p>
                        <p class="text-sm text-slate-500 mt-1">Regional partners</p>
                    </div>
                    <div class="rounded-2xl bg-white border border-slate-200 px-5 py-4 shadow-sm">
                        <p class="text-2xl font-bold text-orange-brand">5 Pillars</p>
                        <p class="text-sm text-slate-500 mt-1">Action framework</p>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-5 animate-on-scroll">
                <div class="relative max-w-xl mx-auto lg:ml-auto">
                    <div class="relative rounded-[2rem] overflow-hidden shadow-2xl">
                        <img src="{{ asset('images/bgg.jpeg') }}"
                             alt="Women in the South Asia power sector"
                             class="w-full h-[480px] sm:h-[560px] object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-slate-900/10 to-transparent"></div>
                    </div>

                    <div class="hidden sm:block absolute -right-6 top-10 w-20 h-72 rounded-[1.75rem] bg-gradient-to-b from-pink-brand via-orange-brand to-cyan-brand shadow-xl"></div>

                    <div class="absolute -top-6 -left-6 sm:left-auto sm:-right-10 bg-white rounded-2xl shadow-xl border border-slate-200 px-5 py-4 w-56">
                        <p class="text-xs uppercase tracking-[0.22em] text-slate-400 mb-2">Regional Vision</p>
                        <p class="text-sm text-slate-700 leading-relaxed">
                            Advancing women’s participation in technical and leadership roles.
                        </p>
                    </div>

                    <div class="absolute bottom-6 -left-6 sm:-left-10 bg-slate-900 text-white rounded-2xl shadow-2xl px-6 py-5 w-64">
                        <p class="text-xs uppercase tracking-[0.22em] text-white/50 mb-2">Why It Matters</p>
                        <p class="text-sm leading-relaxed text-white/85">
                            A stronger energy sector needs more inclusive institutions, opportunities, and career pathways.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ================= WHO WE ARE ================= -->
<section id="who-we-are" class="py-20 lg:py-28 bg-white">
    <div class="page-shell">

        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center mb-16">

            <div class="animate-on-scroll">
                <div class="rounded-3xl overflow-hidden shadow-xl">
                    <img src="{{ asset('images/bg_group.jpeg') }}"
                         alt="WePOWER network"
                         class="w-full h-[420px] lg:h-[480px] object-cover">
                </div>
            </div>

            <div class="animate-on-scroll">
                <p class="text-sm uppercase tracking-[0.25em] text-cyan-brand mb-4">
                    Who We Are
                </p>

                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-slate-900 leading-tight mb-6">
                    A Regional Network Advancing Women in the Power Sector
                </h2>

                <p class="text-lg text-slate-600 leading-relaxed mb-5">
    WePOWER is the South Asia Women in Power Sector Professional Network, established in 2019 as a voluntary platform of utilities, universities, and professional associations. With 61 partners and growing, it works to increase women’s participation in energy-sector careers, especially in technical and leadership roles, through collaboration, research, and targeted initiatives supported by the World Bank’s South Asia Energy program.
</p>

<p class="text-lg text-slate-600 leading-relaxed">
    The network operates through a data-driven approach, drawing on partner insights and regional assessments to address barriers to entry, retention, and advancement. Guided by a five-pillar framework spanning education, recruitment, professional development, retention, and policy reform, WePOWER supports coordinated action across countries, strengthening both regional collaboration and national-level impact.
</p>
            </div>
        </div>

        

    </div>
</section>

<!-- ================= WHY IT EXISTS ================= -->
<section class="py-20 lg:py-28 bg-white">
    <div class="page-shell">
        <div class="grid lg:grid-cols-12 gap-16 lg:gap-20 items-start">

            <div class="lg:col-span-7">
                <div class="mb-12 animate-on-scroll">
                    <p class="text-sm uppercase tracking-[0.25em] text-pink-brand mb-4">
                        Why It Exists
                    </p>
                    <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight text-slate-900">
                        Supporting Women Across the Full Energy Career Path
                    </h2>
                    <p class="mt-6 text-lg text-slate-600 leading-relaxed">
                        WePOWER exists because improving women’s participation in the power sector requires more than one solution. It takes action across education, access to jobs, career development, and workplace systems.
                    </p>
                </div>

                <div class="relative">
                    <div class="absolute left-8 top-10 bottom-8 w-1 bg-gradient-to-b from-pink-200 via-orange-200 via-cyan-200 to-pink-200 hidden lg:block"></div>

                    <div class="relative flex gap-8 mb-14 animate-on-scroll">
                        <div class="flex-shrink-0">
                            <div class="inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-pink-100 text-pink-600 text-xl font-bold z-10">01</div>
                        </div>
                        <div class="pt-2">
                            <h3 class="text-3xl font-semibold text-slate-900 mb-4">Build the Stem Pipeline</h3>
                            <p class="text-slate-600 text-lg leading-relaxed">
                                Encourage girls and young women to see STEM and energy as realistic, valuable, and achievable career paths.
                            </p>
                        </div>
                    </div>

                    <div class="relative flex gap-8 mb-14 animate-on-scroll" style="transition-delay: 0.08s;">
                        <div class="flex-shrink-0">
                            <div class="inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-orange-100 text-orange-600 text-xl font-bold z-10">02</div>
                        </div>
                        <div class="pt-2">
                            <h3 class="text-3xl font-semibold text-slate-900 mb-4">Open Job Access</h3>
                            <p class="text-slate-600 text-lg leading-relaxed">
                                Expand pathways into the sector through internships, recruitment opportunities, exposure, and employer engagement.
                            </p>
                        </div>
                    </div>

                    <div class="relative flex gap-8 mb-14 animate-on-scroll" style="transition-delay: 0.16s;">
                        <div class="flex-shrink-0">
                            <div class="inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-cyan-100 text-cyan-600 text-xl font-bold z-10">03</div>
                        </div>
                        <div class="pt-2">
                            <h3 class="text-3xl font-semibold text-slate-900 mb-4">Support Career Growth</h3>
                            <p class="text-slate-600 text-lg leading-relaxed">
                                Strengthen mentorship, professional development, technical growth, and leadership opportunities for women in the sector.
                            </p>
                        </div>
                    </div>

                    <div class="relative flex gap-8 animate-on-scroll" style="transition-delay: 0.24s;">
                        <div class="flex-shrink-0">
                            <div class="inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-pink-100 text-pink-600 text-xl font-bold z-10">04</div>
                        </div>
                        <div class="pt-2">
                            <h3 class="text-3xl font-semibold text-slate-900 mb-4">Shift Institutional Policies</h3>
                            <p class="text-slate-600 text-lg leading-relaxed">
                                Promote policies, workplace support, and long-term institutional change so women can enter, stay, advance, and lead.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-5 animate-on-scroll">
                <div class="lg:sticky lg:top-24">
                    <div class="aspect-[4/5] lg:h-[680px] bg-slate-100 rounded-3xl overflow-hidden shadow-2xl">
                        <img 
                            src="{{ asset('images/bg_group.jpeg') }}"
                            alt="Women progressing through the energy career path - WePOWER"
                            class="w-full h-full object-cover"
                        >
                    </div>
                    
                    <p class="mt-8 text-center text-sm text-slate-500 tracking-widest">
                        ONE CONTINUOUS PATH — FROM INSPIRATION TO LEADERSHIP
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ================= FRAMEWORK ================= -->
<section id="our-framework" class="relative py-20 lg:py-28 bg-slate-950 overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(1,157,222,0.12),transparent_25%),radial-gradient(circle_at_bottom_right,rgba(243,22,113,0.12),transparent_25%)]"></div>

    <div class="relative z-10 page-shell">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <p class="text-sm uppercase tracking-[0.25em] text-cyan-300 mb-4 animate-on-scroll">
                Our Framework
            </p>
            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-5 animate-on-scroll">
                The Five Pillars of WePOWER
            </h2>
            <p class="text-lg sm:text-xl text-white/70 leading-relaxed animate-on-scroll">
                WePOWER’s work is organized around five connected pillars that move from entry and access to retention, leadership, and institutional change.
            </p>
        </div>

        <div class="grid md:grid-cols-2 xl:grid-cols-5 gap-8">

            <!-- CARD -->
            <div class="relative glass-card rounded-3xl p-7 pt-10 card-hover animate-on-scroll text-white">
                <div class="absolute -top-4 left-6 w-10 h-10 rounded-xl bg-pink-brand flex items-center justify-center font-bold">
                    A
                </div>
                <h3 class="text-xl font-bold mb-3">STEM Outreach & Norms</h3>
                <p class="text-white/75 text-sm">
                    Inspiring girls’ interest in STEM and engineering pathways, and exposiire to power-sector learning opportunities.
                </p>
            </div>

            <div class="relative glass-card rounded-3xl p-7 pt-10 card-hover animate-on-scroll text-white">
                <div class="absolute -top-4 left-6 w-10 h-10 rounded-xl bg-orange-brand flex items-center justify-center font-bold">
                    B
                </div>
                <h3 class="text-xl font-bold mb-3">Recruitment and Internships</h3>
                <p class="text-white/75 text-sm">
                    Creating bridge between women, employers, internships, networking events, and job opportunities.
                </p>
            </div>

            <div class="relative glass-card rounded-3xl p-7 pt-10 card-hover animate-on-scroll text-white">
                <div class="absolute -top-4 left-6 w-10 h-10 rounded-xl bg-cyan-brand flex items-center justify-center font-bold">
                    C
                </div>
                <h3 class="text-xl font-bold mb-3">Professional Development</h3>
                <p class="text-white/75 text-sm">
                    Supporting training, mentoring, techincal learning, confidence building, and leadership progression.
                </p>
            </div>

            <div class="relative glass-card rounded-3xl p-7 pt-10 card-hover animate-on-scroll text-white">
                <div class="absolute -top-4 left-6 w-10 h-10 rounded-xl bg-pink-brand flex items-center justify-center font-bold">
                    D
                </div>
                <h3 class="text-xl font-bold mb-3">Retention & Facilities</h3>
                <p class="text-white/75 text-sm">
                    Improving workplace conditions through family-friendly systems, facilities, reintegration support, and safer environments.
                </p>
            </div>

            <div class="relative glass-card rounded-3xl p-7 pt-10 card-hover animate-on-scroll text-white">
                <div class="absolute -top-4 left-6 w-10 h-10 rounded-xl bg-orange-brand flex items-center justify-center font-bold">
                    E
                </div>
                <h3 class="text-xl font-bold mb-3">Policy & Networking</h3>
                <p class="text-white/75 text-sm">
                    Embedding gender-responsive policiesm targets, governance, and sector-wide collaboration for lasting impact.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- ================= HOW IT WORKS ================= -->
<section class="py-20 lg:py-28 bg-white">
    <div class="page-shell">
        <div class="grid lg:grid-cols-2 gap-14 items-start">
            <div>
                <p class="text-sm uppercase tracking-[0.25em] text-orange-brand mb-4 animate-on-scroll">How It Works</p>
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-slate-900 mb-6 animate-on-scroll">
                    A Network Built on Partners, Evidence, and Action
                </h2>
                <p class="text-lg text-slate-600 leading-relaxed mb-6 animate-on-scroll" style="transition-delay: 0.1s;">
                    WePOWER’s model is collaborative. It combines research, local engagement, peer learning, and structured partner activities to turn ideas into measurable action.
                </p>

                <div class="space-y-5">
                    <div class="flex gap-4 animate-on-scroll" style="transition-delay: 0.14s;">
                        <div class="w-12 h-12 rounded-2xl bg-pink-100 text-pink-600 flex items-center justify-center font-bold shrink-0">01</div>
                        <div>
                            <h3 class="text-xl font-bold text-slate-900 mb-1">Partners identify and implement actions</h3>
                            <p class="text-slate-600 leading-relaxed">Utilities, institutions, and organizations carry out practical gender-focused activities aligned with the framework.</p>
                        </div>
                    </div>

                    <div class="flex gap-4 animate-on-scroll" style="transition-delay: 0.2s;">
                        <div class="w-12 h-12 rounded-2xl bg-cyan-100 text-cyan-700 flex items-center justify-center font-bold shrink-0">02</div>
                        <div>
                            <h3 class="text-xl font-bold text-slate-900 mb-1">Learning is shared across the region</h3>
                            <p class="text-slate-600 leading-relaxed">Working groups, reports, and peer exchange help good practices spread beyond one institution or country.</p>
                        </div>
                    </div>

                    <div class="flex gap-4 animate-on-scroll" style="transition-delay: 0.26s;">
                        <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-700 flex items-center justify-center font-bold shrink-0">03</div>
                        <div>
                            <h3 class="text-xl font-bold text-slate-900 mb-1">Data informs strategy and improvement</h3>
                            <p class="text-slate-600 leading-relaxed">Assessment, metrics, and partner experience guide future priorities and strengthen long-term impact.</p>
                        </div>
                    </div>

                    <div class="flex gap-4 animate-on-scroll" style="transition-delay: 0.32s;">
                        <div class="w-12 h-12 rounded-2xl bg-pink-100 text-pink-600 flex items-center justify-center font-bold shrink-0">04</div>
                        <div>
                            <h3 class="text-xl font-bold text-slate-900 mb-1">National and regional systems reinforce each other</h3>
                            <p class="text-slate-600 leading-relaxed">Country-level chapters and regional coordination work together so momentum is sustained over time.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="animate-on-scroll flex items-center h-full">
    <div class="w-full overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-2xl">
        
        <!-- top image -->
        <div class="relative h-40 sm:h-48 overflow-hidden">
            <img 
                src="{{ asset('images/bgg.jpeg') }}" 
                alt="Women in energy"
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0.2 bg-gradient-to-t from-white via-white/30 to-transparent"></div>
        </div>

        <!-- content -->
        <div class="p-8 sm:p-10 -mt-2 relative z-10">
            <h3 class="text-2xl font-bold text-slate-900 mb-6">
                What makes the approach different
            </h3>

            <div class="space-y-5">
                <div class="pb-5 border-b border-slate-200">
                    <p class="text-lg font-semibold text-slate-900">Regional, but locally grounded</p>
                    <p class="text-slate-600 mt-1">
                        It connects countries and institutions while staying focused on practical actions inside workplaces and systems.
                    </p>
                </div>

                <div class="pb-5 border-b border-slate-200">
                    <p class="text-lg font-semibold text-slate-900">Evidence-based</p>
                    <p class="text-slate-600 mt-1">
                        Research, interviews, surveys, metrics, and partner reporting shape how the network evolves.
                    </p>
                </div>

                <div class="pb-5 border-b border-slate-200">
                    <p class="text-lg font-semibold text-slate-900">Built for continuity</p>
                    <p class="text-slate-600 mt-1">
                        The emphasis is not just on awareness, but on systems, structures, chapters, and governance that can last.
                    </p>
                </div>

                <div>
                    <p class="text-lg font-semibold text-slate-900">Designed for scale</p>
                    <p class="text-slate-600 mt-1">
                        Lessons, tools, and programs can be adapted and expanded across partners and countries over time.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
</div>
            </div>
        </div>
    </div>
</section>
<!-- ================= GLOBAL WEPOWER NETWORK MAP ================= -->
<section class="relative py-20 lg:py-28 overflow-hidden bg-[#eef7fb]">
    <div class="max-w-screen-2xl mx-auto px-5 sm:px-8 lg:px-12">

        <div class="text-center mb-8">
            <h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-bold text-[#08285c]">
                A Global Network for Sustainable Development
            </h2>
            <p class="mt-3 text-lg sm:text-xl text-slate-600">
                Connecting headquarters, regional coordination, and South Asian country partners.
            </p>
        </div>

        <div class="relative min-h-[620px] lg:min-h-[760px] rounded-[34px] overflow-hidden bg-[#eaf6fb] shadow-[0_30px_90px_rgba(15,23,42,0.14)] border border-white">

            <img
                src="https://upload.wikimedia.org/wikipedia/commons/8/83/Equirectangular_projection_SW.jpg"
                alt="World map"
                class="absolute inset-0 w-full h-full object-cover opacity-[0.32] mix-blend-multiply"
            >

            <div class="absolute inset-0 bg-gradient-to-br from-white/75 via-cyan-50/25 to-blue-100/40"></div>

            <svg class="absolute inset-0 w-full h-full z-10 pointer-events-none" viewBox="0 0 1400 760" preserveAspectRatio="none">

                <!-- HQ to AIT YCA Thailand: solid glowing data line -->
                <path
                    class="hq-to-yca-line"
                    d="M235 300 C430 145, 760 190, 1045 350"
                />

                <circle class="data-pulse pulse-1" r="7">
                    <animateMotion dur="4s" repeatCount="indefinite" path="M235 300 C430 145, 760 190, 1045 350" />
                </circle>
                <circle class="data-pulse pulse-2" r="5">
                    <animateMotion dur="4s" begin="1.2s" repeatCount="indefinite" path="M235 300 C430 145, 760 190, 1045 350" />
                </circle>

                <!-- YCA to South Asian countries: packet style lines -->
                <path class="packet-line" d="M1045 350 C975 280, 890 250, 805 230" />
                <path class="packet-line" d="M1045 350 C970 300, 900 285, 830 270" />
                <path class="packet-line" d="M1045 350 C965 330, 890 330, 805 335" />
                <path class="packet-line" d="M1045 350 C975 360, 905 375, 825 390" />
                <path class="packet-line" d="M1045 350 C970 390, 895 440, 815 500" />
                <path class="packet-line" d="M1045 350 C925 315, 780 310, 680 320" />
                <path class="packet-line" d="M1045 350 C945 410, 830 455, 710 500" />

            </svg>

            <!-- Headquarters -->
            <div class="absolute left-[4%] top-[31%] z-30 hidden sm:block">
                <p class="text-xl font-extrabold text-[#08285c] leading-tight">
                    HEADQUARTERS<br>WORLD BANK
                </p>
                <p class="text-base text-[#08285c]/80 mt-2">
                    Washington, DC<br>USA
                </p>
            </div>

            <div class="map-hub absolute left-[17%] top-[36%] z-30">
                <div class="hub-icon bg-[#08285c]">🏛️</div>
            </div>

            <!-- Thailand YCA -->
            <div class="map-hub absolute right-[23%] top-[45%] z-30">
                <div class="hub-icon hub-yca bg-[#2e7d32]">🏫</div>
            </div>

            <div class="absolute right-[8%] top-[43%] z-30 hidden sm:block">
                <p class="text-xl font-extrabold text-[#2e7d32] leading-tight">
                    REGIONAL SECRETARIAT<br>AIT YCA
                </p>
                <p class="text-base text-[#2e7d32]/90 mt-2">
                    Thailand
                </p>
            </div>

            <!-- Country Nodes -->
            <div class="country-node absolute left-[57%] top-[27%] z-30">Nepal</div>
            <div class="country-node absolute left-[59%] top-[33%] z-30">Bhutan</div>
            <div class="country-node absolute left-[57%] top-[42%] z-30">India</div>
            <div class="country-node absolute left-[60%] top-[49%] z-30">Bangladesh</div>
            <div class="country-node absolute left-[57%] top-[64%] z-30">Sri Lanka</div>
            <div class="country-node absolute left-[47%] top-[41%] z-30">Pakistan</div>
            <div class="country-node absolute left-[50%] top-[63%] z-30">Maldives</div>

            <!-- Legend -->
            <div class="absolute left-6 bottom-28 z-40 w-[260px] rounded-3xl bg-white/75 backdrop-blur-md border border-white/70 shadow-xl p-5 hidden md:block">
                <div class="legend-row">
                    <span class="legend-icon bg-[#08285c]">🏛️</span>
                    <div>
                        <h5>HEADQUARTERS</h5>
                        <p>World Bank<br>Washington, DC, USA</p>
                    </div>
                </div>

                <div class="legend-row">
                    <span class="legend-icon bg-[#2e7d32]">🏫</span>
                    <div>
                        <h5>REGIONAL SECRETARIAT</h5>
                        <p>AIT YCA<br>Thailand</p>
                    </div>
                </div>

                <div class="legend-row">
                    <span class="legend-icon bg-[#e5a82e]">●</span>
                    <div>
                        <h5>COUNTRY PARTNERS</h5>
                        <p>Nepal, Bhutan, India, Bangladesh, Maldives, Pakistan, Sri Lanka</p>
                    </div>
                </div>
            </div>

            <!-- Bottom Text -->
            <div class="absolute left-[16%] right-[8%] bottom-8 z-40">
                <div class="grid grid-cols-2 md:grid-cols-5 gap-4 border-t border-slate-300/70 pt-5">
                    <div class="value-item">
                        <span>🤝</span>
                        <h4>COLLABORATE</h4>
                        <p>Building regional partnerships</p>
                    </div>
                    <div class="value-item">
                        <span>💡</span>
                        <h4>SHARE</h4>
                        <p>Knowledge from HQ to region</p>
                    </div>
                    <div class="value-item">
                        <span>🌐</span>
                        <h4>CONNECT</h4>
                        <p>Linking South Asian countries</p>
                    </div>
                    <div class="value-item">
                        <span>👥</span>
                        <h4>EMPOWER</h4>
                        <p>Supporting people and institutions</p>
                    </div>
                    <div class="value-item">
                        <span>🍃</span>
                        <h4>SUSTAIN</h4>
                        <p>Long-term regional impact</p>
                    </div>
                </div>

                <div class="text-center mt-6">
                    <h3 class="font-serif text-2xl font-bold text-[#08285c]">
                        Headquarters to Secretariat. Secretariat to Countries.
                    </h3>
                    <p class="font-serif italic text-xl text-[#2e7d32] mt-1">
                        One Regional Network. Shared Purpose.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ================= LONG TERM VISION ================= -->
<section class="py-20 lg:py-28 bg-white">
    <div class="page-shell">
        <div class="grid lg:grid-cols-2 gap-14 items-center">
            <div class="animate-on-scroll">
                <p class="text-sm uppercase tracking-[0.25em] text-pink-brand mb-4">Long-Term Vision</p>
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-slate-900 mb-6">
                    Visibility Designed for Sustainability
                </h2>
                <p class="text-lg text-slate-600 leading-relaxed mb-5">
                    WePOWER is moving toward a stronger long-term institutional model through the development of National Chapters and a permanent Regional Secretariat.
                </p>
                <p class="text-lg text-slate-600 leading-relaxed mb-5">
                    This matters because lasting change needs more than campaigns or isolated projects. It needs governance, coordination, resource mobilization, shared systems, and continuity across partners.
                </p>
                <p class="text-lg text-slate-600 leading-relaxed">
                    The result is a network that can keep expanding opportunities for women while also building a stronger, more inclusive energy future for the region.
                </p>
            </div>

            <div class="animate-on-scroll">
                <div class="rounded-[30px] bg-gradient-to-br from-slate-950 via-slate-900 to-slate-800 p-8 sm:p-10 text-white shadow-2xl">
                    <h3 class="text-2xl font-bold mb-7">What sustainability looks like</h3>

                    <div class="space-y-5">
                        <div class="flex gap-4">
    <span class="w-11 h-11 rounded-xl bg-pink-500/20 flex items-center justify-center shrink-0">✓</span>
    <p class="text-white/80 leading-relaxed">
        Regional structure for coordinated network action
    </p>
</div>

<div class="flex gap-4">
    <span class="w-11 h-11 rounded-xl bg-cyan-500/20 flex items-center justify-center shrink-0">✓</span>
    <p class="text-white/80 leading-relaxed">
        National chapters with defined roles and governance
    </p>
</div>

<div class="flex gap-4">
    <span class="w-11 h-11 rounded-xl bg-orange-500/20 flex items-center justify-center shrink-0">✓</span>
    <p class="text-white/80 leading-relaxed">
        Knowledge infrastructure and regional coordination
    </p>
</div>

<div class="flex gap-4">
    <span class="w-11 h-11 rounded-xl bg-pink-500/20 flex items-center justify-center shrink-0">✓</span>
    <p class="text-white/80 leading-relaxed">
        Capabilities, metrics, and institutional reform
    </p>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= CTA ================= -->
<section class="relative py-20 lg:py-28 overflow-hidden bg-slate-950">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(1,157,222,0.12),transparent_30%),radial-gradient(circle_at_top_left,rgba(243,22,113,0.12),transparent_25%)]"></div>

    <div class="relative z-10 page-shell text-center">
        <p class="text-sm uppercase tracking-[0.25em] text-cyan-300 mb-4 animate-on-scroll">
            Explore More
        </p>
        <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-6 animate-on-scroll">
            Work Behind the Network
        </h2>
        <p class="text-lg sm:text-xl text-white/70 leading-relaxed max-w-3xl mx-auto mb-10 animate-on-scroll" style="transition-delay: 0.1s;">
            This website brings together the evidence, stories, structure, and strategic direction of WePOWER so visitors can understand not only the challenge, but also the collective response shaping the future.
        </p>

        <div class="flex flex-wrap justify-center gap-4 animate-on-scroll" style="transition-delay: 0.18s;">
            <a href="{{ url('/') }}"
               class="px-8 py-4 bg-pink-brand text-white rounded-xl font-semibold shadow-xl hover:opacity-90 transition">
                Back to Home
            </a>
            <a href="#who-we-are"
               class="px-8 py-4 border border-white/20 text-white rounded-xl font-semibold hover:bg-white/10 transition">
                Revisit About
            </a>
        </div>
    </div>
</section>

<style>
    .hq-to-yca-line {
    fill: none;
    stroke: rgba(245, 185, 73, 0.95);
    stroke-width: 4;
    stroke-linecap: round;
    filter:
        drop-shadow(0 0 4px rgba(245,185,73,0.9))
        drop-shadow(0 0 12px rgba(245,185,73,0.75));
}

.data-pulse {
    fill: #fff7c7;
    stroke: #f5b949;
    stroke-width: 3;
    filter: drop-shadow(0 0 10px rgba(245,185,73,1));
}

.packet-line {
    fill: none;
    stroke: rgba(46, 125, 50, 0.85);
    stroke-width: 2.4;
    stroke-linecap: round;
    stroke-dasharray: 2 14;
    filter: drop-shadow(0 0 7px rgba(46,125,50,0.75));
    animation: packetFlow 5s linear infinite;
}

@keyframes packetFlow {
    to {
        stroke-dashoffset: -160;
    }
}

.map-hub {
    transform: translate(-50%, -50%);
}

.hub-icon {
    width: 86px;
    height: 86px;
    border-radius: 999px;
    border: 8px solid white;
    box-shadow:
        0 0 0 2px rgba(255,255,255,0.7),
        0 0 35px rgba(245,185,73,0.9),
        0 18px 35px rgba(15,23,42,0.25);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.1rem;
    color: white;
}

.hub-yca {
    box-shadow:
        0 0 0 2px rgba(255,255,255,0.7),
        0 0 35px rgba(46,125,50,0.9),
        0 18px 35px rgba(15,23,42,0.25);
}

.country-node {
    padding: 0.45rem 0.85rem;
    border-radius: 999px;
    background: rgba(255,255,255,0.9);
    border: 1px solid rgba(226,232,240,0.95);
    box-shadow:
        0 10px 25px rgba(15,23,42,0.12),
        0 0 16px rgba(46,125,50,0.18);
    font-size: 0.78rem;
    font-weight: 800;
    color: #08285c;
    backdrop-filter: blur(10px);
}

.country-node::before {
    content: "";
    display: inline-block;
    width: 9px;
    height: 9px;
    margin-right: 0.45rem;
    border-radius: 999px;
    background: #e5a82e;
    box-shadow: 0 0 12px rgba(229,168,46,0.9);
}

.legend-row {
    display: flex;
    gap: 0.8rem;
    align-items: flex-start;
    margin-bottom: 1rem;
}

.legend-row:last-child {
    margin-bottom: 0;
}

.legend-icon {
    width: 34px;
    height: 34px;
    border-radius: 999px;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.95rem;
    flex-shrink: 0;
}

.legend-row h5 {
    font-size: 0.72rem;
    font-weight: 900;
    color: #08285c;
    line-height: 1rem;
}

.legend-row p {
    font-size: 0.68rem;
    line-height: 0.95rem;
    color: #08285c;
    margin-top: 0.15rem;
}

.value-item {
    text-align: center;
    color: #08285c;
}

.value-item span {
    display: block;
    font-size: 1.8rem;
    margin-bottom: 0.45rem;
}

.value-item h4 {
    font-size: 0.78rem;
    font-weight: 900;
    letter-spacing: 0.02em;
}

.value-item p {
    font-size: 0.68rem;
    line-height: 0.95rem;
    color: #1e3a5f;
    margin-top: 0.25rem;
}

@media (max-width: 768px) {
    .hub-icon {
        width: 68px;
        height: 68px;
        font-size: 1.6rem;
        border-width: 6px;
    }

    .country-node {
        font-size: 0.65rem;
        padding: 0.35rem 0.6rem;
    }
}
</style>
<script>
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