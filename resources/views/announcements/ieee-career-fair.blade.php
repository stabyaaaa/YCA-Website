{{-- resources/views/announcements/ieee-career-fair.blade.php --}}

@extends('layouts.app')

@section('title', 'IEEE Global Virtual Career Fair 2026 | WePOWER')

@section('content')

<section class="bg-gray-50 min-h-screen">

    <div class="max-w-6xl mx-auto px-6 lg:px-8 py-10">


        <!-- BACK -->
        <a
            href="{{ route('announcements') }}"
            class="inline-flex items-center gap-2
                   text-sm font-medium text-gray-600
                   hover:text-indigo-600 transition mb-8"
        >
            <svg
                class="w-4 h-4"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 19l-7-7 7-7"
                />
            </svg>

            Back to Announcements
        </a>


        <!-- ARTICLE CARD -->
        <article
            class="bg-white rounded-3xl overflow-hidden
                   border border-gray-200 shadow-sm"
        >


            <!-- HERO IMAGE -->
            <div class="w-full bg-gray-100">

                <img
                    src="{{ asset('images/announcements/ieee-career-fair.jpg') }}"
                    alt="IEEE Global Virtual Career Fair 2026"
                    class="w-full h-[320px] lg:h-[500px] object-cover"
                >

            </div>
<!-- AI IMAGE NOTICE -->
                

            <!-- ARTICLE CONTENT -->
            <div class="px-6 md:px-10 lg:px-14 py-10 lg:py-12">


                <!-- META -->
                <div class="flex flex-wrap items-center gap-4 mb-6">

                    <span
                        class="inline-flex px-3 py-1.5 rounded-full
                               bg-indigo-50 text-indigo-700
                               text-xs font-semibold uppercase tracking-wide"
                    >
                        Career Opportunity
                    </span>


                    <span
                        class="flex items-center gap-2 text-sm text-gray-500"
                    >
                        <svg
                            class="w-4 h-4"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                            />
                        </svg>

                        September 24, 2026
                    </span>

                </div>


                <!-- TITLE -->
                <h1
                    class="text-3xl md:text-4xl lg:text-5xl
                           font-bold text-gray-900 leading-tight mb-8"
                >
                    IEEE Global Virtual Career Fair 2026
                </h1>


                <!-- BODY -->
                <div
                    class="max-w-4xl text-gray-700
                           text-lg leading-8 space-y-6"
                >

                    <p>
                        IEEE is organizing a
                        <strong class="text-gray-900">
                            Global Virtual Career Fair on September 24, 2026
                        </strong>,
                        offering an opportunity for professionals, students,
                        recruiters, and organizations from around the world to connect.
                    </p>

                    <p>
                        Whether you are looking to recruit talented professionals
                        or explore new career opportunities, the virtual career fair
                        provides a platform to connect with employers and candidates
                        across the global IEEE community.
                    </p>

                    <p>
                        We encourage members of the WePOWER community to participate
                        and share this opportunity with colleagues, friends,
                        professional networks, and Human Resources teams within
                        their organizations.
                    </p>

                </div>


                <!-- CTA -->
                <div
                    class="mt-10 p-6 lg:p-8 rounded-2xl
                           bg-gradient-to-r from-indigo-50 to-blue-50
                           border border-indigo-100"
                >

                    <div
                        class="flex flex-col md:flex-row
                               md:items-center md:justify-between gap-6"
                    >

                        <div>

                            <h2 class="text-xl font-bold text-gray-900 mb-2">
                                Interested in participating?
                            </h2>

                            <p class="text-gray-600">
                                Visit the official IEEE Career Fair website for
                                registration and additional information.
                            </p>

                        </div>


                        <a
                            href="https://careerfair.ieee.org"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex items-center justify-center gap-2
                                   px-6 py-3 rounded-xl
                                   bg-indigo-600 text-white font-semibold
                                   hover:bg-indigo-700
                                   shadow-sm hover:shadow-md
                                   transition whitespace-nowrap"
                        >
                            Visit IEEE Career Fair

                            <svg
                                class="w-4 h-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M14 3h7m0 0v7m0-7L10 14m-3-7H5a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-2"
                                />
                            </svg>

                        </a>

                    </div>

                </div>


                

            </div>

        </article>

    </div>

</section>

@endsection