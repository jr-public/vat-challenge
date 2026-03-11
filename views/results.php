<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VAT Validator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <style>
        .card-header { cursor: pointer; }
    </style>

    <div class="container mt-5">
        <div class="mb-4">
        	<a href="index.php" class="btn btn-outline-secondary btn-sm mt-2">← Back</a>
        </div>

        <div class="card mb-3">
            <div class="card-header bg-light" data-bs-toggle="collapse" data-bs-target="#valid" role="button">
                <span class="text-success">✔️ Valid VAT Numbers (<?= count($valid) ?>)</span>
            </div>
            <div id="valid" class="collapse">
                <ul class="list-group list-group-flush">
                    <?php foreach ($valid as $row): ?>
                        <li class="list-group-item"><?= htmlspecialchars($row['original']) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header bg-light" 
                data-bs-toggle="collapse" 
                data-bs-target="#corrected" 
                aria-expanded="false" 
                role="button">
                <span class="text-primary">✅ Corrected VAT Numbers (<?= count($corrected) ?>)</span>
            </div>
            <div id="corrected" class="collapse">
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        <?php foreach ($corrected as $row): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div>
                                    <?= htmlspecialchars($row['normalized']) ?><br>
                                    <small class="text-muted"><?= htmlspecialchars($row['correction_note']) ?></small>
                                </div>
                                <span class="badge bg-warning text-dark ms-2">Corrected</span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header bg-light" data-bs-toggle="collapse" data-bs-target="#invalid" role="button">
                <span class="text-danger">❌ Invalid VAT Numbers (<?= count($invalid) ?>)</span>
            </div>
            <div id="invalid" class="collapse">
                <ul class="list-group list-group-flush">
                    <?php foreach ($invalid as $row): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div>
                                <?= htmlspecialchars($row['original']) ?><br>
                                <small class="text-muted"><?= htmlspecialchars($row['correction_note']) ?></small>
                            </div>
                            <span class="badge bg-danger ms-2">Invalid</span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>