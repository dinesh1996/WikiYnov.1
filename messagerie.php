<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form method="post">
    <input type="text" name="dest" placeholder="destinataire">
    <textarea name="message" id="" cols="30" rows="10"></textarea>
    <button type="submit" name="envoi">Envoyer</button>
</form>
</body>
</html>

<?php
session_start();
require 'message.class.php';
require 'utilisateur.class.php';
if (isset($_POST['envoi'])) {
    if (!empty ($_POST['dest']) && !empty($_POST['message'])) {
        $destin = htmlspecialchars(trim($_POST['dest']));
        $mess = htmlspecialchars(trim(addslashes($_POST['message'])));
        $db = new DB;
        $mes = new message($_SESSION['session']['id'], $destin, $mess);
        if ($mes->insertMessage())
            echo '<script>alert(\'message bien envoyé\')</script>';
        else
            echo '<script>alert(\'Destinataire introuvable\')</script>';

    } else
        echo '<script>alert(\'Veuillez remplir tous les champs!\')</script>';
}