@extends('layouts.app')

@section('content')

<div class="bg-gray-50 min-h-screen py-10">

    <div class="max-w-4xl mx-auto px-6">

        <div class="mb-6">

            <a
                href="{{ route('community.index') }}"
                class="text-sm text-blue-600 hover:underline"
            >
                ← Back to Community
            </a>

        </div>


        <article class="bg-white border shadow-sm rounded-xl overflow-hidden">

            <div class="p-6 border-b">

                <div class="flex items-start gap-4">

                    <div class="w-14 h-14 rounded-full bg-gray-100 flex items-center justify-center overflow-hidden">

                        @if($post->organization?->logo)

                            <img
                                src="{{ Storage::url($post->organization->logo) }}"
                                class="w-full h-full object-cover"
                                alt=""
                            >

                        @else

                            <span class="text-lg font-bold text-gray-500">
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


                    <div>

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


                        <div class="text-sm text-gray-500 mt-1">

                            {{ optional($post->published_at)->format('d M Y, H:i') }}

                            @if($post->country)
                                · {{ $post->country }}
                            @endif

                        </div>

                    </div>

                </div>

            </div>


            <div class="p-6 md:p-8">

                @if($post->is_featured)

                    <div class="mb-4">

                        <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs font-semibold">
                            Featured
                        </span>

                    </div>

                @endif


                <h1 class="text-3xl font-bold text-gray-900">
                    {{ $post->title }}
                </h1>


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


                <div class="text-gray-700 leading-8 whitespace-pre-line mt-7">
                    {{ $post->body }}
                </div>


                @if($post->media->count())

                    <div class="grid gap-5 mt-8">

                        @foreach($post->media as $media)

                            @if($media->isImage())

                                <a
                                    href="{{ Storage::url($media->file_path) }}"
                                    target="_blank"
                                >

                                    <img
                                        src="{{ Storage::url($media->file_path) }}"
                                        class="w-full rounded-xl"
                                        alt=""
                                    >

                                </a>

                            @else

                                <a
                                    href="{{ Storage::url($media->file_path) }}"
                                    target="_blank"
                                    class="border rounded-xl p-5 flex items-center gap-4 hover:bg-gray-50"
                                >

                                    <div class="text-3xl">
                                        📄
                                    </div>

                                    <div>

                                        <div class="font-medium text-gray-800 break-all">
                                            {{ $media->file_name }}
                                        </div>

                                        <div class="text-sm text-blue-600 mt-1">
                                            Open document
                                        </div>

                                    </div>

                                </a>

                            @endif

                        @endforeach

                    </div>

                @endif


                @if($post->external_url)

                    <div class="mt-8 bg-gray-50 border rounded-xl p-5">

                        <div class="text-xs uppercase font-semibold text-gray-500">
                            Related Link
                        </div>

                        <a
                            href="{{ $post->external_url }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="block mt-2 text-blue-600 hover:underline break-all"
                        >
                            {{ $post->external_url }}
                        </a>

                    </div>

                @endif


                @if($post->video_url)

                    <div class="mt-5">

                        <a
                            href="{{ $post->video_url }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex px-5 py-2.5 bg-gray-900 text-white rounded-lg font-medium hover:bg-gray-800"
                        >
                            Watch Video
                        </a>

                    </div>

                @endif

            </div>


            <div class="px-6 py-4 border-t text-sm text-gray-500">

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
                            class="w-full py-4 text-sm font-medium hover:bg-gray-50
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
                        class="text-center py-4 text-sm font-medium text-gray-600 hover:bg-gray-50"
                    >
                        👍 Like
                    </a>

                @endauth


                <button
                    type="button"
                    onclick="shareCommunityPost()"
                    class="py-4 text-sm font-medium text-gray-600 hover:bg-gray-50"
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
                            class="w-full py-4 text-sm font-medium hover:bg-gray-50
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
                        class="text-center py-4 text-sm font-medium text-gray-600 hover:bg-gray-50"
                    >
                        🔖 Save
                    </a>

                @endauth

            </div>

        </article>

    </div>

</div>


<script>

async function shareCommunityPost() {

    const url = window.location.href;

    try {

        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            ?.getAttribute('content');

        await fetch(
            @json(route('community.share', $post)),
            {
                method: 'POST',

                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            }
        );

    } catch (error) {
        console.log('Could not record share.');
    }


    try {

        if (navigator.share) {

            await navigator.share({
                title: @json($post->title),
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