<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favoris</title>
    <link rel="stylesheet" href="./css/fav.css">
    <link rel="stylesheet" href="./css/header.css">
    <script src="./scripts/fav.js" defer></script>
    <?php require_once "../Back/server.php"; ?>
    <?php require_once "../Back/getFav.php"; ?>
</head>
<header>
    <nav>
        <ul>
            <?php if (isset($_SESSION['username'])): ?>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="fav.php">Favoris</a></li>
                <li><a href="logout.php">Déconnexion</a></li>
            <?php else: ?>
                <li><a href="login.php">Connexion</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<body>
    <h1>Mes Favoris</h1>
    <div class="favorites-container">
        <?php
        foreach ($favorites as $favorite) {
            echo "<div class='favorite'>";
            echo "<img src='" . htmlspecialchars($favorite['weapon_image']) . "' alt='Image de l'arme'>";
            echo "<div>";
            echo "<h2>" . htmlspecialchars($favorite['weapon_name']) . "</h2>";
            echo "<p>Type : " . htmlspecialchars($favorite['weapon_type']) . "</p>";
            echo "<p>Attaque : " . htmlspecialchars($favorite['weapon_attack']) . "</p>";
            echo "</div>";
            echo "<button class='delete-button' data-id='" . htmlspecialchars($favorite['id']) . "'>Supprimer</button>";
            echo "</div>";
        }
        ?>
    </div>
</body>

</html>

<!-- Page de favoris qui affiche les armes favorites de l'utilisateur avec un foreach des données récupérées du serveur -->