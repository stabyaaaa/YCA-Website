<?php

namespace App\Http\Controllers;

use App\Services\AI\ChatbotService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function message(
        Request $request,
        ChatbotService $chatbot
    ): JsonResponse {
        $validated = $request->validate([
            'message' => [
                'required',
                'string',
                'max:2000',
            ],
        ]);

        try {
            $reply = $chatbot->send(
                $validated['message']
            );

            return response()->json([
                'message' => $reply,
            ]);

        } catch (\Throwable $e) {

            report($e);

            return response()->json([
                'message' => 'Unable to process your request right now.',
            ], 500);
        }
    }
}