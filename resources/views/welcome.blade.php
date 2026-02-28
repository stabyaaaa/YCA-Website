@extends('layouts.app')

@section('title', 'Home')

@section('content')

<style>
    :root {
        --teal: #0f766e;
        --amber: #d97706;
        --indigo: #4f46e5;
        --slate-900: #0f172a;
        --slate-800: #1e293b;
        --slate-700: #334155;
        --gray-100: #f3f4f6;
        --gray-200: #e5e7eb;
    }

    * { scroll-behavior: smooth; }

    /* Animations */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(50px); }
        to   { opacity: 1; transform: translateY(0); }
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

    /* Card hover */
    .card-hover {
        transition: all 0.35s ease;
    }
    .card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px -10px rgba(0,0,0,0.12);
    }

    /* Slider */
    .slider-container { overflow: hidden; }
    .slider-track {
        display: flex;
        width: max-content;
        animation: infinite-scroll 70s linear infinite;
    }
    @keyframes infinite-scroll {
        from { transform: translateX(0); }
        to   { transform: translateX(-50%); }
    }

    @media (max-width: 640px) {
        h1 { font-size: 2.8rem; line-height: 1.15; }
        h2 { font-size: 2.4rem; }
    }
</style>

<!-- ================= HERO - Original style from your first message ================= -->
<section class="bg-gradient-to-r from-blue-50 to-white">
    <div class="max-w-7xl mx-auto px-6 py-20 grid md:grid-cols-2 gap-12 items-center">
        <div>
            <h1 class="text-4xl md:text-5xl font-bold leading-tight">
                Empowering Sustainable Development
                <span class="text-blue-700">Through Innovation</span>
            </h1>

            <p class="mt-6 text-lg text-gray-600">
                A collaborative initiative by the World Bank and Yunus Center at
                Asian Institute of Technology to drive inclusive growth, social
                business, and data-driven development solutions.
            </p>

            <div class="mt-8 space-x-4">
                <a href="#projects"
                   class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Explore Projects
                </a>
                <a href="#about"
                   class="px-6 py-3 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition">
                    Learn More
                </a>
            </div>
        </div>

        <div class="hidden md:block">
            <div class="bg-white shadow-xl rounded-xl p-8">
                <h3 class="font-semibold text-lg mb-4">Project Highlights</h3>
                <ul class="space-y-3 text-gray-600">
                    <li>• Social Business & Impact Analytics</li>
                    <li>• Climate & Smart Agriculture</li>
                    <li>• Policy-Driven Data Platforms</li>
                    <li>• Capacity Building & Research</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ================= ABOUT ================= -->
<section id="about" class="py-20 lg:py-28 bg-[var(--gray-100)]">
    <div class="max-w-screen-2xl mx-auto px-5 sm:px-8 lg:px-12 text-center space-y-12 lg:space-y-16">
        <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-[var(--slate-900)] animate-on-scroll">United for Lasting Impact</h2>
        <p class="text-lg sm:text-xl lg:text-2xl text-slate-700 max-w-5xl mx-auto leading-relaxed">
            Combining global development expertise with social business innovation to create scalable, technology-enabled solutions for inequality, climate vulnerability, and economic inclusion.
        </p>

        <div class="grid md:grid-cols-3 gap-8 pt-10 lg:pt-16">
            <div class="p-8 bg-white rounded-2xl shadow-lg card-hover animate-on-scroll" style="transition-delay: 0.1s;">
                <div class="text-6xl mb-6 text-blue-600">🌍</div>
                <h3 class="text-2xl lg:text-3xl font-bold text-slate-900 mb-4">Global Scale</h3>
                <p class="text-slate-600">Connecting institutions, governments, and grassroots innovators.</p>
            </div>
            <div class="p-8 bg-white rounded-2xl shadow-lg card-hover animate-on-scroll" style="transition-delay: 0.3s;">
                <div class="text-6xl mb-6 text-[var(--amber)]">💡</div>
                <h3 class="text-2xl lg:text-3xl font-bold text-slate-900 mb-4">Innovation Core</h3>
                <p class="text-slate-600">Data, AI, and responsible scaling models.</p>
            </div>
            <div class="p-8 bg-white rounded-2xl shadow-lg card-hover animate-on-scroll" style="transition-delay: 0.5s;">
                <div class="text-6xl mb-6 text-[var(--indigo)]">🤝</div>
                <h3 class="text-2xl lg:text-3xl font-bold text-slate-900 mb-4">Human-Centric</h3>
                <p class="text-slate-600">Equity, dignity, and resilient futures first.</p>
            </div>
        </div>
    </div>
</section>

<!-- ================= FOCUS AREAS ================= -->
<section class="py-20 lg:py-28 bg-white">
    <div class="max-w-screen-2xl mx-auto px-5 sm:px-8 lg:px-12 space-y-24 lg:space-y-40">
        <!-- Focus 1 -->
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center animate-on-scroll">
            <div class="space-y-6 lg:space-y-8">
                <h2 class="text-4xl lg:text-5xl font-bold text-[var(--slate-900)]">Social Business & Impact</h2>
                <p class="text-lg lg:text-xl text-slate-700 leading-relaxed">
                    Enterprises that solve social problems profitably while prioritizing people and planet.
                </p>
                <ul class="space-y-4 text-lg text-slate-600">
                    <li class="flex items-center gap-3"><span class="text-3xl text-blue-600">✓</span> Impact-first microfinance models</li>
                    <li class="flex items-center gap-3"><span class="text-3xl text-blue-600">✓</span> Outcome analytics frameworks</li>
                    <li class="flex items-center gap-3"><span class="text-3xl text-blue-600">✓</span> Entrepreneur capacity ecosystems</li>
                </ul>
            </div>
            <div class="rounded-3xl overflow-hidden shadow-xl card-hover">
                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1600&q=80"
                     alt="Inclusive entrepreneurship" class="w-full h-auto object-cover">
            </div>
        </div>

        <!-- Focus 2 (reversed) -->
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center lg:flex-row-reverse animate-on-scroll" style="transition-delay: 0.2s;">
            <div class="rounded-3xl overflow-hidden shadow-xl card-hover">
                <img src="https://images.unsplash.com/photo-1551288049-b1f7c97e2b7a?auto=format&fit=crop&w=1600&q=80"
                     alt="Data dashboard" class="w-full h-auto object-cover">
            </div>
            <div class="space-y-6 lg:space-y-8">
                <h2 class="text-4xl lg:text-5xl font-bold text-[var(--slate-900)]">Data & AI for Development</h2>
                <p class="text-lg lg:text-xl text-slate-700 leading-relaxed">
                    Turning complex data into intelligent, evidence-based policy and real-time impact tools.
                </p>
                <ul class="space-y-4 text-lg text-slate-600">
                    <li class="flex items-center gap-3"><span class="text-3xl text-[var(--amber)]">✓</span> Predictive vulnerability mapping</li>
                    <li class="flex items-center gap-3"><span class="text-3xl text-[var(--amber)]">✓</span> Policy simulation & forecasting</li>
                    <li class="flex items-center gap-3"><span class="text-3xl text-[var(--amber)]">✓</span> Open stakeholder data platforms</li>
                </ul>
            </div>
        </div>

        <!-- Focus 3 -->
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center animate-on-scroll" style="transition-delay: 0.4s;">
            <div class="space-y-6 lg:space-y-8">
                <h2 class="text-4xl lg:text-5xl font-bold text-[var(--slate-900)]">Climate Resilience & Smart Agri</h2>
                <p class="text-lg lg:text-xl text-slate-700 leading-relaxed">
                    Adaptive technologies and systems for farmers and communities facing climate uncertainty.
                </p>
                <ul class="space-y-4 text-lg text-slate-600">
                    <li class="flex items-center gap-3"><span class="text-3xl text-[var(--indigo)]">✓</span> IoT & drone-enabled precision farming</li>
                    <li class="flex items-center gap-3"><span class="text-3xl text-[var(--indigo)]">✓</span> Climate-smart water & crop strategies</li>
                    <li class="flex items-center gap-3"><span class="text-3xl text-[var(--indigo)]">✓</span> Resilient green value chains</li>
                </ul>
            </div>
            <div class="rounded-3xl overflow-hidden shadow-xl card-hover">
                <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1600&q=80"
                     alt="Sustainable farming" class="w-full h-auto object-cover">
            </div>
        </div>
    </div>
</section>

<!-- ================= PROJECT HIGHLIGHTS SLIDER ================= -->
<section id="projects" class="py-20 lg:py-28 bg-slate-900 text-white overflow-hidden">
    <div class="max-w-screen-2xl mx-auto px-5 sm:px-8 lg:px-12">
        <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-center mb-12 lg:mb-16 animate-on-scroll">Project Highlights</h2>

        <div class="slider-container">
            <div class="slider-track flex gap-6 sm:gap-8">
                @foreach(range(1,2) as $i)
                    <div class="min-w-[300px] sm:min-w-[380px] lg:min-w-[460px] bg-slate-800 rounded-2xl overflow-hidden shadow-2xl card-hover">
                        <img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?auto=format&fit=crop&w=800&q=80"
                             alt="Community impact" class="w-full h-56 sm:h-64 object-cover">
                        <div class="p-6 sm:p-8">
                            <h3 class="text-xl sm:text-2xl font-bold mb-3">Inclusive Enterprise Networks</h3>
                            <p class="text-gray-300">Jobs with dignity while breaking poverty cycles.</p>
                        </div>
                    </div>

                    <div class="min-w-[300px] sm:min-w-[380px] lg:min-w-[460px] bg-slate-800 rounded-2xl overflow-hidden shadow-2xl card-hover">
                        <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=800&q=80"
                             alt="Policy data" class="w-full h-56 sm:h-64 object-cover">
                        <div class="p-6 sm:p-8">
                            <h3 class="text-xl sm:text-2xl font-bold mb-3">Real-Time Policy Intelligence</h3>
                            <p class="text-gray-300">Data platforms shaping smarter strategies.</p>
                        </div>
                    </div>

                    <div class="min-w-[300px] sm:min-w-[380px] lg:min-w-[460px] bg-slate-800 rounded-2xl overflow-hidden shadow-2xl card-hover">
                        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?auto=format&fit=crop&w=800&q=80"
                             alt="Climate resilience" class="w-full h-56 sm:h-64 object-cover">
                        <div class="p-6 sm:p-8">
                            <h3 class="text-xl sm:text-2xl font-bold mb-3">Resilient Agri-Futures</h3>
                            <p class="text-gray-300">Tech empowering smallholder adaptation.</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- ================= CTA - Simplified colors + images ================= -->
<section class="py-20 lg:py-28 bg-white border-t">
    <div class="max-w-screen-2xl mx-auto px-5 sm:px-8 lg:px-12 text-center space-y-12">
        <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-[var(--slate-900)] animate-on-scroll">
            Shape Tomorrow With Us
        </h2>

        <p class="text-xl sm:text-2xl text-slate-700 max-w-4xl mx-auto">
            Collaborate with researchers, policymakers, innovators, and communities building an equitable & resilient world.
        </p>

        <div class="grid md:grid-cols-3 gap-8 pt-8">
            <div class="rounded-2xl overflow-hidden shadow-lg">
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2b033f?auto=format&fit=crop&w=800&q=80"
                     alt="Global partnership" class="w-full h-64 object-cover">
            </div>
            <div class="rounded-2xl overflow-hidden shadow-lg">
                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=800&q=80"
                     alt="Community collaboration" class="w-full h-64 object-cover">
            </div>
            <div class="rounded-2xl overflow-hidden shadow-lg">
                <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=800&q=80"
                     alt="Sustainable future" class="w-full h-64 object-cover">
            </div>
        </div>

        <div class="pt-10">
            <a href="#contact"
               class="inline-block px-12 py-5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xl rounded-xl shadow-lg transition">
                Join the Movement →
            </a>
        </div>
    </div>
</section>

<script>
// Smooth scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href'))?.scrollIntoView({ behavior: 'smooth' });
    });
});

// Scroll animations
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