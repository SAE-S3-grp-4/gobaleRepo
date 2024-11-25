<?php
require '../controllers/connexionController.php';
$controller = new controllers\connexionController();
$controller->login();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../CSS/connexion.css">
</head>
<body>
<div class="background">
    <div class="login-container">
        <h1>Connexion</h1>
        <a href="#" class="back-link">Retour</a>
        <form action="connexion.php" method="POST">
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" placeholder="Adresse mail ou identifiant" required>
                <a href="#" class="forgot-link">Adresse mail oubliée ?</a>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>
                <a href="#" class="forgot-link">Mot de passe oublié ?</a>
            </div>
            <?php if (!empty($controller->errorMessage)): ?>
                <div class="error-message"><?php echo $controller->errorMessage; ?></div>
            <?php endif; ?>
            <button type="submit" class="btn-login">Se connecter</button>
        </form>
        <div class="register-link">
            <a href="#">Pas encore de compte ? Inscrivez-vous !</a>
        </div>
    </div>
</div>
</body>
</html>