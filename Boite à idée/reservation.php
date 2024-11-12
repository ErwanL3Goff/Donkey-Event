<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include 'includes/header.php';
include 'includes/db.php';

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("
    SELECT films.titre, films.image_url, sessions.date_heure, reservations.places_reservees 
    FROM reservations 
    JOIN sessions ON reservations.session_id = sessions.id
    JOIN films ON sessions.film_id = films.id
    WHERE reservations.utilisateur_id = :user_id
");
$stmt->execute(['user_id' => $user_id]);

?>

<h1>Mes Réservations</h1>
<div class="reservations-container">
    <?php while ($reservation = $stmt->fetch()) { ?>
        <div class="reservation">
            <h2><?php echo $reservation['titre']; ?></h2>
            <p>Date : <?php echo $reservation['date_heure']; ?></p>
            <p>Places réservées : <?php echo $reservation['places_reservees']; ?></p>
        </div>
    <?php } ?>
</div>

<?php include 'includes/footer.php'; ?>
