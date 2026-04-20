@extends('layouts.app')

@section('title', 'Resources')

@section('content')

<section id="resources" class="relative isolate pt-28 lg:pt-32 pb-20 lg:pb-28 bg-gradient-to-br from-slate-50 via-white to-cyan-50/40 overflow-hidden">
    
    <!-- soft background -->
    <div class="absolute inset-0 -z-10 pointer-events-none">
        <div class="absolute -top-16 left-0 w-72 h-72 bg-cyan-200/20 rounded-full blur-3xl"></div>
        <div class="absolute top-1/3 right-0 w-80 h-80 bg-pink-200/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-1/3 w-72 h-72 bg-orange-200/20 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 max-w-screen-2xl mx-auto px-5 sm:px-8 lg:px-12">
        <!-- heading -->
        <div class="max-w-3xl mb-12 lg:mb-16">
            <p class="text-[11px] sm:text-xs uppercase tracking-[0.32em] text-cyan-700 font-semibold mb-4">
                Insights & Resources
            </p>

            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-slate-900 leading-tight mb-5">
                Stories, tools, and practical resources advancing inclusion in the energy sector
            </h2>

            <p class="text-slate-600 text-base sm:text-lg leading-relaxed max-w-2xl">
                Explore featured WePOWER knowledge products, inspiring role model stories, and practical inclusion resources
                through a clean editorial-style resource section.
            </p>
        </div>

        <!-- resource cards -->
        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6 lg:gap-7">

            <!-- CARD 1: International Returning Mothers Day -->
            <article
                class="resource-card group cursor-pointer rounded-[1.8rem] border border-slate-200/70 bg-white/90 backdrop-blur-xl shadow-[0_20px_60px_rgba(15,23,42,0.08)] overflow-hidden transition duration-300 hover:-translate-y-1 hover:shadow-[0_28px_80px_rgba(15,23,42,0.14)]"
                data-title="International Returning Mothers Day"
                data-category="Campaign / Inclusion"
                data-date="Global Initiative"
                data-body="
                    <div class='space-y-6'>
                        <img src='{{ asset('images/resources/returningmother.jpg') }}' alt='Women in professional discussion' class='w-full h-[260px] sm:h-[340px] object-cover rounded-[1.6rem] shadow-lg'>

                        <p class='text-slate-700 leading-relaxed'>
                            In today’s evolving professional landscape, women are making remarkable strides in education and career advancement. However, many step away from their careers after marriage or motherhood to prioritize their families. When they seek to return, they often face numerous challenges, career stagnation, societal bias, and limited opportunities.
                        </p>

                        <p class='text-slate-700 leading-relaxed'>
                            Recognizing this, WePOWER (a World Bank-supported network), IEEE, and iExplore Foundation for Sustainable Development have come together to champion a global movement: <strong>International Returning Mothers Day</strong>. This initiative is dedicated to acknowledging, supporting, and celebrating women who re-enter the workforce after career breaks.
                        </p>

                        <div>
                            <h4 class='text-xl font-bold text-slate-900 mb-3'>The Birth of International Returning Mothers Day</h4>
                            <p class='text-slate-700 leading-relaxed'>
                                Since 2014, the IEEE Returning Mothers Conference has provided women with a platform to restart their careers with confidence. Through mentorship, networking, and skill-building, this initiative has empowered thousands of women globally.
                            </p>
                            <p class='text-slate-700 leading-relaxed mt-4'>
                                Taking this mission forward, International Returning Mothers Day was officially launched on <strong>November 15, 2024</strong>, at IISc Bangalore, during the IEEE Returning Mothers Conference. Set to be observed annually on <strong>September 10</strong>, this day amplifies awareness, fosters workplace inclusivity, and strengthens support systems for returning mothers worldwide.
                            </p>
                        </div>

                        <div>
                            <h4 class='text-xl font-bold text-slate-900 mb-3'>Why Returning Mothers Day Matters</h4>
                            <p class='text-slate-700 leading-relaxed mb-3'>
                                Women returning to work bring immense expertise, resilience, and leadership, yet they frequently encounter challenges such as:
                            </p>
                            <ul class='list-disc pl-6 text-slate-700 space-y-2 leading-relaxed'>
                                <li>Resistance from workplaces due to career gaps</li>
                                <li>Difficulties in balancing professional and family responsibilities</li>
                                <li>The need for reskilling and career reintegration</li>
                            </ul>
                            <p class='text-slate-700 leading-relaxed mt-4'>
                                International Returning Mothers Day serves as a call to action for governments, organizations, and communities to actively support career re-entry, making workplaces more inclusive and adaptable to the evolving needs of working mothers.
                            </p>
                        </div>

                        <div class='grid md:grid-cols-2 gap-5'>
                            <div class='rounded-[1.4rem] bg-slate-50 border border-slate-200 p-5'>
                                <h4 class='text-lg font-bold text-slate-900 mb-3'>Vision</h4>
                                <p class='text-slate-700 leading-relaxed'>
                                    To create a world where women who have taken a career break for motherhood are welcomed back into the workforce with equal opportunities, respect, and support, helping them rebuild their careers with confidence and fulfillment.
                                </p>
                            </div>

                            <div class='rounded-[1.4rem] bg-slate-50 border border-slate-200 p-5'>
                                <h4 class='text-lg font-bold text-slate-900 mb-3'>Mission</h4>
                                <p class='text-slate-700 leading-relaxed'>
                                    To raise global awareness about the challenges faced by returning mothers, advocate for inclusive work environments, and encourage policies that support their successful re-entry into the workforce through skill development, mentorship, and advocacy.
                                </p>
                            </div>
                        </div>

                        <div>
                            <h4 class='text-xl font-bold text-slate-900 mb-3'>Key Objectives and Impact</h4>
                            <ul class='list-disc pl-6 text-slate-700 space-y-2 leading-relaxed'>
                                <li><strong>Empowerment & Recognition</strong> – Celebrating the resilience and contributions of returning mothers</li>
                                <li><strong>Inclusive Workplaces</strong> – Encouraging family-friendly policies and flexible work options</li>
                                <li><strong>Talent Retention</strong> – Helping businesses leverage a skilled and experienced workforce</li>
                                <li><strong>Skill Development & Mentorship</strong> – Providing upskilling, coaching, and networking</li>
                                <li><strong>Cultural Shift</strong> – Advocating for second-career opportunities and supportive workplace cultures</li>
                                <li><strong>Stronger Communities</strong> – Building support networks for returning mothers worldwide</li>
                            </ul>
                        </div>

                        <div>
                            <h4 class='text-xl font-bold text-slate-900 mb-3'>Key Actions to Support Returning Mothers</h4>
                            <div class='space-y-4 text-slate-700 leading-relaxed'>
                                <p><strong>Building Awareness in Companies:</strong> Raise awareness, share success stories, and encourage leadership to champion returning mothers.</p>
                                <p><strong>Implementing Flexible Work Policies:</strong> Promote flexible work, parental leave, and structured returnship programs.</p>
                                <p><strong>Workshops for Companies and Returning Women:</strong> Educate companies and help returning mothers strengthen leadership, digital, and transition skills.</p>
                                <p><strong>Breaking Stereotypes:</strong> Challenge social assumptions around career breaks and highlight role models.</p>
                                <p><strong>Creating Supportive Networks:</strong> Establish mentorship programs and peer support groups.</p>
                            </div>
                        </div>

                        <div>
                            <h4 class='text-xl font-bold text-slate-900 mb-3'>How You Can Get Involved</h4>
                            <ul class='list-disc pl-6 text-slate-700 space-y-2 leading-relaxed'>
                                <li>Host or sponsor Returning Mothers Day activities</li>
                                <li>Implement mentorship programs supporting career transitions</li>
                                <li>Develop resources and support networks for returning mothers</li>
                                <li>Create family-friendly workplace policies</li>
                                <li>Promote the mission through internal and external channels</li>
                            </ul>
                        </div>

                        <div class='rounded-[1.5rem] bg-gradient-to-r from-orange-50 to-pink-50 border border-orange-100 p-6'>
                            <h4 class='text-xl font-bold text-slate-900 mb-3'>Join the Movement</h4>
                            <p class='text-slate-700 leading-relaxed'>
                                Together, through WePOWER, IEEE, and iExplore Foundation, we can redefine workforce dynamics,
                                create inclusive opportunities, and build a future where no career break becomes a career barrier.
                            </p>
                            <p class='text-slate-700 leading-relaxed mt-3 font-medium'>
                                Join us in celebrating International Returning Mothers Day on September 10th.
                            </p>
                        </div>
                    </div>
                "
            >
                <div class="relative h-56 overflow-hidden">
                    <img src="{{ asset('images/resources/returningmother.jpg') }}"
                        alt="Women leadership resource"
                        class="w-full h-full object-cover transition duration-[1200ms] group-hover:scale-105 blur-sm">
                    
                    <!-- Optional: Dark gradient overlay (makes text more readable) -->
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-slate-100/10 to-transparent"></div>
                    
                    <!-- Your existing content (category + title) -->
                    <div class="absolute top-5 left-5">
                        <span class="inline-flex text-[11px] uppercase tracking-[0.25em] bg-white/15 text-white px-3 py-1.5 rounded-full border border-white/20 backdrop-blur-md">
                            Campaign
                        </span>
                    </div>
                    
                    <div class="absolute left-5 right-5 bottom-5 text-white">
                        <h3 class="text-2xl font-bold leading-tight mb-2">International Returning Mothers Day</h3>
                        <p class="text-white/85 text-sm leading-relaxed">
                            Supporting women re-entering the workforce after career breaks.
                        </p>
                    </div>
                </div>

                <div class="p-6">
                    <p class="text-slate-600 leading-relaxed text-sm mb-5">
                        A global initiative promoting awareness, support systems, and more inclusive workplaces for returning mothers.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-semibold text-slate-900">Read full article</span>
                        <span class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-700 group-hover:bg-slate-900 group-hover:text-white transition">→</span>
                    </div>
                </div>
            </article>

            <!-- CARD 2: WePOWER Role Model Series -->
            <article
                class="resource-card group cursor-pointer rounded-[1.8rem] border border-slate-200/70 bg-white/90 backdrop-blur-xl shadow-[0_20px_60px_rgba(15,23,42,0.08)] overflow-hidden transition duration-300 hover:-translate-y-1 hover:shadow-[0_28px_80px_rgba(15,23,42,0.14)]"
                data-title="WePOWER Role Model Series"
                data-category="Stories / Role Models"
                data-date="Featured Stories"
                data-body="
                    <div class='space-y-10'>

                        <!-- Intro -->
                        <div>
                            
                            
                            <p class='text-slate-700 leading-relaxed'>
                                The WePOWER Role Model Series is a collection of stories showcasing the journeys of women working in the energy sector across South Asia. These stories highlight their achievements, courage, and unwavering dedication to their work. We hope they serve as an inspiration for other women to pursue careers in STEM and the energy sector and encourage institutions to create more inclusive opportunities for women in this field.
                            </p>
                        </div>

                        <!-- Melundi Nishshanka -->
                        <div class='rounded-3xl border border-slate-200 overflow-hidden bg-white'>
                            <img src='{{ asset('images/resources/melundi.jpg') }}'
                                alt='Melundi Nishshanka' 
                                class='w-full object-cover'>
                            <div class='p-8'>
                                <h4 class='text-2xl font-bold text-slate-900 mb-1'>Melundi Nishshanka</h4>
                                <p class='text-sm text-cyan-600 font-medium mb-6'>Senior Electrical Engineer, Lanka Electricity Company (LECO), Sri Lanka</p>
                                
                                <div class='space-y-6 text-slate-700 leading-relaxed'>
                                    <p>Melundi Nishshanka is a trailblazer in Sri Lanka’s power sector, currently serving as the only woman to have held the position of Senior Electrical Engineer at LECO. With nearly a decade of experience, she leads a team of 120 staff across three departments, overseeing the electrical network and ensuring uninterrupted power supply to over 90,000 customers.</p>
                                    <p>Her work is demanding and unpredictable—requiring field leadership, problem-solving, and frequent late-night site visits. Despite the challenges of managing an all-male team in a traditionally male-dominated field, Melundi embraces her role with passion and purpose.</p>
                                    <p>She mentors junior women engineers at LECO, encourages them to pursue leadership roles, and believes strongly that representation matters. By sharing her journey, she hopes to break stereotypes and inspire more women to enter the energy sector.</p>
                                    
                                    <div class='bg-slate-50 border border-slate-200 p-6 rounded-2xl italic'>
                                        “Practice self-love and make time for things that matter to you. Challenges will come, but stay strong mentally—most battles are fought and won in the mind.”
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Swati Goel -->
                        <div class='rounded-3xl border border-slate-200 overflow-hidden bg-white'>
                            <img src='{{ asset('images/resources/swati.jfif') }}' 
                                alt='Swati Goel' 
                                class='w-full object-cover'>
                            <div class='p-8'>
                                <h4 class='text-2xl font-bold text-slate-900 mb-1'>Swati Goel</h4>
                                <p class='text-sm text-cyan-600 font-medium mb-6'>Deputy General Manager, Power Finance Corporation Ltd, India</p>
                                
                                <div class='space-y-6 text-slate-700 leading-relaxed'>
                                    <p>Swati Goel’s professional journey of over 15 years has given her the opportunity to be part of the evolution of the power sector in India. Her roles within the Power Finance Corporation Ltd have enabled her to navigate conventional power, renewable energy, and energy transition technologies.</p>
                                    <p>Her work connects engineering and finance, requiring her to engage with projects from design through operation, including monitoring physical and financial progress and making site visits across India, including remote locations.</p>
                                    <p>Swati believes that having women leaders at the top helps other women thrive. She leads by example and stresses the importance of challenging biases from an early age.</p>
                                    
                                    <div class='bg-slate-50 border border-slate-200 p-6 rounded-2xl italic'>
                                        “Invest in yourself. Give yourself time — whether it is a hobby or a self-care routine. Keep challenging yourself and be open to change.”
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sumaiya Tabassom -->
                        <div class='rounded-3xl border border-slate-200 overflow-hidden bg-white'>
                            <img src='{{ asset('images/resources/sumaya.jfif') }}' 
                                alt='Sumaiya Tabassom' 
                                class='w-full object-cover'>
                            <div class='p-8'>
                                <h4 class='text-2xl font-bold text-slate-900 mb-1'>Sumaiya Tabassom</h4>
                                <p class='text-sm text-cyan-600 font-medium mb-6'>Executive Engineer, Power Grid Bangladesh PLC</p>
                                
                                <div class='space-y-6 text-slate-700 leading-relaxed'>
                                    <p>Sumaiya Tabassom’s journey into the energy sector began with her love for electrical and electronics engineering. She moved from academia into industry and later joined Power Grid Bangladesh PLC, the country’s sole transmission utility.</p>
                                    <p>Over the years, she has worked in grid operations, transmission line design, substation design, and contract management. In an organization where women make up only a small percentage of the workforce, she has become a visible advocate for workplace equality.</p>
                                    <p>She believes in leading by example, challenging labels, and pushing back against stereotypes in the workplace, while also serving as a mentor and source of courage for younger colleagues.</p>
                                    
                                    <div class='bg-slate-50 border border-slate-200 p-6 rounded-2xl italic'>
                                        “You are the light. Your courage, persistence and actions will illuminate the path for others.”
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Anita Prajapati -->
                        <div class='rounded-3xl border border-slate-200 overflow-hidden bg-white'>
                            <img src='{{ asset('images/resources/anita.jfif') }}' 
                                alt='Anita Prajapati' 
                                class='w-full  object-cover'>
                            <div class='p-8'>
                                <h4 class='text-2xl font-bold text-slate-900 mb-1'>Anita Prajapati</h4>
                                <p class='text-sm text-cyan-600 font-medium mb-6'>Assistant Professor & Energy Systems Analyst, Nepal</p>
                                
                                <div class='space-y-6 text-slate-700 leading-relaxed'>
                                    <p>Anita Prajapati’s life runs on energy. As an Assistant Professor and energy systems analyst, she balances classroom teaching, research, field insight, and family life while continuing to contribute to energy systems planning and policy work in Nepal.</p>
                                    <p>Her work spans lesson planning, research, policy analysis, and training in energy systems modeling. She strongly believes in supportive environments, mentoring, and integrating gender sensitization into education and professional development.</p>
                                    <p>Anita leads by example, proving that high-impact professional contributions and family responsibilities can coexist with resilience and purpose.</p>
                                    
                                    <div class='bg-slate-50 border border-slate-200 p-6 rounded-2xl italic'>
                                        “Keep doing your work and help other women around you realize their dreams. You have to play your part for the coming generations.”
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                "
            >
                <!-- Card Preview (unchanged) -->
                <div class="relative h-56 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&w=1400&q=80"
                        alt="Role model resource"
                        class="w-full h-full object-cover transition duration-[1200ms] group-hover:scale-105 blur-sm">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/75 via-slate-900/20 to-transparent"></div>
                    
                    <div class="absolute top-5 left-5">
                        <span class="inline-flex text-[11px] uppercase tracking-[0.25em] bg-white/15 text-white px-3 py-1.5 rounded-full border border-white/20 backdrop-blur-md">
                            Stories
                        </span>
                    </div>
                    
                    <div class="absolute left-5 right-5 bottom-5 text-white">
                        <h3 class="text-2xl font-bold leading-tight mb-2">WePOWER Role Model Series</h3>
                        <p class="text-white/85 text-sm leading-relaxed">
                            Inspiring journeys of women shaping the energy sector across South Asia.
                        </p>
                    </div>
                </div>

                <div class="p-6">
                    <p class="text-slate-600 leading-relaxed text-sm mb-5">
                        Personal journeys of women leaders and professionals breaking barriers in technical and operational roles.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-semibold text-slate-900">Read full article</span>
                        <span class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-700 group-hover:bg-slate-900 group-hover:text-white transition">→</span>
                    </div>
                </div>
            </article>

            <!-- CARD 3: WePOWER HR Metrics Framework -->
            <article
                class="resource-card group cursor-pointer rounded-[1.8rem] border border-slate-200/70 bg-white/90 backdrop-blur-xl shadow-[0_20px_60px_rgba(15,23,42,0.08)] overflow-hidden transition duration-300 hover:-translate-y-1 hover:shadow-[0_28px_80px_rgba(15,23,42,0.14)]"
                data-title="WePOWER HR Metrics Framework"
                data-category="Framework / Working Group"
                data-date="Featured Resource"
                data-body="
                    <div class='space-y-6'>
                        <img src='{{asset ('images/resources/001.png')}}' alt='HR metrics discussion' class='w-full h-[260px] sm:h-[340px] object-cover rounded-[1.6rem] shadow-lg'>

                        <p class='text-slate-700 leading-relaxed'>
                            WePOWER HR Best Practices Working Group is proud to launch the <strong>WePOWER HR Metrics Framework</strong>, a comprehensive tool designed to help standardize Diversity, Equity, and Inclusion (DEI) metrics across energy sector organizations.
                        </p>

                        <p class='text-slate-700 leading-relaxed'>
                            By establishing a cross-regional framework for HR metrics, the initiative aims to integrate DEI into the mainstream organizational culture of utilities and energy companies. This framework involves conducting gap analyses, comparing HR metrics among selected WePOWER Partners and energy utilities globally, and identifying trends and recommendations to enhance inclusivity.
                        </p>

                        <p class='text-slate-700 leading-relaxed'>
                            The HR metrics will ensure that innovative interventions and gender diversity goals are measurable and replicable.
                        </p>

                        <div class='grid sm:grid-cols-2 gap-4'>
                            <a href='#' class='inline-flex items-center justify-center rounded-full bg-slate-900 text-white px-5 py-3 text-sm font-semibold hover:bg-slate-800 transition'>
                                Download WePOWER HR Metric Brochure
                            </a>
                            <a href='#' class='inline-flex items-center justify-center rounded-full border border-slate-300 text-slate-700 px-5 py-3 text-sm font-semibold hover:bg-slate-50 transition'>
                                Read Blog
                            </a>
                        </div>

                        <div class='rounded-[1.5rem] bg-slate-50 border border-slate-200 p-6'>
                            <h4 class='text-xl font-bold text-slate-900 mb-4'>Working Group Members</h4>
                            <div class='grid sm:grid-cols-2 gap-x-8 gap-y-4 text-slate-700 leading-relaxed text-sm'>
                                <p><strong>Dr. Faiz Shah</strong><br>Executive Director at Yunus Center<br>Asian Institute of Technology</p>
                                <p><strong>Dr. Josebe Miren Bilbao-Henry</strong><br>Senior HR Specialist, Diversity, Equity & Inclusion II<br>World Bank</p>
                                <p><strong>Ms. Clare Novak</strong><br>Founder, International HR DEI Expert<br>Novak Associates</p>
                                <p><strong>Ms. Faiza Savul</strong><br>Head of Centre of Expertise (former)<br>KE (K-Electric) Pakistan</p>
                                <p><strong>Mr. Darrel Jacob</strong><br>Head of Centre of Expertise<br>KE (K-Electric) Pakistan</p>
                                <p><strong>Ms. Anupama Ratta</strong><br>Head Of Human Resources<br>Tata Power Renewable Energy Ltd</p>
                                <p><strong>Saadia Fahad</strong><br>General Manager DEI, Culture & Employee Experience<br>K-Electric</p>
                                <p><strong>Mr. M.I.M Irshad</strong><br>Deputy Managing Director, Chief Engineer<br>Ceylon Electricity Board</p>
                                <p><strong>Ms. Kinley Dem</strong><br>Director of Corporate Services / Sr. Manager, HR<br>BPC (Bhutan Power Corporation)</p>
                                <p><strong>Ms. Tshewang Lhamo</strong><br>Sr. HR Officer<br>DGPC (Druk Green Power Corporation)</p>
                                <p><strong>Mr. Toukir Hossain</strong><br>Assistant Director, PBS Human Resource Directorate<br>BREB</p>
                                <p><strong>Tasmia Rahman</strong><br>Economist<br>Mind, Behavior and Development Unit (eMBeD), World Bank</p>
                                <p><strong>Ms. Jasmine Boehm</strong><br>Director Change Management & Inclusion - Engendering Industries<br>USAID / TetraTech</p>
                                <p><strong>Ms. Fatima Hamdouch</strong><br>Strategy and Steering Executive Director<br>MASEN</p>
                                <p><strong>Mr. Dedi Budi Utomo</strong><br>Executive Vice President of Human Talent Development<br>PLN Indonesia</p>
                                <p><strong>Mr. Droumand Rupert</strong><br>General Manager Corporate Services<br>Solomon Islands Electricity Authority</p>
                                <p><strong>Mr. Nha Thanh Nguyen</strong><br>Vice General Director, Head of the Board for the Advancement of Women<br>Vietnam Electricity (EVN)</p>
                            </div>
                        </div>

                        <div class='rounded-[1.5rem] bg-white border border-slate-200 p-6'>
                            <h4 class='text-xl font-bold text-slate-900 mb-4'>Resources</h4>
                            <div class='space-y-3'>
                                <a href='#' class='block rounded-2xl border border-slate-200 px-4 py-4 hover:bg-slate-50 transition'>
                                    <div class='font-semibold text-slate-900'>WePOWER HR Metrics Optional</div>
                                </a>
                                <a href='#' class='block rounded-2xl border border-slate-200 px-4 py-4 hover:bg-slate-50 transition'>
                                    <div class='font-semibold text-slate-900'>Watch: WePOWER Learning Series - Bridging the Gender Gaps</div>
                                </a>
                            </div>
                        </div>
                    </div>
                "
            >
                <div class="relative h-56 overflow-hidden">
                    <img src="{{ asset('images/resources/001.png') }}"
                        alt="HR metrics framework resource"
                        class="w-full h-full object-cover transition duration-[1200ms] group-hover:scale-105 blur-sm">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/75 via-slate-900/20 to-transparent"></div>
                    
                    <div class="absolute top-5 left-5">
                        <span class="inline-flex text-[11px] uppercase tracking-[0.25em] bg-white/15 text-white px-3 py-1.5 rounded-full border border-white/20 backdrop-blur-md">
                            Framework
                        </span>
                    </div>
                    
                    <div class="absolute left-5 right-5 bottom-5 text-white">
                        <h3 class="text-2xl font-bold leading-tight mb-2">WePOWER HR Metrics Framework</h3>
                        <p class="text-white/85 text-sm leading-relaxed">
                            A DEI metrics tool helping utilities measure and strengthen inclusion.
                        </p>
                    </div>
                </div>                <div class="p-6">
                    <p class="text-slate-600 leading-relaxed text-sm mb-5">
                        A comprehensive framework for benchmarking, gap analysis, and measurable progress on gender diversity goals.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-semibold text-slate-900">Read full article</span>
                        <span class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-700 group-hover:bg-slate-900 group-hover:text-white transition">→</span>
                    </div>
                </div>
            </article>

        </div>
    </div>
</section>
<!-- BEAUTIFUL RESOURCE MODAL -->
<div id="resourceModal" class="fixed inset-0 z-[99999] hidden">
    <div id="resourceOverlay" class="absolute inset-0 bg-slate-950/70 backdrop-blur-md"></div>

    <div class="absolute inset-0 flex items-center justify-center p-4 sm:p-6">
        <div id="resourceDialog"
             class="relative w-full max-w-4xl max-h-[92vh] bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col scale-95 opacity-0 transition-all duration-300">

            <!-- Cyan accent header -->
            <div class="h-2 bg-gradient-to-r from-cyan-500 to-cyan-600"></div>

            <!-- Modal Header -->
            <div class="sticky top-0 z-10 bg-white px-8 py-6 border-b border-slate-100 flex items-start justify-between gap-4">
                <div class="flex-1 min-w-0">
                    <p id="modalCategory" class="text-xs uppercase tracking-[0.5px] font-semibold text-cyan-600 mb-1"></p>
                    <h3 id="modalTitle" class="text-2xl sm:text-3xl font-semibold text-slate-900 leading-tight"></h3>
                    <p id="modalDate" class="text-sm text-slate-500 mt-2"></p>
                </div>

                <button id="closeModal"
                        class="w-10 h-10 flex items-center justify-center text-2xl text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-2xl transition-all duration-200 flex-shrink-0">
                    ✕
                </button>
            </div>

            <!-- Modal Body -->
            <div class="flex-1 overflow-y-auto px-8 py-8">
                <div id="modalBody"
                     class="prose prose-slate max-w-none prose-headings:font-semibold prose-headings:text-slate-900 prose-p:text-slate-700 prose-li:text-slate-700 prose-strong:text-slate-900">
                </div>
            </div>

            <!-- Optional subtle footer -->
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

        // Trigger beautiful entrance animation
        requestAnimationFrame(() => {
            dialog.classList.remove('scale-95', 'opacity-0');
            dialog.classList.add('scale-100', 'opacity-100');
        });
    }

    function closeModal() {
        dialog.classList.add('scale-95', 'opacity-0');
        dialog.classList.remove('scale-100', 'opacity-100');

        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }, 300);
    }

    cards.forEach(card => {
        card.addEventListener('click', () => openModal(card));
    });

    closeBtn.addEventListener('click', closeModal);
    overlay.addEventListener('click', closeModal);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });
</script>

@endsection