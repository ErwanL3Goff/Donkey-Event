<?php
include 'includes/header.php';

// Tableau des films (similaire à celui de index.php)
$films_mosaique = [
    [
        "titre" => "Princesse Mononoke",
        "description" => "Princesse Mononoké est un film d'animation historique et de fantasy japonais de Hayao Miyazaki, sorti le 12 juillet 1997 et produit par le studio Ghibli.",
        "duree" => 148,
        "image_url" => "princesse_mononoke.jpg",
        "lien" => "film.php?id=1"
    ],
    [
        "titre" => "Shrek",
        "description" => "Shrek est un film d'animation américain en images de synthèse réalisé par Andrew Adamson et Vicky Jenson et sorti en 2001.",
        "duree" => 201,
        "image_url" => "shrek.jpg",
        "lien" => "film.php?id=2"
    ],
    [
        "titre" => "Troie",
        "description" => "Troie est un film américain réalisé par Wolfgang Petersen et sorti en 2004. Il s'agit d'une adaptation libre et romancée des poèmes épiques du cycle troyen, singulièrement de l'Iliade d'Homère.",
        "duree" => 169,
        "image_url" => "troie.jpg",
        "lien" => "film.php?id=3"
    ],
    [
        "titre" => "Dragon Ball Z L'Attaque du Dragon",
        "description" => "Un des seuls OAV Dragon Ball regardé entièrement.",
        "duree" => 128,
        "image_url" => "Dragon-Ball-Z-movie-attaque_du_dragon.jpg",
        "lien" => "film.php?id=4"
    ],
    [
        "titre" => "Equilibrium",
        "description" => "Equilibrium is a 2002 American science fiction film written and directed by Kurt Wimmer, and starring Christian Bale, Emily Watson, and Taye Diggs.",
        "duree" => 132,
        "image_url" => "equilibrium.jpg",
        "lien" => "film.php?id=5"
    ]
];

// Vérifier si l'ID est passé dans l'URL
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'] - 1; // -1 pour s'aligner sur l'index du tableau (index commence à 0)
    
    // Vérifier que l'ID est valide
    if ($id >= 0 && $id < count($films_mosaique)) {
        $film = $films_mosaique[$id];
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
    <img src="images/<?php echo htmlspecialchars($film['image_url']); ?>" alt="<?php echo htmlspecialchars($film['titre']); ?>">
    <p><?php echo htmlspecialchars($film['description']); ?></p>
    <p><strong>Durée:</strong> <?php echo htmlspecialchars($film['duree']); ?> min</p>
</div>

<?php include 'includes/footer.php'; ?>
