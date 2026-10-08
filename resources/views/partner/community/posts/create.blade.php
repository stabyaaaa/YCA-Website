@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto px-6 py-10">

    <div class="mb-8">

        <h1 class="text-2xl font-bold text-gray-900">
            Create Community Post
        </h1>


        <p class="text-sm text-gray-500 mt-1">

            @if(in_array(auth()->user()->role, ['admin', 'super_admin']))

                Create and publish a community post.

            @else

                Create a draft first. You can review it before submitting it for approval.

            @endif

        </p>

    </div>


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


    <form
        method="POST"
        action="{{ route('partner.community.posts.store') }}"
        enctype="multipart/form-data"
    >

        @csrf


        <div class="bg-white shadow-lg rounded-xl p-6 md:p-8">

            @include(
                'partner.community.posts._form',
                [
                    'post' => null
                ]
            )


            <div class="border-t mt-8 pt-6 flex flex-col sm:flex-row justify-end gap-3">

                <a
                    href="{{ route('partner.community.posts.index') }}"
                    class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg text-center hover:bg-gray-50"
                >
                    Cancel
                </a>


                <button
                    type="submit"
                    class="px-6 py-2.5 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700"
                >

                    @if(in_array(auth()->user()->role, ['admin', 'super_admin']))

                        Publish Post

                    @else

                        Save Draft

                    @endif

                </button>

            </div>

        </div>

    </form>

</div>

@endsection