<?php
require '../controllers/inscriptionController.php';
$controller = new controllers\inscriptionController();
$controller->inscription();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription</title>
  <link rel="stylesheet" href="../CSS/inscription.css">
</head>
<body>
<div class="background">
  <div class="signup-container">
    <h1>Inscription</h1>
    <a href="#" class="back-link">Retour</a>
      <form action="inscription.php" method="POST">
          <div class="form-group">
              <label for="name">Nom</label>
              <input type="text" id="name" name="name" placeholder="Votre nom" required>
          </div>
          <div class="form-group">
              <label for="email">Adresse mail</label>
              <input type="email" id="email" name="email" placeholder="Votre adresse mail" required>
          </div>
          <div class="form-group">
              <label for="password">Mot de passe</label>
              <input type="password" id="password" name="password" placeholder="Créez un mot de passe" required>
          </div>
          <div class="form-group">
              <label for="confirm-password">Vérification du mot de passe</label>
              <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirmez le mot de passe" required>
          </div>
          <div class="form-group">
              <label for="group">Choisir un groupe</label>
              <select id="group" name="group" required>
                  <option value="" disabled selected>Choisissez votre groupe</option>
                  <option value="tp A">Groupe A</option>
                  <option value="tp B">Groupe B</option>
                  <option value="tp C">Groupe C</option>
                  <option value="tp D">Groupe D</option>
              </select>
          </div>
          <button type="submit" class="btn-signup">S'inscrire</button>
      </form>
  </div>
</div>
</body>
</html>
