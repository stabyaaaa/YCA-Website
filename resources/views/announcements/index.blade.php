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


            <!-- ANNOUNCEMENT CARD -->
            <article
                class="group bg-white rounded-2xl overflow-hidden
                       border border-gray-200 shadow-sm
                       hover:shadow-xl hover:-translate-y-1
                       transition-all duration-300"
            >

                <!-- IMAGE -->
                <a href="{{ route('announcements.ieee-career-fair') }}"
                   class="block overflow-hidden">

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


            <!-- FUTURE ANNOUNCEMENT PLACEHOLDER -->
            <article
                class="bg-white rounded-2xl overflow-hidden
                       border border-dashed border-gray-300"
            >

                <div
                    class="h-56 bg-gray-100 flex items-center justify-center"
                >
                    <div class="text-center text-gray-400">

                        <svg
                            class="w-12 h-12 mx-auto mb-3"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                            />
                        </svg>

                        <span class="text-sm">
                            Stay Tuned for Another announcement.
                        </span>

                    </div>
                </div>


                <div class="p-6">

                    <div class="h-5 w-28 bg-gray-100 rounded mb-4"></div>

                    <div class="h-6 w-3/4 bg-gray-100 rounded mb-3"></div>

                    <div class="h-4 w-full bg-gray-100 rounded mb-2"></div>
                    <div class="h-4 w-5/6 bg-gray-100 rounded"></div>

                </div>

            </article>

        </div>

    </div>

</section>

@endsection