<?php
require_once("env.php");

$appName = $_ENV['APP_NAME'] ?? getenv('APP_NAME');
$dbHost = $_ENV['DB_HOST'] ?? getenv('DB_HOST');
$dbName = $_ENV['DB_NAME'] ?? getenv('DB_NAME');
$dbUser = $_ENV['DB_USER'] ?? getenv('DB_USER');
$dbPassword = $_ENV['DB_PASSWORD'] ?? getenv('DB_PASSWORD');
