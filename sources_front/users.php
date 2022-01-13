<?php
class   Users
{
    public  $id;
    private $nom;
    public  $prenom;
    public $pseudo;
    private $mdp;
    private $mail;
    private $dateNaissance;
    public  $photo;
    private $tel;
    private $adresse;
    private $codePostal;
    private $ville;
    public  $actif;
    public  $lastco;
    private $idQuestion;
    private $reponse;
    private $Bdd;  // Objet PDO

    //CONSTRUCTEUR DESTRUCTEUR
    function __construct($login, $mdp, $idQuestion = NULL, $reponse = NULL, $nom = NULL, $prenom = NULL, $photo = NULL, $mail = NULL, $dateNaissance = NULL, $tel = NULL, $adresse = NULL, $codePostal = NULL, $ville = NULL, $pseudo = NULL)
    {
        $this->initBDD();
        if ($this->setLogin($login)) {
            $this->setMdp($mdp);
            //CONNEXION
            if ($nom == NULL && $prenom == NULL && $photo == NULL) {
                $this->connect();
            } else if ($prenom != NULL && $nom != NULL) {
                $this->setNom($nom);
                $this->prenom = $prenom;
                $this->photo = $photo;
                $this->mail = $mail;
                $this->tel = $tel;
                $this->dateNaissance = $dateNaissance;
                $this->adresse = $adresse;
                $this->codePostal = $codePostal;
                $this->ville = $ville;
                $this->pseudo = $pseudo;
                $this->idQuestion = $idQuestion;
                $this->reponse = $reponse;

                $this->subscribe();
            } else {
                echo "Respecte mon code BOULET ! ";
            }
            // INSCRIPTION

        } else
            echo "Le Login n'est pas une adresse e-mail !";
    }


    function __destruct()
    {
        unset($this->mdp);
    }


    //GETTERS
    public function getMdp()
    {
        return $this->mdp;
    }



    public function getNom()
    {
        return $this->nom;
    }

    public function getMail()
    {
        return $this->mail;
    }
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }
    public function getTel()
    {
        return $this->tel;
    }
    public function getAdresse()
    {
        return $this->adresse;
    }
    public function getCodePostal()
    {
        return $this->codePostal;
    }
    public function getVille()
    {
        return $this->ville;
    }
    public function getIdQuestion()
    {
        return $this->idQuestion;
    }
    public function getReponse()
    {
        return $this->reponse;
    }
    public function getBdd()
    {
        return $this->Bdd;
    }




    //SETTERS
    public function setMdp($pass)
    {
        $this->mdp = sha1($pass);
    }
    public function setMail($mail)
    {
        $this->mail = $mail;
    }
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    }
    public function setTel($tel)
    {
        $this->tel = $tel;
    }
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;
    }
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    public function setLogin($l)
    {
        if (filter_var($l, FILTER_VALIDATE_EMAIL) != FALSE) {
            $this->login = $l;
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function setNom($n)
    {
        $this->nom = strtoupper($n); //uniformise la base de donnée
    }

    public function setIdQuestion($idQuestion)
    {
        $this->idQuestion = $idQuestion;
    }

    public function setReponse($reponse)
    {
        $this->reponse = $reponse;
    }
    // METHODES

    public function     subscribe()
    {
        $mail = addslashes($_POST['mail']);
        $reqmail = $this->Bdd->prepare("SELECT * FROM users WHERE mail = ?");
        $reqmail->execute(array($mail));
        $mailexist = $reqmail->rowCount();
        if ($mailexist == 0) {


            $this->lastco = date("Y-m-d H:i:s");
            $req = "INSERT INTO users(id, nom, prenom, pseudo, dateNaissance, mail, adresse, codePostal, ville, tel, mdp, idQuestion, reponse)
                    VALUES(NULL,'$this->nom','$this->prenom','$this->pseudo','$this->dateNaissance','$this->mail','$this->adresse','$this->codePostal', 
                    '$this->ville', 
                    '$this->tel',
                    '$this->mdp',
                     $this->idQuestion,
                    '$this->reponse')";

            // ON EXECUTE LA REQUETE
            $Ores = $this->Bdd->query($req);

            $this->id = $this->Bdd->lastInsertId();
            echo ($this->id);
        } else {

            $_SESSION['errorMail'] = " Adresse mail déjà utilisée ";

            header('Location: inscription.php');
        }
        // ON PREPARE LA REQUETE
    }

    public function     connect()
    {
        $login = addslashes($_POST['mail']);
        $pwd = sha1($_POST['mdp']);

        // ON PREPARE LA REQUETE
        $req = "SELECT * FROM users WHERE mail= '$login' AND mdp='$pwd'";

        // // ON PREPARE LA REQUETE
        // $req = "SELECT * FROM users WHERE mail LIKE '$this->mail' AND mdp LIKE '$this->mdp'"; // ici requete pas bonne il cherche le mdp qui est dans la base donc crypté et non pas celui qu'on tape

        // J'EXECUTE LA REQUETE
        $ORes = $this->Bdd->query($req);

        if ($Usr = $ORes->fetch()) {

            $this->mail = $Usr->mail;
            $this->id = $Usr->id;
            $this->setNom($Usr->nom);
            $this->prenom = $Usr->prenom;
            $this->pseudo = $Usr->pseudo;
            $this->photo = $Usr->photo;
            $this->lastco = $Usr->lastco;
            $this->idQuestion = $Usr->idQuestion;
            $this->reponse = $Usr->reponse;
            $this->ouvrirSession();

            header('Location: index.php');
        } else {
            $_SESSION['error'] = "pas d'users ou faux mot de passe";
            header('Location: connect.php');
        }
    }

    public function     ouvrirSession()
    {
        $_SESSION["id"] = $this->id;
        $_SESSION["mail"] = $this->mail;
        $_SESSION["pseudo"] = $this->pseudo;
        $_SESSION["nom"] = $this->nom;
        $_SESSION["prenom"] = $this->prenom;
    }


    private function    initBDD()
    {
        $bdUser = "root"; // Utilisateur de la base de données
        $bdPasswd = "root"; // Son mot de passe
        $dbname = "domotique2021"; // nom de la base de données
        $host = "localhost"; // Hôte
        $port = "8889";
        try {
            $this->Bdd = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $bdUser, $bdPasswd); // SE CONNECTER A LA BDD
            $this->Bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // METTRE LE MODE OBJET PAR DEFAUT
        } catch (PDOException $e) {
            echo ("Erreur : impossible de se connecter à la bdd");
        }
    }
}
