@php
    $chatInitials = $otherUser
        ? collect(explode(' ', $otherUser->name))->map(fn($part) => strtoupper(substr($part, 0, 1)))->take(2)->implode('')
        : '?';
@endphp

<main id="chatPanel" class="bg-white overflow-hidden flex flex-col h-full">

    <div class="shrink-0 p-4 lg:p-5 border-b border-slate-200 flex items-center justify-between bg-white">
        <div class="flex items-center gap-4 min-w-0">
            <a href="{{ route('messages.index') }}"
               class="lg:hidden w-10 h-10 rounded-2xl bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-600 hover:text-pink-600">
                ←
            </a>

            <div class="relative shrink-0">
                <div id="chatInitials" class="w-12 h-12 rounded-2xl bg-gradient-to-br from-pink-500 to-orange-400 text-white flex items-center justify-center font-extrabold">
                    {{ $chatInitials }}
                </div>
                <span class="absolute -bottom-1 -right-1 w-4 h-4 rounded-full bg-green-500 border-2 border-white"></span>
            </div>

            <div class="min-w-0">
                <h2 id="chatUserName" class="font-bold text-lg truncate text-slate-950">
                    {{ $otherUser->name ?? 'Chat' }}
                </h2>
                <p class="text-xs text-green-600">● Active now</p>
            </div>
        </div>

        <a href="{{ route('messages.index') }}"
           class="hidden lg:inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-slate-100 border border-slate-200 text-sm text-slate-600 hover:text-pink-600 hover:bg-white transition">
            Back
        </a>
    </div>

    <div id="messagesBox" class="flex-1 overflow-y-auto p-4 lg:p-6 space-y-5 bg-slate-50">
        <div class="text-center mb-8">
            <div id="chatIntroInitials" class="w-16 h-16 rounded-3xl bg-gradient-to-br from-pink-500 to-orange-400 text-white mx-auto mb-3 flex items-center justify-center font-extrabold">
                {{ $chatInitials }}
            </div>
            <p id="chatIntroName" class="font-semibold text-slate-900">{{ $otherUser->name ?? 'Chat User' }}</p>
            <p class="text-sm text-slate-500">This is the beginning of your conversation.</p>
        </div>

        @foreach($messages as $message)
            @php
                $isMine = $message->sender_id === auth()->id();
            @endphp

            <div class="flex {{ $isMine ? 'justify-end' : 'justify-start' }} message-row">
                <div class="max-w-[82%] lg:max-w-[65%]">
                    <div class="px-4 py-3 rounded-3xl shadow-sm
                        {{ $isMine
                            ? 'bg-gradient-to-br from-pink-600 to-pink-500 text-white rounded-br-md'
                            : 'bg-white border border-slate-200 text-slate-800 rounded-bl-md' }}">
                        <p class="text-sm leading-relaxed">{{ $message->message }}</p>
                    </div>

                    <p class="text-[11px] text-slate-400 mt-1 {{ $isMine ? 'text-right pr-2' : 'pl-2' }}">
                        {{ $message->created_at->format('h:i A') }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    <form id="messageForm" class="shrink-0 p-4 lg:p-5 border-t border-slate-200 bg-white">
        @csrf

        <div class="flex items-end gap-3">
            <input
                type="text"
                id="messageInput"
                class="flex-1 rounded-2xl bg-slate-100 border border-slate-200 px-5 py-4 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-pink-500/40 focus:bg-white"
                placeholder="Write a message..."
                autocomplete="off"
            >

            <button
                type="submit"
                class="w-14 h-14 rounded-2xl bg-gradient-to-br from-pink-600 to-orange-500 hover:scale-105 active:scale-95 transition shadow-lg shadow-pink-100 flex items-center justify-center">
                <svg class="w-6 h-6 text-white translate-x-[1px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5 12h14M13 5l7 7-7 7"/>
                </svg>
            </button>
        </div>
    </form>
</main>