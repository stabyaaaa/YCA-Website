@extends('layouts.app')

@section('content')

<div class="bg-gray-50 min-h-screen">

    <div class="max-w-6xl mx-auto px-6 py-10">

        <div class="bg-white border rounded-xl p-7 mb-8">

            <div class="flex flex-col sm:flex-row gap-6">

                <div class="w-24 h-24 bg-gray-100 rounded-xl overflow-hidden flex items-center justify-center shrink-0">

                    @if($organization->logo)

                        <img
                            src="{{ Storage::url($organization->logo) }}"
                            class="w-full h-full object-contain"
                            alt=""
                        >

                    @else

                        <span class="text-3xl font-bold text-gray-400">
                            {{ strtoupper(substr($organization->name, 0, 1)) }}
                        </span>

                    @endif

                </div>


                <div class="flex-1">

                    <div class="flex items-center gap-2">

                        <h1 class="text-3xl font-bold text-gray-900">
                            {{ $organization->name }}
                        </h1>


                        @if($organization->is_verified)

                            <span
                                class="text-blue-600 text-xl"
                                title="Verified WePOWER Partner"
                            >
                                ✓
                            </span>

                        @endif

                    </div>


                    @if($organization->country)

                        <div class="text-gray-500 mt-2">
                            {{ $organization->country }}
                        </div>

                    @endif


                    @if($organization->description)

                        <p class="text-gray-600 mt-4 max-w-3xl leading-7 whitespace-pre-line">
                            {{ $organization->description }}
                        </p>

                    @endif


                    @if($organization->website)

                        <a
                            href="{{ $organization->website }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-block text-blue-600 text-sm hover:underline mt-4"
                        >
                            Visit Website
                        </a>

                    @endif

                </div>

            </div>

        </div>


        <h2 class="text-xl font-bold text-gray-900 mb-5">
            Latest Posts
        </h2>


        <div class="grid md:grid-cols-2 gap-6">

            @forelse($posts as $post)

                <article class="bg-white border rounded-xl overflow-hidden">

                    @php
                        $firstImage = $post->media->first(
                            fn($media) => $media->isImage()
                        );
                    @endphp


                    @if($firstImage)

                        <a href="{{ route('community.show', $post) }}">

                            <img
                                src="{{ Storage::url($firstImage->file_path) }}"
                                class="w-full h-48 object-cover"
                                alt=""
                            >

                        </a>

                    @endif


                    <div class="p-6">

                        <div class="text-xs text-gray-500">
                            {{ optional($post->published_at)->format('d M Y') }}
                        </div>


                        <a href="{{ route('community.show', $post) }}">

                            <h3 class="text-lg font-bold text-gray-900 mt-2 hover:text-blue-600">
                                {{ $post->title }}
                            </h3>

                        </a>


                        <p class="text-gray-600 text-sm leading-6 mt-3">
                            {{ Str::limit($post->body, 220) }}
                        </p>


                        <div class="mt-4">

                            <a
                                href="{{ route('community.show', $post) }}"
                                class="text-sm font-medium text-blue-600 hover:underline"
                            >
                                Read post →
                            </a>

                        </div>

                    </div>

                </article>

            @empty

                <div class="md:col-span-2 bg-white border rounded-xl p-10 text-center text-gray-500">
                    No posts have been published by this organization yet.
                </div>

            @endforelse

        </div>


        @if($posts->hasPages())

            <div class="mt-8">
                {{ $posts->links() }}
            </div>

        @endif

    </div>

</div>

@endsection