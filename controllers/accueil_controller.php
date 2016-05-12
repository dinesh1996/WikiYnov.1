<?php
session_start();

require '../models/db.class.php';
require '../views/includes/headerV.php';
require '../models/mail.class.php';
require '../views/accueil.php';


if (isset($_POST['connexion'])) {
    if (!empty($_POST['login'] && !empty($_POST['password']))) {


        $login = htmlspecialchars(trim($_POST['login']));
        $pass = htmlspecialchars(trim($_POST['password']));
        $user = new utilisateur();
        $user->setLogin($login);
        $user->setPassword($pass);
        $user->connexion();
        echo "<script>document.location = 'vu_controller.php'</script>";

    } else
        echo '<script>alert("Veuillez remplir tous les champs");</script>';
}

if (isset ($_GET['login']))
    $login = $_GET['login'];
if (isset ($_POST['reinit'])) {
    if (!empty ($_POST['email'])) {
        $user = new utilisateur();
        $user->mdpForget($_POST['email']);
    } else
        echo "<script>alert('Veuillez indiquer votre adresse mail.')</script>";
}