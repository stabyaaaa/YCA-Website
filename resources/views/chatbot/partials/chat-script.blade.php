{{-- =========================================================
    WEPOWER AI CHATBOT SCRIPT
    File: resources/views/chatbot/partials/chat-script.blade.php
========================================================== --}}

<script>
document.addEventListener('DOMContentLoaded', function () {

    const trigger = document.getElementById('aiChatTrigger');
    const popup = document.getElementById('aiChatPopup');
    const closeButton = document.getElementById('aiChatClose');

    const form = document.getElementById('aiChatForm');
    const input = document.getElementById('aiChatInput');
    const sendButton = document.getElementById('aiChatSend');
    const messages = document.getElementById('aiChatMessages');

    const suggestions = document.querySelectorAll('.ai-chat-suggestion');


    // ---------------------------------------------------------
    // Safety check
    // ---------------------------------------------------------
    if (!trigger || !popup) {
        return;
    }


    // ---------------------------------------------------------
    // Open chat
    // ---------------------------------------------------------
    trigger.addEventListener('click', function () {

        popup.classList.toggle('hidden');

        if (!popup.classList.contains('hidden')) {
            setTimeout(function () {
                input?.focus();
            }, 100);
        }

    });


    // ---------------------------------------------------------
    // Close chat
    // ---------------------------------------------------------
    closeButton?.addEventListener('click', function () {

        popup.classList.add('hidden');

    });


    // ---------------------------------------------------------
    // Suggested questions
    // ---------------------------------------------------------
    suggestions.forEach(function (button) {

        button.addEventListener('click', function () {

            const message = button.dataset.message;

            if (!message || !input) {
                return;
            }

            input.value = message;

            autoResizeTextarea();

            input.focus();

        });

    });


    // ---------------------------------------------------------
    // Auto resize textarea
    // ---------------------------------------------------------
    input?.addEventListener('input', function () {

        autoResizeTextarea();

    });


    function autoResizeTextarea() {

        if (!input) {
            return;
        }

        input.style.height = 'auto';

        input.style.height = Math.min(
            input.scrollHeight,
            112
        ) + 'px';

    }


    // ---------------------------------------------------------
    // Enter sends message
    // Shift + Enter adds new line
    // ---------------------------------------------------------
    input?.addEventListener('keydown', function (event) {

        if (
            event.key === 'Enter' &&
            !event.shiftKey
        ) {

            event.preventDefault();

            form?.requestSubmit();

        }

    });


    // ---------------------------------------------------------
    // Submit message
    // ---------------------------------------------------------
    form?.addEventListener('submit', async function (event) {

        event.preventDefault();

        if (!input) {
            return;
        }


        const message = input.value.trim();


        if (!message) {
            return;
        }


        // Add user's message to the UI
        appendUserMessage(message);


        // Clear input
        input.value = '';

        autoResizeTextarea();


        // Disable while waiting
        input.disabled = true;

        if (sendButton) {
            sendButton.disabled = true;
        }


        // Remove suggestions after first message
        const suggestionContainer =
            document.getElementById('aiChatSuggestions');

        suggestionContainer?.remove();


        // Loading message
        const loadingMessage =
            appendLoadingMessage();


        try {

            const csrfToken = document
                .querySelector('meta[name="csrf-token"]')
                ?.getAttribute('content');


            const response = await fetch('/chatbot/message', {

                method: 'POST',

                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },

                body: JSON.stringify({
                    message: message
                })

            });


            let data = {};

            try {

                data = await response.json();

            } catch (jsonError) {

                throw new Error(
                    'Invalid response from server.'
                );

            }


            loadingMessage?.remove();


            if (!response.ok) {

                throw new Error(
                    data.message ||
                    'Unable to process your message.'
                );

            }


            appendAssistantMessage(
                data.message ||
                'I received your message.'
            );


        } catch (error) {

            loadingMessage?.remove();


            console.error(
                'WePOWER AI error:',
                error
            );


            appendAssistantMessage(
                'Sorry, I could not process your request right now. Please try again.'
            );

        } finally {

            input.disabled = false;

            if (sendButton) {
                sendButton.disabled = false;
            }

            input.focus();

        }

    });


    // ---------------------------------------------------------
    // User message
    // ---------------------------------------------------------
    function appendUserMessage(message) {

        if (!messages) {
            return;
        }


        const row = document.createElement('div');

        row.className =
            'flex justify-end';


        const wrapper = document.createElement('div');

        wrapper.className =
            'max-w-[82%]';


        const bubble = document.createElement('div');

        bubble.className =
            'rounded-2xl ' +
            'rounded-br-md ' +
            'bg-gradient-to-br ' +
            'from-pink-600 ' +
            'to-purple-600 ' +
            'px-4 py-3 ' +
            'text-sm ' +
            'leading-6 ' +
            'text-white ' +
            'shadow-sm';


        bubble.textContent = message;


        const time = document.createElement('div');

        time.className =
            'mt-1 px-1 ' +
            'text-right ' +
            'text-[10px] ' +
            'text-gray-400';


        time.textContent = getCurrentTime();


        wrapper.appendChild(bubble);

        wrapper.appendChild(time);

        row.appendChild(wrapper);

        messages.appendChild(row);


        scrollToBottom();

    }


    // ---------------------------------------------------------
    // Assistant message
    // ---------------------------------------------------------
    function appendAssistantMessage(message) {

        if (!messages) {
            return;
        }


        const row = document.createElement('div');

        row.className =
            'flex items-end gap-2';


        const avatar = document.createElement('div');

        avatar.className =
            'flex h-8 w-8 ' +
            'shrink-0 ' +
            'items-center justify-center ' +
            'rounded-xl ' +
            'bg-gradient-to-br ' +
            'from-pink-500 ' +
            'to-purple-600 ' +
            'text-sm text-white shadow';


        avatar.textContent = '🤖';


        const wrapper = document.createElement('div');

        wrapper.className =
            'max-w-[82%]';


        const bubble = document.createElement('div');

        bubble.className =
            'rounded-2xl ' +
            'rounded-bl-md ' +
            'border border-gray-200 ' +
            'bg-white ' +
            'px-4 py-3 ' +
            'text-sm ' +
            'leading-6 ' +
            'text-gray-700 ' +
            'shadow-sm';


        bubble.textContent = message;


        const time = document.createElement('div');

        time.className =
            'mt-1 px-1 ' +
            'text-[10px] ' +
            'text-gray-400';


        time.textContent = getCurrentTime();


        wrapper.appendChild(bubble);

        wrapper.appendChild(time);

        row.appendChild(avatar);

        row.appendChild(wrapper);

        messages.appendChild(row);


        scrollToBottom();

    }


    // ---------------------------------------------------------
    // Thinking message
    // ---------------------------------------------------------
    function appendLoadingMessage() {

        if (!messages) {
            return null;
        }


        const row = document.createElement('div');

        row.className =
            'flex items-end gap-2';


        const avatar = document.createElement('div');

        avatar.className =
            'flex h-8 w-8 ' +
            'shrink-0 ' +
            'items-center justify-center ' +
            'rounded-xl ' +
            'bg-gradient-to-br ' +
            'from-pink-500 ' +
            'to-purple-600 ' +
            'text-sm text-white shadow';


        avatar.textContent = '🤖';


        const bubble = document.createElement('div');

        bubble.className =
            'rounded-2xl ' +
            'rounded-bl-md ' +
            'border border-gray-200 ' +
            'bg-white ' +
            'px-4 py-3 ' +
            'text-sm ' +
            'text-gray-500 ' +
            'shadow-sm';


        const dots = document.createElement('div');

        dots.className =
            'flex items-center gap-1';


        dots.innerHTML = `
            <span class="h-1.5 w-1.5 rounded-full bg-gray-400 animate-bounce"></span>
            <span class="h-1.5 w-1.5 rounded-full bg-gray-400 animate-bounce [animation-delay:150ms]"></span>
            <span class="h-1.5 w-1.5 rounded-full bg-gray-400 animate-bounce [animation-delay:300ms]"></span>
        `;


        bubble.appendChild(dots);

        row.appendChild(avatar);

        row.appendChild(bubble);

        messages.appendChild(row);


        scrollToBottom();


        return row;

    }


    // ---------------------------------------------------------
    // Scroll
    // ---------------------------------------------------------
    function scrollToBottom() {

        if (!messages) {
            return;
        }

        messages.scrollTop =
            messages.scrollHeight;

    }


    // ---------------------------------------------------------
    // Current time
    // ---------------------------------------------------------
    function getCurrentTime() {

        return new Date().toLocaleTimeString(
            [],
            {
                hour: '2-digit',
                minute: '2-digit'
            }
        );

    }

});
</script>