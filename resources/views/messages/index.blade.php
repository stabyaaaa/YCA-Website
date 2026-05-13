@extends('layouts.app')

@section('content')
<style>
    body { overflow: hidden; }
    footer { display: none !important; }
</style>

@php
    $friends = $friends ?? collect();
    $notFriends = $notFriends ?? collect();
@endphp

<div class="fixed top-[88px] left-0 right-0 bottom-0 bg-slate-50 text-slate-900 overflow-hidden">
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute -top-40 -left-32 w-96 h-96 bg-pink-200/50 rounded-full blur-3xl"></div>
        <div class="absolute top-1/3 -right-40 w-[28rem] h-[28rem] bg-cyan-200/50 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-1/3 w-80 h-80 bg-orange-200/50 rounded-full blur-3xl"></div>
    </div>

    <div class="relative h-full w-full">
        <div class="grid lg:grid-cols-[420px_1fr] h-full">

            @include('messages.partials.sidebar', [
                'friends' => $friends,
                'notFriends' => $notFriends,
                'activeUserId' => null
            ])

            <main id="chatPanel" class="hidden lg:flex bg-slate-50 items-center justify-center p-10 relative overflow-hidden">
                <div class="relative text-center max-w-md">
                    <div class="w-24 h-24 mx-auto rounded-[2rem] bg-gradient-to-br from-pink-500 via-orange-400 to-cyan-400 p-[2px] mb-6 shadow-xl shadow-pink-100">
                        <div class="w-full h-full rounded-[1.9rem] bg-white flex items-center justify-center">
                            <svg class="w-10 h-10 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 10h.01M12 10h.01M16 10h.01M7 16l-4 4V5a2 2 0 012-2h14a2 2 0 012 2v11a2 2 0 01-2 2H7z"/>
                            </svg>
                        </div>
                    </div>

                    <h2 class="text-3xl font-extrabold text-slate-950 mb-3">Select a conversation</h2>
                    <p class="text-slate-500 leading-relaxed">
                        Choose a friend from the left panel to start a private WePOWER network chat.
                    </p>
                </div>
            </main>

        </div>
    </div>
</div>

@include('messages.partials.chat-script', [
    'conversation' => null,
    'otherUser' => null,
    'messages' => collect()
])
@endsection