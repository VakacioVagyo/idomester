<?php
require 'kapcsolat.php';
session_start();

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

    // Session
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['szerepkor'] = $user['szerepkor'];

    header("Location: fiokom.html");
    exit;
}
