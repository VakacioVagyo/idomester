<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (
    !isset($_SESSION['felhasznalo_id']) ||
    !isset($_SESSION['szerepkor']) ||
    $_SESSION['szerepkor'] !== 'vallalkozo'
) {
    die("Nincs jogosultság");
}
