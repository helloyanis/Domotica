<?php

session_start();
include 'include/database.php';
$database = getPDO();

$req = "SELECT etatConnexion FROM objets WHERE id =1";

$Ores = $database->query($req);

while ($objet = $Ores->fetch()) {
    if ($objet->etatConnexion == 0) {
        $database->query("UPDATE objets SET etatConnexion = 1 WHERE id= 1 ");
        header('Location: lampe-principale.php');
    }
    if ($objet->etatConnexion == 1) {
        $database->query("UPDATE objets SET etatConnexion = 0 WHERE id= 1 ");
        header('Location: lampe-principale.php');
    }
}
