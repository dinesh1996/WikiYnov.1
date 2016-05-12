<?php
session_start();
require '../models/message.class.php';


if (isset($_SESSION['session'])) {
    if ($_SESSION['session']['rang'] == 'admin') {
        require 'header_controller.php';

    } else
        require "headerV_controller.php";


    $db = new DB();

    if (!isset($_SESSION['session']))
        header('location:accueil.php');
    $id = $_SESSION['session']['id'];

    if (isset($_POST['repondre'])) {
        $dest = $_POST['dest'];
        $contenu = htmlspecialchars(addslashes($_POST['reponse']));
        $mess = new message($_SESSION['session']['id'], null, $contenu, $dest);
        $mess->insertMess();
    }
    if (isset($_POST['envoi'])) {
        if (!empty ($_POST['dest']) && !empty($_POST['message'])) {
            $destin = htmlspecialchars(trim($_POST['dest']));
            $mess = htmlspecialchars(addslashes($_POST['message']));
            $session = $_SESSION['session']['id'];

            $mes = new message($session, $destin, $mess);
            if (!$mes->insertMessage()) {


                echo '<script>alert(\'Destinataire introuvable\')</script>';

            }
        } else
            echo '<script>alert(\'Veuillez remplir tous les champs!\')</script>';
    }
    $mess = new message();
    $res = $mess->seeExped($db, $id);

    require '../views/vuemessage.php';

} else
    header("location:accueil_controller.php");