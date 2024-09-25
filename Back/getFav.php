<?php
require_once "server.php";

$stmt = $pdo->query("SELECT * FROM favorites WHERE id_user = " . $_SESSION['user_id']);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$favorites = $stmt->fetchAll();

/* Récupération des favoris du user grâce à son ID puis on les enregristre dans $favorites qu'on va récuperer dans fav.php */