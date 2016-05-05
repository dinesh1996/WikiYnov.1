<?php
session_start();
require 'db.class.php';
require 'utilisateur.class.php';



if (isset($_POST['connexion'])){
    $user = new utilisateur($_POST['login'], $_POST['password']);
    $user->connexion();
}
?>

<html>
<h1>Connection</h1>
<form action="" method="post">
    <div><input name="login" id="login" type="text"><label for="login">Login</label></div>
    <div><input name="password" id="password" type="password"><label for="password">Password</label></div>
    <div>
        <button type="submit" name="connexion">Se connecter</button>
    </div>
</form>
</html>

