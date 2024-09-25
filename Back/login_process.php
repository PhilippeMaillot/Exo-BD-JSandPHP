<?php
require_once "server.php";

session_start();

/**
 * Dans ce If on verifie si un formulaire a été envoyé en POST puis on vérifie si les champs sont remplis.
 * On regarde en base de données si l'utilisateur existe.
 * Si oui on vérifie si le mot de passe correspond graçe à password_verify qui va vérifier le hash des deux mdp pour vérifier s'il correspondent.
 * Si oui on crée une session avec l'id et le pseudo de l'utilisateur et on le redirige vers l'accueil.
 * Sinon on echo l'erreur qui est survenue.
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $query = 'SELECT * FROM user WHERE pseudo = ?';
        $stmt = $pdo->prepare($query);
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user['mdp'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['pseudo'];

                header('Location: ../Front/index.php');
                exit();
            } else {
                echo '<p class="error">Mot de passe incorrect</p>';
            }
        } else {
            echo '<p class="error">Utilisateur inconnu</p>';
        }
    } else {
        echo '<p class="error">Veuillez remplir tous les champs</p>';
    }
} else {
    echo '<p class="error">Veuillez soumettre le formulaire</p>';
}
