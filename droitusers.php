<?php
session_start();
require 'utilisateur.class.php';
require 'db.class.php';

if (($_SESSION['session']['rang']) != 'admin')
    header('location:accueil.php');


$db = new DB();
$user = new utilisateur($_SESSION['session']['prenom'], $_SESSION['session']['nom'], $_SESSION['session']['rang']);
$req = $db->requete("SELECT * FROM users");
if (isset($_POST['rang'])) {
    $user->modRang($_POST['id_user'], $_POST['choixrang']);
    echo '<script>window.location="droitusers.php";</script>';
}
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
<form method="post"><input name="id_user" value="<?= $utilisateur->id_user ?>" type="hidden">
    <select name="choixrang" id="">
        <option value="abonné" <?php if ($utilisateur->rang == 'abonné') echo ' selected disabled' ?>>abonné</option>
        <option value="admin" <?php if ($utilisateur->rang == 'admin') echo ' selected disabled' ?>>admin</option>
    </select>
    <button type="submit" name="rang">Changer rang</button>
</form>
<br>
<?php endforeach; ?>

</body>
</html>



