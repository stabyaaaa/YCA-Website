@extends('layouts.app')

@section('content')

<div class="bg-gray-50 min-h-screen">

    <div class="max-w-6xl mx-auto px-6 py-10">

        <div class="mb-8">

            <h1 class="text-2xl font-bold text-gray-900">
                Saved Posts
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Posts you have bookmarked for later.
            </p>

        </div>


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

                            {{ $post->organization->name
                                ?? $post->user->name
                                ?? 'WePOWER Contributor'
                            }}

                            ·

                            {{ optional($post->published_at)->format('d M Y') }}

                        </div>


                        <a href="{{ route('community.show', $post) }}">

                            <h2 class="text-xl font-bold text-gray-900 hover:text-blue-600 mt-2">
                                {{ $post->title }}
                            </h2>

                        </a>


                        <p class="text-gray-600 mt-3">
                            {{ Str::limit($post->body, 250) }}
                        </p>


                        <div class="mt-5 flex items-center justify-between">

                            <a
                                href="{{ route('community.show', $post) }}"
                                class="text-blue-600 text-sm font-medium hover:underline"
                            >
                                View Post →
                            </a>


                            <form
                                method="POST"
                                action="{{ route('community.bookmark', $post) }}"
                            >
                                @csrf

                                <button
                                    type="submit"
                                    class="text-sm text-red-600 hover:underline"
                                >
                                    Remove
                                </button>

                            </form>

                        </div>

                    </div>

                </article>

            @empty

                <div class="md:col-span-2 bg-white border rounded-xl p-12 text-center">

                    <p class="font-medium text-gray-600">
                        You haven't saved any posts yet.
                    </p>

                    <a
                        href="{{ route('community.index') }}"
                        class="inline-block mt-3 text-sm text-blue-600 hover:underline"
                    >
                        Browse Community
                    </a>

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