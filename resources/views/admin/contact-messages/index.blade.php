@extends('layouts.app')

@section('title', 'Contact Messages')

@section('content')

<div class="min-h-screen bg-slate-50 py-12">
    <div class="max-w-7xl mx-auto px-6">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">Contact Messages</h1>
            <p class="text-slate-500 mt-2">Messages submitted from the contact form.</p>
        </div>

        @if(session('success'))
            <div class="mb-6 rounded-xl bg-green-50 border border-green-200 text-green-700 px-5 py-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-slate-100 text-slate-600">
                    <tr>
                        <th class="px-6 py-4 text-left">Name</th>
                        <th class="px-6 py-4 text-left">Email</th>
                        <th class="px-6 py-4 text-left">Topic</th>
                        <th class="px-6 py-4 text-left">Status</th>
                        <th class="px-6 py-4 text-left">Contacted By</th>
                        <th class="px-6 py-4 text-left">Date</th>
                        <th class="px-6 py-4 text-right">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse($messages as $message)
                        <tr class="hover:bg-slate-50">
                            <td class="px-6 py-4 font-medium text-slate-900">
                                {{ $message->first_name }} {{ $message->last_name }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $message->email }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $message->topic ?? 'General' }}
                            </td>

                            <td class="px-6 py-4">
                                @if($message->status === 'unread')
                                    <span class="px-3 py-1 rounded-full text-xs bg-red-100 text-red-700">
                                        Unread
                                    </span>
                                @elseif($message->status === 'pending')
                                    <span class="px-3 py-1 rounded-full text-xs bg-yellow-100 text-yellow-700">
                                        Pending
                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-full text-xs bg-green-100 text-green-700">
                                        Contacted
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $message->contactedBy?->name ?? '-' }}
                            </td>

                            <td class="px-6 py-4 text-slate-500">
                                {{ $message->created_at->format('M d, Y') }}
                            </td>

                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.contact-messages.show', $message) }}"
                                   class="text-indigo-600 hover:text-indigo-800 font-medium">
                                    View
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-slate-500">
                                No contact messages yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $messages->links() }}
        </div>

    </div>
</div>

@endsection