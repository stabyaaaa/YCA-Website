<?php

namespace App\Services\AI;

class ChatbotService
{
    public function send(string $message): string
    {
        return 'You asked: ' . $message;
    }
}