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
                    Inspiring girls’ interest in STEM and engineering pathways, and exposure to power-sector learning opportunities.
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
                    Supporting training, mentoring, technical learning, confidence building, and leadership progression.
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