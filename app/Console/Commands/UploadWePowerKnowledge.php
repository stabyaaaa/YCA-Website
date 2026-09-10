<?php

namespace App\Console\Commands;

use App\Services\AI\KnowledgeBaseService;
use Illuminate\Console\Command;

class UploadWePowerKnowledge extends Command
{
    protected $signature = 'wepower:upload-knowledge';

    protected $description =
        'Upload WePOWER knowledge files to OpenAI';

    public function handle(
        KnowledgeBaseService $knowledgeBase
    ): int {

        $directory = storage_path(
            'app/private/wepower/knowledge/pdf'
        );

        if (!is_dir($directory)) {
            $this->error(
                'Knowledge directory does not exist.'
            );

            return self::FAILURE;
        }

        $files = glob($directory . '/*.pdf');

        if (empty($files)) {
            $this->warn(
                'No PDF files found.'
            );

            return self::SUCCESS;
        }

        foreach ($files as $path) {

            $this->info(
                'Uploading: ' . basename($path)
            );

            $file = $knowledgeBase->uploadFile(
                $path
            );

            $this->line(
                'OpenAI file ID: ' . $file['id']
            );

            $vectorFile =
                $knowledgeBase
                    ->attachFileToVectorStore(
                        $file['id']
                    );

            $this->line(
                'Attached to vector store.'
            );

            $this->newLine();
        }

        $this->info(
            'Knowledge upload complete.'
        );

        return self::SUCCESS;
    }
}