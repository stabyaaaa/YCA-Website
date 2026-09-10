<?php

namespace App\Services\AI;

use Illuminate\Support\Facades\Http;
use RuntimeException;

class KnowledgeBaseService
{
    private string $baseUrl = 'https://api.openai.com/v1';

    private function client()
    {
        return Http::withToken(config('services.openai.key'))
            ->timeout(60);
    }

    /**
     * Create the main WePOWER vector store.
     */
    public function createVectorStore(): array
    {
        $response = $this->client()
            ->post($this->baseUrl . '/vector_stores', [
                'name' => 'WePOWER Knowledge Base',
            ]);

        if ($response->failed()) {
            throw new RuntimeException(
                'Unable to create vector store: ' . $response->body()
            );
        }

        return $response->json();
    }
    public function uploadFile(string $path): array
{
    if (!file_exists($path)) {
        throw new RuntimeException(
            'Knowledge file does not exist: ' . $path
        );
    }

    $response = $this->client()
        ->attach(
            'file',
            fopen($path, 'r'),
            basename($path)
        )
        ->post($this->baseUrl . '/files', [
            'purpose' => 'assistants',
        ]);

    if ($response->failed()) {
        throw new RuntimeException(
            'Unable to upload file: ' . $response->body()
        );
    }

    return $response->json();
}
public function attachFileToVectorStore(
    string $fileId
): array {

    $vectorStoreId = config(
        'services.openai.vector_store_id'
    );

    if (!$vectorStoreId) {
        throw new RuntimeException(
            'OPENAI_VECTOR_STORE_ID is not configured.'
        );
    }

    $response = $this->client()
        ->post(
            $this->baseUrl
            . '/vector_stores/'
            . $vectorStoreId
            . '/files',
            [
                'file_id' => $fileId,
            ]
        );

    if ($response->failed()) {
        throw new RuntimeException(
            'Unable to attach file to vector store: '
            . $response->body()
        );
    }

    return $response->json();
}
}