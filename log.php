<?php
$config = include __DIR__ . '/config.php';
$logFile = $config['log_file'];
$lines = file_exists($logFile) ? file($logFile, FILE_IGNORE_NEW_LINES) : [];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Historique des recherches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
<h1 class="mb-4">Historique des recherches</h1>

<?php if (!empty($lines)): ?>
    <ul class="list-group">
        <?php foreach (array_reverse($lines) as $line): ?>
            <li class="list-group-item"><?= htmlspecialchars($line) ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <div class="alert alert-info">Aucune recherche enregistrée pour le moment.</div>
<?php endif; ?>

<p class="mt-4">
    <a href="index.php" class="btn btn-primary">Retour</a>
</p>
</body>
</html>
