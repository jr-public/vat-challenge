INSERT INTO vat_results (original, normalized, status, correction_note) VALUES
('IT12345678901', 'IT12345678901', 'valid', NULL),
('98765432158',   'IT98765432158', 'corrected', 'Added missing IT prefix'),
('IT12345',       'IT12345',       'invalid', 'Must be exactly 11 digits'),
('123-hello',     '123-hello',     'invalid', 'Contains non-numeric characters');