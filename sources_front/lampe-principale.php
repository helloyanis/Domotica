<?php
session_start();
include 'include/database.php';
$database = getPDO();
include 'navbar.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lampe principale</title>
  <link rel="stylesheet" href="./css/base.css" />
  <link rel="stylesheet" href="./css/appareil.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Montserrat&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/68789f64a4.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>

<body>


  <!-- Réglages des appareils-->




  <h1>Réglages de la lampe principale</h1>

  <section class="reglage">
    <h2>Allumer/éteindre l'appareil</h2>
    <div class="onoffswitch" id="1">
      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="my1offswitch" checked />
      <label class="onoffswitch-label" for="my1offswitch">
        <span class="onoffswitch-inner" id="onoffswitch1">




        </span>
      </label>
      <?php

      $req = "SELECT etatConnexion FROM objets WHERE id=1";

      $Ores = $database->query($req);

      while ($etat = $Ores->fetch()) {
        if ($etat->etatConnexion == 1) {

          echo  " <style>
              .onoffswitch-label{background-color:rgb(161, 247, 140);
                color : black;
              }

              </style>
              <p class='onOFF'>ON</p>";
        } else {

          echo "<style>
                .onoffswitch-label{
                  background-color: rgba(255, 21, 21, 0.774);
                  color : white;
                }
                </style>
                <p class='onOFF'>OFF</p>";
        }
      }

      ?>
      <script>
        $(document).ready(function() {
          $("#1").click(function() {
            window.location.replace("./reglages_lampe/onoff.php");
          });
        })
      </script>

    </div>

    <hr />

    <h2>Luminosité</h2>

    <input type="range" class="lumino" min="0" max="100" />

    <hr />

    <h2>Couleur</h2>

    <div id="w" class="carre blanc"></div>
    <div id="y" class="carre jaune"></div>
    <div id="o" class="carre orange"></div>

    <script>
      $(document).ready(function() {
        $("#w").click(function() {
          window.location.replace("./reglages_lampe/white.php");
        });
        $("#y").click(function() {
          window.location.replace("./reglages_lampe/yellow.php");
        });
        $("#o").click(function() {
          window.location.replace("./reglages_lampe/orange.php");
        });
      })
    </script>
  </section>


  <!--Le menu burger-->
  <?php
  include 'menuBurger.php'
  ?>


  <script src="script.js"></script>
  <style>
    <?php include './css/appareil.css'
    ?>
  </style>
</body>

</html>