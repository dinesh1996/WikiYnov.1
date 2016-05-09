<?php
if (!isset($_POST['inscription'])) {
    if (!empty ($_POST['login']) && !empty($_POST['password']) && !empty($_POST['email'])) {
        $login = htmlspecialchars(addslashes(trim($_POST['login'])));
        $password = htmlspecialchars(addslashes(trim($_POST['password'])));
        $email = htmlspecialchars(addslashes(trim($_POST['email'])));
        $user = new utilisateur ();
    }
}