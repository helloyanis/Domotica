  <!--barre de navigation-->
  <header class="navbar">
    <button class="btn">
      <img class="burger" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Hamburger_icon.svg/1200px-Hamburger_icon.svg.png" alt="bouton burger" height="20em" width="20em" />
    </button>
    <img class="logo" src="./images/logo.jpg" alt="Logo" height="50em" width="50em" />

    <?php
    if (isset($_SESSION['mail']) && !empty($_SESSION['mail'])) { ?>

      <?php if (isset($_SESSION['mail'])) { ?>

        <div class="userCO" style="font-size: 1.5em; color: black;">
          <i class="far fa-user"></i>


          <p><?= $_SESSION['pseudo'] ?> <?php } ?></p>
        </div>


      <?php
    } else { ?>
        <a class="btnSecondary" href="connect.php">Se connecter</a>

      <?php } ?>
  </header>