@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-10">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

        <div>

            <h1 class="text-2xl font-bold text-gray-900">
                My Community Posts
            </h1>

            <p class="text-sm text-gray-500 mt-1">

                @if(in_array(auth()->user()->role, ['admin', 'super_admin']))

                    Create and manage your published community posts.

                @else

                    Create, submit and manage your community posts.

                @endif

            </p>

        </div>


        <a
            href="{{ route('partner.community.posts.create') }}"
            class="inline-flex items-center justify-center px-5 py-2.5 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700"
        >
            + Create Post
        </a>

    </div>


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


    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3 mb-8">

        <a
            href="{{ route('partner.community.posts.index') }}"
            class="bg-white border rounded-xl p-4 hover:shadow transition"
        >
            <div class="text-xs text-gray-500">
                All
            </div>

            <div class="text-2xl font-bold text-gray-900 mt-1">
                {{ $counts['all'] }}
            </div>
        </a>


        <a
            href="{{ route('partner.community.posts.index', ['status' => 'draft']) }}"
            class="bg-white border rounded-xl p-4 hover:shadow transition"
        >
            <div class="text-xs text-gray-500">
                Drafts
            </div>

            <div class="text-2xl font-bold text-gray-600 mt-1">
                {{ $counts['draft'] }}
            </div>
        </a>


        <a
            href="{{ route('partner.community.posts.index', ['status' => 'pending']) }}"
            class="bg-white border rounded-xl p-4 hover:shadow transition"
        >
            <div class="text-xs text-gray-500">
                Pending
            </div>

            <div class="text-2xl font-bold text-yellow-600 mt-1">
                {{ $counts['pending'] }}
            </div>
        </a>


        <a
            href="{{ route('partner.community.posts.index', ['status' => 'changes_requested']) }}"
            class="bg-white border rounded-xl p-4 hover:shadow transition"
        >
            <div class="text-xs text-gray-500">
                Changes
            </div>

            <div class="text-2xl font-bold text-orange-600 mt-1">
                {{ $counts['changes_requested'] }}
            </div>
        </a>


        <a
            href="{{ route('partner.community.posts.index', ['status' => 'approved']) }}"
            class="bg-white border rounded-xl p-4 hover:shadow transition"
        >
            <div class="text-xs text-gray-500">
                Published
            </div>

            <div class="text-2xl font-bold text-green-600 mt-1">
                {{ $counts['approved'] }}
            </div>
        </a>


        <a
            href="{{ route('partner.community.posts.index', ['status' => 'rejected']) }}"
            class="bg-white border rounded-xl p-4 hover:shadow transition"
        >
            <div class="text-xs text-gray-500">
                Rejected
            </div>

            <div class="text-2xl font-bold text-red-600 mt-1">
                {{ $counts['rejected'] }}
            </div>
        </a>

    </div>


    <div class="bg-white shadow-lg rounded-xl overflow-hidden">

        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">
                            Post
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">
                            Category
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">
                            Status
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">
                            Updated
                        </th>

                        <th class="px-6 py-3 text-center text-xs font-semibold text-gray-500 uppercase">
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-200">

                    @forelse($posts as $post)

                        <tr class="hover:bg-gray-50 transition">

                            <td class="px-6 py-4">

                                <div class="font-semibold text-gray-900">
                                    {{ $post->title }}
                                </div>

                                <div class="text-sm text-gray-500 mt-1 max-w-lg truncate">
                                    {{ Str::limit($post->body, 100) }}
                                </div>


                                @if($post->admin_message)

                                    <div class="mt-2 text-xs text-orange-700 bg-orange-50 border border-orange-100 rounded-lg px-3 py-2 max-w-lg">

                                        <strong>
                                            Admin feedback:
                                        </strong>

                                        {{ Str::limit($post->admin_message, 140) }}

                                    </div>

                                @endif

                            </td>


                            <td class="px-6 py-4 text-sm text-gray-600">

                                {{ $post->category->name ?? 'Uncategorized' }}

                            </td>


                            <td class="px-6 py-4">

                                @if($post->status === 'draft')

                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-700">
                                        Draft
                                    </span>

                                @elseif($post->status === 'pending')

                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-700">
                                        Pending
                                    </span>

                                @elseif($post->status === 'changes_requested')

                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-orange-100 text-orange-700">
                                        Changes Requested
                                    </span>

                                @elseif($post->status === 'approved')

                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">
                                        Published
                                    </span>

                                @else

                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-700">
                                        Rejected
                                    </span>

                                @endif

                            </td>


                            <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">

                                {{ $post->updated_at->format('d M Y') }}

                            </td>


                            <td class="px-6 py-4 text-center whitespace-nowrap">

                                <a
                                    href="{{ route('partner.community.posts.show', $post) }}"
                                    class="text-blue-600 hover:underline text-sm font-medium"
                                >
                                    View
                                </a>


                                @if(
                                    in_array(auth()->user()->role, ['admin', 'super_admin'])
                                    || $post->isEditable()
                                )

                                    <a
                                        href="{{ route('partner.community.posts.edit', $post) }}"
                                        class="ml-4 text-indigo-600 hover:underline text-sm font-medium"
                                    >
                                        Edit
                                    </a>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="px-6 py-12 text-center"
                            >

                                <div class="flex flex-col items-center">

                                    <div class="w-14 h-14 bg-gray-100 rounded-full flex items-center justify-center mb-4">

                                        <svg
                                            class="w-7 h-7 text-gray-400"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 4v16m8-8H4"
                                            />
                                        </svg>

                                    </div>


                                    <p class="font-medium text-gray-600">
                                        No community posts yet.
                                    </p>

                                    <p class="text-sm text-gray-400 mt-1">
                                        Create your first post and submit it for approval.
                                    </p>


                                    <a
                                        href="{{ route('partner.community.posts.create') }}"
                                        class="mt-4 inline-flex px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-medium hover:bg-blue-700"
                                    >
                                        Create Post
                                    </a>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        @if($posts->hasPages())

            <div class="px-6 py-4 border-t">
                {{ $posts->links() }}
            </div>

        @endif

    </div>

</div>

@endsection