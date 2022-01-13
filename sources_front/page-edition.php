<?php
session_start();
include 'include/database.php';
$database = getPDO();

$allowedExtensions = array('.jpg', '.jpeg', '.gif', '.png');

$userReq = $database->prepare("SELECT * FROM users WHERE mail = :mail");
$userReq->execute([
  ':mail' => $_SESSION['mail']
]);
$user = $userReq->fetch(PDO::FETCH_ASSOC);

include 'navbar.php'
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Editer votre profil</title>
  <link rel="stylesheet" href="./css/base.css" />
  <link rel="stylesheet" href="./css/page-edition.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Montserrat&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/68789f64a4.js" crossorigin="anonymous"></script>
</head>

<body>


  <section class="card">
    <h1>Editer votre profil</h1>
    <form action="./edition.php" method="POST" enctype="multipart/form-data">

      <label for="avatar">
        Avatar:
        <input id="avatar" type="file" name="avatar" accept="<?= implode(',', $allowedExtensions) ?>" />
      </label>
      <label for="email">
        Email :
        <input id="email" type="email" name="newmail" value="<?= $user['mail'] ?>"><br>
      </label>
      <label for="address">
        Adresse :
        <input id="address" type="text" name="newaddress" value="<?= $user['adresse'] ?>"><br>
      </label>
      <label for="postcode">
        Code postal :
        <input id="postcode" type="text" name="newpostcode" value="<?= $user['codePostal'] ?>"><br>
      </label>
      <label for="city">
        Ville :
        <input id="city" type="text" name="newcity" value="<?= $user['ville'] ?>"><br>
      </label>
      <label for="phonenumber">
        Numéro de téléphone :
        <input id="phonenumber" type="tel" name="newphonenumber" value="<?= $user['tel'] ?>"><br>
      </label>

      <input class="btnPrimary" type="submit" name="submit" value="Valider" />
    </form>

    <!--Partie sur le changement de mot de passe qui se déroule -->
    <details>
      <summary class="changePassword">
        <h2>Changer le mot de passe</h2>
      </summary>
      <form action="./edition.php" method="POST">
        <span> Ancien mot de passe:</span>
        <input type="password" name="old_password" required>

        <span>Nouveau mot de passe:</span>
        <input type="password" name="password" required>

        <span>Confirmer le nouveau mot de passe:</span>
        <input type="password" name="confirm_password" required>

        <input class="submitPassword" type="submit" name="submitPass" value="Valider" />
      </form>
    </details>
  </section>
  <?php
  include 'menuBurger.php'
  ?>
</body>

</html>