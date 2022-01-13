<?php
session_start();
include("users.php");
include 'navbar.php';

$bdUser = "root"; // Utilisateur de la base de données
$bdPasswd = "root"; // Son mot de passe
$dbname = "domotique2021"; // nom de la base de données
$host = "localhost"; // Hôte
$port = "8889";
try {
  $Bdd = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $bdUser, $bdPasswd); // SE CONNECTER A LA BDD
  $Bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // METTRE LE MODE OBJET PAR DEFAUT
} catch (PDOException $e) {
  echo ("Erreur : impossible de se connecter à la bdd");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inscription</title>
  <link href="./css/ins.css" rel="stylesheet" />
  <link href="./css/base.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Montserrat&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/68789f64a4.js" crossorigin="anonymous"></script>
</head>

<body>


  <form action="" class="ins" method="POST">
    <h2>S'inscrire:</h2>
    <?php if (isset($_SESSION['errorMail'])) { ?> <p style="color:red;"> <?= $_SESSION['errorMail'] ?> </p>
    <?php }
    unset($_SESSION['errorMail']);
    ?>
    <label for="Lastname">Nom :
      <input name="nom" id="Lastname" type="text" placeholder="Nom" />
    </label>

    <label for="Firstname">Prénom :
      <input name="prenom" id="Firstname" type="text" placeholder="Prenom" />
    </label>

    <label for="Pseudo">Pseudo :
      <input name="pseudo" id="Pseudo" type="text" placeholder="Pseudo" />
    </label>

    <label for="dateBirthday">Date de naissance:
      <input name="dateNaissance" id="dateBirthday" type="date" placeholder="Date de naissance" />
    </label>

    <label for="Email" class="mail">Email :
      <input name="mail" id="Email" type="email" placeholder="e-mail" />
    </label>

    <label for="address">Adresse :
      <input name="adresse" id="address" type="text" placeholder="Adresse" />
    </label>

    <label for="postCode">Code Postal :
      <input name="codePostal" id="postCode" type="text" placeholder="Code postal" />
    </label>

    <label for="city">Ville :
      <input name="ville" id="city" type="text" placeholder="Ville" />
    </label>

    <label for="phoneNumber">Numero de téléphone :
      <input name="tel" id="phoneNumber" type="tel" placeholder="Numéro de téléphone" />
    </label>

    <label for="password">
      Mot de passe :
      <input name="mdp" id="password" required type="password" pattern="(?=.*\d)(?=.*[a-zA-Z]).+" title="Au moins 8 caractères, et contient au moins 1 lettre et 1 chiffre" minlength="8" /">
    </label>

    <select name="idQuestion" id="idQuestion" class="bouton">
      <?php
      $req = "SELECT questions.nom FROM questions";
      $Ores = $Bdd->query($req);
      while ($questions = $Ores->fetch()) {
        echo ("<option value='$questions->nom'>$questions->nom</option>");
      }
      ?>
    </select>

    <label for="reponse">Choisissez votre réponse :
      <input name="reponse" id="reponse" type="reponse" placeholder=" Choisissez votre réponse" />
    </label>

    <input class="btnPrimary" type="submit" value="Valider" />
  </form>

  <?php
  include 'menuBurger.php'
  ?>
</body>

</html>

<?php
if (isset($_POST['mail']) && isset($_POST['mdp']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['pseudo']) && isset($_POST['dateNaissance']) && isset($_POST['tel']) && isset($_POST['adresse']) && isset($_POST['codePostal']) && isset($_POST['ville']) && isset($_POST['idQuestion']) && isset($_POST['reponse'])) {

  $users = new Users($_POST['mail'], $_POST['mdp'], $_POST['idQuestion'], $_POST['reponse'], $_POST['nom'], $_POST['prenom'], NULL, $_POST['mail'], $_POST['dateNaissance'], $_POST['tel'], $_POST['adresse'], $_POST['codePostal'], $_POST['ville'], $_POST['pseudo']);
}

?>