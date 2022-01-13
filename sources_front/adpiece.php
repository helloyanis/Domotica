<?php

session_start();


include 'navbar.php'
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>
<form action="" method="POST">

    <input type="text" id="ajouter" name="ajouter">



    <button class="bouton">Add</button>
    <?php
    function getPDO()
    {
        $bdUser = "root"; // Utilisateur de la base de données
        $bdPasswd = "root"; // Son mot de passe
        $dbname = "domotique2021"; // nom de la base de données
        $host = "localhost"; // Hôte
        $port = "8889";
        try {
            $Bdd = new PDO("mysql:host=$host; port=$port; dbname=$dbname;charset=utf8", $bdUser, $bdPasswd); // SE CONNECTER A LA BDD
            $Bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // METTRE LE MODE OBJET PAR DEFAUT
        } catch (PDOException $e) {
            echo ("Erreur : impossible de se connecter à la bdd");
        }
        return $Bdd;
    }


    if (isset($_POST["ajouter"])) {

        $idU = $_SESSION['id'];
        $lieux = $_POST["ajouter"];
        $req = "INSERT INTO lieu( 'id', 'nom', 'idUsers') VALUES (NULL, '$lieux', '4')";
        $Bdd->query($req);
        // header('Location: gestion_appareil.php');
        echo $lieux;
    }
    ?>