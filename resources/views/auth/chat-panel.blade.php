{{-- =========================================================
    WEPOWER AI CHATBOT
========================================================== --}}

<div
    id="aiChatWidget"
    class="fixed bottom-6 right-6 z-[9999]"
>

    {{-- Chat window --}}
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

        {{-- Header --}}
        <div
            class="bg-gradient-to-r
                   from-pink-600
                   via-fuchsia-600
                   to-purple-700
                   px-5 py-4
                   text-white"
        >

            <div class="flex items-center justify-between">

                <div class="flex items-center gap-3">

                    <div
                        class="flex h-11 w-11
                               items-center justify-center
                               rounded-2xl
                               bg-white/15
                               text-2xl"
                    >
                        🤖
                    </div>

                    <div>
                        <h3 class="font-semibold">
                            WePOWER AI
                        </h3>

                        <p class="text-xs text-white/80">
                            AI Assistant
                        </p>
                    </div>

                </div>

                <button
                    id="aiChatClose"
                    type="button"
                    class="flex h-9 w-9
                           items-center justify-center
                           rounded-xl
                           bg-white/10
                           hover:bg-white/20"
                >
                    ×
                </button>

            </div>

        </div>


        {{-- Messages --}}
        <div
            id="aiChatMessages"
            class="h-[380px]
                   overflow-y-auto
                   bg-slate-50
                   p-4
                   space-y-4"
        >

            {{-- AI welcome message --}}
            <div class="flex items-end gap-2">

                <div
                    class="flex h-8 w-8
                           shrink-0
                           items-center justify-center
                           rounded-xl
                           bg-purple-600
                           text-white"
                >
                    🤖
                </div>

                <div
                    class="max-w-[82%]
                           rounded-2xl
                           rounded-bl-md
                           border border-gray-200
                           bg-white
                           px-4 py-3
                           text-sm
                           leading-6
                           text-gray-700
                           shadow-sm"
                >
                    Hi! 👋 I'm the WePOWER AI Assistant.

                    <br><br>

                    How can I help you today?
                </div>

            </div>


            {{-- Suggestions --}}
            <div
                id="aiChatSuggestions"
                class="ml-10 flex flex-wrap gap-2"
            >

                <button
                    type="button"
                    class="ai-chat-suggestion
                           rounded-full
                           bg-pink-50
                           px-3 py-2
                           text-xs
                           text-pink-700
                           hover:bg-pink-100"
                    data-message="What is WePOWER?"
                >
                    What is WePOWER?
                </button>


                <button
                    type="button"
                    class="ai-chat-suggestion
                           rounded-full
                           bg-purple-50
                           px-3 py-2
                           text-xs
                           text-purple-700
                           hover:bg-purple-100"
                    data-message="How can I join WePOWER?"
                >
                    How can I join?
                </button>


                <button
                    type="button"
                    class="ai-chat-suggestion
                           rounded-full
                           bg-gray-100
                           px-3 py-2
                           text-xs
                           text-gray-700
                           hover:bg-gray-200"
                    data-message="Tell me about WePOWER events"
                >
                    Events
                </button>

            </div>

        </div>


        {{-- Input --}}
        <div
            class="border-t border-gray-200
                   bg-white
                   p-3"
        >

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
                    class="min-h-[44px]
                           max-h-28
                           flex-1
                           resize-none
                           rounded-2xl
                           border border-gray-200
                           bg-gray-50
                           px-4 py-3
                           text-sm
                           focus:border-pink-400
                           focus:ring-pink-200"
                ></textarea>


                <button
                    id="aiChatSend"
                    type="submit"
                    class="flex h-11 w-11
                           items-center justify-center
                           rounded-2xl
                           bg-gradient-to-br
                           from-pink-600
                           to-purple-600
                           text-white
                           shadow-md
                           hover:opacity-90"
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

            <p
                class="mt-2 text-center
                       text-[10px]
                       text-gray-400"
            >
                AI responses may not always be accurate.
            </p>

        </div>

    </div>


    {{-- Floating button --}}
    <div class="flex items-center gap-3">

        <div
            id="aiChatLabel"
            class="hidden sm:block
                   rounded-xl
                   border border-gray-200
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
            aria-label="Open WePOWER AI"
            class="flex h-16 w-16
                   items-center justify-center
                   rounded-2xl
                   bg-gradient-to-br
                   from-pink-600
                   via-fuchsia-600
                   to-purple-700
                   text-3xl
                   text-white
                   shadow-xl
                   transition
                   hover:-translate-y-1"
        >
            🤖
        </button>

    </div>

</div>