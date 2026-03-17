@extends('layouts.app')

@section('title', 'Our Projects')

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

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(40px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .animate-on-scroll {
        opacity: 0;
        transform: translateY(40px);
        transition: all 0.8s cubic-bezier(0.22, 1, 0.36, 1);
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
        box-shadow: 0 20px 40px -10px rgba(79,70,229,0.18);
    }

    .gradient-reveal {
        position: relative;
        overflow: hidden;
    }

    .gradient-reveal::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(79,70,229,0.05), rgba(13,148,136,0.04), transparent);
        opacity: 0;
        transition: opacity 0.6s ease;
    }

    .gradient-reveal:hover::after {
        opacity: 1;
    }

    @media (max-width: 768px) {
        h1, h2 { font-size: 2.5rem; line-height: 1.2; }
        .text-4xl { font-size: 2.25rem; }
        .text-5xl { font-size: 2.75rem; }
        .h-64 { height: 14rem; }
        .h-96 { height: 20rem; }
    }
</style>

<!-- Bento Grid Projects Showcase -->
<section class="py-20 lg:py-28 bg-gradient-to-br from-slate-50 to-gray-50">
    <div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12">
        <h2 class="text-5xl lg:text-6xl font-extrabold text-center mb-16 bg-gradient-to-r from-indigo-700 to-teal-700 bg-clip-text text-transparent animate-on-scroll">
            Our Impact Projects
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-6 gap-6 auto-rows-fr">

            <!-- Large Featured Card - Regenerative Agri-Futures (controlled height) -->
            <div class="md:col-span-4 row-span-2 bg-white/60 backdrop-blur-md border border-gray-200/50 rounded-3xl overflow-hidden shadow-xl card-hover gradient-reveal animate-on-scroll flex flex-col">
                <div class="relative w-full h-64 lg:h-80 overflow-hidden flex-shrink-0">
                    <img 
                        src="https://images.unsplash.com/photo-1625244724120-1fd1d34d00f6?auto=format&fit=crop&w=1200&q=80" 
                        alt="Aerial view of regenerative farm with diverse crops and healthy soil patterns" 
                        class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                </div>
                <div class="p-8 lg:p-12 flex flex-col flex-grow">
                    <h3 class="text-4xl lg:text-5xl font-bold text-slate-900 mb-4">Regenerative Agri-Futures</h3>
                    <p class="text-lg lg:text-xl text-slate-700 mb-6 leading-relaxed flex-grow">
                        Supporting smallholder farmers with climate-smart advisory tools that provide localized weather forecasts, soil health insights, and sustainable crop management strategies. These tools help farmers make informed decisions about planting cycles, irrigation, and resource use while adapting to increasingly unpredictable climate conditions.<br><br>

Through farmer training programs and digital advisory platforms, the initiative strengthens community knowledge networks and enables producers to adopt sustainable practices that improve productivity while protecting natural ecosystems. <br><br>

By combining technology, education, and collaborative partnerships, the program helps rebuild soil health, increase long-term agricultural resilience, and improve the livelihoods of farming communities.
Empowering rural entrepreneurs and local cooperatives by providing access to digital tools, financial resources, and mentorship programs that support sustainable business development. These initiatives enable communities to transform traditional agricultural practices into profitable and environmentally responsible enterprises.<br><br>

By encouraging innovation and knowledge exchange among farmers, startups, and development organizations, the program fosters a dynamic ecosystem of rural entrepreneurship.<br><br>

This approach helps create new economic opportunities, generates local employment, and strengthens community resilience while ensuring that growth remains inclusive and environmentally sustainable.
<
                    </p>
                    <div class="flex flex-wrap gap-3 mt-auto">
                        <span class="px-4 py-2 bg-teal-100 text-teal-800 rounded-full text-sm font-medium">AI Advisory</span>
                        <span class="px-4 py-2 bg-teal-100 text-teal-800 rounded-full text-sm font-medium">Carbon Traceability</span>
                        <span class="px-4 py-2 bg-amber-100 text-amber-800 rounded-full text-sm font-medium">+35–45% Yield Potential</span>
                    </div>
                    <a href="#" class="mt-6 inline-block text-indigo-600 font-semibold hover:underline">View Full Case Study →</a>
                </div>
            </div>

            <!-- Medium Card - Real-Time Policy Intelligence -->
            <div class="md:col-span-2 bg-white/60 backdrop-blur-md border border-gray-200/50 rounded-3xl overflow-hidden shadow-lg card-hover gradient-reveal animate-on-scroll flex flex-col">
                <div class="relative w-full h-48 lg:h-64 overflow-hidden flex-shrink-0">
                    <img 
                        src="https://www.svgrepo.com/show/475656/google-color.svg"
                        alt="Modern dashboard interface showing data visualizations and analytics" 
                        class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                </div>
                <div class="p-6 lg:p-8 flex flex-col flex-grow">
                    <h3 class="text-2xl lg:text-3xl font-bold text-slate-900 mb-3">Real-Time Policy Intelligence</h3>
                    <p class="text-slate-600 mb-4 leading-relaxed flex-grow">
                        AI-driven platform integrating satellite data, open sources and field reports to deliver actionable insights for equitable policy in emerging economies.
                    </p>
                    <div class="flex flex-wrap gap-3 mt-auto">
                        <span class="px-4 py-1.5 bg-indigo-100 text-indigo-800 rounded-full text-sm">Data Pipeline</span>
                        <span class="px-4 py-1.5 bg-indigo-100 text-indigo-800 rounded-full text-sm">Predictive Modeling</span>
                    </div>
                    <a href="#" class="text-indigo-600 font-medium hover:underline mt-4">Explore →</a>
                </div>
            </div>

            <!-- Medium Card - Inclusive Enterprise Networks -->
            <div class="md:col-span-2 bg-white/60 backdrop-blur-md border border-gray-200/50 rounded-3xl overflow-hidden shadow-lg card-hover gradient-reveal animate-on-scroll flex flex-col">
                <div class="relative w-full h-48 lg:h-64 overflow-hidden flex-shrink-0">
                    <img 
                        src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=1200&q=80" 
                        alt="Diverse group of people collaborating in a modern workspace" 
                        class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                </div>
                <div class="p-6 lg:p-8 flex flex-col flex-grow">
                    <h3 class="text-2xl lg:text-3xl font-bold text-slate-900 mb-3">Inclusive Enterprise Networks</h3>
                    <p class="text-slate-600 mb-4 leading-relaxed flex-grow">
                        Digital infrastructure connecting social businesses, ethical investors, and underserved entrepreneurs to foster dignified jobs and scalable growth.
                    </p>
                    <div class="flex flex-wrap gap-3 mt-auto">
                        <span class="px-4 py-1.5 bg-amber-100 text-amber-800 rounded-full text-sm">Marketplace</span>
                        <span class="px-4 py-1.5 bg-amber-100 text-amber-800 rounded-full text-sm">Mentorship Layer</span>
                    </div>
                    <a href="#" class="text-indigo-600 font-medium hover:underline mt-4">Learn More →</a>
                </div>
            </div>

           

       
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.12 });

    document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));
});
</script>

@endsection