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

    if (isset($_POST['password'])) {
        $Password = sha1($_POST['password']);
        $confirmPassword = sha1($_POST['confirm_password']);
        if ($Password == $confirmPassword) {
            $req = "SELECT mdp FROM users WHERE mail = '$mail'";

            $Ores = $database->query($req);

            while ($mdp = $Ores->fetch()) {
                $database->query("UPDATE users SET mdp = '$Password' WHERE mail ='$mail'");
            }
            echo "Votre mot de passe a été modifié"
    ?>
            <a href="connect.php"><button>Retour à la page connexion</button></a>
    <?php
        } else {
            echo "Les deux mots de passe ne sont pas identiques";
        }
    }
    ?>

</body>

</html>