<?php

require_once "jogosultsag.php";
require_once "kapcsolat.php";

$csoportNev = trim($_POST['csoport_nev'] ?? '');
$tipus = trim($_POST['tipus'] ?? '');
$leiras = substr($_POST['leiras'] ?? '', 0, 100);
$emoji = $_POST['emoji'] ?? '📘';
$hatterszin = $_POST['hatterszin'] ?? '#34a853';

$stmt = $pdo->prepare("
    INSERT INTO csoportok (user_id, csoport_nev, tipus, leiras, emoji, hatterszin)
    VALUES (?, ?, ?, ?, ?, ?)
");

$stmt->execute([
    $_SESSION['felhasznalo_id'],
    $csoportNev,
    $tipus,
    $leiras,
    $emoji,
    $hatterszin
]);
