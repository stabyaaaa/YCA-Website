<?php

namespace App\Console\Commands;

use App\Services\AI\KnowledgeBaseService;
use Illuminate\Console\Command;

class CreateWePowerVectorStore extends Command
{
    protected $signature = 'wepower:create-vector-store';

    protected $description = 'Create the OpenAI vector store for WePOWER';

    public function handle(
        KnowledgeBaseService $knowledgeBase
    ): int {

        $this->info('Creating WePOWER vector store...');

        $vectorStore = $knowledgeBase->createVectorStore();

        $this->newLine();

        $this->info('Vector store created.');

        $this->line(
            'ID: ' . $vectorStore['id']
        );

        $this->newLine();

        $this->warn(
            'Add this ID to OPENAI_VECTOR_STORE_ID in your .env file.'
        );

        return self::SUCCESS;
    }
}