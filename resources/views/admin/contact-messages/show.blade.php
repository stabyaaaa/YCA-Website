@extends('layouts.app')

@section('title', 'View Contact Message')

@section('content')

<div class="min-h-screen bg-slate-50 py-12">
    <div class="max-w-4xl mx-auto px-6">

        <a href="{{ route('admin.contact-messages.index') }}"
           class="inline-block mb-6 text-sm text-indigo-600 hover:text-indigo-800">
            ← Back to messages
        </a>

        @if(session('success'))
            <div class="mb-6 rounded-xl bg-green-50 border border-green-200 text-green-700 px-5 py-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8">

            <div class="flex items-start justify-between gap-6 mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-slate-900">
                        {{ $contactMessage->first_name }} {{ $contactMessage->last_name }}
                    </h1>

                    <p class="text-slate-500 mt-2">
                        {{ $contactMessage->email }}
                    </p>
                </div>

                <form method="POST" action="{{ route('admin.contact-messages.destroy', $contactMessage) }}"
                      onsubmit="return confirm('Delete this message?')">
                    @csrf
                    @method('DELETE')

                    <button class="px-4 py-2 rounded-lg bg-red-50 text-red-600 hover:bg-red-100">
                        Delete
                    </button>
                </form>
            </div>

            <form method="POST" action="{{ route('admin.contact-messages.update-status', $contactMessage) }}" class="mb-8">
                @csrf
                @method('PATCH')

                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Message Status
                </label>

                <div class="flex gap-3">
                    <select name="status" class="border border-slate-300 rounded-lg px-4 py-2">
                        <option value="unread" {{ $contactMessage->status === 'unread' ? 'selected' : '' }}>
                            Unread
                        </option>

                        <option value="pending" {{ $contactMessage->status === 'pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="contacted" {{ $contactMessage->status === 'contacted' ? 'selected' : '' }}>
                            Contacted
                        </option>
                    </select>

                    <button class="px-5 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700">
                        Update
                    </button>
                </div>
            </form>

            <div class="grid md:grid-cols-2 gap-6 mb-8">
                <div>
                    <p class="text-sm text-slate-500">Organization / Role</p>
                    <p class="font-medium text-slate-900">
                        {{ $contactMessage->organization_role ?? 'Not provided' }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Topic</p>
                    <p class="font-medium text-slate-900">
                        {{ $contactMessage->topic ?? 'General' }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Submitted</p>
                    <p class="font-medium text-slate-900">
                        {{ $contactMessage->created_at->format('M d, Y h:i A') }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Status</p>
                    <p class="font-medium text-slate-900">
                        {{ ucfirst($contactMessage->status) }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Contacted By</p>
                    <p class="font-medium text-slate-900">
                        {{ $contactMessage->contactedBy?->name ?? 'Not contacted yet' }}
                    </p>
                </div>
            </div>

            <div class="border-t border-slate-200 pt-8">
                <p class="text-sm text-slate-500 mb-3">Message</p>

                <div class="rounded-xl bg-slate-50 border border-slate-200 p-6 text-slate-700 leading-relaxed whitespace-pre-line">
                    {{ $contactMessage->message }}
                </div>
            </div>

        </div>

    </div>
</div>

@endsection