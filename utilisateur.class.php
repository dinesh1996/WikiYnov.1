<?php

class utilisateur
{
    private $prenom;
    private $nom;
    private $email;
    public $DB;


    public function __construct($prenom = null, $nom = null, $email = null, $DB = null)
    {
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->email = $email;
        $this->DB = new  DB();
    }

    public function verifuser()
    {

        $res = $this->DB->requete("SELECT id_user FROM users WHERE login = '$this->prenom' AND password = '$this->nom'");
        if (count($res) == 0) {
            return true;
        } else
            echo '<script>alert("Votre compte existe déjà, veuillez contacter l\'administration.")</script>';
            return false;

    }

    public function insertUser($cle)
    {
        $mail = new mail;
        $mail->mailIns($this->email, $cle, $this->prenom, $this->nom);
        $this->DB->insert("INSERT INTO users VALUES ('', '$this->prenom', '$this->nom','$this->email', '$cle', '0',  '') ");
    }

}