<?php
class VatProcessor
{
    private const PREFIX = 'IT';
    private const NUMBER_LENGTH = 11;

    public function process(string $vatNumber): array
    {

        $notes = [];
        $corrected = $this->sanitize($vatNumber);

        // Add IT prefix if missing
        if (!str_starts_with($corrected, self::PREFIX)) {
            $corrected = self::PREFIX . $corrected;
            $notes[] = 'Added missing IT prefix';
        }

        $numberPart = substr($corrected, 2);
        if (!ctype_digit($numberPart)) {
            return $this->invalid($vatNumber, 'Contains non-numeric characters');
        }

        if (strlen($numberPart) !== self::NUMBER_LENGTH) {
            return $this->invalid($vatNumber, 'Must be exactly 11 digits');
        }

        return [
            'status'    => !empty($notes) ? 'corrected' : 'valid',
            'original'  => $vatNumber,
            'normalized' => $corrected,
            'notes' => implode(', ',$notes)
        ];
    }
    private function invalid(string $vat, string $message): array
    {
        return [
            'status' => 'invalid', 
            'original' => $vat, 
            'normalized' => $vat, 
            'notes' => $message
        ];
    }
    private function sanitize(string $input): string
    {
        $input = strtoupper($input);
        return preg_replace('/[^a-zA-Z0-9]/', '', $input);
    }
}