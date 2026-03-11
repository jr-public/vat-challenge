<?php
class VatRepository
{
    private PDO $pdo;
    public function __construct(PDO $instance)
    {
        $this->pdo = $instance;
    }
    public function list(): array
    {
        return $this->pdo->query("SELECT * FROM vat_results ORDER BY created_at DESC")->fetchAll();
    }
    public function listByStatus(string $status): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM vat_results WHERE status = :status ORDER BY created_at DESC");
        $stmt->execute(['status' => $status]);
        return $stmt->fetchAll();
    }
	public function count(): int
    {
        return $this->pdo->query("SELECT COUNT(*) FROM vat_results")->fetchColumn();
    }
    public function save(array $vat): void
    {
        $sql = "INSERT INTO vat_results (original, normalized, status, correction_note) VALUES (:original, :normalized, :status, :notes)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($vat);
    }
    public function clearAll(): void
    {
        $this->pdo->exec("TRUNCATE TABLE vat_results");
    }
}