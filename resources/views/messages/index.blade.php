@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-950 text-white pt-28 px-6">
    <div class="max-w-5xl mx-auto">
        <h1 class="text-3xl font-bold mb-8">Messages</h1>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
            @forelse($friends as $friend)
                <div class="bg-white/10 border border-white/10 rounded-2xl p-5">
                    <h3 class="font-semibold">{{ $friend->name }}</h3>
                    <p class="text-sm text-white/50">{{ $friend->email }}</p>

                    <form action="{{ route('messages.start', $friend->id) }}" method="POST" class="mt-5">
                        @csrf
                        <button class="w-full py-3 rounded-xl bg-pink-600 hover:bg-pink-700 transition font-semibold">
                            Start Chat
                        </button>
                    </form>
                </div>
            @empty
                <p class="text-white/60">No friends available for chat.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection