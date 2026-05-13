<aside class="flex flex-col bg-white/90 border-r border-slate-200 backdrop-blur-xl overflow-hidden shadow-xl">

    <div class="shrink-0 p-5 border-b border-slate-200 bg-white/95">
        <div class="flex items-start justify-between mb-5">
            <div>
                <p class="text-xs uppercase tracking-[0.25em] text-pink-600 font-semibold mb-1">
                    WePOWER Network
                </p>
                <h1 class="text-2xl font-extrabold text-slate-950">Messages</h1>
                <p class="text-sm text-slate-500">
                    {{ $friends->count() }} friends · {{ $notFriends->count() }} not friends
                </p>
            </div>

            <div class="w-11 h-11 rounded-2xl bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-500">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.77 9.77 0 01-4-.8L3 20l1.3-3.4A7.6 7.6 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                </svg>
            </div>
        </div>

        <div class="relative">
            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>

            <input
                id="peopleSearch"
                type="text"
                placeholder="Search people..."
                class="w-full pl-11 pr-4 py-3 rounded-2xl bg-slate-100 border border-slate-200 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-pink-500/40 focus:bg-white"
            >
        </div>
    </div>

    <div class="shrink-0 bg-white border-b border-slate-200 p-3">
        <div class="grid grid-cols-2 gap-2 rounded-2xl bg-slate-100 p-1">
            <button type="button" data-tab="friends"
                    class="tab-btn rounded-xl px-4 py-3 text-sm font-bold bg-white text-pink-600 shadow-sm">
                Friends
            </button>

            <button type="button" data-tab="notFriends"
                    class="tab-btn rounded-xl px-4 py-3 text-sm font-bold text-slate-500 hover:text-slate-900">
                Not Friends
            </button>
        </div>
    </div>

    <div class="flex-1 overflow-y-auto p-3 bg-white/60">

        <div id="friendsPanel" class="people-panel space-y-2">
            @forelse($friends as $friend)
                @php
                    $initials = collect(explode(' ', $friend->name))->map(fn($part) => strtoupper(substr($part, 0, 1)))->take(2)->implode('');
                    $active = $activeUserId === $friend->id;
                @endphp

                <button type="button"
                        data-user-id="{{ $friend->id }}"
                        class="open-chat-btn person-card w-full text-left rounded-2xl p-4 border transition duration-300
                        {{ $active ? 'bg-pink-50 border-pink-200 shadow-md shadow-pink-100' : 'bg-white border-slate-200 hover:border-pink-200 hover:shadow-lg hover:shadow-pink-100/70' }}">
                    <div class="flex items-center gap-4">
                        <div class="relative shrink-0">
                            <div class="w-13 h-13 rounded-2xl bg-gradient-to-br from-pink-500 to-orange-400 text-white flex items-center justify-center font-extrabold shadow-lg shadow-pink-200">
                                {{ $initials }}
                            </div>
                            <span class="absolute -bottom-1 -right-1 w-4 h-4 rounded-full bg-green-500 border-2 border-white"></span>
                        </div>

                        <div class="min-w-0 flex-1">
                            <h3 class="font-semibold text-slate-900 truncate person-name">{{ $friend->name }}</h3>
                            <p class="text-sm text-slate-500 truncate">
                                {{ $friend->organization ?? 'WePOWER Member' }} · {{ $friend->country ?? 'Network' }}
                            </p>
                            <p class="text-xs text-slate-400 truncate mt-1">Click to open private chat</p>
                        </div>
                    </div>
                </button>
            @empty
                <div class="p-8 text-center">
                    <p class="font-semibold text-slate-800">No friends available</p>
                    <p class="text-sm text-slate-500 mt-1">Accepted friends will appear here.</p>
                </div>
            @endforelse
        </div>

        <div id="notFriendsPanel" class="people-panel hidden space-y-2">
            @forelse($notFriends as $user)
                @php
                    $initials = collect(explode(' ', $user->name))->map(fn($part) => strtoupper(substr($part, 0, 1)))->take(2)->implode('');
                @endphp

                <div class="person-card rounded-2xl p-4 bg-white border border-slate-200">
                    <div class="flex items-center gap-4">
                        <div class="w-13 h-13 rounded-2xl bg-slate-100 text-slate-700 flex items-center justify-center font-extrabold border border-slate-200">
                            {{ $initials }}
                        </div>

                        <div class="min-w-0 flex-1">
                            <h3 class="font-semibold text-slate-900 truncate person-name">{{ $user->name }}</h3>
                            <p class="text-sm text-slate-500 truncate">
                                {{ $user->organization ?? 'WePOWER Member' }} · {{ $user->country ?? 'Network' }}
                            </p>
                            <p class="text-xs text-slate-400 truncate mt-1">No friendship record yet</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-8 text-center">
                    <p class="font-semibold text-slate-800">No not-friends found</p>
                    <p class="text-sm text-slate-500 mt-1">Every user already has a friendship record.</p>
                </div>
            @endforelse
        </div>
    </div>
</aside>