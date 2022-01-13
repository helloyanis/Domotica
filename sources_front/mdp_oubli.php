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
    <title>Mot de passe oublié</title>
    <link rel="stylesheet" href="./css/base.css">

</head>

<body>

    <h2>Rentrez votre adresse-email : </h2>

    <form action="" method="POST">
        <input required name="mail" type="email">
        <input type="submit" value="Valider">
    </form>
    <?php

    if (isset($_POST['mail'])) {
        $mail = $_POST['mail'];

        $reqmail = $database->prepare("SELECT * FROM users WHERE mail = ?");
        $reqmail->execute(array($mail));
        $mailexist = $reqmail->rowCount();
        if ($mailexist == 1) {
            $_SESSION['mail'] = $mail;
            $req = "SELECT questions.nom FROM users, questions WHERE users.idQuestion = questions.id AND mail = '$mail'";
            $ORes = $database->query($req);
            $q = $ORes->fetch();
            echo "$q->nom";
    ?>
            <h3>Rentrez votre réponse</h3>
            <form action="mdp_oubli2.php" method="POST">
                <input name="resp" type="text">
                <input type="submit" value="Valider">
            </form>
    <?php



        } else {
            echo ("Il n'existe aucun compte avec cet e-mail");
        }
    }
    ?>



</body>

</html>