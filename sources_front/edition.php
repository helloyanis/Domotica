<?php
session_start();
include 'include/database.php';

$database = getPDO();

$allowedExtensions = array('.jpg', '.jpeg', '.gif', '.png');
$maxSize = 2097152;
$avatar = $_FILES['avatar'];

if (isset($_POST['submit'])) {
  if (isset($avatar)) {
    try {
      if ($avatar['size'] > $maxSize) {
        throw new Exception("Votre photo de profil ne doit pas dépasser 2MB");
      }

      $uploadExtension = strtolower(strchr($avatar['name'], "."));
      $isValidExtension = in_array($uploadExtension, $allowedExtensions);
      if (!$isValidExtension) {
        throw new Exception("Votre photo de profil doit être en jpg, jpeg, gif ou png");
      }

      $chemin = "./uploads/profils/" . basename($avatar['name']);
      $result = move_uploaded_file($avatar['tmp_name'], $chemin);
      if (!$result) {
        throw new Exception("Erreur lors de l'importation de votre photo");
      }

      $updateAvatar = $database->prepare('UPDATE users SET photo= :avatar WHERE mail= :mail');
      $updateAvatar->execute(array(
        'avatar' => $chemin,
        'mail' => $_SESSION['mail']
      ));
      // header('Location: Page-profil.html');
    } catch (Exception $err) {
      echo ($err);
    }
  }

  $req = $database->prepare('UPDATE users SET mail = :newmail, adresse = :newaddress, codePostal= :newpostcode, ville= :newcity, tel= :newphonenumber  WHERE id = :id');
  $req->execute(array(
    'newmail' => htmlspecialchars($_POST['newmail']),
    'newaddress' => htmlspecialchars($_POST['newaddress']),
    'newpostcode' => htmlspecialchars($_POST['newpostcode']),
    'newcity' => htmlspecialchars($_POST['newcity']),
    'newphonenumber' => htmlspecialchars($_POST['newphonenumber']),
    'id' => $_SESSION['id']
  ));
}

//Changement de mot de passe 
if (isset($_POST['submitPass'])) {
  $passRequest = $database->prepare("SELECT mdp FROM users  WHERE mail = :mail");
  $passRequest->execute([
    ':mail' => $_SESSION['mail']
  ]);
  $currentPassword = $passRequest->fetchColumn();
  if ($currentPassword === sha1($_POST['old_password'])) {
    if ($_POST['password'] === $_POST['confirm_password']) {
      $request = $database->prepare("UPDATE users SET mdp = :newPassword WHERE mail = :mail");
      $request->execute([
        ':newPassword' => sha1($_POST['password']),
        ':mail' => $_SESSION['mail']
      ]);
      $succesMessagePass = 'Le mot de passe est maintenant changé!';
    } else {
      $errorMessagePass = 'Les mots de passe ne sont pas identiques!';
    }
  } else {
    $errorMessagePass = 'Le mot de passe est incorrect...';
  }
}

header('Location: Page-profil.php');
