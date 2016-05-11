<?php

class utilisateur
{
    private $prenom;
    private $nom;
    private $email;
    private $login;
    private $password;
    public $DB;
    private $rang;


    public function __construct($prenom = null, $nom = null, $password = null, $email = null, $rang = null, $login = null, $DB = null)
    {
        $this->password = $pass = sha1("bonjour" . $password);
        $this->email = $prenom . "." . $nom . "@ynov.com";
        $this->login = $prenom . "." . $nom;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->email = $this->prenom . "." . $this->nom . "@ynov.com";
        $this->rang = $rang;
        $this->DB = new DB();
    }

    public function verifuser()
    {
        $sql = "SELECT id_user FROM users WHERE prenom = ? AND nom = ?";
        $stmt = $this->DB->getBDD()->prepare($sql);
        $stmt->execute([$this->prenom,
            $this->nom]);
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (count($res) == 0) {
            return true;
        } else
            echo '<script>alert("Votre compte existe déjà, veuillez contacter l\'administration.")</script>';
        return false;
    }


    public function connexion()
    {
        $sql = "SELECT * FROM users WHERE login = ? AND password = ? AND actif = true";
        $stmt = $this->DB->getBDD()->prepare($sql);
        $stmt->execute([$this->login,
            $this->password]);
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (count($res) == 1) {
            foreach ($res as $cle):
                $_SESSION['session'] = array(
                    'id' => $cle->id_user,
                    'prenom' => $cle->prenom,
                    'nom' => $cle->nom,
                    'login' => $this->login,
                    'rang' => $cle->rang
                );
            endforeach;
        } else
            echo '<script>alert("Vos identifiants de connexion sont mauvais ou votre compte n\'a pas été activé.")</script>';
    }

    public function seeUser()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->DB->getBDD()->prepare($sql);
        $stmt->execute();
        $req = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $req;
    }

    public function deconnexion()
    {
        session_destroy();
    }

    public function insertUser($cle)
    {
        $mail = new mail;
        $mail->mailIns($this->email, $cle, $this->prenom, $this->nom);
        $sql = "INSERT INTO users VALUES ('', ?, ?,?, ?, '0',  'abonné', ?, ?) ";
        $stmt = $this->DB->getBDD()->prepare($sql);
        $stmt->execute([$this->prenom,
            $this->nom,
            $this->email,
            $cle,
            $this->login,
            $this->password]);
        return true;
    }

    public function setRang($rang)
    {
        $this->rang = $rang;
    }

    public function modPassword($cle)
    {
        $sql = "UPDATE users SET password = ? WHERE cle = ?";
        $stmt = $this->DB->getBDD()->prepare($sql);
        $stmt->execute([$this->password,
            $cle]);
        return true;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setPassword($password)
    {
        $this->password = sha1("bonjour" . $password);
    }

    public function modRang($id, $rang)
    {
        $sql = "UPDATE users SET rang = ? WHERE id_user = ?";
        $stmt = $this->DB->getBDD()->prepare($sql);
        $stmt->execute([$rang,
            $id]);
    }

    public function mdpForget($dest)
    {
        $mail = new mail($dest);
        $sql = "SELECT cle FROM users WHERE email = ?";
        $stmt = $this->DB->getBDD()->prepare($sql);
        $stmt->execute([$dest]);
        $res = $stmt->fetch(PDO::FETCH_OBJ);
        if ($res == null) {
            echo "<script>alert('Aucune adresse mail ne correspond')</script>";
            return false;
        } else {
            $mail->setDesinataire($dest);
            $mail->mailForget($res->cle);
            return true;
        }
    }

}