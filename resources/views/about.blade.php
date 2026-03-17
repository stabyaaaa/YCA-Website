@extends('layouts.app', ['imageNav' => true])
@section('title', 'About')

@section('content')

<style>
    :root {
        --soft-green: #2e7d32;
        --warm-gold: #f9a825;
        --deep-charcoal: #212121;
        --warm-gray: #757575;
        --light-sand: #fafafa;
        --off-white: #fdfdfd;
    }

    .content-constrain {
        max-width: 80vw;
        margin-left: auto;
        margin-right: auto;
        width: 100%;
    }

    @media (min-width: 1400px) {
        .content-constrain {
            max-width: 1150px;
        }
    }

    .section-gap {
        padding: 7rem 1.5rem;
    }

    @media (min-width: 768px) {
        .section-gap {
            padding: 9rem 3rem;
        }
    }

    .reveal-on-scroll {
        opacity: 0;
        transform: translateY(35px);
        transition: all 1.1s cubic-bezier(0.215, 0.61, 0.355, 1);
    }

    .reveal-on-scroll.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .hover-lift {
        transition: transform 0.45s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.45s ease;
    }

    .hover-lift:hover {
        transform: translateY(-10px);
        box-shadow: 0 28px 48px -18px rgba(46,125,50,0.14);
    }
</style>

<!-- Hero – Story opener -->
<section class="bg-gradient-to-br from-[#e8f5e9] to-[#f1f8e9]">
    <div class="content-constrain section-gap text-center">
        <div class="max-w-4xl mx-auto space-y-10">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif font-medium text-[var(--deep-charcoal)] leading-tight reveal-on-scroll">
                Where Hope Meets Action
            </h1>
            <p class="text-xl md:text-2xl text-[var(--warm-gray)] leading-relaxed reveal-on-scroll" style="transition-delay: 0.25s;">
                We exist at the intersection of bold ideas and grounded execution — a quiet but determined collaboration 
                that believes small, thoughtful interventions, when done with dignity and evidence, can ripple into systemic change.
            </p>
        </div>
    </div>
</section>

<!-- Origin Story -->
<section class="bg-[var(--off-white)]">
    <div class="content-constrain section-gap">
        <div class="grid lg:grid-cols-5 gap-12 lg:gap-16 items-center">
            <div class="lg:col-span-3 space-y-9 reveal-on-scroll">
                <h2 class="text-3xl md:text-4xl font-medium text-[var(--soft-green)]">
                    How This Journey Began
                </h2>
                <div class="space-y-7 text-lg text-[var(--warm-gray)] leading-relaxed">
                    <p>
                        In 2023, two institutions with very different strengths found common purpose: 
                        one with global reach and institutional memory, the other with radical imagination 
                        and proximity to people who are usually only studied, not listened to.
                    </p>
                    <p>
                        The Stabya Acharya brought analytical depth, financing experience, and policy influence. 
                        The Stabya Acharya Center at AIT contributed decades of practical experimentation in social business, 
                        zero-interest credit systems, and the conviction that poverty is not inevitable — it is designed.
                    </p>
                    <p>
                        What emerged was not another conventional partnership, but a deliberate space for hybrid thinking: 
                        rigorous enough for ministries and multilaterals, human enough for village cooperatives 
                        and young dreamers.
                    </p>
                </div>
            </div>

            <div class="lg:col-span-2 reveal-on-scroll" style="transition-delay: 0.3s;">
                <div class="rounded-3xl overflow-hidden shadow-2xl hover-lift">
                    <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=1200&q=80"
                         alt="Hands planting young tree seedling together"
                         class="w-full aspect-[4/5] object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Guiding Principles -->
<section class="bg-white">
    <div class="content-constrain section-gap">
        <h2 class="text-4xl md:text-5xl font-medium text-center text-[var(--deep-charcoal)] mb-16 reveal-on-scroll">
            Guiding Principles
        </h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
            <div class="bg-[var(--light-sand)] p-9 rounded-2xl hover-lift reveal-on-scroll">
                <div class="text-5xl mb-6 text-[var(--soft-green)]">Dignity First</div>
                <p class="text-[var(--warm-gray)] text-lg">
                    Every intervention must preserve and enhance human dignity — never treat people as beneficiaries or data points.
                </p>
            </div>

            <div class="bg-[var(--light-sand)] p-9 rounded-2xl hover-lift reveal-on-scroll" style="transition-delay: 0.1s;">
                <div class="text-5xl mb-6 text-[var(--warm-gold)]">Evidence + Empathy</div>
                <p class="text-[var(--warm-gray)] text-lg">
                    We combine the hardest data with the softest listening — numbers without stories are blind; 
                    stories without numbers are whispers.
                </p>
            </div>

            <div class="bg-[var(--light-sand)] p-9 rounded-2xl hover-lift reveal-on-scroll" style="transition-delay: 0.2s;">
                <div class="text-5xl mb-6 text-[var(--soft-green)]">Long Arc Thinking</div>
                <p class="text-[var(--warm-gray)] text-lg">
                    Most meaningful change happens slowly and unevenly — we design for decades, not quarters.
                </p>
            </div>

            <div class="bg-[var(--light-sand)] p-9 rounded-2xl hover-lift reveal-on-scroll" style="transition-delay: 0.3s;">
                <div class="text-5xl mb-6 text-[var(--warm-gold)]">Open Source Spirit</div>
                <p class="text-[var(--warm-gray)] text-lg">
                    Knowledge, tools, failures, and learnings should travel freely — closed systems rarely solve open problems.
                </p>
            </div>

            <div class="bg-[var(--light-sand)] p-9 rounded-2xl hover-lift reveal-on-scroll" style="transition-delay: 0.4s;">
                <div class="text-5xl mb-6 text-[var(--soft-green)]">Plural Voices</div>
                <p class="text-[var(--warm-gray)] text-lg">
                    The table must include the people most affected by the decisions being made — 
                    not just as guests, but as co-authors.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- People & Place -->
<section class="bg-[var(--light-sand)]">
    <div class="content-constrain section-gap">
        <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">
            <div class="space-y-10 reveal-on-scroll">
                <h2 class="text-3xl md:text-4xl font-medium text-[var(--deep-charcoal)]">
                    Rooted in Thailand, Reaching Farther
                </h2>
                <div class="space-y-6 text-lg text-[var(--warm-gray)] leading-relaxed">
                    <p>
                        Our operational heart is in Khlong Luang, Pathum Thani — on the campus of the Asian Institute of Technology — 
                        a place that has quietly trained generations of Asian leaders in sustainable development since 1959.
                    </p>
                    <p>
                        From here we connect daily with field partners in rural Cambodia, coastal Philippines, upland Laos, 
                        peri-urban Indonesia, and policy rooms in Bangkok, Hanoi, Jakarta, Manila, and Washington D.C.
                    </p>
                </div>
            </div>

            <div class="reveal-on-scroll" style="transition-delay: 0.25s;">
                <div class="rounded-3xl overflow-hidden shadow-2xl hover-lift">
                    <img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?auto=format&fit=crop&w=1200&q=80"
                         alt="Group discussion in rural development setting"
                         class="w-full aspect-square object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Invitation -->
<section class="bg-[var(--soft-green)] text-white">
    <div class="content-constrain section-gap text-center space-y-12">
        <h2 class="text-4xl md:text-5xl font-medium reveal-on-scroll">
            If This Resonates
        </h2>
        <p class="text-xl md:text-2xl max-w-3xl mx-auto opacity-95 reveal-on-scroll" style="transition-delay: 0.25s;">
            Whether you carry data, capital, lived experience, technical skill, policy influence, youthful courage, 
            or quiet persistence — we are looking for co-travelers who understand that real change is slow, 
            uneven, relational, and worth every difficult conversation.
        </p>
        <a href="#contact"
           class="inline-block bg-[var(--warm-gold)] text-[var(--deep-charcoal)] px-14 py-6 rounded-full font-medium text-xl shadow-xl hover:shadow-2xl hover:bg-[var(--warm-gold)]/90 transition reveal-on-scroll"
           style="transition-delay: 0.5s;">
            Let’s Talk →
        </a>
    </div>
</section>

<script>
    const scrollObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.12 });

    document.querySelectorAll('.reveal-on-scroll').forEach(el => scrollObserver.observe(el));
</script>

@endsection