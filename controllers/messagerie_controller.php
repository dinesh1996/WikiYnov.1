<?php
session_start();
require '../models/message.class.php';
if (isset($_SESSION['session'])) {
    if ($_SESSION['session']['rang'] == 'admin') {
        require '../views/includes/header_admin.php';

    } else
        require "../views/includes/headerV.php";


    $db = new DB();

    if (!isset($_SESSION['session']))
        header('location:accueil.php');
    $id = $_SESSION['session']['id'];

    if (isset($_POST['repondre']))
        if (!empty ($_POST['reponse'])) {
            $dest = $_POST['dest'];
            $contenu = htmlspecialchars(addslashes($_POST['reponse']));
            $mess = new message($_SESSION['session']['id'], $contenu);
            $mess->setIdDestin($dest);
            $mess->insertMess();
        }
    if (isset($_POST['envoi'])) {
        if (!empty ($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['message'])) {
            $nom = strtolower(htmlspecialchars(trim($_POST['nom'])));
            $prenom = strtolower(htmlspecialchars(trim($_POST['prenom'])));
            $mess = htmlspecialchars(addslashes($_POST['message']));
            $session = $_SESSION['session']['id'];

            $mes = new message($session, $mess, $nom, $prenom);
            if (!$mes->insertMessage()) {


                echo ' <script>alert(\'Destinataire introuvable\')</script>';

            }
        } else
            echo '<script>alert(\'Veuillez remplir tous les champs!\')</script>';
    }

    $mess = new message();
    $res = $mess->seeExped($db, $id);


    require '../views/vuemessage.php';

} else
    header("location:accueil_controller.php");