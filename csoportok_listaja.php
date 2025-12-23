<?php

require_once "jogosultsag.php";
require_once "kapcsolat.php";

$userId = $_SESSION['felhasznalo_id'];

$stmt = $pdo->prepare("
    SELECT csoport_nev, tipus, leiras, emoji, hatterszin
    FROM csoportok
    WHERE user_id = ?
");
$stmt->execute([$userId]);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
