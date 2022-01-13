<?php
session_start();
include 'include/database.php';
$database = getPDO();
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
  <title>Profil</title>
  <link rel="stylesheet" href="./css/base.css" />
  <link rel="stylesheet" href="./css/page-profil.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Montserrat&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/68789f64a4.js" crossorigin="anonymous"></script>
</head>

<body>


  <!-- Contient les informations du profil -->
  <section class="profile">
    <h1>Profil</h1>
    <?php

    if (!empty($user['photo'])) {
    ?>
      <img class="Avatar" src="<?php echo $user['photo'] ?>" width="396px" height="415px" />
    <?php
    } else {
    ?>
      <img class="Avatar" src="./uploads/profils/Default.png" width="396px" height="415px" />
    <?php
    }
    ?>

    <a class="profileEdition" href="page-edition.php">Editer mon profil</a>
    <?php
    if (isset($_SESSION['mail'])) { ?>
      <div class="informations">
        <p><span class="name">Nom :</span> <?= $user['nom'] ?></p>
        <p><span class="name">Prénom :</span><?= $user['prenom'] ?></p>
        <p><span class="name">Date de naissance :</span><?= $user['dateNaissance'] ?></p>
        <p><span class="name">Pseudo :</span> <?= $user['pseudo'] ?></p>
        <p><span class="name">Email :</span> <?= $user['mail'] ?></p>
        <p><span class="name">Adresse :</span> <?= $user['adresse'] ?></p>
        <p><span class="name">Code postal :</span> <?= $user['codePostal'] ?></p>
        <p><span class="name">Ville :</span> <?= $user['ville'] ?></p>
        <p><span class="name">Numéro de téléphone :</span> <?= $user['tel'] ?></p>
      </div>
    <?php } ?>
  </section>


  <?php
  include 'menuBurger.php'
  ?>
</body>

</html>