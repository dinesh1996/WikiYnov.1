<?php
require_once 'db.class.php';

class utilisateur
{
    public function __construct($login = null, $password = null, $email = null)
    {
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $db = new DB();
        $this->db = $db->getBDD();
    }


    public function verif_user(){
        $req = $DB->query("SELECT * FROM wiki WHERE login =  ")

    }


    /* function connection ($DB){

     }*/
}


