<?php
session_start();
require '../models/db.class.php';
require '../models/mail.class.php';
require '../models/utilisateur.class.php';
require '../views/accueil.php';

if (isset($_POST['connexion'])) {
    if (!empty($_POST['login'] && !empty($_POST['password']))) {
        $login = htmlspecialchars(trim($_POST['login']));
        $pass = htmlspecialchars(trim($_POST['password']));
        $user = new utilisateur();
        $user->setLogin($login);
        $user->setPassword($pass);
        $user->connexion();
    } else
        echo "<script>alert('veuillez remplir tous les champs')</script>";
}
if (isset($_SESSION['session'])) {
    echo '<form method="post"><button type="submit" name="deco">deconnexion</button></form>';
    if (isset($_POST['deco'])) {
        $user = new utilisateur($_SESSION['session']['prenom'], $_SESSION['session']['nom']);
        $user->deconnexion();
        echo '<script>document.location = "accueil.php"</script>';
    }
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