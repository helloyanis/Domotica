<div class="backdrop">
    <nav>
        <ul>

            <?php
            if (isset($_SESSION['mail']) && !empty($_SESSION['mail'])) {

            ?>
                <li><a class="lien" href="index.php">Accueil</a></li>
                <li><a class="lien" href="Page-profil.php">Mon profil</a></li>
                <li><a class="lien" href="page-edition.php">Editer mon profil</a></li>
                <li><a class="lien" href="gestion_appareil.php">Mes appareils</a></li>
                <li><a class="lien" href="deconnexion.php">Se déconnecter</a></li>
            <?php

            } else { ?>
                <li><a class="lien" href="index.php">Accueil</a></li>
                <li><a class="lien" href="connect.php">Se connecter</a></li>
            <?php
            }
            ?>




        </ul>
    </nav>
</div>
<script src="scriptMenu.js"></script>