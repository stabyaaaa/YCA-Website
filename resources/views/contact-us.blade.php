@extends('layouts.app')

@section('title', 'Contact')

@section('content')

<style>
    :root {
        --warm-cream: #fdfaf7;
        --soft-lavender: #9f7aea;
        --lavender-muted: #d6bcfa;
        --terracotta: #e46a76;
        --charcoal-deep: #1a202c;
        --gray-warm: #718096;
    }

    .contact-constrain {
        max-width: 80vw;
        margin-left: auto;
        margin-right: auto;
        width: 100%;
    }

    @media (min-width: 1400px) {
        .contact-constrain {
            max-width: 1180px;
        }
    }

    .pad-hero {
        padding: 9rem 1.5rem 12rem;
    }

    @media (min-width: 768px) {
        .pad-hero {
            padding: 11rem 3rem 14rem;
        }
    }

    .reveal-smooth {
        opacity: 0;
        transform: translateY(40px);
        transition: all 1.3s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .reveal-smooth.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .input-glow {
        background: white;
        border: 1px solid #e2e8f0;
        transition: all 0.4s ease;
        border-radius: 0.75rem;
        padding: 1rem 1.25rem;
        font-size: 1.05rem;
    }

    .input-glow:focus {
        outline: none;
        border-color: var(--soft-lavender);
        box-shadow: 0 0 0 4px rgba(159,122,234,0.12);
    }

    .btn-gradient {
        background: linear-gradient(135deg, var(--soft-lavender) 0%, #7f9cf5 100%);
        color: white;
        transition: all 0.45s ease;
        border-radius: 0.75rem;
        padding: 1.1rem 2.5rem;
        font-weight: 600;
        letter-spacing: 0.025em;
    }

    .btn-gradient:hover {
        transform: translateY(-3px);
        box-shadow: 0 20px 35px -10px rgba(159,122,234,0.35);
    }
</style>

<!-- Hero with subtle overlay image feel -->
<section class="relative bg-gradient-to-br from-[var(--warm-cream)] via-[var(--lavender-muted)]/30 to-[var(--warm-cream)] overflow-hidden">
    <div class="absolute inset-0 opacity-10 pointer-events-none">
        <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=2000&q=80"
             alt="Soft abstract warm background texture"
             class="w-full h-full object-cover">
    </div>

    <div class="relative contact-constrain pad-hero text-center">
        <div class="max-w-4xl mx-auto space-y-12">
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-light text-[var(--charcoal-deep)] leading-none tracking-tight reveal-smooth">
                Let’s Create Something Together
            </h1>

            <p class="text-xl md:text-2xl text-[var(--gray-warm)] leading-relaxed max-w-3xl mx-auto reveal-smooth" style="transition-delay: 0.3s;">
                Whether you bring questions, ideas, opportunities, critique, or simply curiosity — we welcome it all. 
                Every message is read with care and intention.
            </p>

            <div class="flex flex-wrap justify-center gap-6 pt-6 reveal-smooth" style="transition-delay: 0.5s;">
                <a href="#form" class="btn-gradient text-lg shadow-lg">
                    Write to Us →
                </a>
                <a href="#location" class="border-2 border-[var(--soft-lavender)] text-[var(--soft-lavender)] px-10 py-4 rounded-xl font-medium hover:bg-[var(--lavender-muted)]/20 transition text-lg">
                    Find Us
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Split: Form + Visual / Info -->
<section class="bg-white">
    <div class="contact-constrain pad-hero">
        <div class="grid lg:grid-cols-2 gap-12 xl:gap-20 items-stretch">
            <!-- Left: Form – clean & spacious -->
            <div class="space-y-14 reveal-smooth">
                <div class="space-y-6">
                    <h2 class="text-4xl font-light text-[var(--charcoal-deep)]">
                        Drop us a line
                    </h2>
                    <p class="text-lg text-[var(--gray-warm)]">
                        We usually respond within 3–5 working days. Urgent matters? Add “URGENT” in the subject.
                    </p>
                </div>

                <form id="form" class="space-y-7">
                    <div class="grid md:grid-cols-2 gap-7">
                        <div>
                            <label class="block text-sm font-medium text-[var(--charcoal-deep)] mb-2.5">First Name</label>
                            <input type="text" class="input-glow w-full">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[var(--charcoal-deep)] mb-2.5">Last Name</label>
                            <input type="text" class="input-glow w-full">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[var(--charcoal-deep)] mb-2.5">Email</label>
                        <input type="email" class="input-glow w-full">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[var(--charcoal-deep)] mb-2.5">Organization / Role (optional)</label>
                        <input type="text" class="input-glow w-full">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[var(--charcoal-deep)] mb-2.5">I’m reaching out about…</label>
                        <select class="input-glow w-full appearance-none">
                            <option value="">Choose topic</option>
                            <option>Partnership or Collaboration</option>
                            <option>Research / Data Inquiry</option>
                            <option>Resource Feedback or Localization</option>
                            <option>Academic / Student Opportunity</option>
                            <option>Media / Speaking Request</option>
                            <option>General / Other</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[var(--charcoal-deep)] mb-2.5">Your Message</label>
                        <textarea rows="7" class="input-glow w-full resize-none"></textarea>
                    </div>

                    <button type="submit" class="btn-gradient w-full py-5 text-xl mt-4">
                        Send Message
                    </button>
                </form>
            </div>

            <!-- Right: Visual + Contact Channels -->
            <div class="space-y-16 reveal-smooth" style="transition-delay: 0.35s;">
                <div class="space-y-6">
                    <h3 class="text-3xl font-light text-[var(--lavender)]">
                        Where to Find Us
                    </h3>
                    <p class="text-lg text-[var(--gray-warm)] leading-relaxed">
                        Stabya Acharya @ Asian Institute of Technology<br>
                        P.O. Box 4, Khlong Luang<br>
                        Pathum Thani 12120, Thailand
                    </p>

                    <div class="rounded-2xl overflow-hidden shadow-2xl mt-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.822!2d100.912!3d14.079!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d664!2sAIT!5e0!3m2!1sen!2sth!4v1730000000000"
                                width="100%" height="380" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>

                <div class="space-y-10">
                    <div>
                        <h4 class="text-xl font-medium text-[var(--charcoal-deep)] mb-5">Quick Ways to Reach Us</h4>
                        <ul class="space-y-6 text-lg">
                            <li class="flex items-start gap-5">
                                <span class="text-3xl text-[var(--lavender)]">✉️</span>
                                <div>
                                    <strong class="block">General & Collaboration</strong>
                                    <a href="mailto:connect@initiative.org" class="text-[var(--lavender)] hover:underline">connect@initiative.org</a>
                                </div>
                            </li>
                            <li class="flex items-start gap-5">
                                <span class="text-3xl text-[var(--lavender)]">📋</span>
                                <div>
                                    <strong class="block">Resources & Proposals</strong>
                                    <a href="mailto:resources@initiative.org" class="text-[var(--lavender)] hover:underline">resources@initiative.org</a>
                                </div>
                            </li>
                            <li class="flex items-start gap-5">
                                <span class="text-3xl text-[var(--lavender)]">🗞️</span>
                                <div>
                                    <strong class="block">Media & Press</strong>
                                    <a href="mailto:media@initiative.org" class="text-[var(--lavender)] hover:underline">media@initiative.org</a>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="pt-4">
                        <p class="text-lg text-[var(--gray-warm)] italic">
                            We read every message personally.<br>
                            Expect a thoughtful reply within 3–7 working days.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Closing warm note -->
<section class="bg-[var(--cream)]">
    <div class="contact-constrain pad-contact text-center">
        <div class="max-w-3xl mx-auto space-y-10">
            <h2 class="text-3xl md:text-4xl font-light text-[var(--charcoal-deep)] reveal-smooth">
                Your Message Matters
            </h2>
            <p class="text-xl text-[var(--gray-warm)] leading-relaxed reveal-smooth" style="transition-delay: 0.25s;">
                Behind every email is a person with ideas, questions, or dreams. We treat each one with the respect and curiosity it deserves. Thank you for reaching out — we look forward to connecting.
            </p>
        </div>
    </div>
</section>

<script>
    const obs = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) e.target.classList.add('visible');
        });
    }, { threshold: 0.18 });

    document.querySelectorAll('.reveal-smooth').forEach(el => obs.observe(el));
</script>

@endsection