<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'kapcsolat.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nev = trim($_POST['nev'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $jelszo = $_POST['jelszo'] ?? '';
    $jelszo2 = $_POST['jelszo2'] ?? '';
    $szerepkor = $_POST['szerepkor'] ?? '';

    if (!$nev || !$email || !$jelszo || !$szerepkor) {
        die("Minden mező kitöltése kötelező!");
    }

    if ($jelszo !== $jelszo2) {
        die("A két jelszó nem egyezik!");
    }

    $stmt = $pdo->prepare("SELECT id FROM felhasznalok WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        die("Ez az email már regisztrálva van!");
    }

    $hash = password_hash($jelszo, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare(
        "INSERT INTO felhasznalok (nev, email, jelszo, szerepkor)
         VALUES (?, ?, ?, ?)"
    );
    $stmt->execute([$nev, $email, $hash, $szerepkor]);

    header("Location: bejelentkezes.html");
    exit;
}
