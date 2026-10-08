@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto px-6 py-10">

    <div class="flex items-center justify-between gap-4 mb-8">

        <div>

            <h1 class="text-2xl font-bold text-gray-900">
                Notifications
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Updates about your community posts.
            </p>

        </div>


        @if(auth()->user()->unreadNotifications->count())

            <form
                method="POST"
                action="{{ route('community.notifications.readAll') }}"
            >
                @csrf

                <button
                    type="submit"
                    class="text-sm text-blue-600 hover:underline"
                >
                    Mark all as read
                </button>
            </form>

        @endif

    </div>


    @if(session('success'))

        <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>

    @endif


    <div class="bg-white border rounded-xl overflow-hidden">

        @forelse($notifications as $notification)

            <a
                href="{{ route(
                    'community.notifications.read',
                    $notification->id
                ) }}"
                class="block px-6 py-5 border-b last:border-b-0 hover:bg-gray-50
                {{ $notification->read_at ? '' : 'bg-blue-50/40' }}"
            >

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <div class="font-semibold text-gray-900">
                            {{ $notification->data['title'] ?? 'Community Post' }}
                        </div>


                        <div class="text-sm text-gray-600 mt-1">
                            {{ $notification->data['message'] ?? 'Your post status has changed.' }}
                        </div>


                        @if(!empty($notification->data['admin_message']))

                            <div class="text-sm text-orange-700 bg-orange-50 border border-orange-100 rounded-lg px-3 py-2 mt-3">

                                <strong>
                                    Admin:
                                </strong>

                                {{ $notification->data['admin_message'] }}

                            </div>

                        @endif

                    </div>


                    @if(!$notification->read_at)

                        <span class="w-2.5 h-2.5 bg-blue-600 rounded-full mt-2 shrink-0"></span>

                    @endif

                </div>


                <div class="text-xs text-gray-400 mt-3">
                    {{ $notification->created_at->diffForHumans() }}
                </div>

            </a>

        @empty

            <div class="px-6 py-12 text-center text-gray-500">

                You don't have any notifications yet.

            </div>

        @endforelse

    </div>


    @if($notifications->hasPages())

        <div class="mt-6">
            {{ $notifications->links() }}
        </div>

    @endif

</div>

@endsection