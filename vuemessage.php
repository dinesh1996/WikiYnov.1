<?php
session_start();

//require 'models/db.class.php';
require 'models/utilisateur.class.php';
require 'models/message.class.php';

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
$mess = new message();
$res = $mess->seeExped($db, $id);
/*$db = new DB();
$sql = "SELECT DISTINCT nom, prenom, id_exped FROM message m INNER JOIN users u ON u.id_user = m.id_exped AND m.id_desti = ? ";
$stmt = $pdo->getBDD()->prepare($sql);
$stmt->execute([$id]);
$res = $stmt->fetchALL(PDO::FETCH_OBJ);*/

//$res = $db->requete("SELECT DISTINCT nom, prenom, id_exped FROM message m INNER JOIN users u ON u.id_user = m.id_exped AND m.id_desti = '$id' ");
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php
foreach ($res as $contact):?>
    <form action="" method="GET">
        <input name="id_ex" type="hidden" value="<?= $contact->id_exped ?>">
        <button type="submit" name="voir"><?= ucfirst($contact->prenom) . " " . strtoupper($contact->nom); ?></button>
    </form>
<?php endforeach;

if (isset($_GET['voir'])) {
$exped = $_GET['id_ex'];
$messa = new message();
$result = $messa->seeMessage($db, $exped);
//$result = $db->requete("SELECT * FROM message m INNER JOIN users u ON (u.id_user = m.id_exped AND  m.id_desti = '$id' AND m.id_exped = '$exped') OR (u.id_user = m.id_desti AND m.id_desti = '$exped' AND m.id_exped = '$id')");
foreach ($result as $newmessage):
    $id_ex = $newmessage->id_exped;

    ?>


    <?php if ($id_ex == $id)
    echo "<p style='color:red;'>" . $newmessage->contenu . "</p><br>";
else echo $newmessage->contenu ?> <br><br>
<?php //$recup = $newmessage->id_exped;
endforeach; ?>

<?php /*$resultat = $db->requete("SELECT * FROM message m INNER JOIN users u ON u.id_user = m.id_desti AND m.id_desti = '$exped' AND m.id_exped = '$id'");
    foreach ($resultat as $reponse): ?>
        <p style="color:red;"><?= "  " . $reponse->contenu; ?></p>
        <?php

    endforeach; */ ?>


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
