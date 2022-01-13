<?php
session_start();
include 'include/database.php';
$database = getPDO();
include 'navbar.php'
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Domotica</title>
  <link rel="stylesheet" href="./css/base.css" />
  <link href="./css/style.css" rel="stylesheet" type="text/css" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Montserrat&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/68789f64a4.js" crossorigin="anonymous"></script>
  <!--On importe les fonts-->
</head>

<body>

  <main>
    <h1><span class="bold">Domotica, la référence en domotique</span></h1>
    <section class="Contenu">
      <!--Cette section contient les avis et le paragraphe de présentation pour pouvoir les mettre face à face sur grand écran et l'un après l'autre sur petit écran (dans le css)-->
      <p class="Presentation">
        Nous sommes Domotica, la solution la plus simple pour gérer vos appareils ménagers.<br />Quelque soit
        l'agencement de votre maison ou appartement, vous pouvez utiliser nos services pour gérer les appareils
        de votre maison.<br />Que vous souhaitiez quelque chose de simple comme allumer les lumières, ou de plus
        complexe, comme planifier des tâches à certaines heures, Domotica vous permet de le faire.<br /><br />Tout
        cela, très simplement.<br />
      </p>
      <aside class="Avis">
        <!--Cette partie contient les avis -->
        Nos derniers avis
        <article>
          De <span class="bold">Jean Pierre</span><br />⭐⭐⭐⭐<br />J'aime bien! C'est simple à utiliser et je
          ne me sens pas perdu!
        </article>
        <article>
          De <span class="bold">Marie</span><br />⭐⭐⭐⭐⭐<br />Tout simplement le meilleur site pour faire ca,
          selon moi!
        </article>
        <article>De <span class="bold">Florent</span><br />⭐⭐⭐<br />Pas mal comme site ;)</article>
      </aside>
    </section>

    <section class="NosProd">
      <!--Contient les produits-->
      <h2>Découvrez nos produits</h2>
      <div class="prodcont">
        <!--Pour contenir les produits afin de les centrer-->
        <article class="prod">
          <!--un produit-->
          Thermostat<br />
          <img src="./images/thermostat.jpg" alt="" />
        </article>
        <article class="prod">
          Ampoule classique<br />
          <img src="./images/ampoule_led.jpg" alt="" />
        </article>
        <article class="prod">
          Ampoule LED multicolore<br />
          <img src="./images/ampoule_color.jpg" alt="" />
        </article>
      </div>
    </section>

    <h2>Commencez à utiliser Domotica dès maintenant!</h2>

    <a class="btnPrimary" href="inscription.php">
      <!--Le bouton-->
      Je me lance
    </a>
  </main>

  <?php
  include 'menuBurger.php'
  ?>
</body>

</html>