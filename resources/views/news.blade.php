@extends('layouts.app')

@section('title', 'News & Updates')

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

<div class="relative overflow-hidden bg-gradient-to-br from-white via-[rgba(1,157,222,0.04)] to-[rgba(243,22,113,0.05)]">

    <!-- Soft background -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-24 left-0 w-80 h-80 bg-[var(--cyan)]/10 rounded-full blur-3xl"></div>
        <div class="absolute top-1/3 right-0 w-80 h-80 bg-[var(--pink)]/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-1/3 w-72 h-72 bg-[var(--orange)]/10 rounded-full blur-3xl"></div>
    </div>

    <section class="relative pt-28 sm:pt-32 lg:pt-36 pb-16 sm:pb-20 lg:pb-24">
        <div class="max-w-screen-2xl mx-auto px-5 sm:px-8 lg:px-12">

            <!-- Intro -->
            <div class="max-w-3xl mx-auto text-center mb-12 lg:mb-14">
                <p class="text-[11px] sm:text-xs uppercase tracking-[0.32em] text-[var(--cyan)] font-semibold mb-4">
                    News & Updates
                </p>

                <h1 class="text-3xl sm:text-4xl lg:text-[44px] font-semibold tracking-tight leading-[1.2] text-slate-900 mt-5">
                    Stories, milestones, and
                    <h1 class="text-3xl sm:text-4xl lg:text-[44px] font-semibold tracking-tight leading-[1.2] text-slate-900 mt-4">
                        momentum
                    <span class="block text-slate-900 mt-5">
                        across the WePOWER network
                    </span>
                </h1>

                <div class="mt-6 mb-6 flex justify-center">
                    <div class="h-[2px] w-16 rounded-full bg-[var(--cyan)] opacity-80"></div>
                </div>

                <p class="text-sm sm:text-base text-slate-600 leading-relaxed max-w-2xl mx-auto">
                    Explore the latest milestones, partner activities, institutional progress, and regional events
                    shaping women’s leadership and participation in South Asia’s energy sector.
                </p>
            </div>

            <!-- Featured story -->
            <div class="grid lg:grid-cols-12 gap-6 lg:gap-8 mb-12 lg:mb-16">
                <article class="lg:col-span-7 overflow-hidden rounded-[2rem] border border-white/70 bg-white/80 backdrop-blur-xl shadow-[0_20px_60px_rgba(15,23,42,0.08)]">
                    <div class="relative h-[260px] sm:h-[320px] lg:h-[380px] overflow-hidden">
                        <img src="{{ asset('images/news/placeholders/news-1.jpeg') }}"
                             alt="WePOWER Regional Secretariat Launch"
                             class="w-full h-full object-cover">

                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-900/20 to-transparent"></div>

                        <div class="absolute left-5 right-5 bottom-5 sm:left-7 sm:right-7 sm:bottom-7">
                            <span class="inline-flex items-center rounded-full bg-white/90 text-slate-900 px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em]">
                                Featured
                            </span>

                            <h2 class="mt-4 text-2xl sm:text-3xl lg:text-4xl font-semibold text-white leading-tight max-w-3xl">
                                WePOWER Permanent Regional Secretariat launched at Yunus Center at AIT
                            </h2>

                            <p class="mt-3 text-sm sm:text-base text-white/80 max-w-2xl leading-relaxed">
                                A major milestone for the network, marking the transition to a permanent regional home
                                and a stronger partner-led future across South Asia.
                            </p>
                        </div>
                    </div>
                </article>

                <div class="lg:col-span-5 flex flex-col gap-6">
                    <article class="rounded-[2rem] border border-[rgba(1,157,222,0.14)] bg-white/85 backdrop-blur-xl p-6 shadow-sm">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="inline-flex rounded-full bg-[rgba(1,157,222,0.10)] text-[var(--cyan)] px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em]">
                                Recognition
                            </span>
                            <span class="text-xs text-slate-500">2025</span>
                        </div>

                        <h3 class="text-xl sm:text-2xl font-semibold text-slate-900 leading-tight">
                            WePOWER receives the FY25 SAR VPU Award
                        </h3>

                        <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                            The network was recognized for excellence in implementation, with results that include
                            large-scale training, leadership development, and pathways to jobs and internships
                            for women across the energy sector.
                        </p>

                        <a href="#" class="mt-5 inline-flex items-center text-sm font-semibold text-[var(--cyan)] hover:opacity-80 transition">
                            Read more
                        </a>
                    </article>

                    <article class="rounded-[2rem] border border-[rgba(233,146,16,0.14)] bg-white/85 backdrop-blur-xl p-6 shadow-sm">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="inline-flex rounded-full bg-[rgba(233,146,16,0.10)] text-[var(--orange)] px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em]">
                                Results
                            </span>
                            <span class="text-xs text-slate-500">Q1–Q2 FY2025</span>
                        </div>

                        <h3 class="text-xl sm:text-2xl font-semibold text-slate-900 leading-tight">
                            5,374 activities reached 27,928 women and girls
                        </h3>

                        <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                            Partner institutions collectively delivered training, mentorship, field exposure,
                            and career opportunities, while more than 455 women secured staff or internship positions.
                        </p>

                        <a href="#" class="mt-5 inline-flex items-center text-sm font-semibold text-[var(--orange)] hover:opacity-80 transition">
                            Read more
                        </a>
                    </article>
                </div>
            </div>

            <!-- News grid -->
            <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6 lg:gap-7">

                <article class="group overflow-hidden rounded-[1.75rem] border border-slate-200/70 bg-white shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <div class="h-52 overflow-hidden">
                        <img src="{{ asset('images/news/placeholders/news-1.jpeg') }}"
                             alt="Indian Utility Week 2025"
                             class="w-full h-full object-cover group-hover:scale-[1.03] transition duration-500">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="inline-flex rounded-full bg-[rgba(1,157,222,0.09)] text-[var(--cyan)] px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em]">
                                Event
                            </span>
                            <span class="text-xs text-slate-500">4 September 2025</span>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-900 leading-snug">
                            WePOWER represented at Indian Utility Week 2025
                        </h3>
                        <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                            Discussions focused on reskilling, future-ready workforce development, academia-industry collaboration,
                            and closing access gaps for women in a rapidly evolving energy sector.
                        </p>
                        <a href="#" class="mt-5 inline-flex items-center text-sm font-semibold text-[var(--cyan)]">
                            Read article
                        </a>
                    </div>
                </article>

                <article class="group overflow-hidden rounded-[1.75rem] border border-slate-200/70 bg-white shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <div class="h-52 overflow-hidden">
                        <img src="{{ asset('images/news/placeholders/news-2.jpeg') }}"
                             alt="Nepal National Chapter Donors Meeting"
                             class="w-full h-full object-cover group-hover:scale-[1.03] transition duration-500">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="inline-flex rounded-full bg-[rgba(243,22,113,0.09)] text-[var(--pink)] px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em]">
                                Chapter
                            </span>
                            <span class="text-xs text-slate-500">3 September 2025</span>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-900 leading-snug">
                            WePOWER Nepal National Chapter organized donors meeting
                        </h3>
                        <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                            Partners aligned around collaboration opportunities, priority activities, fundraising,
                            training pathways, and country-level growth for 2025.
                        </p>
                        <a href="#" class="mt-5 inline-flex items-center text-sm font-semibold text-[var(--pink)]">
                            Read article
                        </a>
                    </div>
                </article>

                <article class="group overflow-hidden rounded-[1.75rem] border border-slate-200/70 bg-white shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <div class="h-52 overflow-hidden">
                        <img src="{{ asset('images/news/placeholders/news-3.jpeg') }}"
                             alt="International Returning Mothers Day"
                             class="w-full h-full object-cover group-hover:scale-[1.03] transition duration-500">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="inline-flex rounded-full bg-[rgba(233,146,16,0.09)] text-[var(--orange)] px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em]">
                                Inclusion
                            </span>
                            <span class="text-xs text-slate-500">10 September 2025</span>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-900 leading-snug">
                            WePOWER marks the first International Returning Mothers’ Day
                        </h3>
                        <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                            The conference spotlighted supportive workplace policies, mentorship, reskilling,
                            and the new “Men as Allies” initiative for women returning to work.
                        </p>
                        <a href="#" class="mt-5 inline-flex items-center text-sm font-semibold text-[var(--orange)]">
                            Read article
                        </a>
                    </div>
                </article>

                <article class="group overflow-hidden rounded-[1.75rem] border border-slate-200/70 bg-white shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <div class="h-52 overflow-hidden">
                        <img src="{{ asset('images/news/placeholders/news-4.jpeg') }}"
                             alt="New partners"
                             class="w-full h-full object-cover group-hover:scale-[1.03] transition duration-500">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="inline-flex rounded-full bg-slate-100 text-slate-700 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em]">
                                Partners
                            </span>
                            <span class="text-xs text-slate-500">New additions</span>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-900 leading-snug">
                            Welcoming new partners to the network
                        </h3>
                        <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                            IIT Kanpur, IPPAN, and Butwal Power Company joined WePOWER with commitments around
                            training, internships, technical learning, and women’s leadership.
                        </p>
                        <a href="#" class="mt-5 inline-flex items-center text-sm font-semibold text-slate-900">
                            Read article
                        </a>
                    </div>
                </article>

                <article class="group overflow-hidden rounded-[1.75rem] border border-slate-200/70 bg-white shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <div class="h-52 overflow-hidden">
                        <img src="{{ asset('images/news/placeholders/news-5.jpeg') }}"
                             alt="Partner highlights"
                             class="w-full h-full object-cover group-hover:scale-[1.03] transition duration-500">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="inline-flex rounded-full bg-[rgba(1,157,222,0.09)] text-[var(--cyan)] px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em]">
                                Highlights
                            </span>
                            <span class="text-xs text-slate-500">Across the pillars</span>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-900 leading-snug">
                            Partner highlights from Bangladesh and beyond
                        </h3>
                        <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                            Activities ranged from internships, technical trainings, and field visits to childcare,
                            GESI strategies, anti-harassment awareness, and renewable energy education.
                        </p>
                        <a href="#" class="mt-5 inline-flex items-center text-sm font-semibold text-[var(--cyan)]">
                            Read article
                        </a>
                    </div>
                </article>

                <article class="group overflow-hidden rounded-[1.75rem] border border-slate-200/70 bg-white shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <div class="h-52 overflow-hidden">
                        <img src="{{ asset('images/news/placeholders/news-6.jpeg') }}"
                             alt="SAR100 story"
                             class="w-full h-full object-cover group-hover:scale-[1.03] transition duration-500">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="inline-flex rounded-full bg-[rgba(243,22,113,0.09)] text-[var(--pink)] px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em]">
                                Voices
                            </span>
                            <span class="text-xs text-slate-500">SAR100 journey</span>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-900 leading-snug">
                            My SAR100-2.0 journey
                        </h3>
                        <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                            A first-person reflection on technical learning, mentorship, regional networking,
                            and confidence-building through the SAR100 program.
                        </p>
                        <a href="#" class="mt-5 inline-flex items-center text-sm font-semibold text-[var(--pink)]">
                            Read article
                        </a>
                    </div>
                </article>

            </div>

            <!-- CTA / archive -->
            <div class="mt-12 lg:mt-16">
                <div class="relative overflow-hidden rounded-[2rem] bg-slate-900 text-white px-6 sm:px-8 lg:px-12 py-10 lg:py-12 shadow-[0_20px_70px_rgba(15,23,42,0.18)]">
                    <div class="absolute inset-0 bg-gradient-to-br from-[var(--pink)]/20 via-[var(--orange)]/15 to-[var(--cyan)]/20"></div>

                    <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                        <div class="max-w-2xl">
                            <p class="text-sm uppercase tracking-[0.22em] text-[var(--cyan)] mb-3">
                                Archive & Publications
                            </p>
                            <h3 class="text-2xl sm:text-3xl font-semibold leading-tight">
                                Follow the network’s progress over time
                            </h3>
                            <p class="mt-3 text-white/75 leading-relaxed">
                                Browse recent stories, partner milestones, regional events, and upcoming editions
                                of the WePOWER newsletter.
                            </p>
                        </div>

                        <div class="flex-shrink-0">
                            <a href="#"
                               class="inline-flex items-center justify-center rounded-full bg-white text-slate-900 px-6 py-3 text-sm font-semibold hover:bg-slate-100 transition">
                                View all news
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

@endsection