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
                    <span class="block text-slate-900 mt-4">momentum</span>
                    <span class="block text-slate-900 mt-5">across the WePOWER network</span>
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
                <article class="lg:col-span-7 overflow-hidden rounded-[2rem] border border-white/70 bg-white/80 backdrop-blur-xl shadow-[0_20px_60px_rgba(15,23,42,0.08)] resource-card"
                         data-title="WePOWER Marks the First International Returning Mothers’ Day"
                         data-category="Inclusion"
                         data-date="10 September 2025"
                         data-body="
                          
                                <img src='{{ asset('images/resources/returningmother.jpg') }}' alt='Returning Mothers Conference' class='w-full rounded-3xl shadow-2xl'>
                                <h2 class='text-3xl font-bold text-slate-900'>WePOWER Marks the First International Returning Mothers’ Day</h2>
                                <p class='text-slate-700 leading-relaxed'>10 September 2025</p>
                                <p class='text-slate-700 leading-relaxed'>The WePOWER India National Chapter, in collaboration with the Institute of Electrical and Electronics Engineers-Women in Engineering (IEEE-WIE) and the National Power Training Institute (NPTI), hosted a day-long conference at the World Bank Country Office in New Delhi to celebrate the first International Returning Mothers Day. The event brought together leaders, professionals, and high-level representatives of partner organizations to honor the resilience of returning mothers and address the challenges they face when re-entering the workforce in South Asia.</p>
                                <p class='text-slate-700 leading-relaxed'>Speakers from the World Bank, WePOWER Partner institutions, IEEE, and development organizations emphasized the importance of inclusive workforce policies and supportive environments that help mothers resume their careers with confidence. The conference featured panel discussions where returning mothers, employers, and advocates — including fathers — shared experiences and strategies to address structural barriers including flexible workplace policies, reskilling initiatives, and mentorship opportunities.</p>
                                <p class='text-slate-700 leading-relaxed'>A fireside chat titled “What It Takes” launched a new initiative, Men as Allies, which underscored the equally important role of men in creating an enabling environment for women returning to work after career breaks. Featuring leaders from WePOWER Partner institutions, the session highlighted how shared responsibility, empathy, and active support from male colleagues and leaders are critical in advancing gender equity and inclusion in the energy sector.</p>
                                <p class='text-slate-700 leading-relaxed'>Through initiatives like this, WePOWER continues to foster collaboration, advocate for inclusive practices, and champion the reintegration of women professionals into South Asia’s energy sector.</p>
                                <img src='{{ asset('images/resources/returningmother.jpg') }}' alt='Men as Allies Discussion' class='w-full rounded-3xl shadow-2xl'>
                            </div>
                        ">
                    <div class="relative h-[260px] sm:h-[320px] lg:h-[380px] overflow-hidden">
                        <img src="{{ asset('images/resources/returningmother.jpg') }}" alt="WePOWER Regional Secretariat Launch" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-900/20 to-transparent"></div>
                        <div class="absolute left-5 right-5 bottom-5 sm:left-7 sm:right-7 sm:bottom-7">
                            <span class="inline-flex items-center rounded-full bg-white/90 text-slate-900 px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em]">Featured</span>
                            <h2 class="mt-4 text-2xl sm:text-3xl lg:text-4xl font-semibold text-white leading-tight">WePOWER Marks the First International Returning Mothers’ Day</h2>
                            <p class="mt-3 text-sm sm:text-base text-white/80 max-w-2xl leading-relaxed">Celebrating resilience and launching the new “Men as Allies” initiative.</p>
                        </div>
                    </div>
                </article>

                <div class="lg:col-span-5 flex flex-col gap-6">
                    <article class="rounded-[2rem] border border-[rgba(1,157,222,0.14)] bg-white/85 backdrop-blur-xl p-6 shadow-sm">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="inline-flex rounded-full bg-[rgba(1,157,222,0.10)] text-[var(--cyan)] px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em]">Recognition</span>
                            <span class="text-xs text-slate-500">2025</span>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-semibold text-slate-900 leading-tight">WePOWER receives the FY25 SAR VPU Award</h3>
                        <p class="mt-3 text-sm text-slate-600 leading-relaxed">The network was recognized for excellence in implementation, with results that include large-scale training, leadership development, and pathways to jobs and internships for women across the energy sector.</p>
                    </article>

                    <article class="rounded-[2rem] border border-[rgba(233,146,16,0.14)] bg-white/85 backdrop-blur-xl p-6 shadow-sm">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="inline-flex rounded-full bg-[rgba(233,146,16,0.10)] text-[var(--orange)] px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em]">Results</span>
                            <span class="text-xs text-slate-500">Q1–Q2 FY2025</span>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-semibold text-slate-900 leading-tight">5,374 activities reached 27,928 women and girls</h3>
                        <p class="mt-3 text-sm text-slate-600 leading-relaxed">Partner institutions collectively delivered training, mentorship, field exposure, and career opportunities.</p>
                    </article>
                </div>
            </div>

            <!-- News grid - Only the 4 full news items with every word included -->
            <div class="grid md:grid-cols-2 xl:grid-cols-2 gap-6 lg:gap-7">

                <!-- 1. Indian Utility Week -->
                <article class="group overflow-hidden rounded-[1.75rem] border border-slate-200/70 bg-white shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 resource-card"
                         data-title="WePOWER Represented at Indian Utility Week 2025"
                         data-category="Event"
                         data-date="4 September 2025"
                         data-body="
                            <div class='space-y-10'>
                                <img src='https://picsum.photos/id/1015/1200/650' alt='Tanushree Bhowmik at panel' class='w-full rounded-3xl shadow-2xl'>
                                <h2 class='text-3xl font-bold text-slate-900'>WePOWER Represented at Indian Utility Week 2025</h2>
                                <p class='text-slate-700 leading-relaxed'>4 September 2025</p>
                                <p class='text-slate-700 leading-relaxed'>At the Bharat Energy and Powergen India’s Indian Utility Week 2025, held under the theme “Viksit Bharat: Transforming Energy, Transforming Lives,” the closing panel discussion, “Entrepreneurship & Skilling: Catalyzing India’s Workforce for a Viksit Bharat,” brought together thought leaders and practitioners to discuss how India can prepare its workforce for a rapidly evolving energy landscape. Representing WePOWER, Tanushree Bhowmik, WePOWER India Coordinator, and Dr. Tripta Thakur, Director General of the National Power Training Institute (NPTI) and Chairperson of the WePOWER India National Chapter, shared valuable insights on the urgent need to align skills development with emerging industry needs.</p>
                                <p class='text-slate-700 leading-relaxed'>The discussion emphasized that the challenge today is not merely skilling but reskilling—ensuring that existing professionals are equipped for new technologies and roles driven by the clean energy transition. Tanushree noted that while the renewable energy sector is evolving quickly, access to new learning opportunities and information remains disproportionately limited for women. She underscored the need for closer collaboration between academia and industry to identify new-age roles and prepare a future-ready workforce, highlighting WePOWER’s groundbreaking regional initiative, the SAR100 Technical Training Program.</p>
                                <p class='text-slate-700 leading-relaxed'>Dr. Thakur highlighted the widening gap between academia and industry, calling for co-designed programs and energy literacy initiatives that reflect real sectoral needs. She shared that utilities are being encouraged to conduct training needs assessments and that a National SCADA Center is being developed at NPTI to strengthen technical capacity.</p>
                                <img src='https://picsum.photos/id/64/1200/650' alt='Dr. Tripta Thakur speaking' class='w-full rounded-3xl shadow-2xl'>
                            </div>
                         ">
                    <div class="h-52 overflow-hidden">
                        <img src="{{ asset('images/news/placeholders/news-1.jpeg') }}" alt="Indian Utility Week 2025" class="w-full h-full object-cover group-hover:scale-[1.03] transition duration-500">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="inline-flex rounded-full bg-[rgba(1,157,222,0.09)] text-[var(--cyan)] px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em]">Event</span>
                            <span class="text-xs text-slate-500">4 September 2025</span>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-900 leading-snug">WePOWER represented at Indian Utility Week 2025</h3>
                        <p class="mt-3 text-sm text-slate-600 leading-relaxed">Discussions focused on reskilling, future-ready workforce development, academia-industry collaboration, and closing access gaps for women.</p>
                        <span class="mt-5 inline-flex items-center text-sm font-semibold text-[var(--cyan)] cursor-pointer">Read full article</span>
                    </div>
                </article>

                <!-- 2. Nepal Donors Meeting -->
                <article class="group overflow-hidden rounded-[1.75rem] border border-slate-200/70 bg-white shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 resource-card"
                         data-title="WePOWER Nepal National Chapter Organized Donors Meeting"
                         data-category="Chapter"
                         data-date="3 September 2025"
                         data-body="
                            <div class='space-y-10'>
                                <img src='https://picsum.photos/id/1011/1200/650' alt='Prof. Sangeeta Singh' class='w-full rounded-3xl shadow-2xl'>
                                <h2 class='text-3xl font-bold text-slate-900'>WePOWER Nepal National Chapter Organized Donors Meeting</h2>
                                <p class='text-slate-700 leading-relaxed'>3 September 2025</p>
                                <p class='text-slate-700 leading-relaxed'>The WePOWER Nepal National Chapter (NNC) convened a Donors Meeting to discuss priorities, partnerships, and strategic initiatives for 2025. The meeting was presided over by Prof. Sangeeta Singh, Chairperson of the NNC, and featured representation from the WePOWER Interim Secretariat, including Tanushree Bhowmik, India Coordinator, Anita Bohara Thapa, Nepal Coordinator, and Faisal Alih, Regional Partnership Engagement Coordinator. Key development partners and organizations participating included UN-HABITAT, UNIDO, GIZ, UNOPS, Practical Action, Winrock International, the Asian Institute of Technology, and the World Bank.</p>
                                <p class='text-slate-700 leading-relaxed'>Prof. Singh updated participants on the NNC’s ongoing initiatives, including expanding membership through partnerships with BPC, IPPAN, and WoNEE, experience-sharing sessions, PhD seminars, talk programs, in-country experiential learning within SAR100, field visits to energy sites for students, and a comprehensive 2025 workplan. Priority activities for the year include the Role Model Program, exposure visits, placement fairs, returning mothers conferences, SAR100 regional training, soft skills and leadership training, learning-sharing workshops, networking events, the establishment of the NNC Secretariat, fundraising, coordination with other National Chapters, and support for academic and career advancement programs such as diplomas, certifications, and master’s research.</p>
                                <p class='text-slate-700 leading-relaxed'>Speakers emphasized the importance of aligning programs with industry needs and development partner priorities. Tanushree Bhowmik highlighted the need to convene partners to identify common objectives, collaboration opportunities, and sector-specific skill gaps, including for women in energy. Partners stressed initiatives such as mentoring, employability hubs, reskilling, training for grassroots women, renewable energy technology training, and scaling programs geographically and across sectors.</p>
                                <img src='https://picsum.photos/id/201/1200/650' alt='Donors Meeting Discussion' class='w-full rounded-3xl shadow-2xl'>
                            </div>
                         ">
                    <div class="h-52 overflow-hidden">
                        <img src="{{ asset('images/news/placeholders/news-2.jpeg') }}" alt="Nepal National Chapter Donors Meeting" class="w-full h-full object-cover group-hover:scale-[1.03] transition duration-500">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="inline-flex rounded-full bg-[rgba(243,22,113,0.09)] text-[var(--pink)] px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em]">Chapter</span>
                            <span class="text-xs text-slate-500">3 September 2025</span>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-900 leading-snug">WePOWER Nepal National Chapter organized donors meeting</h3>
                        <p class="mt-3 text-sm text-slate-600 leading-relaxed">Partners aligned around collaboration opportunities, priority activities, fundraising, training pathways, and country-level growth for 2025.</p>
                        <span class="mt-5 inline-flex items-center text-sm font-semibold text-[var(--pink)] cursor-pointer">Read full article</span>
                    </div>
                </article>

                

                <!-- 4. Permanent Regional Secretariat -->
                <article class="group overflow-hidden rounded-[1.75rem] border border-slate-200/70 bg-white shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 resource-card"
                         data-title="WePOWER Permanent Regional Secretariat Launched at Yunus Center at AIT"
                         data-category="Milestone"
                         data-date="5 February 2026"
                         data-body="
                            <div class='space-y-10'>
                                <img src='https://picsum.photos/id/1015/1200/650' alt='Secretariat Launch Event' class='w-full rounded-3xl shadow-2xl'>
                                <h2 class='text-3xl font-bold text-slate-900'>WePOWER Permanent Regional Secretariat Launched at Yunus Center at AIT</h2>
                                <p class='text-slate-700 leading-relaxed'>5 February 2026</p>
                                <p class='text-slate-700 leading-relaxed'>The WePOWER Interim Secretariat marked a historic milestone with the soft launch of the WePOWER Regional Secretariat (WRS) at the Asian Institute of Technology (AIT) in Bangkok on 5 February 2026. The event signifies the transition of the Secretariat from Washington, D.C. to its permanent regional home at AIT’s Yunus Center, reflecting WePOWER’s evolution from a World Bank anchored initiative to a regionally embedded, partner-driven network.</p>
                                <p class='text-slate-700 leading-relaxed'>The launch brought together senior leadership from AIT and the World Bank, along with 89 delegates representing WePOWER partners, National Chapters, development institutions, and diplomatic missions from across South Asia. The occasion underscored the growing regional ownership of the network and a shared commitment to accelerating women’s participation and leadership in the energy sector.</p>
                                <p class='text-slate-700 leading-relaxed'>Opening the program, Prof. Pai-Chi Li, President of AIT, emphasized the importance of institutional anchoring to sustain long-term impact and deepen collaboration between academia and industry. He noted that hosting the Secretariat at AIT builds on the institution’s strong foundation in applied research, inclusive leadership, and regional engagement, positioning WePOWER at the heart of Asia’s energy transition.</p>
                                <p class='text-slate-700 leading-relaxed'>Ms. Mandakini Kaul, South Asia Regional Coordinator at the World Bank, highlighted WePOWER’s steady growth and the significance of this next chapter. She reaffirmed the World Bank’s continued commitment to closing gender gaps in South Asia’s energy sector, where women remain significantly underrepresented in technical and leadership roles. The transition to a permanent Secretariat, she noted, represents both institutional strengthening and an opportunity to scale impact through sustained partnerships.</p>
                                <p class='text-slate-700 leading-relaxed'>The event also saw strong diplomatic participation, with representatives from the Embassies of Bangladesh, India, Maldives, Nepal, Pakistan, and Sri Lanka in attendance. H.E. Mr. Faiyaz Murshid Kazi, Ambassador of Bangladesh to Thailand and member of the AIT Board of Trustees, commended the role of initiatives like WePOWER in building STEM competencies among women and strengthening community resilience through inclusive energy development.</p>
                                <p class='text-slate-700 leading-relaxed'>During the launch, the World Bank team shared insights from the 2024–2025 WePOWER Gender Assessment, based on fieldwork across more than 15 organizations and nearly 2,000 survey responses. The findings reinforced the urgency of institutional reforms and collaborative action to address persistent gender disparities in the sector.</p>
                                <p class='text-slate-700 leading-relaxed'>As the operational engine of the network, the Regional Secretariat will support National Chapters and partners across South Asia through core functions including network coordination and membership expansion, donor engagement and resource mobilization, knowledge management and regional learning, and advocacy for gender-inclusive institutional reform. The Secretariat will work closely with Chapters in Bhutan, India, Nepal, Pakistan, and Sri Lanka to strengthen country-led engagement and accelerate measurable outcomes.</p>
                                <p class='text-slate-700 leading-relaxed'>Mr. Gunjan Gautam, Senior Energy Specialist at the World Bank, noted that anchoring the Secretariat at AIT represents a new chapter in ensuring WePOWER’s sustainability and regional ownership. Housing the Secretariat within a leading academic institution enhances the network’s ability to support utilities, governments, and academic partners in creating workplaces where women can thrive and lead.</p>
                                <p class='text-slate-700 leading-relaxed'>A dedicated transition session outlined immediate priorities, planned support for National Chapters, and opportunities for collaboration and co-creation. In closing, Dr. Faiz Shah, Executive Director of the Yunus Center at AIT, reaffirmed AIT’s commitment to ensuring that the region’s energy transition is not only technologically resilient, but also socially inclusive and equitable.</p>
                                <p class='text-slate-700 leading-relaxed'>The establishment of the permanent Regional Secretariat at AIT represents more than an institutional shift—it reflects a shared regional commitment to building energy systems that fully harness the talent, expertise, and leadership of women.</p>
                                <img src='https://picsum.photos/id/64/1200/650' alt='AIT Yunus Center Event' class='w-full rounded-3xl shadow-2xl'>
                            </div>
                         ">
                    <div class="h-52 overflow-hidden">
                        <img src="{{ asset('images/news/placeholders/news-4.jpeg') }}" alt="Permanent Regional Secretariat" class="w-full h-full object-cover group-hover:scale-[1.03] transition duration-500">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="inline-flex rounded-full bg-slate-100 text-slate-700 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em]">Milestone</span>
                            <span class="text-xs text-slate-500">5 February 2026</span>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-900 leading-snug">WePOWER Permanent Regional Secretariat Launched at Yunus Center at AIT</h3>
                        <p class="mt-3 text-sm text-slate-600 leading-relaxed">A major milestone marking the transition to a permanent regional home and a stronger partner-led future across South Asia.</p>
                        <span class="mt-5 inline-flex items-center text-sm font-semibold text-slate-900 cursor-pointer">Read full article</span>
                    </div>
                </article>

            </div>

            <!-- CTA -->
            <div class="mt-12 lg:mt-16">
                <div class="relative overflow-hidden rounded-[2rem] bg-slate-900 text-white px-6 sm:px-8 lg:px-12 py-10 lg:py-12 shadow-[0_20px_70px_rgba(15,23,42,0.18)]">
                    <div class="absolute inset-0 bg-gradient-to-br from-[var(--pink)]/20 via-[var(--orange)]/15 to-[var(--cyan)]/20"></div>
                    <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                        <div class="max-w-2xl">
                            <p class="text-sm uppercase tracking-[0.22em] text-[var(--cyan)] mb-3">Archive & Publications</p>
                            <h3 class="text-2xl sm:text-3xl font-semibold leading-tight">Follow the network’s progress over time</h3>
                            <p class="mt-3 text-white/75 leading-relaxed">Browse recent stories, partner milestones, regional events, and upcoming editions of the WePOWER newsletter.</p>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="#" class="inline-flex items-center justify-center rounded-full bg-white text-slate-900 px-6 py-3 text-sm font-semibold hover:bg-slate-100 transition">View all news</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<!-- Beautiful Modal -->
<div id="resourceModal" class="fixed inset-0 z-[99999] hidden">
    <div id="resourceOverlay" class="absolute inset-0 bg-slate-950/70 backdrop-blur-md"></div>
    <div class="absolute inset-0 flex items-center justify-center p-4 sm:p-6">
        <div id="resourceDialog" class="relative w-full max-w-4xl max-h-[92vh] bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col scale-95 opacity-0 transition-all duration-300">
            <div class="h-2 bg-gradient-to-r from-cyan-500 to-cyan-600"></div>
            <div class="sticky top-0 z-10 bg-white px-8 py-6 border-b border-slate-100 flex items-start justify-between gap-4">
                <div class="flex-1 min-w-0">
                    <p id="modalCategory" class="text-xs uppercase tracking-[0.5px] font-semibold text-cyan-600 mb-1"></p>
                    <h3 id="modalTitle" class="text-2xl sm:text-3xl font-semibold text-slate-900 leading-tight"></h3>
                    <p id="modalDate" class="text-sm text-slate-500 mt-2"></p>
                </div>
                <button id="closeModal" class="w-10 h-10 flex items-center justify-center text-2xl text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-2xl transition-all duration-200">✕</button>
            </div>
            <div class="flex-1 overflow-y-auto px-8 py-8">
                <div id="modalBody" class="prose prose-slate max-w-none prose-headings:font-semibold prose-headings:text-slate-900 prose-p:text-slate-700"></div>
            </div>
            <div class="px-8 py-5 border-t border-slate-100 bg-slate-50 text-center">
                <p class="text-xs text-slate-400">WePOWER • Advancing Inclusion in Energy</p>
            </div>
        </div>
    </div>
</div>

<script>
    const cards = document.querySelectorAll('.resource-card');
    const modal = document.getElementById('resourceModal');
    const overlay = document.getElementById('resourceOverlay');
    const dialog = document.getElementById('resourceDialog');
    const closeBtn = document.getElementById('closeModal');

    const modalTitle = document.getElementById('modalTitle');
    const modalCategory = document.getElementById('modalCategory');
    const modalDate = document.getElementById('modalDate');
    const modalBody = document.getElementById('modalBody');

    function openModal(card) {
        modalTitle.textContent = card.dataset.title || '';
        modalCategory.textContent = card.dataset.category || '';
        modalDate.textContent = card.dataset.date || '';
        modalBody.innerHTML = card.dataset.body || '';

        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');

        requestAnimationFrame(() => {
            dialog.classList.remove('scale-95', 'opacity-0');
            dialog.classList.add('scale-100', 'opacity-100');
        });
    }

    function closeModalFunc() {
        dialog.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }, 300);
    }

    cards.forEach(card => card.addEventListener('click', () => openModal(card)));
    closeBtn.addEventListener('click', closeModalFunc);
    overlay.addEventListener('click', closeModalFunc);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) closeModalFunc();
    });
</script>

@endsection