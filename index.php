<?php
include 'includes/header.php';
include 'includes/db.php';
?>

<?php
$films = [
    [
        "titre" => "Ip man",
        "description" => "Un film d'art martial passionnant.",
        "duree" => 120,
        "image_url" => "ip_man.jpg",
        "lien" => "film.php?id=1"
    ],
    [
        "titre" => "Platoon",
        "description" => "Le film sur la guerre d'Indochinne qui à marqué les esprits.",
        "duree" => 95,
        "image_url" => "platoon.jpg",
        "lien" => "film.php?id=2"
    ],
    [
        "titre" => "Jujutsu Kaizen 0",
        "description" => "Là où tout a commencé dans le lore de Jujutsu Kaisen.",
        "duree" => 110,
        "image_url" => "Jujutsu_kaisen_zero.jpg",
        "lien" => "film.php?id=3"
    ],
    [
        "titre" => "Spider Man",
        "description" => "En tout cas mon Spider Man préféré.",
        "duree" => 100,
        "image_url" => "spiderman.jpg",
        "lien" => "film.php?id=4"
    ]
];
?>



<head>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let currentIndex = 0;
            const slides = document.querySelectorAll(".slide");
            const totalSlides = slides.length;

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.style.display = i === index ? "block" : "none";
                });
            }

            function nextSlide() {
                currentIndex = (currentIndex + 1) % totalSlides;
                showSlide(currentIndex);
            }

            // Affiche le premier slide et démarre le défilement automatique toutes les 3 secondes
            showSlide(currentIndex);
            setInterval(nextSlide, 3000);
        });
    </script>

</head>





<h1>Bienvenue sur Cinéma Réservation</h1>

<h1>Nos films</h1>

<div class="films-grid">
    <?php
    foreach ($films as $film) {
        echo "<div class='film-item'>";
        echo "<a href='{$film['lien']}'>";
        echo "<img src='images/{$film['image_url']}' alt='{$film['titre']}'>";
        echo "<h3>{$film['titre']}</h3>";
        echo "</a>";
        echo "<p>{$film['description']}</p>";
        echo "<p><strong>Durée:</strong> {$film['duree']} min</p>";
        echo "</div>";
    }
    ?>
</div>

<?php
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
?>


<h2>Films disponibles</h2>
<div class="films-grid">
    <?php
    foreach ($films_mosaique as $index => $film) {
        echo "<div class='film-item'>";
        echo "<a href='film.php?id=" . ($index + 1) . "'>"; // Lien vers la page du film avec l'id unique
        echo "<img src='images/{$film['image_url']}' alt='{$film['titre']}'>";
        echo "<h3>{$film['titre']}</h3>";
        echo "</a>";
        echo "<p>{$film['description']}</p>";
        echo "<p><strong>Durée:</strong> {$film['duree']} min</p>";
        echo "</div>";
    }
    ?>
</div>


<?php include 'includes/footer.php'; ?>