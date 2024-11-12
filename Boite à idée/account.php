<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include 'includes/header.php';
?>

<h1>Mon Compte</h1>
<a href="logout.php">Se déconnecter</a>

<?php include 'includes/footer.php'; ?>
