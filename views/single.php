<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VAT Validator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">

	<div class="container mt-5" style="max-width: 600px;">
	<h5 class="mb-4">Single VAT Check</h5>

	<?php if ($result['status'] === 'valid'): ?>
		<div class="alert alert-success">
		<strong>✔️ Valid</strong><br>
		<span><?= htmlspecialchars($result['original']) ?></span>
		</div>

	<?php elseif ($result['status'] === 'corrected'): ?>
		<div class="alert alert-warning">
		<strong>✅ Corrected</strong><br>
		<span><?= htmlspecialchars($result['normalized']) ?></span><br>
		<small class="text-muted"><?= htmlspecialchars($result['notes']) ?></small>
		</div>

	<?php else: ?>
		<div class="alert alert-danger">
		<strong>❌ Invalid</strong><br>
		<span><?= htmlspecialchars($result['original']) ?></span><br>
		<small><?= htmlspecialchars($result['notes']) ?></small>
		</div>
	<?php endif; ?>

	<a href="index.php" class="btn btn-outline-secondary btn-sm mt-2">← Back</a>
	</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>