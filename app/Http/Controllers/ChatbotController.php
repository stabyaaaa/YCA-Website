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
                'max:200',
            ],
        ]);

        try {

            $answer = $chatbot->send(
                $validated['message']
            );

            return response()->json([
                'message' => $answer,
            ]);

        } catch (\Throwable $e) {

            report($e);

            return response()->json([
                'message' => 'Unable to process the request.',
            ], 500);
        }
    }
}