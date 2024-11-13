<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['mot_de_passe'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php");
    } else {
        $error = "Identifiants incorrects";
    }
}
?>

<form action="login.php" method="POST">
    <h2>Connexion</h2>
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Mot de passe:</label>
    <input type="password" name="password" required>
    <button type="submit">Se connecter</button>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
</form>
