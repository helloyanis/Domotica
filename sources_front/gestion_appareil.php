<?php
session_start();
include 'include/database.php';
$database = getPDO();
include 'navbar.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes appareils</title>
    <link rel="stylesheet" href="./css/base.css" />
    <link rel="stylesheet" href="./css/appareil.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Montserrat&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/68789f64a4.js" crossorigin="anonymous"></script>
</head>

<body>


    <h1>Mes appareils</h1>

    <main class="main_appareil">
        <?php
        if (isset($_SESSION['mail']) && !empty($_SESSION['mail'])) {
            $idUser = $_SESSION['id'];

            // $req = "SELECT lieu.nom AS lieuNom, lieu.id, objets.nom AS objetsNom FROM lieu LEFT OUTER JOIN objets ON lieu.id = objets.idLieu  WHERE lieu.idUsers = $idUser";
            $req = "SELECT lieu.nom AS lieuNom, lieu.id FROM lieu LEFT OUTER JOIN objets ON lieu.id = objets.idLieu GROUP BY lieu.id";

            $ORes = $database->query($req);

            while ($lieu = $ORes->fetch()) {
                $idLieu = $lieu->id;
                $req2 = "SELECT objets.nom, typeobjets.img FROM objets, typeobjets WHERE objets.idType = typeobjets.id AND idLieu = $idLieu AND idUsers = $idUser";
                $ORes2 = $database->query($req2);
        ?>
                <!-- Sous-parties qui se déroulent-->
                <details class="souspartie">
                    <summary class="piece"><?php echo "$lieu->lieuNom"; ?></summary>
                    <?php
                    while ($objets = $ORes2->fetch()) {
                    ?>
                        <!--Cards avec les appareils -->
                        <a href="lampe-principale.php">
                            <div class="card">

                                <img class="card_img" src="<?php echo "$objets->img" ?>" />
                                <h3> <?php echo "$objets->nom"; ?> </h3>
                            </div>
                        </a>
                    <?php
                    }
                    ?>





                </details>

        <?php
            }
        } ?>

    </main>

    <?php
    include 'menuBurger.php'
    ?>


</body>

</html>