<?php
include 'includes/header.php';
include 'functionPHP.php';
?>

<head>
    <!-- <script> Script à corriger
        document.addEventListener("DOMContentLoaded", function() {
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
    </script> -->

</head>

<h2>Bienvenue sur<h2>
        <h1>AlloDonkeyCine !</h1>

        <h2>Les films</h2>

        <div class="films-grid">
            <?php
            //Récupére la liste des films de la base de donnée
            $films = listMovies();
            foreach ($films as $film) {
                echo "<div class='film-item'>";
                echo "<a href='film.php?id={$film['idfilm']}'>";
                echo "<img src='images/{$film['picture']}' alt='{$film['titre']}'>";
                echo "<h3>{$film['titre']}</h3>";
                echo "</a>";
                echo "<p>{$film['description']}</p>";
                echo "<p><strong>Durée:</strong> {$film['duree']} min</p>";
                echo "</div>";
            }
            ?>
        </div>


        <h2>Films disponibles en salle</h2>
        <div class="films-grid">
            <?php
            //Récupére la liste des films actuellement diffusés
            $filmsEnSalle = currentMovies();
            foreach ($filmsEnSalle as $film) {
                echo "<div class='film-item'>";
                echo "<a href='film.php?id={$film['idfilm']}'>"; // Lien vers la page du film avec l'id unique
                echo "<img src='images/{$film['picture']}' alt='{$film['titre']}'>";
                echo "<h3>{$film['titre']}</h3>";
                echo "</a>";
                echo "<p>{$film['description']}</p>";
                echo "<p><strong>Durée:</strong> {$film['duree']} min</p>";
                echo "<p>
        <form action='reservation.php' method='post'>
         <button 'type ='submit' formaction='reservation.php' name='idFilmReservation' value={$film['idfilm']} formmethod ='post' 
         >Reserver</button></form></p></div>";
            }
            ?>
        </div>


        <?php include 'includes/footer.php'; ?>