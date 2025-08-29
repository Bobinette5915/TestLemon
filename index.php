<?php
include 'main.php';

$results = [];
if (!empty($_GET['q'])) {
    $results = searchMovie($_GET['q']);
    logSearch($_GET['q']);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recherche de films 🎬</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* fond clair */
        }
        .card-title {
            font-weight: 600;
        }
        .card-text {
            font-size: 0.9rem;
        }
        .navbar .btn {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm mb-5">
    <div class="container">
        <!-- Titre à gauche -->
        <a class="navbar-brand fw-bold" href="index.php">🎬 CinéFinder</a>

        <!-- Bouton historique à droite -->
        <div class="ms-auto">
            <a href="log.php" class="btn btn-outline-secondary">📜 Historique</a>
        </div>
    </div>
</nav>

<div class="container">

    <!-- Formulaire -->
    <div class="row mb-5">
        <div class="col-md-8 offset-md-2">
            <form method="get" class="input-group input-group-lg shadow-lm">
                <input type="text" name="q" class="form-control" placeholder="Rechercher un film..." value="<?= htmlspecialchars($_GET['q'] ?? '') ?>" required>
                <button type="submit" class="btn btn-primary">🔍</button>
            </form>
        </div>
    </div>

    <!-- Résultats -->
    <?php if (!empty($results['results'])): ?>
        <div class="row">
            <?php foreach ($results['results'] as $movie): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <?php if (!empty($movie['poster_path'])): ?>
                            <img src="https://image.tmdb.org/t/p/w500<?= $movie['poster_path'] ?>" class="card-img-top" alt="<?= htmlspecialchars($movie['title']) ?>">
                        <?php else: ?>
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height:300px;">
                                <span>📽️ Pas d'affiche</span>
                            </div>
                        <?php endif; ?>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= htmlspecialchars($movie['title']) ?> (<?= substr($movie['release_date'] ?? 'N/A', 0, 4) ?>)</h5>
                            <p class="card-text text-muted small flex-grow-1"><?= htmlspecialchars($movie['overview'] ?: "Pas de synopsis disponible") ?></p>
                            <a href="#" class="btn btn-outline-primary btn-sm mt-auto">Détails</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <?php elseif (!empty($_GET['q'])): ?>
        <div class="alert alert-warning text-center shadow-sm">Aucun résultat trouvé pour "<strong><?= htmlspecialchars($_GET['q']) ?></strong>"</div>
    <?php endif; ?>

</div>

</body>
</html>
