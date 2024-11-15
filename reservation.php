<?php
include 'includes/header.php';
include 'functionPHP.php';



// Récupérer les séances disponibles
function getAvailableSeances()
{
    $dbh = connectDB();
    $sql = "SELECT seance.idseance, film.titre, seance.heureDebut, seance.heureFin 
            FROM seance
            INNER JOIN film ON seance.id_film = film.idfilm";
    $sth = $dbh->prepare($sql);
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

$seances = getAvailableSeances();

// Gestion du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['seance_id'])) {
    $seanceId = $_POST['seance_id'];

    // Enregistrement de la réservation
    $dbh = connectDB();
    $sql = "INSERT INTO reservation (ID_user, ID_seance) VALUES (:id_user, :id_seance)";
    $sth = $dbh->prepare($sql);
    $sth->bindParam(':id_user', $userLogged['idutilisateur']);
    $sth->bindParam(':id_seance', $seanceId);

    if ($sth->execute()) {
        echo "<p>Réservation réussie pour la séance ID : $seanceId</p>";
    } else {
        echo "<p>Une erreur est survenue lors de la réservation.</p>";
    }
}
?>

<div class="container">
    <h1>Réservation de séance</h1>
    <form action="reservation.php" method="POST">
        <div class="form-group">
            <label for="seance_id">Choisissez une séance :</label>
            <select name="seance_id" id="seance_id" class="form-control" required>
                <option value="">-- Sélectionnez une séance --</option>
                <?php foreach ($seances as $seance) : ?>
                    <option value="<?php echo $seance['idseance']; ?>">
                        <?php echo "{$seance['titre']} - De {$seance['heureDebut']} à {$seance['heureFin']}"; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Réserver</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
