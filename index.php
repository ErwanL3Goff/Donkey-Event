<?php include 'includes/header.php'; include 'includes/db.php'; ?>

<h1>Films disponibles</h1>
<div class="films-container">
    <?php
    $stmt = $pdo->query("SELECT * FROM films");
    while ($film = $stmt->fetch()) {
        echo "<div class='film'>";
        echo "<img src='images/{$film['image_url']}' alt='{$film['titre']}'>";
        echo "<h2><a href='film.php?id={$film['id']}'>{$film['titre']}</a></h2>";
        echo "<p>{$film['description']}</p>";
        echo "</div>";
    }
    ?>
</div>

<?php include 'includes/footer.php'; ?>
