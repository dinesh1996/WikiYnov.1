<?php
session_start();
require 'db.class.php';
require 'utilisateur.class.php';
$DB = new DB();
$req = $DB->requete('SELECT * FROM users');
foreach ($req as $cle):

echo $cle->login;

endforeach;



?>

<form action="#" method="post">
    <div><label for="login">Login:</label> <input name="prenom" type="text" id="login"></div>
    <div><label for="login">Password:</label><input name="nom" type="password" id="password"></div>
    <div>
        <button name="inscription" type="submit">S'inscrire</button>
    </div>
</form>
