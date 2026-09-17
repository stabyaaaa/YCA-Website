{{-- resources/views/announcements/returning-mothers-day.blade.php --}}

@extends('layouts.app')

@section('title', 'International Returning Mothers Day 2026 | WePOWER')

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
                    src="{{ asset('images/announcements/mothersday.png') }}"
                    alt="International Returning Mothers Day 2026"
                    class="w-full h-auto object-contain"
                >

            </div>


            <!-- ARTICLE CONTENT -->
            <div class="px-6 md:px-10 lg:px-14 py-10 lg:py-12">


                <!-- META -->
                <div class="flex flex-wrap items-center gap-4 mb-6">

                    <span
                        class="inline-flex px-3 py-1.5 rounded-full
                               bg-pink-50 text-pink-700
                               text-xs font-semibold uppercase tracking-wide"
                    >
                        Women in Energy
                    </span>


                    <span class="flex items-center gap-2 text-sm text-gray-500">

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

                        September 10, 2026

                    </span>

                </div>


                <!-- TITLE -->
                <h1
                    class="text-3xl md:text-4xl lg:text-5xl
                           font-bold text-gray-900 leading-tight mb-4"
                >
                    Creating Pathways for Women to Return, Grow and Move Forward
                </h1>


                <p class="text-lg font-medium text-indigo-600 mb-8">
                    International Returning Mothers Day | September 10, 2026
                </p>


                <!-- BODY -->
                <div
                    class="max-w-4xl text-gray-700
                           text-lg leading-8 space-y-6"
                >

                    <p>
                        On International Returning Mothers Day,
                        <strong class="text-gray-900">
                            the Global Secretariat of WePOWER,
                        </strong>
                        joins IEEE and the iExplore Foundation for Sustainable Development
                        in recognizing returning mothers and advancing the shared vision
                        of more inclusive and supportive professional environments.
                    </p>


                    <p>
                        The day highlights the importance of
                        <strong class="text-gray-900">
                            professional development, mentorship, flexible work arrangements,
                            supportive networks, and inclusive workplace practices
                        </strong>
                        in supporting women as they return to and progress in their careers.
                    </p>


                    <p>
                        For Yunus Center AIT and WePOWER, this is also an opportunity
                        to carry the momentum forward.
                        <strong class="text-gray-900">
                            Through the Global Secretariat, new avenues for connection,
                            collaboration, and meaningful engagement are taking shape
                            across the network — with more to come.
                        </strong>
                    </p>


                    <p>
                        Today, we celebrate the
                        <strong class="text-gray-900">
                            experience, skills, and contributions of returning mothers
                        </strong>
                        and reaffirm our commitment to a future where women have the
                        opportunity to return, grow, and move forward.
                    </p>

                </div>


                <!-- HIGHLIGHT -->
                <div
                    class="mt-10 p-6 lg:p-8 rounded-2xl
                           bg-gradient-to-r from-pink-50 via-purple-50 to-indigo-50
                           border border-purple-100"
                >

                    <p
                        class="text-xl md:text-2xl font-semibold
                               text-gray-900 leading-relaxed"
                    >
                        Recognizing experience. Supporting opportunity.
                        Building pathways for what comes next.
                    </p>

                </div>


                <!-- CTA -->
                <div
                    class="mt-8 flex flex-col sm:flex-row
                           gap-4 flex-wrap"
                >

                    <a
                        href="https://ieeereturningmothers.in/rmday/"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center justify-center gap-2
                               px-6 py-3 rounded-xl
                               bg-indigo-600 text-white font-semibold
                               hover:bg-indigo-700
                               shadow-sm hover:shadow-md
                               transition"
                    >
                        Learn More

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


                    <a
                        href="https://connect4impact.worldbank.org/page/international-returning-mothers-day"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center justify-center gap-2
                               px-6 py-3 rounded-xl
                               bg-white text-indigo-700 font-semibold
                               border border-indigo-200
                               hover:bg-indigo-50
                               transition"
                    >
                        Connect4Impact

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

        </article>

    </div>

</section>

@endsection