<?php

session_start();
include '../include/database.php';
$database = getPDO();

$req = "SELECT couleur FROM objets WHERE id = 1";

$Ores = $database->query($req);

while ($objet = $Ores->fetch()) {

    $database->query("UPDATE objets SET couleur = 'orange' WHERE id= 1 ");
    header('Location: ../lampe-principale.php');
}
