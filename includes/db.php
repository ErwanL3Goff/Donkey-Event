<?php

$host="localhost";
$username="root";
$password= "KurosakiDante296";
$dbname= "cinema_reservation";

try {
    $pdo = new PDO("mysql:host=localhost;dbname=cinema_reservation", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
