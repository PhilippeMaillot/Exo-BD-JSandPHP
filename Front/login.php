<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Connexion</title>
</head>

<body>

    <form action="../Back/login_process.php" method="post">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" id="username" required>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Se connecter</button>
        <a href="signup.php">S'enregistrer</a>
    </form>

</body>

</html>

<!-- Simple formulaire de connexion qui POST le formulaire à "login_process.php" -->