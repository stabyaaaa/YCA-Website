@extends('layouts.app')

@section('title', 'Contact')

@section('content')
@if(session('success'))
    <div
        id="success-alert"
        class="mb-6 relative overflow-hidden rounded-2xl border border-emerald-200 bg-gradient-to-r from-emerald-50 to-white px-6 py-5 shadow-sm"
    >

        <div class="flex items-start gap-4">

            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600 text-xl shrink-0">
                ✓
            </div>

            <div class="flex-1">

                <h4 class="text-base font-semibold text-emerald-800">
                    Message Sent Successfully
                </h4>

                <p class="mt-1 text-sm leading-relaxed text-emerald-700">
                    {{ session('success') }}
                </p>

            </div>

            <button
                type="button"
                onclick="document.getElementById('success-alert').remove()"
                class="text-emerald-500 hover:text-emerald-700 transition"
            >
                ✕
            </button>

        </div>

        <!-- progress line -->
        <div class="absolute bottom-0 left-0 h-1 bg-emerald-400 animate-success-bar"></div>

    </div>
@endif
<style>
    :root {
        --warm-cream: #fdfaf7;
        --soft-lavender: #8b7cf6;
        --lavender-light: #ebe7ff;
        --lavender-muted: #d8d1ff;
        --terracotta: #e46a76;
        --charcoal-deep: #1a202c;
        --gray-warm: #6b7280;
        --gray-soft: #94a3b8;
        --line-soft: rgba(139, 124, 246, 0.12);
        --white-glass: rgba(255, 255, 255, 0.72);
    }

    .contact-constrain {
        width: 100%;
        max-width: 1180px;
        margin-left: auto;
        margin-right: auto;
        padding-left: 1.5rem;
        padding-right: 1.5rem;
    }

    @media (min-width: 768px) {
        .contact-constrain {
            padding-left: 2rem;
            padding-right: 2rem;
        }
    }

    .section-pad {
        padding-top: 6rem;
        padding-bottom: 6rem;
    }

    @media (min-width: 768px) {
        .section-pad {
            padding-top: 8rem;
            padding-bottom: 8rem;
        }
    }

    .hero-pad {
        padding-top: 8rem;
        padding-bottom: 7rem;
    }

    @media (min-width: 768px) {
        .hero-pad {
            padding-top: 10rem;
            padding-bottom: 8.5rem;
        }
    }

    .reveal-smooth {
        opacity: 0;
        transform: translateY(36px);
        transition: opacity 1s ease, transform 1s ease;
    }

    .reveal-smooth.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.78);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        border: 1px solid rgba(255, 255, 255, 0.5);
        box-shadow: 0 24px 60px rgba(15, 23, 42, 0.08);
    }

    .soft-panel {
        background: linear-gradient(180deg, rgba(255,255,255,0.96), rgba(249,247,255,0.92));
        border: 1px solid var(--line-soft);
        box-shadow: 0 18px 50px rgba(31, 41, 55, 0.06);
    }

    .input-glow {
        width: 100%;
        background: rgba(255,255,255,0.92);
        border: 1px solid #e5e7eb;
        border-radius: 1rem;
        padding: 1rem 1.1rem;
        font-size: 1rem;
        color: var(--charcoal-deep);
        transition: all 0.35s ease;
    }

    .input-glow::placeholder {
        color: #9ca3af;
    }

    .input-glow:focus {
        outline: none;
        border-color: var(--soft-lavender);
        box-shadow: 0 0 0 4px rgba(139, 124, 246, 0.12);
        background: #fff;
    }

    .btn-primary-soft {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.6rem;
        background: linear-gradient(135deg, var(--soft-lavender) 0%, #6d7df7 100%);
        color: white;
        border-radius: 999px;
        padding: 1rem 1.6rem;
        font-weight: 600;
        letter-spacing: 0.01em;
        transition: all 0.35s ease;
        box-shadow: 0 18px 35px rgba(109, 125, 247, 0.22);
    }

    .btn-primary-soft:hover {
        transform: translateY(-2px);
        box-shadow: 0 22px 40px rgba(109, 125, 247, 0.28);
    }

    .btn-outline-soft {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 999px;
        padding: 1rem 1.5rem;
        font-weight: 600;
        color: var(--soft-lavender);
        border: 1px solid rgba(139, 124, 246, 0.25);
        background: rgba(255,255,255,0.55);
        transition: all 0.3s ease;
    }

    .btn-outline-soft:hover {
        background: rgba(139, 124, 246, 0.07);
        border-color: rgba(139, 124, 246, 0.35);
    }

    .eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 0.55rem;
        padding: 0.5rem 0.9rem;
        border-radius: 999px;
        background: rgba(255,255,255,0.6);
        border: 1px solid rgba(139, 124, 246, 0.14);
        color: var(--soft-lavender);
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.16em;
        text-transform: uppercase;
    }

    .contact-badge {
        border-radius: 1rem;
        padding: 1rem 1rem;
        border: 1px solid rgba(139, 124, 246, 0.12);
        background: rgba(255,255,255,0.72);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .contact-badge:hover {
        transform: translateY(-2px);
        box-shadow: 0 16px 28px rgba(15, 23, 42, 0.07);
    }

    .map-shell {
        position: relative;
        border-radius: 1.75rem;
        overflow: hidden;
        border: 1px solid rgba(139, 124, 246, 0.14);
        box-shadow: 0 28px 60px rgba(15, 23, 42, 0.14);
        background: #fff;
    }

    .map-shell::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(17,24,39,0.14), rgba(17,24,39,0.02));
        pointer-events: none;
        z-index: 1;
    }

    .map-float-card {
        position: absolute;
        left: 1rem;
        bottom: 1rem;
        z-index: 2;
        max-width: 320px;
        background: rgba(255,255,255,0.92);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        border: 1px solid rgba(255,255,255,0.8);
        border-radius: 1.2rem;
        padding: 1rem 1rem 0.95rem;
        box-shadow: 0 16px 40px rgba(15, 23, 42, 0.14);
    }

    .map-float-card p {
        margin: 0;
    }

    .info-icon {
        width: 3rem;
        height: 3rem;
        border-radius: 1rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.15rem;
        background: linear-gradient(135deg, rgba(139,124,246,0.14), rgba(109,125,247,0.18));
        color: var(--soft-lavender);
        flex-shrink: 0;
    }

    .divider-soft {
        height: 1px;
        width: 100%;
        background: linear-gradient(to right, transparent, rgba(139, 124, 246, 0.15), transparent);
    }

    .closing-panel {
        border-radius: 2rem;
        background: linear-gradient(135deg, #ffffff 0%, #f6f3ff 55%, #fffaf7 100%);
        border: 1px solid rgba(139,124,246,0.1);
        box-shadow: 0 22px 50px rgba(15, 23, 42, 0.06);
    }
    @keyframes successBar {
    from {
        width: 100%;
    }

    to {
        width: 0%;
    }
}

.animate-success-bar {
    animation: successBar 5s linear forwards;
}
</style>
<script>
    setTimeout(() => {
        const alert = document.getElementById('success-alert');

        if (alert) {
            alert.style.transition = 'all 0.4s ease';
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-10px)';

            setTimeout(() => alert.remove(), 400);
        }
    }, 5000);
</script>
<section class="relative overflow-hidden bg-gradient-to-br from-[var(--warm-cream)] via-[#f6f1ff] to-white">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-20 -left-20 w-72 h-72 rounded-full bg-[var(--lavender-muted)]/30 blur-3xl"></div>
        <div class="absolute top-1/3 -right-20 w-80 h-80 rounded-full bg-pink-200/25 blur-3xl"></div>
        <div class="absolute bottom-0 left-1/3 w-72 h-72 rounded-full bg-indigo-200/20 blur-3xl"></div>
    </div>

    <div class="relative contact-constrain hero-pad">
        <div class="max-w-4xl mx-auto text-center">
            <div class="eyebrow reveal-smooth">
                Contact & Location
            </div>

            <h1 class="mt-7 text-5xl md:text-6xl lg:text-7xl font-light text-[var(--charcoal-deep)] leading-[0.95] tracking-tight reveal-smooth">
                Let’s Start a Conversation
            </h1>

            <p class="mt-8 text-lg md:text-xl text-[var(--gray-warm)] leading-relaxed max-w-3xl mx-auto reveal-smooth" style="transition-delay: 0.18s;">
                Whether you are reaching out with a question, a collaboration idea, a research inquiry, or a general introduction, we would be glad to hear from you.
            </p>

            <div class="mt-10 flex flex-wrap justify-center gap-4 reveal-smooth" style="transition-delay: 0.3s;">
                <a href="#contact-form" class="btn-primary-soft">
                    Write to Us
                    <span>→</span>
                </a>
                <a href="#location" class="btn-outline-soft">
                    View Location
                </a>
            </div>
        </div>
    </div>
</section>

<section class="bg-white">
    <div class="contact-constrain section-pad">
        <div class="grid lg:grid-cols-[1.02fr_0.98fr] gap-10 xl:gap-14 items-start">

            <div class="soft-panel rounded-[2rem] p-6 md:p-8 lg:p-10 reveal-smooth">
                <div class="max-w-2xl">
                    <p class="text-sm font-semibold uppercase tracking-[0.18em] text-[var(--soft-lavender)] mb-4">
                        Send a message
                    </p>

                    <h2 class="text-3xl md:text-4xl font-light text-[var(--charcoal-deep)] leading-tight">
                        We’d love to hear from you
                    </h2>

                    <p class="mt-4 text-[1.02rem] md:text-lg text-[var(--gray-warm)] leading-relaxed">
                        Share your message below and we will get back to you with care. The layout is kept clean and spacious so the page feels more editorial and premium.
                    </p>
                </div>

                <div class="divider-soft my-8"></div>

                <form action="{{ route('contact.message.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <div class="grid md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-medium text-[var(--charcoal-deep)] mb-2.5">
                                First Name
                            </label>

                            <input
                                type="text"
                                name="first_name"
                                class="input-glow"
                                placeholder="Your first name"
                                required
                            >
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-[var(--charcoal-deep)] mb-2.5">
                                Last Name
                            </label>

                            <input
                                type="text"
                                name="last_name"
                                class="input-glow"
                                placeholder="Your last name"
                                required
                            >
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[var(--charcoal-deep)] mb-2.5">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="input-glow"
                            placeholder="you@example.com"
                            required
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[var(--charcoal-deep)] mb-2.5">
                            Organization / Role
                        </label>

                        <input
                            type="text"
                            name="organization"
                            class="input-glow"
                            placeholder="University, company, or designation"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[var(--charcoal-deep)] mb-2.5">
                            Topic
                        </label>

                        <select
                            name="topic"
                            class="input-glow appearance-none"
                            required
                        >
                            <option value="">Choose a topic</option>
                            <option value="Partnership or Collaboration">Partnership or Collaboration</option>
                            <option value="Research / Data Inquiry">Research / Data Inquiry</option>
                            <option value="Academic / Student Opportunity">Academic / Student Opportunity</option>
                            <option value="Media / Speaking Request">Media / Speaking Request</option>
                            <option value="General / Other">General / Other</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[var(--charcoal-deep)] mb-2.5">
                            Message
                        </label>

                        <textarea
                            rows="7"
                            name="message"
                            class="input-glow resize-none"
                            placeholder="Write your message here..."
                            required
                        ></textarea>
                    </div>

                    <div class="pt-2">
                        <button
                            type="submit"
                            class="btn-primary-soft w-full text-base md:text-lg py-4"
                        >
                            Send Message
                        </button>
                    </div>
                </form>
            </div>

            <div id="location" class="space-y-6 reveal-smooth" style="transition-delay: 0.22s;">
                <div class="glass-card rounded-[2rem] p-6 md:p-8">
                    <p class="text-sm font-semibold uppercase tracking-[0.18em] text-[var(--soft-lavender)] mb-4">
                        Visit us
                    </p>

                    <h3 class="text-3xl md:text-4xl font-light text-[var(--charcoal-deep)] leading-tight">
                        Yunus Center at AIT
                    </h3>

                    <p class="mt-4 text-[1.02rem] md:text-lg text-[var(--gray-warm)] leading-relaxed">


Located within the Asian Institute of Technology campus in Pathum Thani, the Yunus Center AIT (YCA) is a collaboration between Nobel Laureate Professor Muhammad Yunus and the Asian Institute of Technology, serving as a space for collaboration, research, and dialogue. We welcome visitors, partners, and researchers interested in engaging with our work.                    </p>
                </div>

                <div class="map-shell">
                    <iframe
                        src="https://www.google.com/maps?q=Asian+Institute+of+Technology,+Pathum+Thani,+Thailand&output=embed"
                        width="100%"
                        height="520"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>

                    <div class="map-float-card">
                        <p class="text-xs uppercase tracking-[0.14em] font-semibold text-[var(--soft-lavender)] mb-2">
                            Yunus Center AIT
                        </p>
                        <p class="text-base font-semibold text-[var(--charcoal-deep)]">
                            Asian Institute of Technology
                        </p>
                        <p class="text-sm text-[var(--gray-warm)] leading-relaxed mt-1">
                            P.O. Box 4, Khlong Luang, Pathum Thani 12120, Thailand
                        </p>
                        <a href="https://www.google.com/maps?q=14.0799573,100.6097825" target="_blank" class="inline-block mt-3 text-sm font-medium text-[var(--soft-lavender)] hover:underline">
                            Open full map →
                        </a>
                    </div>
                </div>

                <div class="grid sm:grid-cols-2 gap-4">
                   

                    <div class="contact-badge">
                        <div class="flex items-start gap-4">
                            <div class="info-icon">✉️</div>
                            <div>
                                <h4 class="text-base font-semibold text-[var(--charcoal-deep)] flex items-center gap-2">
                                    General Contact
                                </h4>

                                <p class="mt-2 text-sm text-[var(--gray-warm)]">
                                    For inquiries, partnerships, or general communication:
                                </p>

                                <a href="mailto:sawtth@ait.asia" 
                                class="inline-block mt-2 text-sm font-medium text-[var(--soft-lavender)] hover:underline transition">
                                    sawtth@ait.asia
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="contact-badge">
                        <div class="flex items-start gap-4">
                            <div class="info-icon">🕒</div>
                            <div>
                                <h4 class="text-base font-semibold text-[var(--charcoal-deep)]">Response Time</h4>
                                <p class="mt-1 text-sm text-[var(--gray-warm)] leading-relaxed">
                                    Messagesssssss are typically reviewed and answered within a few working days.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>



<script>
    const obs = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.15 });

    document.querySelectorAll('.reveal-smooth').forEach(el => obs.observe(el));
</script>

@endsection