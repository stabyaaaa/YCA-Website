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
                    WePOWER is a regional network connecting institutions, utilities, universities, and professional partners to create stronger pathways for women in the energy sector — from participation and progression to leadership and institutional change.
                </p>

                <div class="flex flex-wrap gap-4 animate-on-scroll" style="transition-delay: 0.2s;">
                    <a href="#who-we-are"
                       class="px-7 py-4 bg-slate-900 hover:bg-slate-800 text-white rounded-2xl font-semibold shadow-lg transition">
                        Learn About WePOWER
                    </a>

                    <a href="#our-framework"
                       class="px-7 py-4 border border-slate-300 text-slate-800 rounded-2xl font-semibold hover:border-slate-400 hover:bg-slate-50 transition">
                        View Our Framework
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
                    WePOWER is the South Asia Women in Power Sector Professional Network, established in 2019 as a voluntary platform of power utilities, universities, and professional associations across South Asia. It brings together over 50 partners working to increase women’s participation in energy-sector careers, particularly in technical and leadership roles.
                </p>

                <p class="text-lg text-slate-600 leading-relaxed">
                    Supported by the World Bank’s South Asia Energy program, the network combines research, stakeholder engagement, and practical action to address barriers that limit women’s entry, retention, and advancement in the sector.
                </p>
            </div>
        </div>

        <div class="animate-on-scroll space-y-6">
            <p class="text-lg text-slate-600 leading-relaxed">
                The network operates through a structured, data-driven approach that draws on partner reporting, surveys, and regional assessments, reflecting insights from thousands of participants across utilities and institutions to identify both progress and persistent challenges affecting women in the power sector. At the core of WePOWER’s model is a five-pillar framework connecting STEM education, recruitment, professional development, retention, and policy and institutional change, enabling coordinated action rather than isolated initiatives and supporting long-term improvements across the workforce pipeline. The network has expanded through National Chapters across South Asia, strengthening country-level coordination while maintaining regional collaboration through knowledge sharing, joint initiatives, and partner-led action.
            </p>

            <p class="text-lg text-slate-600 leading-relaxed">
                Since its establishment, WePOWER partners have implemented thousands of activities supporting women at different stages of their careers, including students, interns, young professionals, and returning workers. These efforts span training programs, internships, outreach initiatives, and workplace improvements that collectively strengthen participation and retention in the sector. As the network continues to grow, it focuses on expanding partnerships, refining its frameworks, and supporting institutional change, ensuring that progress is sustained and that opportunities for women in the power sector continue to advance across the region.
            </p>
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
                            <h3 class="text-3xl font-semibold text-slate-900 mb-4">Build the Pipeline</h3>
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
                            <h3 class="text-3xl font-semibold text-slate-900 mb-4">Open Access to Jobs</h3>
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
                            <h3 class="text-3xl font-semibold text-slate-900 mb-4">Shift Institutions</h3>
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
            <p class="text-lg sm:text-xl text-white/70 leading-relaxed animate-on-scroll" style="transition-delay: 0.12s;">
                WePOWER’s work is organized around five connected pillars that move from entry and access to retention, leadership, and institutional change.
            </p>
        </div>

        <div class="grid md:grid-cols-2 xl:grid-cols-5 gap-6">
            <div class="glass-card rounded-3xl p-7 card-hover animate-on-scroll text-white">
                <div class="w-50 h-14 rounded-2xl bg-pink-500/20 flex items-center justify-center text-2xl mb-5">Pillar A</div>
                <h3 class="text-2xl font-bold mb-3">STEM Outreach & Norms</h3>
                <p class="text-white/75 leading-relaxed text-sm">
                    Inspiring girls’ interest in STEM, engineering pathways, and exposure to power-sector learning opportunities.
                </p>
            </div>

            <div class="glass-card rounded-3xl p-7 card-hover animate-on-scroll text-white" style="transition-delay: 0.06s;">
                <div class="w-50 h-14 rounded-2xl bg-orange-500/20 flex items-center justify-center text-2xl mb-5">Pillar B</div>
                <h3 class="text-2xl font-bold mb-3">Recruitment and Internships</h3>
                <p class="text-white/75 leading-relaxed text-sm">
                    Creating bridges between women, employers, internships, networking events, and job opportunities.
                </p>
            </div>

            <div class="glass-card rounded-3xl p-7 card-hover animate-on-scroll text-white" style="transition-delay: 0.12s;">
                <div class="w-50 h-14 rounded-2xl bg-cyan-500/20 flex items-center justify-center text-2xl mb-5">Pillar C</div>
                <h3 class="text-2xl font-bold mb-3">Professional Development and Mentoring</h3>
                <p class="text-white/75 leading-relaxed text-sm">
                    Supporting training, mentoring, technical learning, confidence building, and leadership progression.
                </p>
            </div>

            <div class="glass-card rounded-3xl p-7 card-hover animate-on-scroll text-white" style="transition-delay: 0.18s;">
                <div class="w-50 h-14 rounded-2xl bg-pink-500/20 flex items-center justify-center text-2xl mb-5">Pillar D</div>
                <h3 class="text-2xl font-bold mb-3">Retention & Women-Friendly Facilities</h3>
                <p class="text-white/75 leading-relaxed text-sm">
                    Improving workplace conditions through family-friendly systems, facilities, reintegration support, and safer environments.
                </p>
            </div>

            <div class="glass-card rounded-3xl p-7 card-hover animate-on-scroll text-white" style="transition-delay: 0.24s;">
                <div class="w-50 h-14 rounded-2xl bg-orange-500/20 flex items-center justify-center text-2xl mb-5">Pillar E</div>
                <h3 class="text-2xl font-bold mb-3">Policy & Networking & National Chapters</h3>
                <p class="text-white/75 leading-relaxed text-sm">
                    Embedding gender-responsive policies, targets, governance, and sector-wide collaboration for lasting impact.
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
                    <p class="text-lg font-semibold text-slate-900">Regional, but grounded</p>
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

<!-- ================= PARTNERS + CHAPTERS ================= -->
<section class="py-20 lg:py-28 bg-slate-100">
    <div class="page-shell">
        <div class="text-center max-w-4xl mx-auto mb-14">
            <p class="text-sm uppercase tracking-[0.25em] text-cyan-brand mb-4 animate-on-scroll">
                Partners & Chapters
            </p>
            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-slate-900 mb-5 animate-on-scroll">
                A Multi-Country Network With National Anchors
            </h2>
            <p class="text-lg sm:text-xl text-slate-600 leading-relaxed animate-on-scroll" style="transition-delay: 0.1s;">
                WePOWER brings together diverse partners across South Asia, while National Chapters strengthen coordination, ownership, and long-term action inside each country.
            </p>
        </div>

        <div class="grid lg:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-3xl p-8 shadow-lg border border-slate-200 card-hover animate-on-scroll">
                <div class="text-4xl mb-5">🤝</div>
                <h3 class="text-2xl font-bold text-slate-900 mb-3">Who participates</h3>
                <p class="text-slate-600 leading-relaxed">
                    Power utilities, universities, professional associations, government-linked organizations, and other institutions committed to more inclusive energy-sector participation.
                </p>
            </div>

            <div class="bg-white rounded-3xl p-8 shadow-lg border border-slate-200 card-hover animate-on-scroll" style="transition-delay: 0.08s;">
                <div class="text-4xl mb-5">🌍</div>
                <h3 class="text-2xl font-bold text-slate-900 mb-3">Regional collaboration</h3>
                <p class="text-slate-600 leading-relaxed">
                    Shared learning across countries helps partners exchange ideas, compare approaches, and accelerate what works.
                </p>
            </div>

            <div class="bg-white rounded-3xl p-8 shadow-lg border border-slate-200 card-hover animate-on-scroll" style="transition-delay: 0.16s;">
                <div class="text-4xl mb-5">🏢</div>
                <h3 class="text-2xl font-bold text-slate-900 mb-3">National Chapters</h3>
                <p class="text-slate-600 leading-relaxed">
                    Chapters help embed WePOWER’s agenda in national institutions, build country ownership, and strengthen sustainability.
                </p>
            </div>
        </div>

        <div class="bg-white rounded-[30px] p-8 sm:p-10 lg:p-12 shadow-xl border border-slate-200 animate-on-scroll">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
                <div class="rounded-2xl bg-slate-50 border border-slate-200 p-5 text-center font-semibold text-slate-700">Bangladesh</div>
                <div class="rounded-2xl bg-slate-50 border border-slate-200 p-5 text-center font-semibold text-slate-700">Bhutan</div>
                <div class="rounded-2xl bg-slate-50 border border-slate-200 p-5 text-center font-semibold text-slate-700">India</div>
                <div class="rounded-2xl bg-slate-50 border border-slate-200 p-5 text-center font-semibold text-slate-700">Nepal</div>
                <div class="rounded-2xl bg-slate-50 border border-slate-200 p-5 text-center font-semibold text-slate-700">Pakistan</div>
                <div class="rounded-2xl bg-slate-50 border border-slate-200 p-5 text-center font-semibold text-slate-700">Sri Lanka</div>
            </div>

            <p class="text-slate-600 leading-relaxed text-center mt-8 max-w-4xl mx-auto">
                These chapters strengthen engagement, coordination, resource mobilization, and alignment between WePOWER’s broader mission and country-level priorities.
            </p>
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
                    Designed for Sustainability, Not Just Visibility
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
                            <p class="text-white/80 leading-relaxed">A permanent regional structure to coordinate network-wide activity</p>
                        </div>
                        <div class="flex gap-4">
                            <span class="w-11 h-11 rounded-xl bg-cyan-500/20 flex items-center justify-center shrink-0">✓</span>
                            <p class="text-white/80 leading-relaxed">National chapters with defined roles, plans, and governance</p>
                        </div>
                        <div class="flex gap-4">
                            <span class="w-11 h-11 rounded-xl bg-orange-500/20 flex items-center justify-center shrink-0">✓</span>
                            <p class="text-white/80 leading-relaxed">Knowledge sharing, learning programs, and partner coordination across South Asia</p>
                        </div>
                        <div class="flex gap-4">
                            <span class="w-11 h-11 rounded-xl bg-pink-500/20 flex items-center justify-center shrink-0">✓</span>
                            <p class="text-white/80 leading-relaxed">Ongoing advocacy, metrics, institutional reform, and support for women’s advancement</p>
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
            Learn More
        </p>
        <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-6 animate-on-scroll">
            Explore the Work Behind the Network
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