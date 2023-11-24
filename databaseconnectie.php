<?php
$host = 'localhost';
$db   = 'test';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Connected to database ($db).";


    $createDatabaseQuery = "CREATE DATABASE IF NOT EXISTS Winkel";
    $pdo->exec($createDatabaseQuery);


    $pdo->exec("USE Winkel");

    $createTableQuery = "
        CREATE TABLE IF NOT EXISTS Producten (
            product_code INT PRIMARY KEY,
            product_naam VARCHAR(255),
            prijs_per_stuk DECIMAL(10, 2),
            omschrijving TEXT
        )
    ";
    $pdo->exec($createTableQuery);

    echo "Table 'Producten' created in 'Winkel' database.";
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
