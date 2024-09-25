<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./scripts/script.js" defer></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <title>Monster Hunter World</title>
    <?php session_start() ?>
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
                <li><a href="signup.php">Inscription</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<body>
    <?php if (isset($_SESSION['username'])): ?>
        <p>Bonjour, <?= htmlspecialchars($_SESSION['username']); ?>!</p>
    <?php endif; ?>

    <h1>Monster Hunter World - Armes</h1>
    <input type="text" id="search" placeholder="Chercher une arme">
    <button id="search-button">Rechercher</button>
    <div id="loading" style="text-align: center; margin-top: 100px">Chargement en cours...</div>
    <div id="pagination"></div>
    <div id="weapons-list"></div>
</body>

</html>

<!-- HTML de la page d'accueil qui affiche grace aux données de la séssion le nom d'utilisateur -->