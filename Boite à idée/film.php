<?php
include 'includes/header.php';
include 'includes/db.php';

$film_id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM films WHERE id = :id");
$stmt->execute(['id' => $film_id]);
$film = $stmt->fetch();
?>

<h1><?php echo $film['titre']; ?></h1>
<img src="images/<?php echo $film['image_url']; ?>" alt="<?php echo $film['titre']; ?>">
<p><?php echo $film['description']; ?></p>
<a href="add_reservation.php?film_id=<?php echo $film_id; ?>">Ajouter à la liste de réservation</a>

<?php include 'includes/footer.php'; ?>
