<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php

require 'models/utilisateur.class.php';
require 'models/db.class.php';

$cle = htmlspecialchars($_GET['cle']);
$user = new utilisateur();
$sql = "SELECT * FROM users WHERE cle = ?";
$stmt = $user->DB->getBDD()->prepare($sql);
$stmt->execute([$cle]);
$res = $stmt->fetch(PDO::FETCH_OBJ);

if ($res == null)
    echo "lien invalide";
else { ?>
    <form action="" method="post">
        <input type="password" name="password" placeholder="nouveau mot de passe">
        <button name="changement" type="submit">Modifier</button>
    </form>
    <?php
}
if (isset($_POST['changement']) && !empty ($_POST['password'])) {
    $password = htmlspecialchars(trim(strtolower($_POST['password'])));

    $user->setPassword($password);
    $user->modPassword($cle);
    echo "<script>alert('Votre mot de passe à bien été modifié')</script>";
};
?>
</body>
</html>
