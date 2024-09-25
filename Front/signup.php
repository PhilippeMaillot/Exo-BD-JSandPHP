<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/signup.css">
    <title>Monster Hunter World - Inscription</title>
</head>

<body>
    <form action="../Back/signup_process.php" method="post">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" required>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Créer mon compte</button>
        <a href="login.php">Se connecter</a>
    </form>
</body>

</html>

<!-- Simple formulaire de création de compte qui POST le formulaire à "signup_process.php" -->