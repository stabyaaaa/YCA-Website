@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto px-6 py-10">

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif


    @if(session('error'))
        <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg">
            {{ session('error') }}
        </div>
    @endif


    <div class="mb-6">

        <a href="{{ route('admin.community.posts.index') }}"
           class="text-sm text-blue-600 hover:underline">

            ← Back to requests

        </a>

    </div>


    <div class="grid lg:grid-cols-3 gap-6">

        <div class="lg:col-span-2">

            <div class="bg-white shadow-lg rounded-xl overflow-hidden">

                <div class="p-6 border-b">

                    <div class="flex justify-between items-start gap-4">

                        <div>

                            <h1 class="text-2xl font-bold text-gray-900">
                                {{ $post->title }}
                            </h1>

                            <div class="text-sm text-gray-500 mt-2">
                                Submitted
                                {{ optional($post->submitted_at)->format('d M Y, H:i') ?? '-' }}
                            </div>

                        </div>


                        @if($post->status === 'pending')

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">
                                Pending
                            </span>

                        @elseif($post->status === 'approved')

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                Approved
                            </span>

                        @elseif($post->status === 'changes_requested')

                            <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-xs font-semibold">
                                Changes Requested
                            </span>

                        @else

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                                Rejected
                            </span>

                        @endif

                    </div>

                </div>


                <div class="p-6">

                    <div class="text-gray-700 whitespace-pre-line leading-7">
                        {{ $post->body }}
                    </div>


                    @if($post->media->count())

                        <div class="mt-8">

                            <h3 class="font-semibold text-gray-800 mb-4">
                                Attachments
                            </h3>


                            <div class="grid sm:grid-cols-2 gap-4">

                                @foreach($post->media as $media)

                                    @if($media->isImage())

                                        <a href="{{ Storage::url($media->file_path) }}"
                                           target="_blank">

                                            <img
                                                src="{{ Storage::url($media->file_path) }}"
                                                class="w-full h-52 object-cover rounded-lg border"
                                                alt=""
                                            >

                                        </a>

                                    @else

                                        <a href="{{ Storage::url($media->file_path) }}"
                                           target="_blank"
                                           class="flex items-center gap-3 border rounded-lg p-4 hover:bg-gray-50">

                                            <div class="text-2xl">
                                                📄
                                            </div>

                                            <div>

                                                <div class="text-sm font-medium text-gray-800">
                                                    {{ $media->file_name }}
                                                </div>

                                                <div class="text-xs text-gray-500">
                                                    Open attachment
                                                </div>

                                            </div>

                                        </a>

                                    @endif

                                @endforeach

                            </div>

                        </div>

                    @endif


                    @if($post->external_url)

                        <div class="mt-6">

                            <div class="text-xs uppercase font-semibold text-gray-500 mb-1">
                                External Link
                            </div>

                            <a href="{{ $post->external_url }}"
                               target="_blank"
                               rel="noopener"
                               class="text-blue-600 hover:underline break-all">

                                {{ $post->external_url }}

                            </a>

                        </div>

                    @endif


                    @if($post->video_url)

                        <div class="mt-6">

                            <div class="text-xs uppercase font-semibold text-gray-500 mb-1">
                                Video
                            </div>

                            <a href="{{ $post->video_url }}"
                               target="_blank"
                               rel="noopener"
                               class="text-blue-600 hover:underline break-all">

                                {{ $post->video_url }}

                            </a>

                        </div>

                    @endif

                </div>

            </div>

        </div>


        <div class="space-y-6">

            <div class="bg-white shadow rounded-xl p-5">

                <h3 class="font-semibold text-gray-800 mb-4">
                    Contributor
                </h3>

                <div class="text-sm">

                    <div class="font-medium text-gray-900">
                        {{ $post->user->name ?? 'N/A' }}
                    </div>

                    <div class="text-gray-500 mt-1">
                        {{ $post->user->email ?? '' }}
                    </div>


                    <div class="mt-3">

                        @if(($post->user->role ?? '') === 'super_admin')

                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-700">
                                Super Admin
                            </span>

                        @elseif(($post->user->role ?? '') === 'admin')

                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-700">
                                Admin
                            </span>

                        @elseif(($post->user->role ?? '') === 'partner')

                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">
                                Partner
                            </span>

                        @endif

                    </div>

                </div>


                <div class="border-t mt-4 pt-4">

                    <div class="text-xs text-gray-500">
                        Organization
                    </div>

                    <div class="font-medium text-sm mt-1">
                        {{ $post->organization->name ?? 'Not assigned' }}
                    </div>

                </div>

            </div>


            <div class="bg-white shadow rounded-xl p-5">

                <h3 class="font-semibold text-gray-800 mb-4">
                    Post Information
                </h3>

                <div class="space-y-4 text-sm">

                    <div>

                        <div class="text-xs text-gray-500">
                            Category
                        </div>

                        <div class="font-medium">
                            {{ $post->category->name ?? 'Uncategorized' }}
                        </div>

                    </div>


                    <div>

                        <div class="text-xs text-gray-500">
                            Country
                        </div>

                        <div class="font-medium">
                            {{ $post->country ?? '-' }}
                        </div>

                    </div>


                    <div>

                        <div class="text-xs text-gray-500">
                            WePOWER Pillar
                        </div>

                        <div class="font-medium">
                            {{ $post->wepower_pillar ?? '-' }}
                        </div>

                    </div>

                </div>

            </div>


            @if($post->user_id === auth()->id())

                <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-5">

                    <div class="font-semibold text-yellow-800">
                        Your Own Post
                    </div>

                    <p class="text-sm text-yellow-700 mt-2">
                        You cannot approve, reject, or request changes on your own post.
                    </p>

                </div>

            @elseif(in_array($post->status, [
                'pending',
                'changes_requested',
                'rejected'
            ]))

                <div class="bg-white shadow rounded-xl p-5">

                    <h3 class="font-semibold text-gray-800 mb-5">
                        Moderation
                    </h3>


                    <form
                        method="POST"
                        action="{{ route('admin.community.posts.approve', $post) }}"
                    >

                        @csrf

                        <button
                            class="w-full bg-green-600 text-white py-2.5 rounded-lg font-medium hover:bg-green-700"
                        >
                            Approve & Publish
                        </button>

                    </form>


                    <form
                        method="POST"
                        action="{{ route('admin.community.posts.changes', $post) }}"
                        class="mt-6"
                    >

                        @csrf

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Request changes
                        </label>

                        <textarea
                            name="admin_message"
                            rows="4"
                            required
                            class="w-full border-gray-300 rounded-lg"
                            placeholder="Explain what needs to be changed..."
                        ></textarea>

                        <button
                            class="w-full mt-3 bg-orange-500 text-white py-2.5 rounded-lg font-medium hover:bg-orange-600"
                        >
                            Request Changes
                        </button>

                    </form>


                    <form
                        method="POST"
                        action="{{ route('admin.community.posts.reject', $post) }}"
                        class="mt-6 border-t pt-5"
                    >

                        @csrf

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Rejection reason
                        </label>

                        <textarea
                            name="admin_message"
                            rows="4"
                            required
                            class="w-full border-gray-300 rounded-lg"
                            placeholder="Explain why this post is rejected..."
                        ></textarea>

                        <button
                            class="w-full mt-3 bg-red-600 text-white py-2.5 rounded-lg font-medium hover:bg-red-700"
                        >
                            Reject Post
                        </button>

                    </form>

                </div>

            @endif


            @if(
                auth()->user()->role === 'super_admin'
                && $post->status === 'approved'
            )

                <div class="bg-white shadow rounded-xl p-5">

                    @if(!$post->is_featured)

                        <form
                            method="POST"
                            action="{{ route('admin.community.posts.feature', $post) }}"
                        >

                            @csrf

                            <button
                                class="w-full bg-purple-600 text-white py-2.5 rounded-lg hover:bg-purple-700"
                            >
                                Feature Post
                            </button>

                        </form>

                    @else

                        <form
                            method="POST"
                            action="{{ route('admin.community.posts.unfeature', $post) }}"
                        >

                            @csrf

                            <button
                                class="w-full bg-gray-700 text-white py-2.5 rounded-lg hover:bg-gray-800"
                            >
                                Remove Featured Status
                            </button>

                        </form>

                    @endif

                </div>

            @endif

        </div>

    </div>

</div>

@endsection