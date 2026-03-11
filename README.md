# VAT Checker

A PHP application that validates and processes Italian VAT numbers from a CSV file, attempts to auto-correct recoverable entries, and persists results to a MySQL database.

## Requirements

- PHP 8.1+
- MySQL 5.7+
- A MySQL database named `vat_checker`
- A local server environment (e.g. XAMPP)

## Setup

1. Run `database/schema.sql` to create the table
2. (Optional) Seed the database with sample data using `database/seed.sql`
3. Update database credentials in `config/database.php` if needed.

## Usage

### Using provided seed
1. Go to the results page (`results.php`). 
2. Expand each section as needed.

### CSV Upload
1. Go to the home page (`index.php`).
2. Upload a correctly formatted CSV file.
3. Results are stored in the database and displayed grouped by status: valid, corrected, and invalid.

### Single VAT Check
1. Go to the home page (`index.php`).
2. Enter a VAT number and submit.

## CSV Format

The CSV must have at least two columns. The VAT number is expected in the **second column**. The header row will be skipped.

Example:
```
id,vat_number
1,IT12345678901
2,98765432158
3,IT12345
```

## Validation Rules

A valid VAT number must:
- Start with the prefix `IT`
- Be followed by exactly **11 digits**

Example: `IT12345678901`

The application will attempt to auto-correct entries that are missing the `IT` prefix. Entries with non-numeric characters or an incorrect digit count will be marked as invalid.

## Project Structure
```
├── config/
│   └── database.php        # DB credentials
├── database/
│   ├── schema.sql          # Table definition
│   └── seed.sql            # Sample data
├── src/
│   ├── CsvParser.php       # Reads and parses the CSV file
│   ├── CsvUploadHandler.php# Orchestrates the upload flow
│   ├── Database.php        # PDO connection wrapper
│   ├── VatProcessor.php    # Validation and correction logic
│   └── VatRepository.php   # Database read/write operations
├── views/
│   ├── index.php           # Home page view
│   ├── results.php         # Results page view
│   └── single.php          # Single check result view
├── index.php
├── upload.php
├── results.php
└── single.php
```

## Future improvements
A quick list of features that did not make it due to time constraints.
- MainController: replace the individual entry points, routing all requests through one file.
- Front controller: index.php would act as the front controller, with a simple router dispatching to the appropriate MainController method.
- Environment files: avoid hardcoding credentials
- Testing: use PHPUnit and create tests for the source files