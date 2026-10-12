@extends('layouts.app')

@section('content')

<div class="bg-gray-50 min-h-screen">

    <div class="max-w-7xl mx-auto px-6 py-10">

        {{-- ================================================================
            PAGE HEADER
        ================================================================= --}}

        <div class="mb-8">

            <h1 class="text-3xl font-bold text-gray-900">
                WePOWER Community
            </h1>

            <p class="text-gray-500 mt-2">
                Updates, achievements, opportunities and resources shared by the WePOWER community.
            </p>

        </div>


        {{-- ================================================================
            FILTERS
        ================================================================= --}}

        <form
            method="GET"
            action="{{ route('community.index') }}"
            class="bg-white border rounded-xl p-5 mb-8"
        >

            <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-4">

                {{-- Search --}}
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search posts..."
                    class="rounded-lg border-gray-300"
                >


                {{-- Category --}}
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


                {{-- Country --}}
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


                {{-- WePOWER Pillar --}}
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


                {{-- Filter Buttons --}}
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


        {{-- ================================================================
            MAIN LAYOUT
        ================================================================= --}}

        <div class="grid lg:grid-cols-3 gap-7">

            {{-- ============================================================
                COMMUNITY FEED
            ============================================================= --}}

            <div class="lg:col-span-2 space-y-6">

                @forelse($posts as $post)

                    @php

                        /*
                        |--------------------------------------------------------------------------
                        | Organization Name
                        |--------------------------------------------------------------------------
                        |
                        | At the moment organization is stored as text in the
                        | user's profile.
                        |
                        */

                        $organizationName =
                            $post->user?->organization
                            ?? 'WePOWER Community';


                        /*
                        |--------------------------------------------------------------------------
                        | Images
                        |--------------------------------------------------------------------------
                        */

                        $images = $post->media
                            ->filter(
                                fn($media) => $media->isImage()
                            )
                            ->values();


                        /*
                        |--------------------------------------------------------------------------
                        | Text Preview
                        |--------------------------------------------------------------------------
                        */

                        $readMoreLimit = 420;

                        $bodyIsLong =
                            mb_strlen($post->body) > $readMoreLimit;

                        $previewText =
                            $bodyIsLong
                                ? \Illuminate\Support\Str::limit(
                                    $post->body,
                                    $readMoreLimit,
                                    ''
                                )
                                : $post->body;

                    @endphp


                    {{-- ====================================================
                        SINGLE COMMUNITY POST
                    ===================================================== --}}

                    <article
                        class="bg-white border shadow-sm rounded-xl overflow-hidden"
                        id="community-post-{{ $post->id }}"
                    >

                        {{-- =================================================
                            POST HEADER
                        ================================================== --}}

                        <div class="p-5 flex items-start gap-4">

                            {{-- Organization Initial --}}
                            <div
                                class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center shrink-0"
                            >

                                <span class="font-semibold text-gray-500 text-lg">

                                    {{ strtoupper(
                                        mb_substr(
                                            $organizationName,
                                            0,
                                            1
                                        )
                                    ) }}

                                </span>

                            </div>


                            {{-- Organization / Poster --}}
                            <div class="flex-1 min-w-0">

                                {{-- Organization Name --}}
                                <div class="font-bold text-gray-900 truncate">

                                    {{ $organizationName }}

                                </div>


                                {{-- Person Who Posted --}}
                                <div class="text-sm text-gray-600 mt-0.5">

                                    Posted by

                                    <span class="font-medium text-gray-700">

                                        {{ $post->user?->name ?? 'WePOWER Contributor' }}

                                    </span>

                                </div>


                                {{-- Date / Country --}}
                                <div class="text-xs text-gray-500 mt-1">

                                    {{ optional($post->published_at)->format('d M Y') }}

                                    @if($post->country)

                                        · {{ $post->country }}

                                    @endif

                                </div>

                            </div>


                            {{-- Category / Featured --}}
                            <div class="flex flex-col items-end gap-2 shrink-0">

                                {{-- Category --}}
                                @if($post->category)

                                    <span
                                        class="bg-blue-50 text-blue-700 px-3 py-1 rounded-full text-xs font-medium"
                                    >
                                        {{ $post->category->name }}
                                    </span>

                                @endif


                                {{-- Featured --}}
                                @if($post->is_featured)

                                    <span
                                        class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs font-semibold"
                                    >
                                        Featured
                                    </span>

                                @endif

                            </div>

                        </div>


                        {{-- =================================================
                            POST CONTENT
                        ================================================== --}}

                        <div
                            class="px-5 pb-5"
                            data-expandable-post
                        >

                            {{-- Title --}}
                            <h2 class="text-xl font-bold text-gray-900">

                                {{ $post->title }}

                            </h2>


                            {{-- =================================================
                                SHORT / PREVIEW TEXT
                            ================================================== --}}

                            <div data-post-preview>

                                <p
                                    class="text-gray-600 mt-4 leading-7 whitespace-pre-line"
                                >{{ $previewText }}@if($bodyIsLong)...@endif</p>


                                {{-- Read More --}}
                                @if($bodyIsLong)

                                    <button
                                        type="button"
                                        onclick="expandCommunityPost(this)"
                                        class="mt-3 text-sm font-semibold text-blue-600 hover:text-blue-700 hover:underline"
                                    >
                                        Read more
                                    </button>

                                @endif

                            </div>


                            {{-- =================================================
                                FULL TEXT
                            ================================================== --}}

                            @if($bodyIsLong)

                                <div
                                    data-post-full
                                    class="hidden"
                                >

                                    <p
                                        class="text-gray-600 mt-4 leading-7 whitespace-pre-line"
                                    >{{ $post->body }}</p>


                                    <button
                                        type="button"
                                        onclick="collapseCommunityPost(this)"
                                        class="mt-3 text-sm font-semibold text-blue-600 hover:text-blue-700 hover:underline"
                                    >
                                        Show less
                                    </button>

                                </div>

                            @endif


                            {{-- WePOWER Pillar --}}
                            @if($post->wepower_pillar)

                                <div class="mt-4">

                                    <span
                                        class="bg-purple-50 text-purple-700 px-3 py-1 rounded-full text-xs"
                                    >
                                        {{ $post->wepower_pillar }}
                                    </span>

                                </div>

                            @endif


                            {{-- External URL --}}
                            @if($post->external_url)

                                <div class="mt-4">

                                    <a
                                        href="{{ $post->external_url }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="text-sm font-medium text-blue-600 hover:underline break-all"
                                    >
                                        Visit external link ↗
                                    </a>

                                </div>

                            @endif


                            {{-- Video URL --}}
                            @if($post->video_url)

                                <div class="mt-2">

                                    <a
                                        href="{{ $post->video_url }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="text-sm font-medium text-blue-600 hover:underline break-all"
                                    >
                                        Watch video ↗
                                    </a>

                                </div>

                            @endif

                        </div>


                        {{-- =================================================
    IMAGE SLIDER
================================================== --}}

@if($images->count())

    <div
        class="relative bg-gray-100 overflow-hidden"
        data-community-slider
        data-index="0"
    >

        <div>

            @foreach($images as $index => $image)

                <div
                    class="community-slide {{ $index === 0 ? 'block' : 'hidden' }}"
                    data-slide-index="{{ $index }}"
                >

                    <div
                        class="w-full flex items-center justify-center bg-gray-100"
                    >

                        <img
                            src="{{ Storage::url($image->file_path) }}"
                            class="block w-full max-h-[600px] object-contain"
                            alt="{{ $post->title }}"
                            loading="lazy"
                        >

                    </div>

                </div>

            @endforeach

        </div>


        @if($images->count() > 1)

            {{-- Previous --}}
            <button
                type="button"
                onclick="communityPreviousSlide(this)"
                class="
                    absolute
                    left-3
                    top-1/2
                    -translate-y-1/2
                    w-10
                    h-10
                    rounded-full
                    bg-black/55
                    text-white
                    flex
                    items-center
                    justify-center
                    hover:bg-black/75
                    transition
                    shadow-lg
                    z-10
                "
                aria-label="Previous image"
            >

                <svg
                    class="w-5 h-5"
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

            </button>


            {{-- Next --}}
            <button
                type="button"
                onclick="communityNextSlide(this)"
                class="
                    absolute
                    right-3
                    top-1/2
                    -translate-y-1/2
                    w-10
                    h-10
                    rounded-full
                    bg-black/55
                    text-white
                    flex
                    items-center
                    justify-center
                    hover:bg-black/75
                    transition
                    shadow-lg
                    z-10
                "
                aria-label="Next image"
            >

                <svg
                    class="w-5 h-5"
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

            </button>


            {{-- Counter --}}
            <div
                class="
                    absolute
                    top-3
                    right-3
                    bg-black/60
                    text-white
                    text-xs
                    font-medium
                    px-3
                    py-1.5
                    rounded-full
                    z-10
                "
            >

                <span data-current-slide>
                    1
                </span>

                /

                {{ $images->count() }}

            </div>


            {{-- Dots --}}
            <div
                class="
                    absolute
                    bottom-3
                    left-1/2
                    -translate-x-1/2
                    flex
                    items-center
                    gap-2
                    bg-black/20
                    backdrop-blur-sm
                    px-2.5
                    py-1.5
                    rounded-full
                    z-10
                "
            >

                @foreach($images as $index => $image)

                    <button
                        type="button"
                        onclick="communityGoToSlide(this, {{ $index }})"
                        data-slider-dot="{{ $index }}"
                        class="
                            w-2
                            h-2
                            rounded-full
                            border
                            border-white
                            {{ $index === 0
                                ? 'bg-white'
                                : 'bg-black/40'
                            }}
                        "
                        aria-label="Image {{ $index + 1 }}"
                    ></button>

                @endforeach

            </div>

        @endif

    </div>

@endif
                        {{-- =================================================
                            NON-IMAGE ATTACHMENTS
                        ================================================== --}}

                        @php

                            $documents = $post->media
                                ->filter(
                                    fn($media) => !$media->isImage()
                                );

                        @endphp


                        @if($documents->count())

                            <div class="px-5 py-4 border-t">

                                <div class="text-sm font-semibold text-gray-700 mb-3">
                                    Attachments
                                </div>

                                <div class="space-y-2">

                                    @foreach($documents as $document)

                                        <a
                                            href="{{ Storage::url($document->file_path) }}"
                                            target="_blank"
                                            class="
                                                flex
                                                items-center
                                                gap-3
                                                border
                                                rounded-lg
                                                px-4
                                                py-3
                                                text-sm
                                                text-gray-700
                                                hover:bg-gray-50
                                            "
                                        >

                                            <span class="text-xl">
                                                📄
                                            </span>

                                            <span class="break-all">
                                                {{ $document->file_name }}
                                            </span>

                                        </a>

                                    @endforeach

                                </div>

                            </div>

                        @endif


                        {{-- =================================================
                            STATS
                        ================================================== --}}

                        <div
                            class="px-5 py-3 text-xs text-gray-500 border-t"
                        >

                            {{ number_format($post->likes_count) }}
                            likes

                            ·

                            {{ number_format($post->views_count) }}
                            views

                            ·

                            {{ number_format($post->shares_count) }}
                            shares

                        </div>


                        {{-- =================================================
                            ACTION BUTTONS
                        ================================================== --}}

                        <div class="grid grid-cols-3 border-t">

                            {{-- LIKE --}}
                            @auth

                                <form
                                    method="POST"
                                    action="{{ route('community.like', $post) }}"
                                >

                                    @csrf

                                    <button
                                        type="submit"
                                        class="
                                            w-full
                                            py-3
                                            text-sm
                                            font-medium
                                            hover:bg-gray-50
                                            {{ $post->hasLiked(auth()->id())
                                                ? 'text-blue-600'
                                                : 'text-gray-600'
                                            }}
                                        "
                                    >
                                        👍 Like
                                    </button>

                                </form>

                            @else

                                <a
                                    href="{{ route('login') }}"
                                    class="
                                        py-3
                                        text-center
                                        text-sm
                                        font-medium
                                        text-gray-600
                                        hover:bg-gray-50
                                    "
                                >
                                    👍 Like
                                </a>

                            @endauth


                            {{-- SHARE --}}
                            <button
                                type="button"
                                onclick="shareCommunityPost(
                                    @js(route('community.show', $post)),
                                    @js(route('community.share', $post))
                                )"
                                class="
                                    py-3
                                    text-sm
                                    font-medium
                                    text-gray-600
                                    hover:bg-gray-50
                                    border-l
                                    border-r
                                "
                            >
                                ↗ Share
                            </button>


                            {{-- SAVE --}}
                            @auth

                                <form
                                    method="POST"
                                    action="{{ route('community.bookmark', $post) }}"
                                >

                                    @csrf

                                    <button
                                        type="submit"
                                        class="
                                            w-full
                                            py-3
                                            text-sm
                                            font-medium
                                            hover:bg-gray-50
                                            {{ $post->hasBookmarked(auth()->id())
                                                ? 'text-blue-600'
                                                : 'text-gray-600'
                                            }}
                                        "
                                    >
                                        🔖 Save
                                    </button>

                                </form>

                            @else

                                <a
                                    href="{{ route('login') }}"
                                    class="
                                        py-3
                                        text-center
                                        text-sm
                                        font-medium
                                        text-gray-600
                                        hover:bg-gray-50
                                    "
                                >
                                    🔖 Save
                                </a>

                            @endauth

                        </div>

                    </article>


                @empty

                    {{-- ====================================================
                        NO POSTS
                    ===================================================== --}}

                    <div
                        class="bg-white border rounded-xl p-12 text-center"
                    >

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


                {{-- ========================================================
                    PAGINATION
                ========================================================= --}}

                @if($posts->hasPages())

                    <div>
                        {{ $posts->links() }}
                    </div>

                @endif

            </div>


            {{-- ============================================================
                SIDEBAR
            ============================================================= --}}

            <aside class="hidden lg:block">

                <div
                    class="bg-white border rounded-xl p-5 sticky top-6"
                >

                    <h3 class="font-bold text-gray-900">
                        Explore WePOWER
                    </h3>


                    <p class="text-sm text-gray-500 mt-2">
                        Discover updates and opportunities from across the WePOWER network.
                    </p>


                    {{-- Browse by Pillar --}}
                    <div class="mt-6 border-t pt-5">

                        <div class="text-sm font-medium text-gray-700 mb-3">
                            Browse by Pillar
                        </div>


                        <div class="space-y-2">

                            @foreach($pillars as $pillar)

                                <a
                                    href="{{ route(
                                        'community.index',
                                        [
                                            'pillar' => $pillar
                                        ]
                                    ) }}"
                                    class="block text-sm text-blue-600 hover:underline"
                                >
                                    {{ $pillar }}
                                </a>

                            @endforeach

                        </div>

                    </div>


                    {{-- Saved Posts --}}
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


{{-- ========================================================================
    JAVASCRIPT
======================================================================== --}}

<script>

/*
|--------------------------------------------------------------------------
| Expand Post Text
|--------------------------------------------------------------------------
*/

function expandCommunityPost(button)
{
    const post =
        button.closest('[data-expandable-post]');

    if (!post) {
        return;
    }


    const preview =
        post.querySelector('[data-post-preview]');

    const full =
        post.querySelector('[data-post-full]');


    if (!preview || !full) {
        return;
    }


    preview.classList.add('hidden');

    full.classList.remove('hidden');
}


/*
|--------------------------------------------------------------------------
| Collapse Post Text
|--------------------------------------------------------------------------
*/

function collapseCommunityPost(button)
{
    const post =
        button.closest('[data-expandable-post]');

    if (!post) {
        return;
    }


    const preview =
        post.querySelector('[data-post-preview]');

    const full =
        post.querySelector('[data-post-full]');


    if (!preview || !full) {
        return;
    }


    full.classList.add('hidden');

    preview.classList.remove('hidden');
}


/*
|--------------------------------------------------------------------------
| Get Image Slider
|--------------------------------------------------------------------------
*/

function getCommunitySlider(button)
{
    return button.closest(
        '[data-community-slider]'
    );
}


/*
|--------------------------------------------------------------------------
| Show Image Slide
|--------------------------------------------------------------------------
*/

function showCommunitySlide(
    slider,
    newIndex
) {

    if (!slider) {
        return;
    }


    const slides =
        slider.querySelectorAll(
            '.community-slide'
        );


    if (!slides.length) {
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | Loop back from first image to last image
    |--------------------------------------------------------------------------
    */

    if (newIndex < 0) {
        newIndex = slides.length - 1;
    }


    /*
    |--------------------------------------------------------------------------
    | Loop from last image to first image
    |--------------------------------------------------------------------------
    */

    if (newIndex >= slides.length) {
        newIndex = 0;
    }


    /*
    |--------------------------------------------------------------------------
    | Show selected image
    |--------------------------------------------------------------------------
    */

    slides.forEach(
        function(slide, index) {

            if (index === newIndex) {

                slide.classList.remove(
                    'hidden'
                );

                slide.classList.add(
                    'block'
                );

            } else {

                slide.classList.add(
                    'hidden'
                );

                slide.classList.remove(
                    'block'
                );

            }

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Save current slide number
    |--------------------------------------------------------------------------
    */

    slider.dataset.index =
        newIndex;


    /*
    |--------------------------------------------------------------------------
    | Update image counter
    |--------------------------------------------------------------------------
    */

    const counter =
        slider.querySelector(
            '[data-current-slide]'
        );


    if (counter) {

        counter.textContent =
            newIndex + 1;

    }


    /*
    |--------------------------------------------------------------------------
    | Update slider dots
    |--------------------------------------------------------------------------
    */

    const dots =
        slider.querySelectorAll(
            '[data-slider-dot]'
        );


    dots.forEach(
        function(dot, index) {

            if (index === newIndex) {

                dot.classList.add(
                    'bg-white'
                );

                dot.classList.remove(
                    'bg-black/40'
                );

            } else {

                dot.classList.remove(
                    'bg-white'
                );

                dot.classList.add(
                    'bg-black/40'
                );

            }

        }
    );

}


/*
|--------------------------------------------------------------------------
| Previous Image
|--------------------------------------------------------------------------
*/

function communityPreviousSlide(button)
{
    const slider =
        getCommunitySlider(
            button
        );


    if (!slider) {
        return;
    }


    const currentIndex =
        parseInt(
            slider.dataset.index || '0',
            10
        );


    showCommunitySlide(
        slider,
        currentIndex - 1
    );
}


/*
|--------------------------------------------------------------------------
| Next Image
|--------------------------------------------------------------------------
*/

function communityNextSlide(button)
{
    const slider =
        getCommunitySlider(
            button
        );


    if (!slider) {
        return;
    }


    const currentIndex =
        parseInt(
            slider.dataset.index || '0',
            10
        );


    showCommunitySlide(
        slider,
        currentIndex + 1
    );
}


/*
|--------------------------------------------------------------------------
| Click Slider Dot
|--------------------------------------------------------------------------
*/

function communityGoToSlide(
    button,
    index
) {

    const slider =
        getCommunitySlider(
            button
        );


    if (!slider) {
        return;
    }


    showCommunitySlide(
        slider,
        index
    );
}


/*
|--------------------------------------------------------------------------
| Share Community Post
|--------------------------------------------------------------------------
*/

async function shareCommunityPost(
    url,
    trackingUrl
) {

    /*
    |--------------------------------------------------------------------------
    | Record Share Count
    |--------------------------------------------------------------------------
    */

    try {

        const csrfToken =
            document
                .querySelector(
                    'meta[name="csrf-token"]'
                )
                ?.getAttribute(
                    'content'
                );


        await fetch(
            trackingUrl,
            {
                method: 'POST',

                headers: {

                    'X-CSRF-TOKEN':
                        csrfToken,

                    'Accept':
                        'application/json'

                }
            }
        );

    } catch (error) {

        console.log(
            'Share count could not be recorded.'
        );

    }


    /*
    |--------------------------------------------------------------------------
    | Native Browser / Mobile Share
    |--------------------------------------------------------------------------
    */

    try {

        if (navigator.share) {

            await navigator.share({
                title:
                    document.title,

                url:
                    url
            });

            return;
        }


        /*
        |--------------------------------------------------------------------------
        | Desktop Fallback - Copy Link
        |--------------------------------------------------------------------------
        */

        await navigator.clipboard.writeText(
            url
        );


        alert(
            'Post link copied to clipboard.'
        );

    } catch (error) {

        console.log(
            'Share cancelled.'
        );

    }

}

</script>

@endsection