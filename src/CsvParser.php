<?php
class CsvParser
{
    public function parse(string $filePath): array
    {
        $handle = fopen($filePath, 'r');

        if ($handle === false) {
            throw new RuntimeException('Could not open file: ' . $filePath);
        }

        $rows = [];
        $isFirstRow = true;

        while (($row = fgetcsv($handle, 0, ',')) !== false) {
            if ($isFirstRow) {
                $isFirstRow = false;
                continue;
            }

            if (isset($row[1])) {
                $rows[] = trim($row[1]);
            }
        }

        fclose($handle);
        return $rows;
    }
}