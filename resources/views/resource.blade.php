@extends('layouts.app')

@section('title', 'Resources & Knowledge')

@section('content')

<style>
    :root {
        --forest: #1a3c34;
        --terracotta: #c2410c;
        --cream: #fdfaf5;
        --light-moss: #e6f0eb;
        --text-dark: #1e293b;
        --text-muted: #64748b;
    }

    .resource-wrapper {
        max-width: 80vw;
        margin-left: auto;
        margin-right: auto;
        width: 100%;
    }

    @media (min-width: 1400px) {
        .resource-wrapper {
            max-width: 1180px;
        }
    }

    .pad-section {
        padding: 7rem 1.5rem;
    }

    @media (min-width: 768px) {
        .pad-section {
            padding: 9rem 2.5rem;
        }
    }

    .reveal {
        opacity: 0;
        transform: translateY(50px);
        transition: all 1s cubic-bezier(0.215, 0.61, 0.355, 1);
    }

    .reveal.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .resource-card {
        background: white;
        border-radius: 1.25rem;
        overflow: hidden;
        box-shadow: 0 10px 30px -10px rgba(26,60,52,0.08);
        transition: all 0.4s ease;
    }

    .resource-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px -15px rgba(26,60,52,0.15);
    }

    .pill {
        display: inline-block;
        padding: 0.4rem 1rem;
        border-radius: 999px;
        font-size: 0.875rem;
        font-weight: 500;
    }
</style>

<!-- Opening Visual + Intro -->
<section class="bg-[var(--light-moss)]">
    <div class="resource-wrapper pad-section">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div class="space-y-10 reveal">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[var(--forest)] leading-tight">
                    Open Knowledge for Lasting Change
                </h1>
                <p class="text-xl text-[var(--text-muted)] leading-relaxed">
                    We believe tools, frameworks, stories, and data should be freely accessible to anyone working toward inclusive, resilient, and regenerative futures. 
                    This space gathers our most battle-tested resources — created with partners, tested in communities, refined through real use.
                </p>
                <div class="flex flex-wrap gap-5">
                    <a href="#featured" class="bg-[var(--terracotta)] text-white px-8 py-4 rounded-xl font-medium hover:bg-[var(--terracotta)]/90 transition">
                        Jump to Featured
                    </a>
                    <a href="#categories" class="border-2 border-[var(--forest)] text-[var(--forest)] px-8 py-4 rounded-xl font-medium hover:bg-[var(--forest)]/5 transition">
                        Browse Categories
                    </a>
                </div>
            </div>

            <div class="reveal" style="transition-delay: 0.3s;">
                <div class="resource-card">
                    <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=1200&q=80"
                         alt="Farmer examining crops with digital tablet in field"
                         class="w-full h-80 object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Highlights – Large cards -->
<section id="featured" class="bg-white">
    <div class="resource-wrapper pad-section">
        <h2 class="text-4xl md:text-5xl font-bold text-center text-[var(--forest)] mb-16 reveal">
            Featured This Season
        </h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
            <div class="resource-card reveal">
                <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=800&q=80"
                     alt="Drone flying over green rice fields" class="w-full h-56 object-cover">
                <div class="p-8">
                    <div class="pill bg-[var(--terracotta)] text-white mb-4">2026 Edition</div>
                    <h3 class="text-2xl font-bold mb-4">Regenerative Rice Systems Guide</h3>
                    <p class="text-[var(--text-muted)] mb-6 line-clamp-4">
                        68-page practical manual covering alternate wetting-drying (AWD), bio-fertilizers, straw management, methane measurement protocols, carbon credit pathways, and farmer co-design lessons from 9 provinces in Vietnam, Thailand, and Cambodia.
                    </p>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-[var(--sage)] font-medium">PDF – 68 pages</span>
                        <a href="#" class="text-[var(--terracotta)] hover:underline">Download Free</a>
                    </div>
                </div>
            </div>

            <div class="resource-card reveal" style="transition-delay: 0.1s;">
                <img src="https://images.unsplash.com/photo-1551288049-b1f7c97e2b7a?auto=format&fit=crop&w=800&q=80"
                     alt="Modern analytics dashboard on screen" class="w-full h-56 object-cover">
                <div class="p-8">
                    <div class="pill bg-[var(--forest)] text-white mb-4">Interactive Dashboard</div>
                    <h3 class="text-2xl font-bold mb-4">Social Impact Monitoring Starter Kit</h3>
                    <p class="text-[var(--text-muted)] mb-6 line-clamp-4">
                        Ready-to-adapt Google Sheets + Power BI template pack with 42 core indicators, automated SDG mapping, beneficiary feedback loops, disaggregation by gender/age/location, and visualization presets — used by 23 partners in 2025.
                    </p>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-[var(--sage)] font-medium">Sheets + PBIX</span>
                        <a href="#" class="text-[var(--forest)] hover:underline">Get Template</a>
                    </div>
                </div>
            </div>

            <div class="resource-card reveal" style="transition-delay: 0.2s;">
                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=800&q=80"
                     alt="Group of people in discussion circle outdoors" class="w-full h-56 object-cover">
                <div class="p-8">
                    <div class="pill bg-[var(--terracotta)] text-white mb-4">Report + Video Series</div>
                    <h3 class="text-2xl font-bold mb-4">Youth Agripreneur Voices 2025</h3>
                    <p class="text-[var(--text-muted)] mb-6 line-clamp-4">
                        120-page compilation of 38 in-depth interviews + 6 short documentary videos from young entrepreneurs in Philippines, Indonesia, Laos — covering barriers, breakthroughs, financing journeys, digital tool adoption, and policy asks.
                    </p>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-[var(--sage)] font-medium">PDF + YouTube</span>
                        <a href="#" class="text-[var(--terracotta)] hover:underline">Explore Series</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories – Rich blocks -->
<section id="categories" class="bg-[var(--light-moss)]">
    <div class="resource-wrapper pad-section">
        <h2 class="text-4xl md:text-5xl font-bold text-center text-[var(--forest)] mb-16 reveal">
            Explore by Category
        </h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="resource-card reveal p-10">
                <div class="text-6xl mb-6 text-[var(--terracotta)]">📚</div>
                <h3 class="text-2xl font-bold mb-4">Toolkits & How-To Guides</h3>
                <p class="text-[var(--text-muted)] mb-6">
                    Step-by-step implementation resources — from setting up farmer cooperatives to measuring Scope 3 emissions in value chains.
                </p>
                <ul class="space-y-2 text-[var(--text-muted)]">
                    <li>• Social Enterprise Launch Pack</li>
                    <li>• Climate-Smart Cropping Manual</li>
                    <li>• Impact Data Collection Field Guide</li>
                    <li>• Gender-Inclusive Training Modules</li>
                </ul>
                <a href="#" class="mt-6 inline-block text-[var(--forest)] font-medium hover:underline">View All →</a>
            </div>

            <div class="resource-card reveal p-10" style="transition-delay: 0.1s;">
                <div class="text-6xl mb-6 text-[var(--forest)]">📊</div>
                <h3 class="text-2xl font-bold mb-4">Data, Dashboards & Indicators</h3>
                <p class="text-[var(--text-muted)] mb-6">
                    Open datasets, indicator libraries, Excel/Power BI templates, and visualization starters for monitoring SDGs, resilience, and equity.
                </p>
                <ul class="space-y-2 text-[var(--text-muted)]">
                    <li>• 120+ SDG-aligned indicators</li>
                    <li>• Vulnerability & Adaptive Capacity Index</li>
                    <li>• Carbon Footprint Calculator for Farms</li>
                    <li>• Beneficiary Feedback Dashboard Template</li>
                </ul>
                <a href="#" class="mt-6 inline-block text-[var(--forest)] font-medium hover:underline">Browse Data →</a>
            </div>

            <div class="resource-card reveal p-10" style="transition-delay: 0.2s;">
                <div class="text-6xl mb-6 text-[var(--terracotta)]">📖</div>
                <h3 class="text-2xl font-bold mb-4">Stories, Cases & Lessons Learned</h3>
                <p class="text-[var(--text-muted)] mb-6">
                    Deep-dive narratives, failure autopsies, success dissections, and peer voices from the field — always with raw lessons attached.
                </p>
                <ul class="space-y-2 text-[var(--text-muted)]">
                    <li>• 2025 Youth Agripreneur Portraits (38 cases)</li>
                    <li>• Failed Solar Irrigation Coop – What We Learned</li>
                    <li>• Scaling Micro-Franchise Model in Laos</li>
                    <li>• Women's Savings Group Impact Stories</li>
                </ul>
                <a href="#" class="mt-6 inline-block text-[var(--forest)] font-medium hover:underline">Read Stories →</a>
            </div>
        </div>
    </div>
</section>

<!-- Final Invitation -->
<section class="bg-[var(--forest)] text-white">
    <div class="resource-wrapper pad-section text-center space-y-12">
        <h2 class="text-4xl md:text-5xl font-bold reveal">
            Contribute or Customize
        </h2>
        <p class="text-xl md:text-2xl max-w-4xl mx-auto opacity-90 reveal" style="transition-delay: 0.2s;">
            These resources are living documents — improved by your use, critique, and adaptation. 
            If something is missing, outdated, or needs localization for your context, tell us. 
            We actively co-create new materials with partners every quarter.
        </p>
        <a href="#contact" 
           class="inline-block bg-[var(--terracotta)] px-12 py-6 rounded-xl font-bold text-xl shadow-xl hover:bg-[var(--terracotta)]/90 transition reveal" 
           style="transition-delay: 0.4s;">
            Suggest New Resource • Report Issue • Co-Create →
        </a>
    </div>
</section>

<script>
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.12 });

    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
</script>

@endsection

