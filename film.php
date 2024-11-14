<?php
include 'includes/header.php';
include 'functionPHP.php';

// Tableau des films (similaire à celui de index.php)
$touslesfilms = listMovies();

// Vérifier si l'ID est passé dans l'URL
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'] - 1; // -1 pour s'aligner sur l'index du tableau (index commence à 0)

    // Vérifier que l'ID est valide
    if ($id >= 0 && $id < count($touslesfilms)) {
        $film = $touslesfilms[$id];
    } else {
        echo "<p>Film non trouvé.</p>";
        exit;
    }
} else {
    echo "<p>Aucun film sélectionné.</p>";
    exit;
}
?>

<!-- Affichage des détails du film -->
<div class="film-detail">
    <h1><?php echo htmlspecialchars($film['titre']); ?></h1>
    <img src="images/<?php echo htmlspecialchars($film['picture']); ?>" alt="<?php echo htmlspecialchars($film['titre']); ?>">
    <p><?php echo htmlspecialchars($film['description']); ?></p>
    <p><strong>Durée:</strong> <?php echo htmlspecialchars($film['duree']); ?> min</p>
</div>

<?php include 'includes/footer.php'; ?>