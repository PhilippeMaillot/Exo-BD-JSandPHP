<?php

require_once "server.php";

/** 
 * Ici on récupère les données du formulaire de création de compte. 
 * On verifie qu'elle répond aux règles définis, c'est à dire que le pseudo doit contenir entre 3 et 20 caractères et le mot de passe au moins 12 caractères.
 * Puis on hash le mot de passe et on l'insère dans la base de données avec le pseudo.
 * On gère les erreurs avec PDO exeption.
 * */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $pseudo = trim($_POST['pseudo']);
        $password = trim($_POST['password']);

        $query = 'SELECT * FROM user WHERE pseudo = ?';
        $stmt = $pdo->prepare($query);
        $stmt->execute([$pseudo]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            echo 'Le pseudo est déjà utilisé';
        } else {
            if (strlen($pseudo) < 3 || strlen($pseudo) > 20) {
                echo 'Le pseudo doit contenir entre 3 et 20 caractères';
            } elseif (strlen($password) < 12) {
                echo 'Le mot de passe doit contenir au moins 12 caractères';
            } else {
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $query = 'INSERT INTO user (pseudo, mdp) VALUES (?, ?)';
                $stmt = $pdo->prepare($query);
                $stmt->execute([$pseudo, $hashedPassword]);

                header('Location: ../Front/login.php');
                exit();
            }
        }
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
}