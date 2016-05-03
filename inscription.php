<?php
session_start();
require 'utilisateur.class.php';
require 'utilisateurcontroller.php';
?>
<form action="" method="post">
    <input name="login" type="text" id="login"><label for="login">Login:</label>
    <input name="password" type="password" id="password"><label for="login">Password:</label>
    <input name="email" type="email" id="email"><label for="email">Email:</label>
    <button name="inscription" type="submit">S'inscrire</button>
</form>