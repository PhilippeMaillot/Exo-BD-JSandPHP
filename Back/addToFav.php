<?php

/**
 * Ici on va gérer l'insertion de favoris dans la base de données.
 * Du front (en js avec une requete fetch en POST) on va récupérer les donnéesde l'arme qui doit être ajoutée aux favoris.
 * On va vérifier que les données sont bien présentes et qu'un utilisateur est connecté.
 * SI oui on va préparer une requête SQL pour insérer les données dans la base de données. en ajoutant bien le user_id qu'on récupère de la session.
 * Ensuite avc bindParam on va lier les données à la requête et on l'exécute.
 * Enfin on execute la requête.
 */
require_once "server.php";

$input = file_get_contents("php://input");
$data = json_decode($input, true);

if (isset($data['name']) && isset($data['type']) && isset($data['attack']) && isset($data['image']) && isset($_SESSION['user_id'])) {
    $weaponName = $data['name'];
    $weaponType = $data['type'];
    $weaponAttack = $data['attack'];
    $weaponImage = $data['image'];
    $userId = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO favorites (weapon_name, weapon_type, weapon_attack, weapon_image, id_user) 
                            VALUES (:weapon_name, :weapon_type, :weapon_attack, :weapon_image, :id_user)");

    $stmt->bindParam(':weapon_name', $weaponName);
    $stmt->bindParam(':weapon_type', $weaponType);
    $stmt->bindParam(':weapon_attack', $weaponAttack);
    $stmt->bindParam(':weapon_image', $weaponImage);
    $stmt->bindParam(':id_user', $userId);
    $stmt->execute();
}