<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$film_id = $_GET['film_id'];
$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("INSERT INTO reservations (session_id, utilisateur_id, places_reservees) VALUES (:session_id, :utilisateur_id, 1)");
$stmt->execute([
    'session_id' => $film_id,
    'utilisateur_id' => $user_id
]);

header("Location: reservations.php");
