<?php
session_start();

require 'utilisateur.class.php';
require 'message.class.php';

if (!isset($_SESSION['session']))
    header('location:accueil.php');

$db = new DB();
$id = $_SESSION['session']['id'];
$res = $db->requete("SELECT * FROM message, users WHERE id_desti LIKE '$id' AND id_user LIKE '$id'");
foreach ($res as $message):
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
    <p>envoyé par:<?= $message->login ?> </p><?= $message->contenu; ?> </br>

    </body>
    </html>
    <?php
endforeach;

