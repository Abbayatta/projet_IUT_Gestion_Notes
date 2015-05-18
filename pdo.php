<?php
// Connection au serveur
$pilote = 'mysql:host=localhost;dbname=scodoc';
$utilisateur = 'root';
$motDePasse = 'a1tern@n6e$';

try
{
    global $pdo;
    $pdo = new PDO($pilote, $utilisateur, $motDePasse, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    echo 'Echec de la connexion à la base de données';
    exit();
}

?>