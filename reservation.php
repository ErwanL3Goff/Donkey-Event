<?php 
include 'includes/header.php';
/*include 'functionPHP.php';*/
?>

<div class="reservation-page">
    <h1>Réserver une Séance de Film</h1>
    <form method="post" class="reservation-form">
        <label for="session_id">Sélectionnez une séance :</label>
        <select name="session_id" id="session_id" required>
            <?php foreach ($sessions as $session) : ?>
                <option value="<?php echo $session['id']; ?>">
                    <?php echo htmlspecialchars($session['titre']) . ' - ' . date('d/m/Y H:i', strtotime($session['date_heure'])) . ' - Salle ' . htmlspecialchars($session['salle']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit" class="btn-reserve">Réserver</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
