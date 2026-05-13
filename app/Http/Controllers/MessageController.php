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
        $friends = $this->getFriends();
        $notFriends = $this->getNotFriends();

        return view('messages.index', compact('friends', 'notFriends'));
    }

    public function show(Conversation $conversation)
    {
        $this->authorizeConversation($conversation);

        $friends = $this->getFriends();
        $notFriends = $this->getNotFriends();

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

        return view('messages.show', compact(
            'conversation',
            'messages',
            'otherUser',
            'friends',
            'notFriends'
        ));
    }

    public function start(User $user)
    {
        $authUser = Auth::user();

        if (!$this->isFriend($authUser->id, $user->id)) {
            abort(403, 'You can only message your friends.');
        }

        $conversation = $this->findOrCreateConversation($authUser->id, $user->id);

        return redirect()->route('messages.show', $conversation->id);
    }

    public function startAjax(User $user)
    {
        $authUser = Auth::user();

        if (!$this->isFriend($authUser->id, $user->id)) {
            return response()->json([
                'success' => false,
                'message' => 'You can only message your friends.',
            ], 403);
        }

        $conversation = $this->findOrCreateConversation($authUser->id, $user->id);

        $messages = $conversation->messages()
            ->with('sender')
            ->orderBy('created_at')
            ->get()
            ->map(fn ($message) => [
                'id' => $message->id,
                'sender_id' => $message->sender_id,
                'message' => e($message->message),
                'time' => $message->created_at->format('h:i A'),
            ]);

        return response()->json([
            'success' => true,
            'conversation_id' => $conversation->id,
            'show_url' => route('messages.show', $conversation->id),
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'organization' => $user->organization ?? 'WePOWER Member',
                'country' => $user->country ?? 'Network',
                'initials' => $this->initials($user->name),
            ],
            'messages' => $messages,
        ]);
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
            ->map(fn ($message) => [
                'id' => $message->id,
                'sender_id' => $message->sender_id,
                'message' => e($message->message),
                'time' => $message->created_at->format('h:i A'),
            ]);

        return response()->json($messages);
    }

    private function getFriends()
    {
        $authId = Auth::id();

        $friendIds = Friendship::where('status', 'accepted')
            ->where(function ($query) use ($authId) {
                $query->where('user_id', $authId)
                    ->orWhere('friend_id', $authId);
            })
            ->get()
            ->map(function ($friendship) use ($authId) {
                return $friendship->user_id == $authId
                    ? $friendship->friend_id
                    : $friendship->user_id;
            })
            ->unique()
            ->values();

        return User::whereIn('id', $friendIds)
            ->orderBy('name')
            ->get();
    }

    private function getNotFriends()
    {
        $authId = Auth::id();

        $relatedUserIds = Friendship::where('user_id', $authId)
            ->pluck('friend_id')
            ->merge(
                Friendship::where('friend_id', $authId)->pluck('user_id')
            )
            ->unique()
            ->values();

        return User::where('id', '!=', $authId)
            ->whereNotIn('id', $relatedUserIds)
            ->orderBy('name')
            ->get();
    }

    private function isFriend($authId, $friendId)
    {
        return Friendship::where('status', 'accepted')
            ->where(function ($query) use ($authId, $friendId) {
                $query->where(function ($q) use ($authId, $friendId) {
                    $q->where('user_id', $authId)
                        ->where('friend_id', $friendId);
                })
                ->orWhere(function ($q) use ($authId, $friendId) {
                    $q->where('user_id', $friendId)
                        ->where('friend_id', $authId);
                });
            })
            ->exists();
    }

    private function findOrCreateConversation($authId, $otherUserId)
    {
        $existingConversation = Conversation::whereHas('participants', function ($q) use ($authId) {
                $q->where('user_id', $authId);
            })
            ->whereHas('participants', function ($q) use ($otherUserId) {
                $q->where('user_id', $otherUserId);
            })
            ->first();

        if ($existingConversation) {
            return $existingConversation;
        }

        $conversation = Conversation::create();

        ConversationParticipant::create([
            'conversation_id' => $conversation->id,
            'user_id' => $authId,
        ]);

        ConversationParticipant::create([
            'conversation_id' => $conversation->id,
            'user_id' => $otherUserId,
        ]);

        return $conversation;
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

    private function initials($name)
    {
        return collect(explode(' ', $name))
            ->map(fn ($part) => strtoupper(substr($part, 0, 1)))
            ->take(2)
            ->implode('');
    }
}