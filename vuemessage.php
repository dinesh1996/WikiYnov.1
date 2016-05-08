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
$res = $db->requete("SELECT DISTINCT prenom, id_exped FROM message m INNER JOIN users u ON u.id_user = m.id_exped AND m.id_desti = '$id' ");
foreach ($res as $contact):?>
    <form action="" method="GET">
        <input name="id_ex" type="hidden" value="<?= $contact->id_exped ?>">
        <button type="submit" name="voir"><?= $contact->prenom; ?></button>
    </form>
<?php endforeach;

if (isset($_GET['voir'])) {
    $exped = $_GET['id_ex'];
    $result = $db->requete("SELECT * FROM message m INNER JOIN users u ON (u.id_user = m.id_exped AND  m.id_desti = '$id' AND m.id_exped = '$exped') OR (u.id_user = m.id_desti AND m.id_desti = '$exped' AND m.id_exped = '$id')");
    foreach ($result as $newmessage):
        $id_ex = $newmessage->id_exped;

        ?>


        <?php if ($id_ex == $id)
        echo "<p style='color:red;'>" . $newmessage->contenu . "</p>";
    else echo $newmessage->contenu ?> </br>
    <?php //$recup = $newmessage->id_exped;
    endforeach; ?>

    <?php /*$resultat = $db->requete("SELECT * FROM message m INNER JOIN users u ON u.id_user = m.id_desti AND m.id_desti = '$exped' AND m.id_exped = '$id'");
    foreach ($resultat as $reponse): ?>
        <p style="color:red;"><?= "  " . $reponse->contenu; ?></p>
        <?php

    endforeach; */?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
    <form action="" method="post">
        <input type="hidden" name="dest" value="<?php echo $exped ?>">
        <textarea name="reponse" id="" cols="30" rows="3" placeholder="Réponse..."></textarea><br>
        <button name="repondre">Repondre</button>
    </form>
    </body>
    </html>
    <?php
}
?>
