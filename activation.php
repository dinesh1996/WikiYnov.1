<?php
require 'db.class.php';
$DB = new  DB();

$prenom = $_GET['prenom'];
$nom = $_GET['nom'];
$cle = $_GET['cle'];

$req = $DB->requete("SELECT actif FROM users WHERE prenom = '$prenom' AND nom = '$nom' AND cle = '$cle'");
foreach ($req as $cle):

    if (count($req) == 1) {
        if ($cle->actif == 0) {
            $maj = $DB->insert("UPDATE users SET actif = 1  WHERE prenom = '$prenom' AND nom = '$nom'");
            echo "Felicitation votre compte a bien ete active !!!!</br>";
            echo '<a href="accueil.php">Cliquez ici pour vous connecter!</a>';
        } else
            echo "votre compte a deja ete valide";

    } else
        echo " lutilisateur nexiste pas";
endforeach;