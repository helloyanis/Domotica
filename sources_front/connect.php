<?php
session_start();
include("users.php");
include 'navbar.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Se connecter</title>
  <link href="./css/connect.css" rel="stylesheet" />
  <link href="./css/base.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Montserrat&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/68789f64a4.js" crossorigin="anonymous"></script>
</head>

<body>


  <form action="" class="connexion" method="POST">
    <h2>Se connecter :</h2>
    <?php if (isset($_SESSION['error'])) { ?> <p style="color:red;"> <?= $_SESSION['error'] ?> </p> <?php } ?>



    <input type="email" placeholder="Adresse e-mail" name="mail" />
    <input type="password" placeholder="Mot de passe " name="mdp" />
    <input class="btnPrimary" type="submit" value="Valider" />

    <a class="ins" href="inscription.php">Inscription</a>
    <a class="ins" href="mdp_oubli.php">Mot de passe oublié</a>
  </form>

  <?php
  include 'menuBurger.php'
  ?>

</body>

</html>

<?php
if (isset($_POST['mail']) && isset($_POST['mdp'])) {
  $users = new Users($_POST['mail'], $_POST['mdp'], $_POST['idQuestion'],  $_POST['reponse']);
}
?>