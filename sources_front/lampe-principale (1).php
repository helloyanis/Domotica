<?php
include("users.php");
session_start();
include 'include/database.php';
$database = getPDO();
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>

<body>
  <!--La navbar-->
  <header class="navbar">
    <button class="btn">
      <img class="burger" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Hamburger_icon.svg/1200px-Hamburger_icon.svg.png" alt="bouton burger" height="20em" width="20em" />
    </button>

    <img class="logo" src="./images/logo.jpg" alt="Logo" height="50em" width="50em" />

    <a class="btnSecondary" href="connect.html"> Se connecter</a>
  </header>

  <!-- Réglages des appareils-->
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
  ?>

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

      $Ores = $Bdd->query($req);
      echo ($req);
      while ($etat = $Ores->fetch()) {
        if ($etat->etatConnexion == 1) {

          echo  " <style>
              .onoffswitch-label{background-color:rgb(161, 247, 140);
                color : black;
              }

              </style>
              <p>ON</p>";
        } else {

          echo "<style>
                .onoffswitch-label{
                  background-color: rgba(255, 21, 21, 0.774);
                  color : white;
                }
                </style>
                <p>OFF</p>";
        }
      }

      ?>
      <script>
        $(document).ready(function() {
          $("#1").click(function() {
            window.location.replace("onoff.php");
          });
        })
      </script>

    </div>

    <hr />

    <h2>Luminosité</h2>

    <input type="range" class="lumino" min="0" max="100" />

    <hr />

    <h2>Couleur</h2>

    <div class="carre blanc"></div>
    <div class="carre jaune"></div>
    <div class="carre orange"></div>
  </section>


  <!--Le menu burger-->
  <div class="backdrop">
    <nav>
      <ul class="Listemenu">
        <li><a class="lien" href="index.php">Accueil</a></li>
        <li><a class="lien" href="gestion_appareil.php">Mes appareils</a></li>
        <li><a class="lien" href="Page-profil.php">Mon profil</a></li>
        <li><a class="lien" href="page-edition.php">Editer mon profil</a></li>
      </ul>
    </nav>
  </div>

  <script src="script.js"></script>
  <style>
    <?php include './css/appareil.css'
    ?>
  </style>
</body>

</html>