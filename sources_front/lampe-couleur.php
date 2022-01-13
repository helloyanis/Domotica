<?php
include 'navbar.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lampe de couleur</title>
  <link rel="stylesheet" href="./css/base.css" />
  <link rel="stylesheet" href="./css/appareil.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Montserrat&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/68789f64a4.js" crossorigin="anonymous"></script>
</head>

<body>


  <!-- Réglages des appareils-->

  <h1>Réglages de la lampe de couleur</h1>

  <section class="reglage">
    <h2>Allumer/éteindre l'appareil</h2>

    <!--Bouton on/off -->
    <div class="onoffswitch">
      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="my1offswitch" checked />
      <label class="onoffswitch-label" for="my1offswitch">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
      </label>
    </div>

    <hr />

    <h2>Luminosité</h2>

    <!--Barre pour régler la luminosité -->
    <input class="lumino" type="range" min="0" max="100" />

    <hr />

    <h2>Couleur</h2>

    <!--Carrés pour choisir la couleur de la lampe-->
    <div class="carre blanc"></div>
    <div class="carre jaune"></div>
    <div class="carre orange"></div>
    <div class="carre rouge"></div>
    <div class="carre rose"></div>
    <div class="carre violet"></div>
    <div class="carre bleu"></div>
    <div class="carre vert"></div>
  </section>

  <?php
  include 'menuBurger.php'
  ?>
</body>

</html>