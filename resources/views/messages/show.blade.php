@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-950 text-white pt-24 px-4">
    <div class="max-w-4xl mx-auto bg-white/10 border border-white/10 rounded-3xl overflow-hidden">

        <div class="p-5 border-b border-white/10 flex items-center gap-4">
            <a href="{{ route('messages.index') }}" class="text-white/60 hover:text-white">←</a>

            <div>
                <h2 class="font-bold text-lg">{{ $otherUser->name ?? 'Chat' }}</h2>
                <p class="text-xs text-green-400">● Online</p>
            </div>
        </div>

        <div id="messagesBox" class="h-[500px] overflow-y-auto p-5 space-y-4">
            @foreach($messages as $message)
                <div class="flex {{ $message->sender_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
                    <div class="max-w-[75%] px-4 py-3 rounded-2xl 
                        {{ $message->sender_id === auth()->id() ? 'bg-pink-600' : 'bg-white/10' }}">
                        <p class="text-sm">{{ $message->message }}</p>
                        <p class="text-[11px] text-white/60 mt-1">
                            {{ $message->created_at->format('h:i A') }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <form id="messageForm" class="p-5 border-t border-white/10 flex gap-3">
            @csrf
            <input 
                type="text" 
                id="messageInput"
                class="flex-1 rounded-xl bg-white/10 border border-white/10 px-4 py-3 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-pink-500"
                placeholder="Type your message..."
                autocomplete="off"
            >

            <button 
                type="submit"
                class="px-6 py-3 rounded-xl bg-pink-600 hover:bg-pink-700 transition font-semibold">
                Send
            </button>
        </form>
    </div>
</div>

<script>
const conversationId = "{{ $conversation->id }}";
const authUserId = "{{ auth()->id() }}";
const messagesBox = document.getElementById('messagesBox');
const messageForm = document.getElementById('messageForm');
const messageInput = document.getElementById('messageInput');

function scrollToBottom() {
    messagesBox.scrollTop = messagesBox.scrollHeight;
}

function renderMessages(messages) {
    messagesBox.innerHTML = '';

    messages.forEach(msg => {
        const isMine = String(msg.sender_id) === String(authUserId);

        const wrapper = document.createElement('div');
        wrapper.className = `flex ${isMine ? 'justify-end' : 'justify-start'}`;

        wrapper.innerHTML = `
            <div class="max-w-[75%] px-4 py-3 rounded-2xl ${isMine ? 'bg-pink-600' : 'bg-white/10'}">
                <p class="text-sm">${msg.message}</p>
                <p class="text-[11px] text-white/60 mt-1">${msg.time}</p>
            </div>
        `;

        messagesBox.appendChild(wrapper);
    });

    scrollToBottom();
}

function loadMessages() {
    fetch(`/messages/${conversationId}/latest`)
        .then(response => response.json())
        .then(data => renderMessages(data));
}

messageForm.addEventListener('submit', function(e) {
    e.preventDefault();

    const message = messageInput.value.trim();
    if (!message) return;

    fetch(`/messages/${conversationId}/send`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
        },
        body: JSON.stringify({ message })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            messageInput.value = '';
            loadMessages();
        }
    });
});

scrollToBottom();
setInterval(loadMessages, 3000);
</script>
@endsection