DROP TABLE IF EXISTS vat_results;
CREATE TABLE vat_results (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    original        VARCHAR(50) NOT NULL,
    normalized      VARCHAR(20) NOT NULL,
    status          ENUM('valid', 'corrected', 'invalid') NOT NULL,
    correction_note TEXT NULL,
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);