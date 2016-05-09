<?php
session_start();
require 'db.class.php';
require 'utilisateur.class.php';
require 'mail.class.php';

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

?>

<form action="#" method="post">
    <div><label for="prenom">Prenom:</label> <input name="prenom" type="text" id="prenom"></div>
    <div><label for="nom">Nom:</label><input name="nom" type="text" id="nom"></div>
    <div><label for="password">Password:</label><input name="password" type="password" id="password"></div>
    <div>
        <button name="inscription" type="submit">S'inscrire</button>
    </div>
</form>
