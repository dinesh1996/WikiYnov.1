<?php
session_start();
require '../models/db.class.php';
require '../models/mail.class.php';
require '../views/includes/headerV.php';
require '../views/inscription.php';


if (isset ($_POST['inscription'])) {

    if (!empty ($_POST['prenom']) && !empty($_POST['nom']) && !empty ($_POST['password'])) {

        $prenom = strtolower(htmlspecialchars(trim($_POST['prenom'])));
        $nom = strtolower(htmlspecialchars(trim($_POST['nom'])));
        $pass = htmlspecialchars(trim($_POST['password']));
        /* $email = $prenom . "." . $nom . "@ynov.com";
         $login = $prenom . "." . $nom;*/
        $user = new utilisateur($prenom, $nom, $pass);
        var_dump($user);
        if ($user->verifuser()) {
            $mail = new mail();
            $cle = md5(microtime(TRUE) * 3);
            $user->insertUser($cle);
        }

    } else
        echo "<script>alert('Veuillez remplir tous les champs')</script>";


}

