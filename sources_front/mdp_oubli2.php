<?php
session_start();

include 'navbar.php';
include './include/database.php';
$database = getPDO();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/base.css">

</head>

<body>
    <?php

    $mail = $_SESSION['mail'];
    if (isset($_POST['resp'])) {
        $resp = $_POST['resp'];
        $req2 = "SELECT reponse FROM users WHERE mail = '$mail'";
        $ORes2 = $database->query($req2);
        $reponse = $ORes2->fetch();
        $bonneRep = $reponse->reponse;
        if ($resp != $bonneRep) {
            echo "Mauvaise réponse";
    ?>
            <a href="mdp_oubli.php"><button>Retour</button></a>
        <?php
        } else {

        ?>
            <form action="mdp_oubli3.php" method="POST">
                <h3>Tapez votre nouveau mot de passe : </h3>
                <input required name="password" id="password" type="password" pattern="(?=.*\d)(?=.*[a-zA-Z]).+" title="Au moins 8 caractères, et contient au moins 1 lettre et 1 chiffre" minlength="8" />

                <h3>Confirmez votre nouveau mot de passe : </h3>
                <input required name="confirm_password" type="password" pattern="(?=.*\d)(?=.*[a-zA-Z]).+" title="Au moins 8 caractères, et contient au moins 1 lettre et 1 chiffre" minlength="8" />
                <input type="submit" value="Valider">
            </form>
    <?php


        }
    }
    ?>
</body>

</html>
<?php
