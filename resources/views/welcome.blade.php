@extends('layouts.app')


@section('title', 'Home')

@section('content')

<!-- ================= HERO ================= -->
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
                   class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Explore Projects
                </a>
                <a href="#about"
                   class="px-6 py-3 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50">
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
 <section id="about" class="py-20 bg-[#7676e1]">
        <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold">About the Initiative</h2>
        <p class="mt-6 max-w-3xl mx-auto text-gray-600 text-lg">
            This project brings together global development expertise from the
            World Bank and the Yunus Center at AIT to design scalable, technology-
            driven solutions that address real-world socio-economic challenges
            across Asia and beyond.
        </p>
    </div>
</section>

<!-- ================= FOCUS AREAS ================= -->
<section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Key Focus Areas</h2>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition">
                <h3 class="font-semibold text-xl mb-3">Social Business</h3>
                <p class="text-gray-600">
                    Promoting inclusive entrepreneurship models that prioritize
                    social impact over profit maximization.
                </p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition">
                <h3 class="font-semibold text-xl mb-3">Data & AI for Development</h3>
                <p class="text-gray-600">
                    Leveraging data science, AI, and analytics to inform evidence-
                    based policy and decision-making.
                </p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition">
                <h3 class="font-semibold text-xl mb-3">Sustainability & Climate</h3>
                <p class="text-gray-600">
                    Designing climate-resilient solutions for agriculture,
                    infrastructure, and livelihoods.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= CTA ================= -->
<section class="py-20 bg-blue-700 text-white text-center">
    <h2 class="text-3xl font-bold">Partner With Us</h2>
    <p class="mt-4 text-lg opacity-90">
        Join researchers, policymakers, and innovators shaping the future of
        sustainable development.
    </p>

    <a href="#contact"
       class="inline-block mt-8 px-8 py-3 bg-white text-blue-700 rounded-lg font-semibold hover:bg-gray-100">
        Get Involved
    </a>
</section>


@endsection

@section('content')
