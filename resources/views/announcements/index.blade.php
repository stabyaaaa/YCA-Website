{{-- resources/views/announcements/index.blade.php --}}

@extends('layouts.app')

@section('title', 'Announcements | WePOWER')

@section('content')

<section class="bg-gray-50 min-h-screen">

    <!-- HEADER -->
    <div class="border-b border-gray-200 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-14">

            <p class="text-sm font-semibold uppercase tracking-widest text-indigo-600 mb-3">
                WePOWER Updates
            </p>

            <h1 class="text-4xl lg:text-5xl font-bold text-gray-900">
                Announcements
            </h1>

            <p class="mt-4 text-lg text-gray-600 max-w-2xl">
                Explore career opportunities, events, programs, and important updates
                for the WePOWER community.
            </p>

        </div>
    </div>


    <!-- ANNOUNCEMENTS GRID -->
    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">


            <!-- =====================================================
                 INTERNATIONAL RETURNING MOTHERS DAY
            ====================================================== -->
            <article
                class="group bg-white rounded-2xl overflow-hidden
                       border border-gray-200 shadow-sm
                       hover:shadow-xl hover:-translate-y-1
                       transition-all duration-300"
            >

                <!-- IMAGE -->
                <a
                    href="{{ route('announcements.returning-mothers-day') }}"
                    class="block overflow-hidden bg-gray-100"
                >

                    <img
                        src="{{ asset('images/announcements/mothersday.png') }}"
                        alt="International Returning Mothers Day 2026"
                        class="w-full h-56 object-cover
                               group-hover:scale-105 transition-transform duration-500"
                    >

                </a>


                <!-- CONTENT -->
                <div class="p-6">

                    <div class="flex items-center justify-between gap-4 mb-4">

                        <span
                            class="inline-flex px-3 py-1 rounded-full
                                   bg-pink-50 text-pink-700
                                   text-xs font-semibold uppercase tracking-wide"
                        >
                            Women in Energy
                        </span>

                        <span class="text-sm text-gray-500">
                            Sep 10, 2026
                        </span>

                    </div>


                    <h2 class="text-xl font-bold text-gray-900 leading-snug mb-3">

                        <a
                            href="{{ route('announcements.returning-mothers-day') }}"
                            class="hover:text-indigo-600 transition"
                        >
                            International Returning Mothers Day 2026
                        </a>

                    </h2>


                    <p class="text-gray-600 leading-7 mb-5">
                        Recognizing returning mothers and supporting more inclusive
                        pathways for women to continue and advance their professional journeys.
                    </p>


                    <a
                        href="{{ route('announcements.returning-mothers-day') }}"
                        class="inline-flex items-center gap-2
                               font-semibold text-indigo-600
                               hover:text-indigo-800 transition"
                    >
                        Read Announcement

                        <svg
                            class="w-4 h-4 transition-transform group-hover:translate-x-1"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 5l7 7-7 7"
                            />
                        </svg>
                    </a>

                </div>

            </article>



            <!-- =====================================================
                 IEEE GLOBAL VIRTUAL CAREER FAIR
            ====================================================== -->
            <article
                class="group bg-white rounded-2xl overflow-hidden
                       border border-gray-200 shadow-sm
                       hover:shadow-xl hover:-translate-y-1
                       transition-all duration-300"
            >

                <!-- IMAGE -->
                <a
                    href="{{ route('announcements.ieee-career-fair') }}"
                    class="block overflow-hidden"
                >

                    <img
                        src="{{ asset('images/announcements/ieee-career-fair.jpg') }}"
                        alt="IEEE Global Virtual Career Fair 2026"
                        class="w-full h-56 object-cover
                               group-hover:scale-105 transition-transform duration-500"
                    >

                </a>


                <!-- CONTENT -->
                <div class="p-6">

                    <div class="flex items-center justify-between gap-4 mb-4">

                        <span
                            class="inline-flex px-3 py-1 rounded-full
                                   bg-indigo-50 text-indigo-700
                                   text-xs font-semibold uppercase tracking-wide"
                        >
                            Career Opportunity
                        </span>

                        <span class="text-sm text-gray-500">
                            Sep 24, 2026
                        </span>

                    </div>


                    <h2 class="text-xl font-bold text-gray-900 leading-snug mb-3">

                        <a
                            href="{{ route('announcements.ieee-career-fair') }}"
                            class="hover:text-indigo-600 transition"
                        >
                            IEEE Global Virtual Career Fair 2026
                        </a>

                    </h2>


                    <p class="text-gray-600 leading-7 mb-5">
                        A global virtual career fair connecting professionals,
                        students, recruiters, and organizations worldwide.
                    </p>


                    <a
                        href="{{ route('announcements.ieee-career-fair') }}"
                        class="inline-flex items-center gap-2
                               font-semibold text-indigo-600
                               hover:text-indigo-800 transition"
                    >
                        Read Announcement

                        <svg
                            class="w-4 h-4 transition-transform group-hover:translate-x-1"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 5l7 7-7 7"
                            />
                        </svg>
                    </a>

                </div>

            </article>

        </div>

    </div>

</section>

@endsection