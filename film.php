<?php
include 'includes/header.php';
include 'functionPHP.php';

// Tableau des films (similaire à celui de index.php)


// Vérifier si l'ID est passé dans l'URL
?>
<div class="film-detail">
    <?php
    if (!isset($_GET['id']) && !is_numeric($_GET['id'])) {
        echo "<p>Le film demandé n'existe pas</p>";
    } else {
        $selectedMovie = selectedMovie($_GET['id']);

        if ($selectedMovie) { ?>
            <h1><?php echo htmlspecialchars($selectedMovie['titre']); ?></h1>
            <img src="images/<?php echo htmlspecialchars($selectedMovie['picture']); ?>" alt="
    <?php echo htmlspecialchars($selectedMovie['titre']); ?>">
            <p><?php echo htmlspecialchars($selectedMovie['description']); ?></p>
            <p><strong>Durée:</strong> <?php echo htmlspecialchars($selectedMovie['duree']); ?> min</p>
    <?php } else {
            echo "<p>Le film demandé n'existe pas</p>";
        }
    }
    ?>
</div>


<?php include 'includes/footer.php'; ?>