@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto px-6 py-10">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

        <a
            href="{{ route('partner.community.posts.index') }}"
            class="text-sm text-blue-600 hover:underline"
        >
            ← Back to My Posts
        </a>


        @if(
            in_array(auth()->user()->role, ['admin', 'super_admin'])
            || $post->isEditable()
        )

            <a
                href="{{ route('partner.community.posts.edit', $post) }}"
                class="inline-flex px-5 py-2 bg-blue-600 text-white rounded-lg text-sm font-medium hover:bg-blue-700"
            >
                Edit Post
            </a>

        @endif

    </div>


    @if(session('success'))

        <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>

    @endif


    @if(
        auth()->user()->role === 'partner'
        && $post->admin_message
    )

        <div
            class="mb-6 rounded-xl border p-5
            {{ $post->status === 'rejected'
                ? 'bg-red-50 border-red-200'
                : 'bg-orange-50 border-orange-200'
            }}"
        >

            <div
                class="font-semibold
                {{ $post->status === 'rejected'
                    ? 'text-red-800'
                    : 'text-orange-800'
                }}"
            >
                Admin Feedback
            </div>

            <p
                class="mt-2 text-sm
                {{ $post->status === 'rejected'
                    ? 'text-red-700'
                    : 'text-orange-700'
                }}"
            >
                {{ $post->admin_message }}
            </p>

        </div>

    @endif


    <article class="bg-white shadow-lg rounded-xl overflow-hidden">

        <div class="p-6 border-b">

            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">

                <div>

                    <h1 class="text-2xl font-bold text-gray-900">
                        {{ $post->title }}
                    </h1>


                    <div class="text-sm text-gray-500 mt-2">

                        Created
                        {{ $post->created_at->format('d M Y') }}

                        @if($post->published_at)

                            · Published
                            {{ $post->published_at->format('d M Y, H:i') }}

                        @elseif($post->submitted_at)

                            · Submitted
                            {{ $post->submitted_at->format('d M Y, H:i') }}

                        @endif

                    </div>

                </div>


                <div>

                    @if($post->status === 'draft')

                        <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs font-semibold">
                            Draft
                        </span>

                    @elseif($post->status === 'pending')

                        <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-semibold">
                            Pending Approval
                        </span>

                    @elseif($post->status === 'changes_requested')

                        <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-semibold">
                            Changes Requested
                        </span>

                    @elseif($post->status === 'approved')

                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">
                            Published
                        </span>

                    @else

                        <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-semibold">
                            Rejected
                        </span>

                    @endif

                </div>

            </div>

        </div>


        <div class="p-6 md:p-8">

            <div class="flex flex-wrap gap-2 mb-6">

                @if($post->category)

                    <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-xs">
                        {{ $post->category->name }}
                    </span>

                @endif


                @if($post->country)

                    <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs">
                        {{ $post->country }}
                    </span>

                @endif


                @if($post->wepower_pillar)

                    <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-xs">
                        {{ $post->wepower_pillar }}
                    </span>

                @endif

            </div>


            <div class="text-gray-700 leading-8 whitespace-pre-line">
                {{ $post->body }}
            </div>


            @if($post->media->count())

                <div class="mt-8">

                    <h2 class="font-semibold text-gray-900 mb-4">
                        Attachments
                    </h2>


                    <div class="grid sm:grid-cols-2 gap-5">

                        @foreach($post->media as $media)

                            @if($media->isImage())

                                <a
                                    href="{{ Storage::url($media->file_path) }}"
                                    target="_blank"
                                >

                                    <img
                                        src="{{ Storage::url($media->file_path) }}"
                                        class="w-full h-60 object-cover rounded-xl border"
                                        alt=""
                                    >

                                </a>

                            @else

                                <a
                                    href="{{ Storage::url($media->file_path) }}"
                                    target="_blank"
                                    class="border rounded-xl p-5 flex items-center gap-4 hover:bg-gray-50"
                                >

                                    <span class="text-3xl">
                                        📄
                                    </span>

                                    <div>

                                        <div class="font-medium text-gray-800 break-all">
                                            {{ $media->file_name }}
                                        </div>

                                        <div class="text-xs text-blue-600 mt-1">
                                            Open document
                                        </div>

                                    </div>

                                </a>

                            @endif

                        @endforeach

                    </div>

                </div>

            @endif


            @if($post->external_url)

                <div class="mt-8">

                    <div class="text-xs font-semibold uppercase text-gray-500 mb-2">
                        External Link
                    </div>

                    <a
                        href="{{ $post->external_url }}"
                        target="_blank"
                        rel="noopener"
                        class="text-blue-600 hover:underline break-all"
                    >
                        {{ $post->external_url }}
                    </a>

                </div>

            @endif


            @if($post->video_url)

                <div class="mt-6">

                    <div class="text-xs font-semibold uppercase text-gray-500 mb-2">
                        Video Link
                    </div>

                    <a
                        href="{{ $post->video_url }}"
                        target="_blank"
                        rel="noopener"
                        class="text-blue-600 hover:underline break-all"
                    >
                        {{ $post->video_url }}
                    </a>

                </div>

            @endif

        </div>

    </article>


    {{-- Partner controls --}}
    @if(
        auth()->user()->role === 'partner'
        && $post->isEditable()
    )

        <div class="mt-6 bg-white border rounded-xl p-5">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                <form
                    method="POST"
                    action="{{ route('partner.community.posts.destroy', $post) }}"
                    onsubmit="return confirm('Are you sure you want to delete this post?')"
                >

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="px-5 py-2.5 border border-red-200 text-red-600 rounded-lg hover:bg-red-50"
                    >
                        Delete Post
                    </button>

                </form>


                <form
                    method="POST"
                    action="{{ route('partner.community.posts.submit', $post) }}"
                    onsubmit="return confirm('Submit this post for approval?')"
                >

                    @csrf

                    <button
                        type="submit"
                        class="px-6 py-2.5 bg-green-600 text-white rounded-lg font-medium hover:bg-green-700"
                    >
                        Submit for Approval
                    </button>

                </form>

            </div>

        </div>

    @endif


    {{-- Admin / Super Admin controls --}}
    @if(in_array(auth()->user()->role, ['admin', 'super_admin']))

        <div class="mt-6 bg-white border rounded-xl p-5">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                <div>

                    <div class="font-semibold text-gray-900">
                        Published Post
                    </div>

                    <div class="text-sm text-gray-500 mt-1">
                        This post was published directly and does not require approval.
                    </div>

                </div>


                <form
                    method="POST"
                    action="{{ route('partner.community.posts.destroy', $post) }}"
                    onsubmit="return confirm('Delete this published post?')"
                >

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="px-5 py-2.5 border border-red-200 text-red-600 rounded-lg hover:bg-red-50"
                    >
                        Delete Post
                    </button>

                </form>

            </div>

        </div>

    @endif

</div>

@endsection