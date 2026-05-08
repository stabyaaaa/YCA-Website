<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Friendship;
use App\Models\Conversation;
use App\Models\ConversationParticipant;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $friendIds = Friendship::where('user_id', $user->id)
            ->where('status', 'accepted')
            ->pluck('friend_id');

        $friends = User::whereIn('id', $friendIds)->get();

        return view('messages.index', compact('friends'));
    }

    public function start(User $user)
    {
        $authUser = Auth::user();

        $isFriend = Friendship::where('user_id', $authUser->id)
            ->where('friend_id', $user->id)
            ->where('status', 'accepted')
            ->exists();

        if (!$isFriend) {
            abort(403, 'You can only message your friends.');
        }

        $existingConversation = Conversation::whereHas('participants', function ($q) use ($authUser) {
                $q->where('user_id', $authUser->id);
            })
            ->whereHas('participants', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            })
            ->first();

        if ($existingConversation) {
            return redirect()->route('messages.show', $existingConversation->id);
        }

        $conversation = Conversation::create();

        ConversationParticipant::create([
            'conversation_id' => $conversation->id,
            'user_id' => $authUser->id,
        ]);

        ConversationParticipant::create([
            'conversation_id' => $conversation->id,
            'user_id' => $user->id,
        ]);

        return redirect()->route('messages.show', $conversation->id);
    }

    public function show(Conversation $conversation)
    {
        $this->authorizeConversation($conversation);

        $user = Auth::user();

        $participants = $conversation->participants()
            ->with('user')
            ->get();

        $otherUser = $participants
            ->where('user_id', '!=', $user->id)
            ->first()
            ?->user;

        $messages = $conversation->messages()
            ->with('sender')
            ->orderBy('created_at')
            ->get();

        return view('messages.show', compact('conversation', 'messages', 'otherUser'));
    }

    public function send(Request $request, Conversation $conversation)
    {
        $this->authorizeConversation($conversation);

        $request->validate([
            'message' => 'required|string|max:2000',
        ]);

        $message = ChatMessage::create([
            'conversation_id' => $conversation->id,
            'sender_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return response()->json([
            'success' => true,
            'message' => [
                'id' => $message->id,
                'sender_id' => $message->sender_id,
                'message' => e($message->message),
                'time' => $message->created_at->format('h:i A'),
            ],
        ]);
    }

    public function latest(Conversation $conversation)
    {
        $this->authorizeConversation($conversation);

        $messages = $conversation->messages()
            ->with('sender')
            ->orderBy('created_at')
            ->get()
            ->map(function ($message) {
                return [
                    'id' => $message->id,
                    'sender_id' => $message->sender_id,
                    'message' => e($message->message),
                    'time' => $message->created_at->format('h:i A'),
                ];
            });

        return response()->json($messages);
    }

    private function authorizeConversation(Conversation $conversation)
    {
        $exists = ConversationParticipant::where('conversation_id', $conversation->id)
            ->where('user_id', Auth::id())
            ->exists();

        if (!$exists) {
            abort(403);
        }
    }
}