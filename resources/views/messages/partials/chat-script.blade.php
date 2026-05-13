@php
    $scriptInitials = '?';

    if ($otherUser) {
        $scriptInitials = collect(explode(' ', $otherUser->name))
            ->map(fn ($part) => strtoupper(substr($part, 0, 1)))
            ->take(2)
            ->implode('');
    }
@endphp
<script>
let conversationId = @json($conversation?->id ?? '');
const authUserId = @json(auth()->id());

let activeChatUser = {
    name: @json($otherUser?->name ?? ''),
    initials: @json($scriptInitials)
};

let latestInterval = null;
let lastRenderedHash = '';

function getCsrfToken() {
    return document.querySelector('input[name="_token"]')?.value ||
        document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
}

function escapeHtml(value) {
    const div = document.createElement('div');
    div.innerText = value ?? '';
    return div.innerHTML;
}

function ensureChatPanel() {
    let chatPanel = document.getElementById('chatPanel');

    if (chatPanel && document.getElementById('messageForm')) {
        return;
    }

    const oldPanel = document.getElementById('chatPanel');

    const html = `
        <main id="chatPanel" class="bg-white overflow-hidden flex flex-col h-full">
            <div class="shrink-0 p-4 lg:p-5 border-b border-slate-200 flex items-center justify-between bg-white">
                <div class="flex items-center gap-4 min-w-0">
                    <a href="{{ route('messages.index') }}"
                       class="lg:hidden w-10 h-10 rounded-2xl bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-600 hover:text-pink-600">
                        ←
                    </a>

                    <div class="relative shrink-0">
                        <div id="chatInitials" class="w-12 h-12 rounded-2xl bg-gradient-to-br from-pink-500 to-orange-400 text-white flex items-center justify-center font-extrabold">
                            ?
                        </div>
                        <span class="absolute -bottom-1 -right-1 w-4 h-4 rounded-full bg-green-500 border-2 border-white"></span>
                    </div>

                    <div class="min-w-0">
                        <h2 id="chatUserName" class="font-bold text-lg truncate text-slate-950">Chat</h2>
                        <p class="text-xs text-green-600">● Active now</p>
                    </div>
                </div>

                <a href="{{ route('messages.index') }}"
                   class="hidden lg:inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-slate-100 border border-slate-200 text-sm text-slate-600 hover:text-pink-600 hover:bg-white transition">
                    Back
                </a>
            </div>

            <div id="messagesBox" class="flex-1 overflow-y-auto p-4 lg:p-6 space-y-5 bg-slate-50"></div>

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
    `;

    oldPanel.outerHTML = html;
    bindMessageForm();
}

function scrollToBottom() {
    const messagesBox = document.getElementById('messagesBox');
    if (messagesBox) {
        messagesBox.scrollTop = messagesBox.scrollHeight;
    }
}

function renderMessages(messages) {
    const messagesBox = document.getElementById('messagesBox');
    if (!messagesBox) return;

    const currentHash = JSON.stringify(messages.map(m => [m.id, m.message]));
    if (currentHash === lastRenderedHash) return;
    lastRenderedHash = currentHash;

    messagesBox.innerHTML = `
        <div class="text-center mb-8">
            <div id="chatIntroInitials" class="w-16 h-16 rounded-3xl bg-gradient-to-br from-pink-500 to-orange-400 text-white mx-auto mb-3 flex items-center justify-center font-extrabold">
                ${escapeHtml(activeChatUser.initials)}
            </div>
            <p id="chatIntroName" class="font-semibold text-slate-900">${escapeHtml(activeChatUser.name)}</p>
            <p class="text-sm text-slate-500">This is the beginning of your conversation.</p>
        </div>
    `;

    messages.forEach(msg => {
        const isMine = String(msg.sender_id) === String(authUserId);

        const wrapper = document.createElement('div');
        wrapper.className = `flex ${isMine ? 'justify-end' : 'justify-start'} message-row`;

        wrapper.innerHTML = `
            <div class="max-w-[82%] lg:max-w-[65%]">
                <div class="px-4 py-3 rounded-3xl shadow-sm ${
                    isMine
                        ? 'bg-gradient-to-br from-pink-600 to-pink-500 text-white rounded-br-md'
                        : 'bg-white border border-slate-200 text-slate-800 rounded-bl-md'
                }">
                    <p class="text-sm leading-relaxed">${msg.message}</p>
                </div>

                <p class="text-[11px] text-slate-400 mt-1 ${isMine ? 'text-right pr-2' : 'pl-2'}">
                    ${msg.time}
                </p>
            </div>
        `;

        messagesBox.appendChild(wrapper);
    });

    scrollToBottom();
}

function loadMessages() {
    if (!conversationId) return;

    fetch(`/messages/${conversationId}/latest`)
        .then(response => response.json())
        .then(data => renderMessages(data))
        .catch(() => {});
}

function bindMessageForm() {
    const messageForm = document.getElementById('messageForm');
    const messageInput = document.getElementById('messageInput');

    if (!messageForm || !messageInput) return;

    messageForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const message = messageInput.value.trim();
        if (!message || !conversationId) return;

        messageInput.disabled = true;

        fetch(`/messages/${conversationId}/send`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': getCsrfToken(),
                'Accept': 'application/json',
            },
            body: JSON.stringify({ message })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                messageInput.value = '';
                loadMessages();
            }
        })
        .finally(() => {
            messageInput.disabled = false;
            messageInput.focus();
        });
    });
}

document.querySelectorAll('.open-chat-btn').forEach(button => {
    button.addEventListener('click', function () {
        const userId = this.dataset.userId;

        fetch(`/messages/start-ajax/${userId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': getCsrfToken(),
                'Accept': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success) return;

            ensureChatPanel();

            conversationId = data.conversation_id;
            activeChatUser = {
                name: data.user.name,
                initials: data.user.initials,
            };

            document.getElementById('chatUserName').innerText = data.user.name;
            document.getElementById('chatInitials').innerText = data.user.initials;

            document.querySelectorAll('.open-chat-btn').forEach(btn => {
                btn.classList.remove('bg-pink-50', 'border-pink-200', 'shadow-md', 'shadow-pink-100');
                btn.classList.add('bg-white', 'border-slate-200');
            });

            this.classList.remove('bg-white', 'border-slate-200');
            this.classList.add('bg-pink-50', 'border-pink-200', 'shadow-md', 'shadow-pink-100');

            lastRenderedHash = '';
            renderMessages(data.messages);

            history.pushState({}, '', data.show_url);

            if (latestInterval) clearInterval(latestInterval);
            latestInterval = setInterval(loadMessages, 3000);
        });
    });
});

const tabs = document.querySelectorAll('.tab-btn');
const panels = document.querySelectorAll('.people-panel');
const searchInput = document.getElementById('peopleSearch');

tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        tabs.forEach(btn => {
            btn.className = 'tab-btn rounded-xl px-4 py-3 text-sm font-bold text-slate-500 hover:text-slate-900';
        });

        tab.className = 'tab-btn rounded-xl px-4 py-3 text-sm font-bold bg-white text-pink-600 shadow-sm';

        panels.forEach(panel => panel.classList.add('hidden'));
        document.getElementById(tab.dataset.tab + 'Panel').classList.remove('hidden');

        filterPeople();
    });
});

function filterPeople() {
    const term = searchInput?.value.toLowerCase() || '';

    document.querySelectorAll('.people-panel:not(.hidden) .person-card').forEach(card => {
        const name = card.querySelector('.person-name')?.innerText.toLowerCase() || '';
        card.style.display = name.includes(term) ? '' : 'none';
    });
}

searchInput?.addEventListener('input', filterPeople);

bindMessageForm();
scrollToBottom();

if (conversationId) {
    latestInterval = setInterval(loadMessages, 3000);
}
</script>