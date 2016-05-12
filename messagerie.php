<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

</body>
</html>

<?php
session_start();
require 'models/message.class.php';
require 'models/utilisateur.class.php';

if (!isset($_SESSION['session']))
    header('location:accueil.php');

if (isset($_POST['envoi'])) {
    if (!empty ($_POST['dest']) && !empty($_POST['message'])) {
        $destin = htmlspecialchars(trim($_POST['dest']));
        $mess = htmlspecialchars(addslashes($_POST['message']));
        $session = $_SESSION['session']['id'];

        $mes = new message($session, $destin, $mess);
        if ($mes->insertMessage())
            echo '<script>alert(\'message bien envoyé\')</script>';
        else
            echo '<script>alert(\'Destinataire introuvable\')</script>';

    } else
        echo '<script>alert(\'Veuillez remplir tous les champs!\')</script>';
}