<?php
require '../controllers/gestionEventController.php';
$controller = new controllers\gestionEventController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $controller->deleteEvent($id);
    } else {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $date = $_POST['date'];
        $price = $_POST['price'];
        $places = $_POST['places'];
        $end_date = $_POST['end_date'];
        $controller->createEvent($title, $description, $date, $price, $places, $end_date);
    }
}

$events = $controller->getEvents();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des événements</title>
    <link rel="stylesheet" href="../CSS/gestionEvent.css">
</head>
<body>
<div class="main-content">
    <!-- Header -->
    <header>
        <h1 class="title">Panel <span class="highlight">Administrateur</span></h1>
        <h2>Gestion des <span class="highlight-secondary">événements</span></h2>
    </header>

    <!-- Formulaire de création d'événement -->
    <section class="event-creation">
        <form action="gestionEvent.php" method="POST" class="event-form">
            <h3>Créer un événement</h3>
            <div class="form-group">
                <label for="event-title">Titre :</label>
                <input type="text" id="event-title" name="title" placeholder="Titre de l'événement" required>
            </div>
            <div class="form-group">
                <label for="event-description">Description :</label>
                <textarea id="event-description" name="description" placeholder="Description de l'événement" required></textarea>
            </div>
            <div class="form-inline">
                <div class="form-group">
                    <label for="event-date">Date :</label>
                    <input type="datetime-local" id="event-date" name="date" required>
                </div>
                <div class="form-group">
                    <label for="event-price">Prix (€) :</label>
                    <input type="number" id="event-price" name="price" placeholder="Prix" min="0" required>
                </div>
            </div>
            <div class="form-group">
                <label for="event-places">Nombre de places :</label>
                <input type="number" id="event-places" name="places" placeholder="Nombre de places" min="0" required>
            </div>
            <div class="form-group">
                <label for="event-end-date">Date de fin d'inscription :</label>
                <input type="datetime-local" id="event-end-date" name="end_date" required>
            </div>
            <button type="submit" class="btn-create">Créer</button>
        </form>
    </section>

    <!-- Liste des événements déjà créés -->
    <section class="event-list">
        <?php foreach ($events as $event): ?>
            <div class="event-card">
                <h3><?php echo htmlspecialchars($event['Nom_Event']); ?></h3>
                <p><?php echo htmlspecialchars($event['Description_Event']); ?></p>
                <div class="event-details">
                    <span>Date: <?php echo htmlspecialchars($event['Date_Event']); ?></span>
                    <span>Prix: <?php echo htmlspecialchars($event['Prix_Event']); ?>€</span>
                    <span>Places: <?php echo htmlspecialchars($event['Nb_Place_Event']); ?></span>
                    <span>Fin d'inscription: <?php echo htmlspecialchars($event['Date_Fin_Inscription']); ?></span>
                </div>
                <div class="event-actions">
                    <form action="gestionEvent.php" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $event['Id_Event']; ?>">
                        <button type="submit" name="delete" class="btn-delete">Supprimer</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</div>
</body>
</html>