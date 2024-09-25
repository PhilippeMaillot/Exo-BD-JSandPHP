<?php
require_once "server.php";

/**
 * Ici on récupère l'id de l'arme à supprimer des favoris. (qui a été envoyé depuis le front en js).
 * Puis on vérifie si l'id est bien présent.
 * si oui on prépare une requête SQL pour supprimer l'arme des favoris.
 * puis avec bindParam on lie l'id à la requête.
 * puis on l'execute.
 * Enfin on renvoie un message de succès ou d'erreur. 
 */
$input = file_get_contents("php://input");
$data = json_decode($input, true);

if (isset($data['id'])) {
    $weaponId = $data['id'];
    $stmt = $pdo->prepare("DELETE FROM favorites WHERE id = :id");
    $stmt->bindParam(':id', $weaponId, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Erreur lors de la suppression']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'ID non fourni']);
}
