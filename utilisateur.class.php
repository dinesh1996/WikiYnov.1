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


    public function __construct($prenom = null, $nom = null, $password = null, $email = null, $rang = 'abonné', $login = null, $DB = null)
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

        $res = $this->DB->requete("SELECT id_user FROM users WHERE prenom = '$this->prenom' AND nom = '$this->nom'");
        if (count($res) == 0) {
            return true;
        } else
            echo '<script>alert("Votre compte existe déjà, veuillez contacter l\'administration.")</script>';
        return false;

    }


    public function connexion()
    {
        $res = $this->DB->requete("SELECT * FROM users WHERE login = '$this->login' AND password = '$this->password' AND actif = true");

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

            var_dump($_SESSION);


        } else
            echo '<script>alert("Vos identifiants de connexion sont mauvais ou votre compte n\'a pas été activé.")</script>';


    }

    public function deconnexion()
    {
        session_destroy();
    }

    public function insertUser($cle)
    {
        $mail = new mail;
        $mail->mailIns($this->email, $cle, $this->prenom, $this->nom);
        $this->DB->insert("INSERT INTO users VALUES ('', '$this->prenom', '$this->nom','$this->email', '$cle', '0',  'abonné', '$this->login', '$this->password') ");
    }

    public function setRang($rang)
    {
        $this->rang = $rang;
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
        $this->DB->insert("UPDATE users SET rang = '$rang' WHERE id_user = '$id'");
    }

}