<?php
include 'navbar.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Thermostat</title>
  <link rel="stylesheet" href="./css/base.css" />
  <link rel="stylesheet" href="./css/appareil.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Montserrat&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/68789f64a4.js" crossorigin="anonymous"></script>
</head>

<body>


  <!-- Réglages des appareils-->

  <h1>Réglages du thermostat</h1>

  <section class="reglage">
    <h2>Allumer/éteindre l'appareil</h2>

    <div class="onoffswitch">
      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="my1offswitch" checked />
      <label class="onoffswitch-label" for="my1offswitch">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
      </label>
    </div>

    <hr />

    <h2>Température</h2>

    <input type="range" class="temp" min="0" max="25" step="1" />
    <output class="number"></output>
  </section>

  <?php
  include 'menuBurger.php'
  ?>

  <script src="scriptTemperature.js"></script>
</body>

</html>