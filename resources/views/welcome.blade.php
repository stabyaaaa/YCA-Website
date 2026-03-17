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
<!-- ================= PREMIUM HERO ================= -->
<section class="relative min-h-screen flex items-center overflow-hidden">

    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=2400&q=80"
             class="w-full h-full object-cover scale-105 animate-hero-zoom"
             alt="Global development collaboration">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/80 via-slate-900/60 to-slate-900/40"></div>
    </div>

    <!-- Floating Blur Orbs -->
    <div class="absolute top-20 left-10 w-72 h-72 bg-blue-500/30 rounded-full blur-3xl animate-float"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl animate-float-delay"></div>

    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-6 py-32 grid md:grid-cols-2 gap-16 items-center">

        <!-- Text Content -->
        <div class="text-white space-y-8 animate-fade-up">

            <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold leading-tight">
                Empowering Sustainable Development
                <span class="bg-gradient-to-r from-blue-400 to-indigo-400 bg-clip-text text-transparent">
                    Through Innovation
                </span>
            </h1>

            <p class="text-xl md:text-2xl text-gray-200 max-w-2xl leading-relaxed">
                A collaborative initiative driving inclusive growth, AI-powered impact
                systems, and climate resilience solutions for emerging economies.
            </p>

            <div class="flex flex-wrap gap-6 pt-4">
                <a href="#projects"
                   class="px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-semibold text-lg shadow-xl transition transform hover:scale-105">
                    Explore Projects →
                </a>

                <a href="#about"
                   class="px-8 py-4 border border-white/40 text-white rounded-xl font-semibold text-lg backdrop-blur hover:bg-white/10 transition">
                    Learn More
                </a>
            </div>

        </div>

        <!-- Glass Highlight Card -->
        <div class="hidden md:block animate-fade-up-delay">
            <div class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-3xl p-10 shadow-2xl text-white">
                <h3 class="text-2xl font-bold mb-6">Strategic Impact Areas</h3>
                <ul class="space-y-4 text-lg">
                    <li>🌍 Social Business & Enterprise Systems</li>
                    <li>📊 AI-Driven Policy Intelligence</li>
                    <li>🌱 Climate & Smart Agriculture</li>
                    <li>🤝 Inclusive Innovation Networks</li>
                </ul>
            </div>
        </div>

    </div>
</section>

<!-- ================= ABOUT ================= -->
<section id="about" class="relative py-24 lg:py-32 overflow-hidden bg-gradient-to-br from-indigo-50 via-blue-50 to-purple-50/40">

  <!-- Optional subtle overlay texture / noise for depth (remove if too heavy) -->
  <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_70%,rgba(99,102,241,0.08)_0%,transparent_50%)] pointer-events-none"></div>

  <div class="relative max-w-screen-2xl mx-auto px-5 sm:px-8 lg:px-12 text-center space-y-12 lg:space-y-20">

    <!-- Heading + subtitle -->
    <div class="space-y-6 lg:space-y-8">
      <h2 class="text-5xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight bg-gradient-to-r from-indigo-700 via-blue-700 to-purple-700 bg-clip-text text-transparent animate-on-scroll">
        United for Lasting Impact
      </h2>

      <p class="text-xl sm:text-2xl lg:text-3xl text-slate-700/90 max-w-5xl mx-auto leading-relaxed font-light animate-on-scroll" style="transition-delay: 0.2s;">
        Blending global development wisdom with bold social innovation — we build scalable, tech-powered solutions that tackle inequality, climate risk, and economic exclusion at root.
      </p>
    </div>

    <!-- Feature cards – glassmorphism style -->
    <div class="grid md:grid-cols-3 gap-8 lg:gap-10 pt-12 lg:pt-20">
      <!-- Card 1 -->
      <div class="
        group relative p-8 lg:p-10 
        bg-white/40 backdrop-blur-2xl 
        border border-white/30 
        rounded-3xl 
        shadow-[0_20px_50px_-15px_rgba(99,102,241,0.15),0_10px_30px_-10px_rgba(0,0,0,0.08)] 
        overflow-hidden 
        transition-all duration-500 ease-out
        hover:shadow-[0_30px_70px_-20px_rgba(99,102,241,0.25),0_15px_40px_-15px_rgba(0,0,0,0.12)]
        hover:-translate-y-3 hover:scale-[1.015]
        animate-on-scroll
      " style="transition-delay: 0.1s;">

        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>

        <div class="relative z-10">
          <div class="text-7xl lg:text-8xl mb-8 text-blue-600/90 drop-shadow-sm">🌍</div>
          <h3 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-5 tracking-tight">Global Scale</h3>
          <p class="text-lg lg:text-xl text-slate-700/90 leading-relaxed">
            Bridging institutions, governments, and grassroots changemakers across continents.
          </p>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="
        group relative p-8 lg:p-10 
        bg-white/40 backdrop-blur-2xl 
        border border-white/30 
        rounded-3xl 
        shadow-[0_20px_50px_-15px_rgba(245,158,11,0.12),0_10px_30px_-10px_rgba(0,0,0,0.08)] 
        overflow-hidden 
        transition-all duration-500 ease-out
        hover:shadow-[0_30px_70px_-20px_rgba(245,158,11,0.22),0_15px_40px_-15px_rgba(0,0,0,0.12)]
        hover:-translate-y-3 hover:scale-[1.015]
        animate-on-scroll
      " style="transition-delay: 0.3s;">

        <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>

        <div class="relative z-10">
          <div class="text-7xl lg:text-8xl mb-8 text-amber-600/90 drop-shadow-sm">💡</div>
          <h3 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-5 tracking-tight">Innovation Core</h3>
          <p class="text-lg lg:text-xl text-slate-700/90 leading-relaxed">
            Harnessing responsible data, AI, and scalable models that adapt and endure.
          </p>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="
        group relative p-8 lg:p-10 
        bg-white/40 backdrop-blur-2xl 
        border border-white/30 
        rounded-3xl 
        shadow-[0_20px_50px_-15px_rgba(79,70,229,0.15),0_10px_30px_-10px_rgba(0,0,0,0.08)] 
        overflow-hidden 
        transition-all duration-500 ease-out
        hover:shadow-[0_30px_70px_-20px_rgba(79,70,229,0.25),0_15px_40px_-15px_rgba(0,0,0,0.12)]
        hover:-translate-y-3 hover:scale-[1.015]
        animate-on-scroll
      " style="transition-delay: 0.5s;">

        <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>

        <div class="relative z-10">
          <div class="text-7xl lg:text-8xl mb-8 text-indigo-600/90 drop-shadow-sm">🤝</div>
          <h3 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-5 tracking-tight">Human-Centric</h3>
          <p class="text-lg lg:text-xl text-slate-700/90 leading-relaxed">
            Equity, dignity, resilience, and meaningful choice at the heart of every solution.
          </p>
        </div>
      </div>
    </div>

  </div>
</section>
<!-- NEW IMPACT METRICS SECTION (replaces the old key areas cards) -->
<!-- FULL-PAGE IMMERSIVE REGENERATION STORY with blurred rounded text overlay -->
<section class="relative min-h-[80vh] lg:min-h-[100vh] flex items-end overflow-hidden bg-slate-50">
    <!-- Full-bleed background image -->
    <div class="absolute inset-0">
        <img 
            src="https://thumbs.dreamstime.com/b/aerial-perspective-organic-farm-showcasing-sustainable-no-till-practices-varied-companion-planting-techniques-vibrant-378087059.jpg"
            class="w-full h-full object-cover scale-105 transition-transform duration-[25s] hover:scale-100"
            alt="Aerial view of vibrant regenerative organic farm with diverse crops, no-till practices, companion planting, and thriving biodiversity"
        >
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-900/40 to-transparent/20"></div>
    </div>

    <!-- Blurred rounded rectangle text overlay at bottom -->
    <div class="relative z-10 w-full px-6 pb-16 lg:pb-32">
        <div class="max-w-5xl mx-auto">
            <div class="backdrop-blur-xl bg-black/30 border border-white/10 rounded-3xl p-8 lg:p-12 shadow-2xl animate-on-scroll">
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight mb-6 drop-shadow-md">
                    Regeneration Unfolding
                </h2>
                
                <div class="space-y-5 text-lg sm:text-xl lg:text-2xl text-white/95 font-light leading-relaxed">
                    <p>
                        Beneath wide skies, living cover crops weave across healed land — roots plunging deep, drawing carbon downward, awakening the soil’s hidden microbial symphony. 
                        Farming here is no longer extraction; it is restoration — mimicking nature’s timeless cycles to rebuild fertility, hold water, and nurture diversity.
                    </p>
                    <p class="text-base sm:text-lg lg:text-xl opacity-90 italic">
                        Each season reveals quiet proof: when we partner with the earth instead of dominating it, resilience returns — for the soil, the harvest, the communities, and the future.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>  

<!-- ================= PROJECT HIGHLIGHTS SLIDER ================= -->
<section id="projects" class="py-20 lg:py-28 bg-slate-100 text-slate-900 overflow-hidden">
    <div class="max-w-screen-2xl mx-auto px-5 sm:px-8 lg:px-12">
        <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-center mb-12 lg:mb-16 animate-on-scroll">Project Highlights</h2>

        <div class="slider-container">
            <div class="slider-track flex gap-6 sm:gap-8">
                @foreach(range(1,2) as $i)
                    <div class="min-w-[300px] sm:min-w-[380px] lg:min-w-[460px] bg-white rounded-2xl overflow-hidden shadow-2xl card-hover border border-slate-200">
                        <img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?auto=format&fit=crop&w=800&q=80"
                             alt="Community impact" class="w-full h-56 sm:h-64 object-cover">
                        <div class="p-6 sm:p-8">
                            <h3 class="text-xl sm:text-2xl font-bold mb-3 text-slate-900">Inclusive Enterprise Networks</h3>
                            <p class="text-slate-600">Jobs with dignity while breaking poverty cycles.</p>
                        </div>
                    </div>

                    <div class="min-w-[300px] sm:min-w-[380px] lg:min-w-[460px] bg-white rounded-2xl overflow-hidden shadow-2xl card-hover border border-slate-200">
                        <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=800&q=80"
                             alt="Policy data" class="w-full h-56 sm:h-64 object-cover">
                        <div class="p-6 sm:p-8">
                            <h3 class="text-xl sm:text-2xl font-bold mb-3 text-slate-900">Real-Time Policy Intelligence</h3>
                            <p class="text-slate-600">Data platforms shaping smarter strategies.</p>
                        </div>
                    </div>

                    <div class="min-w-[300px] sm:min-w-[380px] lg:min-w-[460px] bg-white rounded-2xl overflow-hidden shadow-2xl card-hover border border-slate-200">
                        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?auto=format&fit=crop&w=800&q=80"
                             alt="Climate resilience" class="w-full h-56 sm:h-64 object-cover">
                        <div class="p-6 sm:p-8">
                            <h3 class="text-xl sm:text-2xl font-bold mb-3 text-slate-900">Resilient Agri-Futures</h3>
                            <p class="text-slate-600">Tech empowering smallholder adaptation.</p>
                        </div>
                    </div>
                @endforeach
            </div>
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