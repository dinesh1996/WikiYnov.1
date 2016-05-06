<?php
session_start();
require 'utilisateur.class.php';
require 'db.class.php';

if (($_SESSION['session']['rang']) != 'admin')
    header('location:accueil.php');


$db = new DB();
$req = $db->requete("SELECT * FROM users");
foreach ($req as $utilisateur):
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?= $utilisateur->login . " " . $utilisateur->password . " " . $utilisateur->rang; ?>
<form><input name="id_user" value="<?= $utilisateur->id_user ?>" type="hidden">
    <button type="submit">Créer admin</button>
</form>
<br>
<?php endforeach; ?>

</body>
</html>



