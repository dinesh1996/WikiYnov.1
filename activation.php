<?php
require 'db.class.php';

$DB = new DB();

$prenom = $_GET['prenom'];
$nom = $_GET['nom'];
$cle = $_GET['cle'];
$sql = "SELECT actif FROM users WHERE prenom = ? AND nom = ? AND cle = ?";
$stmt = $DB->getBDD()->prepare($sql);
$stmt->execute([$prenom,
    $nom,
    $cle]);
$req = $stmt->fetchAll(PDO::FETCH_OBJ);
foreach ($req as $cle):
    if (count($req) == 1) {
        if ($cle->actif == 0) {
            $sql = "UPDATE users SET actif = ?  WHERE prenom = ? AND nom = ?";
            $stmt = $DB->getBDD()->prepare($sql);
            $stmt->execute([1,
                $prenom,
                $nom]);
            //$maj = $DB->insert("UPDATE users SET actif = 1  WHERE prenom = '$prenom' AND nom = '$nom'");
            echo "Felicitation votre compte a bien ete active !!!!</br>";
            echo '<a href="accueil.php?login=' . $prenom . '.' . $nom . '">Cliquez ici pour vous connecter!</a>';
        } else
            echo "votre compte a deja ete valide";
    } else
        echo " lutilisateur nexiste pas";
endforeach;