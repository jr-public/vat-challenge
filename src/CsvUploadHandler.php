<?php

class CsvUploadHandler
{
    public function __construct(
        private CsvParser $parser, 
        private VatProcessor $vatProcessor, 
        private VatRepository $vatRepository
    )
    {}

    public function handle(array $files, array $server): void
    {
        $this->validateRequest($server);
        $this->validateFile($files);
        $this->processFile($files);
        $this->redirect('results.php');
    }

    private function validateRequest(array $server): void
    {
        if ($server['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('index.php', 'invalid_request');
        }
    }

    private function validateFile(array $files): void
    {
        if (!isset($files['csv_file'])) {
            $this->redirect('index.php', 'no_file');
        }

        $file = $files['csv_file'];

        if ($file['error'] !== UPLOAD_ERR_OK) {
            $this->redirect('index.php', 'upload_failed');
        }

        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if ($extension !== 'csv') {
            $this->redirect('index.php', 'invalid_file_type');
        }
    }

    private function processFile(array $files): void
    {
        // Parses the csv file into an array
        $rows = $this->parser->parse($files['csv_file']['tmp_name']);
        if (empty($rows)) {
            $this->redirect('index.php', 'empty_file');
        }
        // Truncate the vat results table
        $this->vatRepository->clearAll();
        // Process each row in the csv file and save the result
        foreach ($rows as $vat) {
            $result = $this->vatProcessor->process($vat);
            $this->vatRepository->save($result);
        }
    }

    private function redirect(string $page, string $error = ''): void
    {
        $url = $error ? $page."?error=".$error : $page;
        header("Location: ".$url);
        die();
    }
}