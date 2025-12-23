<?php
require 'kapcsolat.php';

header('Content-Type: application/json; charset=utf-8');

$stmt = $pdo->query("SELECT id, nev, email FROM felhasznalok WHERE szerepkor='felhasznalo'");
$adatok = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($adatok, JSON_UNESCAPED_UNICODE);
?>
