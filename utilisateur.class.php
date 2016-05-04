<?php

class utilisateur
{


    public function verifuser($BDD, $login, $password)
    {
        $req = $BDD->query("SELECT * FROM users WHERE login = '$login' AND password = '$password' ");
        while ($raq = $req->fetch()) {
            echo $raq['login'];
        }

    }
}