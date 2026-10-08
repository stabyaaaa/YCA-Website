@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto px-6 py-10">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

        <div>

            <h1 class="text-2xl font-bold text-gray-900">
                Edit Community Post
            </h1>


            <p class="text-sm text-gray-500 mt-1">

                @if(in_array(auth()->user()->role, ['admin', 'super_admin']))

                    Update your published community post.

                @else

                    Update your post before submitting it for approval.

                @endif

            </p>

        </div>


        <a
            href="{{ route('partner.community.posts.show', $post) }}"
            class="text-sm text-blue-600 hover:underline"
        >
            Preview Post
        </a>

    </div>


    @if(session('success'))

        <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>

    @endif


    @if($errors->any())

        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">

            <ul class="list-disc pl-5 text-sm text-red-700 space-y-1">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    @if(
        auth()->user()->role === 'partner'
        && $post->admin_message
    )

        <div class="mb-6 bg-orange-50 border border-orange-200 rounded-xl p-5">

            <div class="font-semibold text-orange-800">
                Admin Feedback
            </div>

            <div class="text-sm text-orange-700 mt-2">
                {{ $post->admin_message }}
            </div>

        </div>

    @endif


    {{-- Main post update --}}
    <form
        method="POST"
        action="{{ route('partner.community.posts.update', $post) }}"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')


        <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">

            @include(
                'partner.community.posts._form',
                [
                    'post' => $post
                ]
            )


            <div class="border-t mt-8 pt-6 flex justify-end">

                <button
                    type="submit"
                    class="px-6 py-2.5 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700"
                >

                    @if(in_array(auth()->user()->role, ['admin', 'super_admin']))

                        Update Published Post

                    @else

                        Save Changes

                    @endif

                </button>

            </div>

        </div>

    </form>


    {{-- Existing attachments --}}
    @if($post->media->count())

        <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mt-6">

            <h2 class="text-lg font-semibold text-gray-900 mb-5">
                Existing Attachments
            </h2>


            <div class="grid sm:grid-cols-2 gap-5">

                @foreach($post->media as $media)

                    <div class="border rounded-xl overflow-hidden">

                        @if($media->isImage())

                            <img
                                src="{{ Storage::url($media->file_path) }}"
                                class="w-full h-44 object-cover"
                                alt=""
                            >

                        @else

                            <div class="h-44 bg-gray-50 flex flex-col items-center justify-center px-4 text-center">

                                <div class="text-3xl mb-2">
                                    📄
                                </div>

                                <div class="text-sm text-gray-700 break-all">
                                    {{ $media->file_name }}
                                </div>

                            </div>

                        @endif


                        <div class="p-4 flex items-center justify-between">

                            <a
                                href="{{ Storage::url($media->file_path) }}"
                                target="_blank"
                                class="text-sm text-blue-600 hover:underline"
                            >
                                Open
                            </a>


                            <form
                                method="POST"
                                action="{{ route(
                                    'partner.community.posts.media.delete',
                                    [
                                        $post,
                                        $media
                                    ]
                                ) }}"
                                onsubmit="return confirm('Remove this attachment?')"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="text-sm text-red-600 hover:underline"
                                >
                                    Remove
                                </button>

                            </form>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    @endif


    {{-- Partner submission section only --}}
    @if(auth()->user()->role === 'partner')

        <div class="bg-white rounded-xl shadow-lg p-6 mt-6">

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                <div>

                    <h2 class="font-semibold text-gray-900">
                        Ready for Review?
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Once submitted, you cannot edit this post until an admin requests changes or rejects it.
                    </p>

                </div>


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

</div>

@endsection