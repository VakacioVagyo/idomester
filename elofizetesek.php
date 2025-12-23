<?php
require 'kapcsolat.php';
session_start();

/* 1️⃣ BEJELENTKEZÉS ELLENŐRZÉS */
if (!isset($_SESSION['user_id'])) {
    header("Location: bejelentkezes.html");
    exit;
}

/* 2️⃣ CSOMAG ELLENŐRZÉS */
if (!isset($_GET['csomag'])) {
    die("Nincs kiválasztott előfizetési csomag.");
}

$csomag = $_GET['csomag'];

/* 3️⃣ ENGEDÉLYEZETT CSOMAGOK */
$engedelyezett = ['ingyenes', 'alap', 'premium'];

if (!in_array($csomag, $engedelyezett)) {
    die("Érvénytelen előfizetési csomag.");
}

/*
  4️⃣ IDE JÖN MAJD AZ OTP FIZETÉS
  --------------------------------
  - összeg meghatározása
  - tranzakció indítása
  - visszatérési URL-ek
*/

/* 5️⃣ IDEIGLENES VISSZAJELZÉS */
?>
<!DOCTYPE html>
<html lang="hu">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Előfizetés indítása – IdőMester</title>

<style>
body {
    font-family: "Segoe UI", Tahoma, sans-serif;
    background: linear-gradient(135deg, #e6f2ff, #ffffff);
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.box {
    background: white;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
    text-align: center;
    max-width: 400px;
}

h1 {
    color: #0077cc;
    margin-bottom: 15px;
}

p {
    margin-bottom: 20px;
    color: #444;
}

a {
    display: inline-block;
    padding: 10px 18px;
    background: #0077cc;
    color: white;
    border-radius: 25px;
    text-decoration: none;
    font-weight: bold;
}
</style>
</head>
<body>

<div class="box">
    <h1>Előfizetés indítása</h1>
    <p>
        A(z) <b><?= htmlspecialchars($csomag) ?></b> csomagot választottad.
    </p>

    <p>
        A bankkártyás fizetés hamarosan elérhető.
    </p>

    <a href="elofizetesek.html">Vissza az előfizetésekhez</a>
</div>

</body>
</html>
