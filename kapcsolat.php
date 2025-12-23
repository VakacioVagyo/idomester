<?php
$host = "localhost";
$db   = "idomester";
$user = "root";
$pass = "";

try {
$pdo = new PDO(
    "mysql:host=localhost;dbname=idomester;charset=utf8mb4",
    "root",
    "",
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
    ]
);

} catch (PDOException $e) {
    die("Adatbázis hiba!");
}
