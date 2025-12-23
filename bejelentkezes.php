<?php
require 'kapcsolat.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST['email']);
    $jelszo = $_POST['jelszo'];

    if (!$email || !$jelszo) {
        die("Minden mező kitöltése kötelező!");
    }

    $stmt = $pdo->prepare("
        SELECT id, jelszo, szerepkor
        FROM felhasznalok
        WHERE email = ?
    ");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user || !password_verify($jelszo, $user['jelszo'])) {
        die("Hibás email vagy jelszó!");
    }

    // SESSION – EGYSÉGES NÉV!
    $_SESSION['felhasznalo_id'] = $user['id'];
    $_SESSION['szerepkor'] = $user['szerepkor'];

    header("Location: profilom.html");
    exit;
}
