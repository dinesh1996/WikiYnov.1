<?php
session_start();
try {
    $BDD = new PDO ('mysql:host=localhost;dbname=testphp', 'root', '');
} catch (PDOException $e) {
    echo 'connexion impossible : ' . $e->getMessage();
}
require 'utilisateur.class.php';

if (isset($_POST['inscription'])) {
    if (!empty ($_POST['login']) && !empty($_POST['password']) && !empty($_POST['email'])) {
        $login = htmlspecialchars(addslashes(trim($_POST['login'])));
        $password = htmlspecialchars(addslashes(trim($_POST['password'])));
        $email = htmlspecialchars(addslashes(trim($_POST['email'])));
        $req = $BDD->query("SELECT * FROM users WHERE login = '$login' AND password = '$password' ");
        $res = $req->fetch();
        $resultat = count($res);
        var_dump($resultat);
    } else
        echo 'veuillez remplir tous les champs';
}