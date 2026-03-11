<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VAT Validation Tool</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card mb-4">
        <div class="card-header bg-light">
            <h5 class="mb-0">Upload CSV file</h5>
        </div>
        <div class="card-body">
            <?php if (isset($error) && !empty($error)): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> <?php echo htmlspecialchars($error); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <input 
                        class="form-control" 
                        type="file" 
                        id="csv_file" 
                        name="csv_file" 
                        accept=".csv" 
                        required
                    >
                </div>
                <button type="submit" class="btn btn-primary">
                    Upload CSV
                </button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-light">
            <h5 class="mb-0">Validate VAR number</h5>
        </div>
        <div class="card-body">
            <?php if (isset($single) && !empty($single)): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> <?php echo htmlspecialchars($single); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <form action="single.php" method="POST">
                <div class="mb-3">
                    <input 
                        type="text" 
                        class="form-control" 
                        id="vat_number" 
                        name="vat_number" 
                        placeholder="E.g. IT23831234567"
                        required
                    >
                </div>
                <button type="submit" class="btn btn-primary">
                    Validate VAT
                </button>
            </form>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>