<?php
session_start();

if (isset($_SESSION['session'])) {
    if ($_SESSION['session']['rang'] == 'admin') {
        require 'header_controller.php';
        $user = new utilisateur($_SESSION['session']['prenom'], $_SESSION['session']['nom'], $_SESSION['session']['rang']);
        require '../views/droitusers.php';
        if (isset($_POST['rang']) && !empty($_POST['choixrang'])) {
            $user->modRang($_POST['id_user'], $_POST['choixrang']);
            echo '<script>window.location="droitusers_controller.php";</script>';
        }
    }


} else {
    header('location:accueil_controller.php');
}
