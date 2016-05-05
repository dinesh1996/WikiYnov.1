<?php

class utilisateur
{
    private $prenom;
    private $nom;
    private $email;

    public function __construct($prenom = null, $nom = null, $email = null)
    {
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->email = $email;
    }

    public function verifuser($BDD, $login, $password)
    {

        //pdo->query("SELECT id_user FROM users WHERE login = '$prenom' AND password = '$nom' ");


    }
}