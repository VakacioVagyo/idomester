<?php
require 'kapcsolat.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(["hiba" => "Nincs bejelentkezve"]);
    exit;
}

$userId = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT nev FROM felhasznalok WHERE id = ?");
$stmt->execute([$userId]);
$nev = $stmt->fetchColumn();

echo json_encode([
    "nev" => $nev
]);
