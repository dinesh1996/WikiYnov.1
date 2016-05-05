<?php
session_start();
require 'db.class.php';
require 'utilisateur.class.php';
require 'mail.class.php';
require 'mail.inscription.php';

if (isset ($_POST['inscription']) && !empty ($_POST['prenom']) && !empty ($_POST['nom'])) {

    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $email = $prenom . "." . $nom . "@ynov.com";


    $user = new utilisateur($prenom, $nom, $email);
    var_dump($user);
    $user->verifuser();
    $mail = new mail();
    var_dump($mail);
    $mail->setMessage($message_ins);
    var_dump($mail);



}

?>

<form action="#" method="post">
    <div><label for="login">Login:</label> <input name="prenom" type="text" id="login"></div>
    <div><label for="login">Password:</label><input name="nom" type="password" id="password"></div>
    <div>
        <button name="inscription" type="submit">S'inscrire</button>
    </div>
</form>
