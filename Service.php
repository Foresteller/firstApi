<?php

$url = 'https://api.opendota.com/api/heroes';
$response = file_get_contents($url);
$data = json_decode($response, true);

$host = 'db';
$db   = 'dota_heroes';
$user = 'root';
$pass = 'root';
$dsn = "mysql:host=$host;dbname=$db";

try {
    $pdo = new PDO($dsn, $user, $pass);

    $pdo->exec("CREATE TABLE IF NOT EXISTS heroes (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    localized_name VARCHAR(255) NOT NULL,
    primary_attr VARCHAR(255) NOT NULL,
    attack_type VARCHAR(255) NOT NULL,
    legs VARCHAR(255) NOT NULL)");

    $stmt = $pdo->prepare("INSERT INTO heroes (localized_name, primary_attr, attack_type,legs)
        VALUES (?, ?, ?, ?)");
    foreach ($data as $heroes) {
        $stmt->execute([
            $heroes['localized_name'],
            $heroes['primary_attr'],
            $heroes['attack_type'],
            $heroes['legs']]);
    }
    $stmt = $pdo -> query("SELECT * FROM heroes");
    $heroes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $heroes;
} catch (PDOException $e) {
    echo $e->getMessage();
}