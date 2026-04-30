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
<section id="wepower-3d-earth" class="wepower-earth-section">
<style>
.wepower-earth-section {
    position: relative;
    overflow: hidden;
    padding: 6rem 1.25rem;
    background:
        radial-gradient(circle at 70% 40%, rgba(46,125,50,0.18), transparent 28%),
        radial-gradient(circle at 25% 30%, rgba(8,40,92,0.22), transparent 32%),
        linear-gradient(135deg, #06192f, #08285c 45%, #0f766e);
    color: white;
}

.earth-wrap {
    max-width: 1500px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 0.9fr 1.35fr;
    gap: 2.5rem;
    align-items: center;
}

.earth-kicker {
    text-transform: uppercase;
    letter-spacing: 0.28em;
    color: #7dd3fc;
    font-weight: 800;
    font-size: 0.8rem;
    margin-bottom: 1rem;
}

.earth-title {
    font-family: Georgia, serif;
    font-size: clamp(2.7rem, 6vw, 5.8rem);
    line-height: 0.95;
    font-weight: 800;
    margin-bottom: 1.4rem;
}

.earth-desc {
    max-width: 620px;
    font-size: 1.1rem;
    line-height: 1.8;
    color: rgba(255,255,255,0.78);
}

.phase-card {
    margin-top: 2rem;
    max-width: 520px;
    border-radius: 26px;
    padding: 1.25rem;
    background: rgba(255,255,255,0.10);
    border: 1px solid rgba(255,255,255,0.18);
    backdrop-filter: blur(16px);
    box-shadow: 0 20px 50px rgba(0,0,0,0.24);
}

.phase-card span {
    display: inline-flex;
    margin-bottom: 0.65rem;
    padding: 0.35rem 0.8rem;
    border-radius: 999px;
    background: rgba(125,211,252,0.16);
    color: #bae6fd;
    font-size: 0.75rem;
    font-weight: 800;
    letter-spacing: 0.12em;
    text-transform: uppercase;
}

.phase-card h3 {
    font-size: 1.35rem;
    font-weight: 850;
    margin-bottom: 0.35rem;
}

.phase-card p {
    color: rgba(255,255,255,0.72);
    line-height: 1.6;
    font-size: 0.95rem;
    margin: 0;
}

.earth-stage {
    position: relative;
    min-height: 720px;
    border-radius: 38px;
    overflow: hidden;
    background:
        radial-gradient(circle at center, rgba(59,130,246,0.16), transparent 55%),
        rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.16);
    box-shadow:
        inset 0 0 90px rgba(255,255,255,0.05),
        0 30px 90px rgba(0,0,0,0.25);
}

#globeViz {
    position: absolute;
    inset: 0;
    z-index: 2;
}

.earth-glow {
    position: absolute;
    inset: 10%;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(56,189,248,0.18), transparent 64%);
    filter: blur(18px);
    z-index: 1;
    pointer-events: none;
}

.place-chip {
    position: absolute;
    top: 1.2rem;
    left: 50%;
    z-index: 12;
    transform: translateX(-50%) translateY(-12px);
    opacity: 0;
    width: min(540px, calc(100% - 2rem));
    text-align: center;
    padding: .85rem 1.15rem;
    border-radius: 999px;
    background: rgba(2, 6, 23, 0.56);
    border: 1px solid rgba(255,255,255,0.24);
    backdrop-filter: blur(18px);
    box-shadow: 0 18px 45px rgba(0,0,0,0.25);
    transition: .55s ease;
}

.place-chip.show {
    opacity: 1;
    transform: translateX(-50%) translateY(0);
}

.place-chip small {
    display: block;
    text-transform: uppercase;
    letter-spacing: .18em;
    color: #bae6fd;
    font-weight: 900;
    font-size: .68rem;
    margin-bottom: .2rem;
}

.place-chip strong {
    display: block;
    font-size: clamp(1rem, 2vw, 1.45rem);
}

.country-dialogue {
    position: absolute;
    left: 50%;
    bottom: 1.25rem;
    z-index: 12;
    width: min(650px, calc(100% - 2.5rem));
    transform: translateX(-50%) translateY(24px) scale(.96);
    opacity: 0;
    padding: 1.1rem 1.2rem;
    border-radius: 28px;
    background:
        linear-gradient(135deg, rgba(15,23,42,.72), rgba(8,47,73,.54)),
        rgba(2, 6, 23, .62);
    border: 1px solid rgba(255,255,255,.24);
    backdrop-filter: blur(20px);
    box-shadow: 0 24px 70px rgba(0,0,0,.38);
    transition: .65s ease;
}

.country-dialogue.show {
    opacity: 1;
    transform: translateX(-50%) translateY(0) scale(1);
}

.dialogue-top {
    display: flex;
    justify-content: space-between;
    gap: 1rem;
    margin-bottom: .65rem;
}

.dialogue-eyebrow {
    font-size: .7rem;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: #bae6fd;
    font-weight: 900;
}

.dialogue-count {
    font-size: .72rem;
    padding: .3rem .65rem;
    border-radius: 999px;
    background: rgba(255,255,255,.13);
    border: 1px solid rgba(255,255,255,.16);
}

.country-dialogue h4 {
    margin: 0 0 .45rem;
    font-size: clamp(1.25rem, 3vw, 2rem);
    font-weight: 900;
}

.country-dialogue p {
    margin: 0;
    color: rgba(255,255,255,.78);
    line-height: 1.65;
}

.earth-loading {
    position: absolute;
    inset: 0;
    z-index: 20;
    display: grid;
    place-items: center;
    background: rgba(6,25,47,.82);
    transition: .5s ease;
}

.earth-loading.hide {
    opacity: 0;
    visibility: hidden;
}

.loader-dot {
    width: 46px;
    height: 46px;
    border-radius: 50%;
    border: 4px solid rgba(255,255,255,.18);
    border-top-color: #7dd3fc;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

@media (max-width: 1024px) {
    .earth-wrap { grid-template-columns: 1fr; }
    .earth-stage { min-height: 620px; }
}

@media (max-width: 640px) {
    .wepower-earth-section { padding: 4rem 1rem; }
    .earth-stage { min-height: 560px; border-radius: 28px; }
    .country-dialogue { border-radius: 22px; padding: 1rem; }
    .place-chip { border-radius: 22px; }
}
</style>

<div class="earth-wrap">
    <div class="earth-copy">
        <p class="earth-kicker">Global Network</p>

        <h2 class="earth-title">
            From Headquarters<br>
            to Regional Impact
        </h2>

        <p class="earth-desc">
            A premium globe journey showing how WePOWER connects World Bank headquarters,
            AIT YCA in Thailand, and partner countries across South Asia.
        </p>

        <div class="phase-card">
            <span id="phaseTag">Phase 01</span>
            <h3 id="phaseTitle">World Bank Headquarters</h3>
            <p id="phaseText">Starting from Washington, DC, where global coordination begins.</p>
        </div>
    </div>

    <div class="earth-stage">
        <div class="earth-glow"></div>
        <div id="globeViz"></div>

        <div id="placeChip" class="place-chip">
            <small id="placeType">Headquarters</small>
            <strong id="placeName">World Bank Headquarters — Washington, DC</strong>
        </div>

        <div id="countryDialogue" class="country-dialogue">
            <div class="dialogue-top">
                <div class="dialogue-eyebrow">Partner Country</div>
                <div id="dialogueCount" class="dialogue-count">01 / 07</div>
            </div>
            <h4 id="dialogueTitle">Bhutan</h4>
            <p id="dialogueText">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>

        <div id="earthLoading" class="earth-loading">
            <div class="loader-dot"></div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/three"></script>
<script src="https://unpkg.com/globe.gl"></script>

<script>
document.addEventListener("DOMContentLoaded", async function () {
    const section = document.getElementById("wepower-3d-earth");
    const globeEl = document.getElementById("globeViz");
    const loading = document.getElementById("earthLoading");

    const phaseTag = document.getElementById("phaseTag");
    const phaseTitle = document.getElementById("phaseTitle");
    const phaseText = document.getElementById("phaseText");

    const placeChip = document.getElementById("placeChip");
    const placeType = document.getElementById("placeType");
    const placeName = document.getElementById("placeName");

    const dialogue = document.getElementById("countryDialogue");
    const dialogueCount = document.getElementById("dialogueCount");
    const dialogueTitle = document.getElementById("dialogueTitle");
    const dialogueText = document.getElementById("dialogueText");

    if (!section || !globeEl || typeof Globe === "undefined") return;

    const COUNTRY_DURATION = 10000;

    const REQUIRED_COUNTRIES = [
        "United States of America",
        "Thailand",
        "Bangladesh",
        "Bhutan",
        "India",
        "Maldives",
        "Nepal",
        "Pakistan",
        "Sri Lanka"
    ];

    function cleanName(value) {
        return String(value || "").trim();
    }

    function countryName(feature) {
        return cleanName(
            feature?.properties?.ADMIN ||
            feature?.properties?.NAME_LONG ||
            feature?.properties?.NAME ||
            feature?.properties?.name
        );
    }

    const hq = {
        name: "Washington, DC",
        polygonName: "United States of America",
        label: "WORLD BANK",
        chip: "World Bank Headquarters — Washington, DC",
        lat: 38.9072,
        lng: -77.0369,
        size: 0.32,
        type: "hq"
    };

    const yca = {
        name: "Thailand",
        polygonName: "Thailand",
        label: "Yunus Center AIT",
        chip: "AIT YCA — Thailand",
        lat: 13.7563,
        lng: 100.5018,
        size: 0.32,
        type: "yca"
    };

    const partnerLocations = [
        {
            name: "Bangladesh",
            polygonName: "Bangladesh",
            label: "BANGLADESH",
            lat: 23.6850,
            lng: 90.3563,
            size: 0.22,
            zoom: .5,
            text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Bangladesh strengthens regional collaboration through shared learning and partnership."
        },
        {
            name: "Bhutan",
            polygonName: "Bhutan",
            label: "BHUTAN",
            lat: 27.5142,
            lng: 90.4336,
            size: 0.22,
            zoom: 0.5,
            text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Bhutan is highlighted as a focused partner country in the regional network."
        },
        {
            name: "India",
            polygonName: "India",
            label: "INDIA",
            lat: 20.5937,
            lng: 78.9629,
            size: 0.22,
            zoom: 1,
            text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. India appears as a major partner in the South Asian network."
        },
        {
            name: "Maldives",
            polygonName: "Maldives",
            label: "MALDIVES",
            lat: 3.2028,
            lng: 73.2207,
            size: 0.22,
            zoom: 0.6,
            text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maldives is shown with a focused partner country dialogue."
        },
        {
            name: "Nepal",
            polygonName: "Nepal",
            label: "NEPAL",
            lat: 28.3949,
            lng: 84.1240,
            size: 0.22,
            zoom: 0.5,
            text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nepal joins the regional map through the WePOWER partner network."
        },
        {
            name: "Pakistan",
            polygonName: "Pakistan",
            label: "PAKISTAN",
            lat: 30.3753,
            lng: 69.3451,
            size: 0.22,
            zoom: 0.8,
            text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pakistan is highlighted with a refined border and country message."
        },
        {
            name: "Sri Lanka",
            polygonName: "Sri Lanka",
            label: "SRI LANKA",
            lat: 7.8731,
            lng: 80.7718,
            size: 0.22,
            zoom: 0.5,
            text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sri Lanka completes the partner country sequence."
        }
    ].sort((a, b) => a.name.localeCompare(b.name));

    let worldPolygons = [];
    let activeCountryName = "";
    let highlightedCountries = [];

    const world = Globe()(globeEl)
        .globeImageUrl("https://unpkg.com/three-globe/example/img/earth-blue-marble.jpg")
        .bumpImageUrl("https://unpkg.com/three-globe/example/img/earth-topology.png")
        .backgroundColor("rgba(0,0,0,0)")
        .showAtmosphere(true)
        .atmosphereColor("#ffffff")
        .atmosphereAltitude(0.13)

        .polygonsData([])
        .polygonCapColor(d => {
            const name = countryName(d);

            if (name === activeCountryName) {
                return "rgba(186, 230, 253, 0.25)";
            }

            if (highlightedCountries.includes(name)) {
                return "rgba(125, 211, 252, 0.08)";
            }

            return activeCountryName
                ? "rgba(0, 0, 0, 0.50)"
                : "rgba(255, 255, 255, 0.04)";
        })
        .polygonSideColor(d => {
            const name = countryName(d);
            return name === activeCountryName
                ? "rgba(56, 189, 248, 0.24)"
                : "rgba(0, 0, 0, 0.06)";
        })
        .polygonStrokeColor(d => {
            const name = countryName(d);

            if (name === activeCountryName) {
                return "rgba(255,255,255,0.96)";
            }

            if (highlightedCountries.includes(name)) {
                return "rgba(186,230,253,0.34)";
            }

            return activeCountryName
                ? "rgba(255,255,255,0.03)"
                : "rgba(255,255,255,0.08)";
        })
        .polygonAltitude(d => {
            const name = countryName(d);

            if (name === activeCountryName) return 0.042;
            if (highlightedCountries.includes(name)) return 0.012;
            return 0.002;
        })
        .polygonLabel(d => `<b>${countryName(d)}</b>`)
        .polygonsTransitionDuration(350)

        .pointsData([])
        .pointLat(d => d.lat)
        .pointLng(d => d.lng)
        .pointAltitude(0.05)
        .pointRadius(d => d.size)
        .pointColor(d => d.type === "country" ? "#bae6fd" : "#ffffff")

        .labelsData([])
        .labelLat(d => d.lat)
        .labelLng(d => d.lng)
        .labelText(d => d.label)
        .labelSize(d => d.type === "country-active" ? 1.25 : 0.82)
        .labelDotRadius(0)
        .labelColor(() => "#ffffff")
        .labelAltitude(0.07)
        .labelResolution(2)

        .ringsData([])
        .ringLat(d => d.lat)
        .ringLng(d => d.lng)
        .ringColor(() => t => `rgba(186,230,253,${1 - t})`)
        .ringMaxRadius(d => d.maxR)
        .ringPropagationSpeed(d => d.speed)
        .ringRepeatPeriod(d => d.repeat)

        .arcsData([])
        .arcStartLat(d => d.startLat)
        .arcStartLng(d => d.startLng)
        .arcEndLat(d => d.endLat)
        .arcEndLng(d => d.endLng)
        .arcColor(d => d.color)
        .arcAltitude(0.18)
        .arcStroke(0.36)
        .arcDashLength(0.25)
        .arcDashGap(1.65)
        .arcDashInitialGap(() => Math.random() * 2)
        .arcDashAnimateTime(3500);

    world.controls().autoRotate = true;
    world.controls().autoRotateSpeed = 0.22;
    world.controls().enableZoom = false;

    function resizeGlobe() {
        const rect = globeEl.getBoundingClientRect();
        world.width(rect.width);
        world.height(rect.height);
    }

    resizeGlobe();
    window.addEventListener("resize", resizeGlobe);

    try {
        const res = await fetch("https://raw.githubusercontent.com/nvkelso/natural-earth-vector/master/geojson/ne_10m_admin_0_countries.geojson");
        const geo = await res.json();

        worldPolygons = geo.features.filter(feature => {
            const name = countryName(feature);
            return REQUIRED_COUNTRIES.includes(name);
        });

        world.polygonsData(worldPolygons);
    } catch (e) {
        console.warn("Country borders could not be loaded.", e);
    }

    setTimeout(() => loading.classList.add("hide"), 700);

    function refreshPolygons() {
        world.polygonsData([...worldPolygons]);
    }

    function updatePhase(tag, title, text) {
        phaseTag.textContent = tag;
        phaseTitle.textContent = title;
        phaseText.textContent = text;
    }

    function showChip(type, name) {
        placeChip.classList.remove("show");

        setTimeout(() => {
            placeType.textContent = type;
            placeName.textContent = name;
            placeChip.classList.add("show");
        }, 160);
    }

    function showDialogue(country, index) {
        dialogue.classList.remove("show");

        setTimeout(() => {
            dialogueCount.textContent =
                String(index + 1).padStart(2, "0") + " / " +
                String(partnerLocations.length).padStart(2, "0");

            dialogueTitle.textContent = country.name;
            dialogueText.textContent = country.text;
            dialogue.classList.add("show");
        }, 260);
    }

    function hideDialogue() {
        dialogue.classList.remove("show");
    }

    function makeArc(from, to, type) {
        return {
            startLat: from.lat,
            startLng: from.lng,
            endLat: to.lat,
            endLng: to.lng,
            color: type === "main"
                ? ["rgba(255,255,255,0.10)", "#ffffff", "#22c55e"]
                : ["rgba(255,255,255,0.08)", "#bae6fd", "#facc15"]
        };
    }

    function showPointAndLabel(location, points, labels) {
        if (!points.find(p => p.name === location.name)) {
            points.push(location);
        }

        labels = labels.filter(l => l.type !== "country-active");

        if (location.type === "country") {
            labels.push({
                ...location,
                type: "country-active",
                label: location.name.toUpperCase()
            });
        } else {
            labels.push(location);
        }

        world.pointsData([...points]);
        world.labelsData([...labels]);

        return labels;
    }

    function runJourney() {
        let points = [];
        let labels = [];
        let arcs = [];

        highlightedCountries = [];
        activeCountryName = "";

        world.pointsData([]);
        world.labelsData([]);
        world.arcsData([]);
        world.ringsData([]);
        refreshPolygons();
        hideDialogue();

        updatePhase(
            "Phase 01",
            "World Bank Headquarters",
            "The journey begins in Washington, DC before moving toward Thailand."
        );

        showChip("Headquarters", "World Bank Headquarters — Washington, DC");

        world.pointOfView({
            lat: hq.lat,
            lng: hq.lng,
            altitude: 1.12
        }, 2200);

        setTimeout(() => {
            activeCountryName = hq.polygonName;
            highlightedCountries.push(hq.polygonName);
            refreshPolygons();

            labels = showPointAndLabel(hq, points, labels);

            world.ringsData([{
                lat: hq.lat,
                lng: hq.lng,
                maxR: 3.6,
                speed: 1.0,
                repeat: 1000
            }]);
        }, 1500);

        setTimeout(() => {
            updatePhase(
                "Phase 02",
                "AIT YCA, Thailand",
                "The globe moves to Thailand and highlights the regional secretariat."
            );

            showChip("Regional Secretariat", "Yunus Center AIT — Thailand");

            world.pointOfView({
                lat: yca.lat,
                lng: yca.lng,
                altitude: 1.08
            }, 2400);
        }, 4000);

        setTimeout(() => {
            activeCountryName = yca.polygonName;
            highlightedCountries.push(yca.polygonName);
            refreshPolygons();

            arcs.push(makeArc(hq, yca, "main"));
            world.arcsData([...arcs]);

            labels = showPointAndLabel(yca, points, labels);

            world.ringsData([{
                lat: yca.lat,
                lng: yca.lng,
                maxR: 3.6,
                speed: 1.0,
                repeat: 1000
            }]);
        }, 5900);

        setTimeout(() => {
            updatePhase(
                "Phase 03",
                "Partner Countries",
                "The globe now stops rotating. Each partner country is centered, highlighted, and shown for 10 seconds."
            );

            showChip("Partner Countries", "South Asia Partner Network");

            world.controls().autoRotate = false;
            world.controls().update();

            activeCountryName = "";
            refreshPolygons();

            world.pointOfView({
                lat: 18,
                lng: 82,
                altitude: 1.52
            }, 2200);
        }, 8300);

        partnerLocations.forEach((country, index) => {
            setTimeout(() => {
                activeCountryName = country.polygonName;

                if (!highlightedCountries.includes(country.polygonName)) {
                    highlightedCountries.push(country.polygonName);
                }

                refreshPolygons();

                updatePhase(
                    "Partner " + String(index + 1).padStart(2, "0"),
                    country.name,
                    "Showing " + country.name + " as part of the WePOWER partner country network."
                );

                showChip("Partner Country", country.name);
                showDialogue(country, index);

                arcs.push(makeArc(yca, country, "partner"));
                world.arcsData([...arcs]);

                world.pointOfView({
                    lat: country.lat,
                    lng: country.lng,
                    altitude: country.zoom
                }, 2200);

                labels = showPointAndLabel({
                    ...country,
                    type: "country"
                }, points, labels);

                world.ringsData([{
                    lat: country.lat,
                    lng: country.lng,
                    maxR: country.name === "India" || country.name === "Pakistan" ? 4.5 : 3,
                    speed: 0.8,
                    repeat: 1600
                }]);

            }, 11200 + index * COUNTRY_DURATION);
        });

        setTimeout(() => {
            updatePhase(
                "Final View",
                "Complete Regional Network",
                "The full partner country network is now visible and centered on South Asia."
            );

            hideDialogue();
            showChip("Complete Network", "World Bank, AIT YCA, and Partner Countries");

            activeCountryName = "";
            refreshPolygons();
            world.ringsData([]);

            world.pointOfView({
                lat: 18,
                lng: 82,
                altitude: 1.5
            }, 2200);

        }, 11200 + partnerLocations.length * COUNTRY_DURATION + 2500);
    }

    let hasPlayed = false;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting || hasPlayed) return;
            hasPlayed = true;
            runJourney();
        });
    }, { threshold: 0.25 });

    observer.observe(section);
});
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