<?php

/**
 * Liaison avec la base de données
 * On définit les nom de la BDD dans des variables.
 */
$servername = 'localhost';
$dbname = 'stock_multimedia';
$username = 'root';
$password = 'root';

try { // On essaie de se connecter a la base de donnees
    $conn = new PDO("mysql:host={$servername};dbname={$dbname}", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*
     * On définit le mode d'erreur grace a setAttribute qui permet de définir les fonctions les une après les autres
     * ATTR_ERRMODE affiche les erreur, ERRMODE_EXCEPTION renvoi les exception
     */
    session_start();
} catch (PDOException $e) {
    echo 'Erreur : '.$e->getMessage();
}
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
}
