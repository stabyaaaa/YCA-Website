<?php

namespace App\Services\AI;

use Illuminate\Support\Facades\Http;
use RuntimeException;

class ChatbotService
{
    public function send(string $message): string
    {
        $response = Http::withToken(config('services.openai.key'))
            ->timeout(30)
            ->post('https://api.openai.com/v1/responses', [
                'model' => config('services.openai.model'),

                'instructions' => <<<PROMPT
You are the WePOWER AI Assistant.

You assist users of the WePOWER platform.

Be friendly, professional, concise, and helpful.

If you do not know something about WePOWER, do not invent information.
Tell the user that you do not have enough information to answer accurately.
PROMPT,

                'input' => $message,
            ]);

        if ($response->failed()) {
            throw new RuntimeException(
                'OpenAI API request failed: ' . $response->body()
            );
        }

        $text = $response->json('output.0.content.0.text');

        if (!$text) {
            throw new RuntimeException(
                'OpenAI returned an empty response.'
            );
        }

        return $text;
    }
}