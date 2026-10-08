@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-10">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

        <div>
            <h1 class="text-2xl font-bold text-gray-900">
                Community Post Requests
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Review posts submitted by WePOWER contributors.
            </p>
        </div>

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


    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">

        <a href="{{ route('admin.community.posts.index', ['status' => 'pending']) }}"
           class="bg-white border rounded-xl p-5 hover:shadow-md transition">

            <div class="text-sm font-medium text-gray-500">
                Pending
            </div>

            <div class="text-3xl font-bold text-yellow-600 mt-2">
                {{ $counts['pending'] }}
            </div>

        </a>


        <a href="{{ route('admin.community.posts.index', ['status' => 'changes_requested']) }}"
           class="bg-white border rounded-xl p-5 hover:shadow-md transition">

            <div class="text-sm font-medium text-gray-500">
                Changes Requested
            </div>

            <div class="text-3xl font-bold text-orange-600 mt-2">
                {{ $counts['changes_requested'] }}
            </div>

        </a>


        <a href="{{ route('admin.community.posts.index', ['status' => 'approved']) }}"
           class="bg-white border rounded-xl p-5 hover:shadow-md transition">

            <div class="text-sm font-medium text-gray-500">
                Approved
            </div>

            <div class="text-3xl font-bold text-green-600 mt-2">
                {{ $counts['approved'] }}
            </div>

        </a>


        <a href="{{ route('admin.community.posts.index', ['status' => 'rejected']) }}"
           class="bg-white border rounded-xl p-5 hover:shadow-md transition">

            <div class="text-sm font-medium text-gray-500">
                Rejected
            </div>

            <div class="text-3xl font-bold text-red-600 mt-2">
                {{ $counts['rejected'] }}
            </div>

        </a>

    </div>


    <div class="bg-white shadow-lg rounded-xl overflow-hidden">

        <div class="px-6 py-5 border-b">

            <h2 class="font-semibold text-gray-800 capitalize">
                {{ str_replace('_', ' ', $status) }} Posts
            </h2>

        </div>

        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">
                            Post
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">
                            Contributor
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">
                            Role
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">
                            Organization
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">
                            Category
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">
                            Submitted
                        </th>

                        <th class="px-6 py-3 text-center text-xs font-semibold text-gray-500 uppercase">
                            Status
                        </th>

                        <th class="px-6 py-3 text-center text-xs font-semibold text-gray-500 uppercase">
                            Action
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-200 bg-white">

                    @forelse($posts as $post)

                        <tr class="hover:bg-gray-50">

                            <td class="px-6 py-4">

                                <div class="font-semibold text-gray-900 max-w-xs">
                                    {{ $post->title }}
                                </div>

                                <div class="text-sm text-gray-500 mt-1 max-w-xs truncate">
                                    {{ Str::limit(strip_tags($post->body), 90) }}
                                </div>

                            </td>


                            <td class="px-6 py-4">

                                <div class="text-sm font-medium text-gray-900">
                                    {{ $post->user->name ?? 'N/A' }}
                                </div>

                                <div class="text-xs text-gray-500">
                                    {{ $post->user->email ?? '' }}
                                </div>

                            </td>


                            <td class="px-6 py-4">

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

                                @else

                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-700">
                                        User
                                    </span>

                                @endif

                            </td>


                            <td class="px-6 py-4 text-sm text-gray-600">

                                {{ $post->organization->name ?? 'Not assigned' }}

                            </td>


                            <td class="px-6 py-4 text-sm text-gray-600">

                                {{ $post->category->name ?? 'Uncategorized' }}

                            </td>


                            <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">

                                {{ optional($post->submitted_at)->format('d M Y, H:i') ?? '-' }}

                            </td>


                            <td class="px-6 py-4 text-center">

                                @if($post->status === 'pending')

                                    <span class="px-3 py-1 text-xs font-semibold bg-yellow-100 text-yellow-700 rounded-full">
                                        Pending
                                    </span>

                                @elseif($post->status === 'approved')

                                    <span class="px-3 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full">
                                        Approved
                                    </span>

                                @elseif($post->status === 'changes_requested')

                                    <span class="px-3 py-1 text-xs font-semibold bg-orange-100 text-orange-700 rounded-full">
                                        Changes Requested
                                    </span>

                                @else

                                    <span class="px-3 py-1 text-xs font-semibold bg-red-100 text-red-700 rounded-full">
                                        Rejected
                                    </span>

                                @endif

                            </td>


                            <td class="px-6 py-4 text-center">

                                <a href="{{ route('admin.community.posts.show', $post) }}"
                                   class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700">

                                    Review

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="8"
                                class="px-6 py-12 text-center">

                                <div class="text-gray-400 mb-2">

                                    <svg class="w-12 h-12 mx-auto"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="1.5"
                                              d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z"/>

                                    </svg>

                                </div>

                                <p class="font-medium text-gray-500">
                                    No posts found.
                                </p>

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