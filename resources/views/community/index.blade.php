@extends('layouts.app')

@section('content')

<div class="bg-gray-50 min-h-screen">

    <div class="max-w-7xl mx-auto px-6 py-10">

        <div class="mb-8">

            <h1 class="text-3xl font-bold text-gray-900">
                WePOWER Community
            </h1>

            <p class="text-gray-500 mt-2">
                Updates, achievements, opportunities and resources shared by the WePOWER community.
            </p>

        </div>


        {{-- Filters --}}
        <form
            method="GET"
            action="{{ route('community.index') }}"
            class="bg-white border rounded-xl p-5 mb-8"
        >

            <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-4">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search posts..."
                    class="rounded-lg border-gray-300"
                >


                <select
                    name="category"
                    class="rounded-lg border-gray-300"
                >

                    <option value="">
                        All Categories
                    </option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->slug }}"
                            @selected(
                                request('category') === $category->slug
                            )
                        >
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>


                <select
                    name="country"
                    class="rounded-lg border-gray-300"
                >

                    <option value="">
                        All Countries
                    </option>

                    @foreach($countries as $country)

                        <option
                            value="{{ $country }}"
                            @selected(
                                request('country') === $country
                            )
                        >
                            {{ $country }}
                        </option>

                    @endforeach

                </select>


                <select
                    name="pillar"
                    class="rounded-lg border-gray-300"
                >

                    <option value="">
                        All WePOWER Pillars
                    </option>

                    @foreach($pillars as $pillar)

                        <option
                            value="{{ $pillar }}"
                            @selected(
                                request('pillar') === $pillar
                            )
                        >
                            {{ $pillar }}
                        </option>

                    @endforeach

                </select>


                <div class="flex gap-2">

                    <button
                        type="submit"
                        class="flex-1 bg-blue-600 text-white rounded-lg px-4 py-2 hover:bg-blue-700"
                    >
                        Filter
                    </button>

                    <a
                        href="{{ route('community.index') }}"
                        class="px-4 py-2 border rounded-lg text-gray-600 hover:bg-gray-50"
                    >
                        Clear
                    </a>

                </div>

            </div>

        </form>


        <div class="grid lg:grid-cols-3 gap-7">

            {{-- Feed --}}
            <div class="lg:col-span-2 space-y-6">

                @forelse($posts as $post)

                    <article class="bg-white border shadow-sm rounded-xl overflow-hidden">

                        <div class="p-5 flex items-start gap-4">

                            <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center overflow-hidden shrink-0">

                                @if($post->organization?->logo)

                                    <img
                                        src="{{ Storage::url($post->organization->logo) }}"
                                        class="w-full h-full object-cover"
                                        alt=""
                                    >

                                @else

                                    <span class="font-bold text-gray-500">
                                        {{ strtoupper(
                                            substr(
                                                $post->organization->name
                                                ?? $post->user->name
                                                ?? 'W',
                                                0,
                                                1
                                            )
                                        ) }}
                                    </span>

                                @endif

                            </div>


                            <div class="flex-1 min-w-0">

                                @if($post->organization)

                                    <a
                                        href="{{ route('community.organization', $post->organization) }}"
                                        class="inline-flex items-center gap-2 font-semibold text-gray-900 hover:text-blue-600"
                                    >

                                        {{ $post->organization->name }}

                                        @if($post->organization->is_verified)

                                            <span
                                                class="text-blue-600"
                                                title="Verified WePOWER Partner"
                                            >
                                                ✓
                                            </span>

                                        @endif

                                    </a>

                                @else

                                    <div class="font-semibold text-gray-900">
                                        {{ $post->user->name ?? 'WePOWER Contributor' }}
                                    </div>

                                @endif


                                <div class="text-xs text-gray-500 mt-1">

                                    {{ optional($post->published_at)->format('d M Y') }}

                                    @if($post->country)
                                        · {{ $post->country }}
                                    @endif

                                </div>

                            </div>


                            @if($post->is_featured)

                                <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Featured
                                </span>

                            @endif

                        </div>


                        <div class="px-5 pb-5">

                            <a
                                href="{{ route('community.show', $post) }}"
                                class="block"
                            >

                                <h2 class="text-xl font-bold text-gray-900 hover:text-blue-600">
                                    {{ $post->title }}
                                </h2>

                            </a>


                            <p class="text-gray-600 mt-3 leading-7 whitespace-pre-line">
                                {{ Str::limit($post->body, 450) }}
                            </p>


                            <div class="flex flex-wrap gap-2 mt-4">

                                @if($post->category)

                                    <span class="bg-blue-50 text-blue-700 px-3 py-1 rounded-full text-xs">
                                        {{ $post->category->name }}
                                    </span>

                                @endif


                                @if($post->wepower_pillar)

                                    <span class="bg-purple-50 text-purple-700 px-3 py-1 rounded-full text-xs">
                                        {{ $post->wepower_pillar }}
                                    </span>

                                @endif

                            </div>

                        </div>


                        @php
                            $firstImage = $post->media->first(
                                fn($media) => $media->isImage()
                            );
                        @endphp


                        @if($firstImage)

                            <a href="{{ route('community.show', $post) }}">

                                <img
                                    src="{{ Storage::url($firstImage->file_path) }}"
                                    class="w-full max-h-[520px] object-cover"
                                    alt=""
                                >

                            </a>

                        @endif


                        <div class="px-5 py-3 text-xs text-gray-500 border-t">

                            {{ number_format($post->likes_count) }}
                            likes

                            ·

                            {{ number_format($post->views_count) }}
                            views

                            ·

                            {{ number_format($post->shares_count) }}
                            shares

                        </div>


                        <div class="grid grid-cols-3 border-t">

                            @auth

                                <form
                                    method="POST"
                                    action="{{ route('community.like', $post) }}"
                                >
                                    @csrf

                                    <button
                                        type="submit"
                                        class="w-full py-3 text-sm font-medium hover:bg-gray-50
                                        {{ $post->hasLiked(auth()->id())
                                            ? 'text-blue-600'
                                            : 'text-gray-600'
                                        }}"
                                    >
                                        👍 Like
                                    </button>
                                </form>

                            @else

                                <a
                                    href="{{ route('login') }}"
                                    class="py-3 text-center text-sm font-medium text-gray-600 hover:bg-gray-50"
                                >
                                    👍 Like
                                </a>

                            @endauth


                            <button
                                type="button"
                                onclick="shareCommunityPost(
                                    @json(route('community.show', $post)),
                                    @json(route('community.share', $post))
                                )"
                                class="py-3 text-sm font-medium text-gray-600 hover:bg-gray-50"
                            >
                                ↗ Share
                            </button>


                            @auth

                                <form
                                    method="POST"
                                    action="{{ route('community.bookmark', $post) }}"
                                >
                                    @csrf

                                    <button
                                        type="submit"
                                        class="w-full py-3 text-sm font-medium hover:bg-gray-50
                                        {{ $post->hasBookmarked(auth()->id())
                                            ? 'text-blue-600'
                                            : 'text-gray-600'
                                        }}"
                                    >
                                        🔖 Save
                                    </button>
                                </form>

                            @else

                                <a
                                    href="{{ route('login') }}"
                                    class="py-3 text-center text-sm font-medium text-gray-600 hover:bg-gray-50"
                                >
                                    🔖 Save
                                </a>

                            @endauth

                        </div>

                    </article>

                @empty

                    <div class="bg-white border rounded-xl p-12 text-center">

                        <div class="text-gray-400 mb-3">

                            <svg
                                class="w-12 h-12 mx-auto"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M9 7h6"
                                />
                            </svg>

                        </div>

                        <p class="font-medium text-gray-600">
                            No community posts found.
                        </p>

                        <p class="text-sm text-gray-400 mt-1">
                            Try changing your filters or search.
                        </p>

                    </div>

                @endforelse


                @if($posts->hasPages())

                    <div>
                        {{ $posts->links() }}
                    </div>

                @endif

            </div>


            {{-- Sidebar --}}
            <aside class="hidden lg:block">

                <div class="bg-white border rounded-xl p-5 sticky top-6">

                    <h3 class="font-bold text-gray-900">
                        Explore WePOWER
                    </h3>

                    <p class="text-sm text-gray-500 mt-2">
                        Discover updates and opportunities from across the WePOWER network.
                    </p>


                    <div class="mt-6 border-t pt-5">

                        <div class="text-sm font-medium text-gray-700 mb-3">
                            Browse by Pillar
                        </div>

                        <div class="space-y-2">

                            @foreach($pillars as $pillar)

                                <a
                                    href="{{ route(
                                        'community.index',
                                        ['pillar' => $pillar]
                                    ) }}"
                                    class="block text-sm text-blue-600 hover:underline"
                                >
                                    {{ $pillar }}
                                </a>

                            @endforeach

                        </div>

                    </div>


                    @auth

                        <div class="mt-6 border-t pt-5">

                            <a
                                href="{{ route('community.bookmarks') }}"
                                class="text-sm font-medium text-blue-600 hover:underline"
                            >
                                View Saved Posts →
                            </a>

                        </div>

                    @endauth

                </div>

            </aside>

        </div>

    </div>

</div>


<script>

async function shareCommunityPost(url, trackingUrl) {

    try {

        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            ?.getAttribute('content');

        await fetch(
            trackingUrl,
            {
                method: 'POST',

                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            }
        );

    } catch (error) {
        console.log('Share count could not be recorded.');
    }


    try {

        if (navigator.share) {

            await navigator.share({
                title: document.title,
                url: url
            });

            return;
        }

        await navigator.clipboard.writeText(url);

        alert('Post link copied to clipboard.');

    } catch (error) {
        console.log('Share cancelled.');
    }

}

</script>

@endsection