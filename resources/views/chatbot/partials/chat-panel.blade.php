{{-- =========================================================
    WEPOWER AI CHATBOT PANEL
    File: resources/views/chatbot/partials/chat-panel.blade.php
========================================================== --}}

<div
    id="aiChatWidget"
    class="fixed bottom-6 right-6 z-[9999]"
>

    {{-- =====================================================
        CHAT POPUP
    ====================================================== --}}
    <div
        id="aiChatPopup"
        class="hidden absolute bottom-20 right-0
               w-[380px]
               max-w-[calc(100vw-2rem)]
               overflow-hidden
               rounded-3xl
               border border-gray-200
               bg-white
               shadow-2xl"
    >

        {{-- =================================================
            HEADER
        ================================================== --}}
        <div
            class="relative overflow-hidden
                   bg-gradient-to-r
                   from-pink-600
                   via-fuchsia-600
                   to-purple-700
                   px-5 py-4
                   text-white"
        >

            <div
                class="absolute -top-10 -right-10
                       h-28 w-28
                       rounded-full
                       bg-white/10
                       blur-2xl"
            ></div>

            <div class="relative flex items-center justify-between">

                <div class="flex items-center gap-3">

                    <div
                        class="relative flex
                               h-11 w-11
                               items-center justify-center
                               rounded-2xl
                               bg-white/15
                               text-2xl
                               ring-1 ring-white/20"
                    >
                        🤖

                        <span
                            class="absolute
                                   -bottom-1
                                   -right-1
                                   h-3.5
                                   w-3.5
                                   rounded-full
                                   border-2
                                   border-purple-700
                                   bg-green-400"
                        ></span>
                    </div>

                    <div>
                        <h3 class="text-sm font-semibold">
                            WePOWER AI
                        </h3>

                        <div
                            class="mt-1
                                   flex items-center gap-1.5
                                   text-[11px]
                                   text-white/80"
                        >
                            <span
                                class="h-1.5 w-1.5
                                       rounded-full
                                       bg-green-300"
                            ></span>

                            Online · AI Assistant
                        </div>
                    </div>

                </div>

                <button
                    id="aiChatClose"
                    type="button"
                    aria-label="Close WePOWER AI"
                    class="flex
                           h-9 w-9
                           items-center justify-center
                           rounded-xl
                           bg-white/10
                           text-xl
                           text-white
                           transition
                           hover:bg-white/20"
                >
                    ×
                </button>

            </div>
        </div>


        {{-- =================================================
            MESSAGE AREA
        ================================================== --}}
        <div
            id="aiChatMessages"
            class="h-[380px]
                   overflow-y-auto
                   bg-slate-50
                   px-4 py-5
                   space-y-4"
        >

            {{-- Initial assistant message --}}
            <div class="flex items-end gap-2">

                <div
                    class="flex
                           h-8 w-8
                           shrink-0
                           items-center justify-center
                           rounded-xl
                           bg-gradient-to-br
                           from-pink-500
                           to-purple-600
                           text-sm
                           text-white
                           shadow"
                >
                    🤖
                </div>

                <div class="max-w-[82%]">

                    <div
                        class="rounded-2xl
                               rounded-bl-md
                               border
                               border-gray-200
                               bg-white
                               px-4 py-3
                               text-sm
                               leading-6
                               text-gray-700
                               shadow-sm"
                    >

                        @auth
                            @if(auth()->user()->hasVerifiedEmail())

                                Hi! 👋 I'm the WePOWER AI Assistant.

                                <br><br>

                                How can I help you today?

                            @else

                                Hi! 👋 I'm the WePOWER AI Assistant.

                                <br><br>

                                Please verify your email to start chatting.

                            @endif

                        @else

                            Hi! 👋 I'm the WePOWER AI Assistant.

                            <br><br>

                            Please log in to start chatting.

                        @endauth

                    </div>

                    <div
                        class="mt-1
                               px-1
                               text-[10px]
                               text-gray-400"
                    >
                        Just now
                    </div>

                </div>

            </div>


            {{-- Suggestions only for verified users --}}
            @auth
                @if(auth()->user()->hasVerifiedEmail())

                    <div
                        id="aiChatSuggestions"
                        class="ml-10"
                    >

                        <div
                            class="mb-2
                                   text-[10px]
                                   font-semibold
                                   uppercase
                                   tracking-wider
                                   text-gray-400"
                        >
                            You can ask
                        </div>

                        <div class="flex flex-wrap gap-2">

                            <button
                                type="button"
                                class="ai-chat-suggestion
                                       rounded-full
                                       border border-pink-100
                                       bg-pink-50
                                       px-3 py-1.5
                                       text-xs
                                       font-medium
                                       text-pink-700
                                       transition
                                       hover:bg-pink-100"
                                data-message="What is WePOWER?"
                            >
                                What is WePOWER?
                            </button>

                            <button
                                type="button"
                                class="ai-chat-suggestion
                                       rounded-full
                                       border border-purple-100
                                       bg-purple-50
                                       px-3 py-1.5
                                       text-xs
                                       font-medium
                                       text-purple-700
                                       transition
                                       hover:bg-purple-100"
                                data-message="How can I join WePOWER?"
                            >
                                How can I join?
                            </button>

                            <button
                                type="button"
                                class="ai-chat-suggestion
                                       rounded-full
                                       border border-gray-200
                                       bg-white
                                       px-3 py-1.5
                                       text-xs
                                       font-medium
                                       text-gray-600
                                       transition
                                       hover:bg-gray-100"
                                data-message="Tell me about WePOWER events"
                            >
                                Events
                            </button>

                        </div>

                    </div>

                @endif
            @endauth

        </div>


        {{-- =================================================
            BOTTOM AREA
        ================================================== --}}
        <div
            class="border-t
                   border-gray-100
                   bg-white
                   px-3 py-3"
        >

            @auth

                @if(auth()->user()->hasVerifiedEmail())

                    {{-- Verified user chat input --}}
                    <form
                        id="aiChatForm"
                        class="flex items-end gap-2"
                    >

                        @csrf

                        <textarea
                            id="aiChatInput"
                            name="message"
                            rows="1"
                            maxlength="2000"
                            placeholder="Ask WePOWER AI..."
                            autocomplete="off"
                            class="min-h-[44px]
                                   max-h-28
                                   flex-1
                                   resize-none
                                   rounded-2xl
                                   border
                                   border-gray-200
                                   bg-gray-50
                                   px-4 py-3
                                   text-sm
                                   text-gray-800
                                   outline-none
                                   transition
                                   placeholder:text-gray-400
                                   focus:border-pink-400
                                   focus:bg-white
                                   focus:ring-2
                                   focus:ring-pink-100"
                        ></textarea>

                        <button
                            id="aiChatSend"
                            type="submit"
                            aria-label="Send message"
                            class="flex
                                   h-11 w-11
                                   shrink-0
                                   items-center justify-center
                                   rounded-2xl
                                   bg-gradient-to-br
                                   from-pink-600
                                   to-purple-600
                                   text-white
                                   shadow-md
                                   transition
                                   hover:scale-105
                                   active:scale-95
                                   disabled:cursor-not-allowed
                                   disabled:opacity-50"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                class="h-5 w-5"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M22 2L11 13"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M22 2L15 22L11 13L2 9L22 2Z"
                                />
                            </svg>
                        </button>

                    </form>

                @else

                    {{-- Logged in but unverified --}}
                    <div class="text-center">

                        <div
                            class="mb-3
                                   text-sm
                                   text-gray-600"
                        >
                            Verify your email to use WePOWER AI.
                        </div>

                        <a
                            href="{{ route('verification.notice') }}"
                            class="inline-flex
                                   items-center
                                   justify-center
                                   rounded-xl
                                   bg-gradient-to-r
                                   from-pink-600
                                   to-purple-600
                                   px-5 py-2.5
                                   text-sm
                                   font-semibold
                                   text-white
                                   shadow-sm
                                   transition
                                   hover:opacity-90"
                        >
                            Verify Email
                        </a>

                    </div>

                @endif

            @else

                {{-- Guest login button --}}
                <div class="text-center">

                    <button
                        type="button"
                        onclick="openAuthModal('login')"
                        class="inline-flex
                               items-center
                               justify-center
                               rounded-xl
                               bg-gradient-to-r
                               from-pink-600
                               to-purple-600
                               px-5 py-2.5
                               text-sm
                               font-semibold
                               text-white
                               shadow-sm
                               transition
                               hover:opacity-90"
                    >
                        Login to Chat
                    </button>

                </div>

            @endauth


            <div
                class="mt-2
                       text-center
                       text-[10px]
                       text-gray-400"
            >
                AI responses may not always be accurate.
            </div>

        </div>

    </div>


    {{-- =====================================================
        FLOATING BUTTON
    ====================================================== --}}
    <div class="flex items-center gap-3">

        <div
            id="aiChatLabel"
            class="hidden
                   sm:block
                   rounded-xl
                   border
                   border-gray-200
                   bg-white
                   px-4 py-2
                   text-sm
                   font-semibold
                   text-gray-700
                   shadow-lg"
        >
            Ask WePOWER AI
        </div>

        <button
            id="aiChatTrigger"
            type="button"
            aria-label="Open WePOWER AI assistant"
            class="group
                   relative
                   flex
                   h-16 w-16
                   items-center justify-center
                   rounded-2xl
                   bg-gradient-to-br
                   from-pink-600
                   via-fuchsia-600
                   to-purple-700
                   text-3xl
                   text-white
                   shadow-xl
                   transition-all
                   duration-300
                   hover:-translate-y-1
                   hover:shadow-2xl
                   active:translate-y-0"
        >

            <span
                class="absolute
                       inset-0
                       rounded-2xl
                       bg-pink-400
                       opacity-0
                       blur-lg
                       transition
                       group-hover:opacity-30"
            ></span>

            <span
                class="relative
                       transition-transform
                       duration-300
                       group-hover:scale-110"
            >
                🤖
            </span>

            <span
                class="absolute
                       -right-1
                       -top-1
                       flex
                       h-5
                       w-5
                       items-center
                       justify-center
                       rounded-full
                       border-2
                       border-white
                       bg-green-500"
            >
                <span
                    class="h-1.5
                           w-1.5
                           rounded-full
                           bg-white"
                ></span>
            </span>

        </button>

    </div>

</div>