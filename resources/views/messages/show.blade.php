@extends('layouts.app')

@section('content')
<style>
    body { overflow: hidden; }
    footer { display: none !important; }
</style>

@php
    $friends = $friends ?? collect();
    $notFriends = $notFriends ?? collect();
    $activeUserId = $otherUser?->id;
@endphp

<div class="fixed top-[88px] left-0 right-0 bottom-0 bg-slate-50 text-slate-900 overflow-hidden">
    <div class="relative h-full w-full">
        <div class="grid lg:grid-cols-[420px_1fr] h-full">

            @include('messages.partials.sidebar', [
                'friends' => $friends,
                'notFriends' => $notFriends,
                'activeUserId' => $activeUserId
            ])

            @include('messages.partials.chat-panel', [
                'conversation' => $conversation,
                'messages' => $messages,
                'otherUser' => $otherUser
            ])

        </div>
    </div>
</div>

@include('messages.partials.chat-script', [
    'conversation' => $conversation,
    'otherUser' => $otherUser,
    'messages' => $messages
])
@endsection