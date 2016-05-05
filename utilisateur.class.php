<?php

class utilisateur
{
    private $prenom;
    private $nom;
    private $email;
    public $DB;
    private $rang;


    public function __construct($prenom = null, $nom = null, $email = null, $DB = null, $rang=null)
    {
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->email = $email;
        $this->rang = $rang;
        $this->DB = new DB();
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

    public function connexion(){
        $res = $this->DB->requete("SELECT * FROM users WHERE login = '$this->prenom' AND password = '$this->nom' AND actif = true");
        foreach ($res as $cle):
        if (count($res) == 1){
           $_SESSION['session'] = array(
              'prenom' => $this->prenom,
               'nom' => $this->nom,
               'rang'=> $cle->rang
           );
            var_dump($_SESSION);


        }
        endforeach;


    }

    public function insertUser($cle)
    {
        $mail = new mail;
        $mail->mailIns($this->email, $cle, $this->prenom, $this->nom);
        $this->DB->insert("INSERT INTO users VALUES ('', '$this->prenom', '$this->nom','$this->email', '$cle', '0',  '') ");
    }

}