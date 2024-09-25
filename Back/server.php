<?php
require_once "env.php";

session_start();

/**
 * Le premier bloc permet de récuperer les données du env.php (ou sont stockés les variables d'environnement) et de les stocker dans des variables.
 * Avec ces variables on peut va créer un dsn (Data Source Name) qui est une chaîne de connexion à la base de données.
 * puis avec PDO on va se connecter à la base de données.
 */

$dbPort = $_ENV['DB_PORT'] ?? getenv('DB_PORT');
$dbHost = $_ENV['DB_HOST'] ?? getenv('DB_HOST');
$dbName = $_ENV['DB_NAME'] ?? getenv('DB_NAME');
$dbUser = $_ENV['DB_USER'] ?? getenv('DB_USER');
$dbPassword = $_ENV['DB_PASSWORD'] ?? getenv('DB_PASSWORD');

$dsn = "mysql:host=$dbHost;port=$dbPort;dbname=$dbName;charset=utf8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur lors de la connexion à la base de données : " . $e->getMessage();
    exit;
}
