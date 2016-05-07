<?php
session_start();

require 'utilisateur.class.php';
require 'message.class.php';

if (!isset($_SESSION['session']))
    header('location:accueil.php');
$id = $_SESSION['session']['id'];

if (isset($_POST['repondre'])) {
    $dest = $_POST['dest'];
    $contenu = htmlspecialchars(addslashes($_POST['reponse']));
    $mess = new message($_SESSION['session']['id'], null, $contenu, $dest);
    $mess->insertMess();
}
$db = new DB();
$res = $db->requete("SELECT DISTINCT prenom FROM message m INNER JOIN users u ON u.id_user = m.id_exped AND m.id_desti = '$id' ");
foreach ($res as $contact):?>
    <form action="">
        <?= $contact->prenom; ?> <br>
        <button></button>
    </form>

    <?php
endforeach;


$res = $db->requete("SELECT * FROM message m INNER JOIN users u ON u.id_user = m.id_exped AND m.id_desti = '$id' ORDER BY prenom ASC");
foreach ($res as $message):
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
    <p>envoyé par:<?= $message->prenom ?> </p><?= $message->contenu; ?> </br>
    <form action="" method="post">
        <input type="hidden" name="dest" value="<?= $message->id_exped ?>">
        <textarea name="reponse" id="" cols="30" rows="3" placeholder="Réponse..."></textarea><br>
        <button name="repondre">Repondre</button>
    </form>

    </body>
    </html>
    <?php
endforeach;


