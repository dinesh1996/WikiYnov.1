<?php
session_start();
require 'db.class.php';
require 'utilisateur.class.php';


if (isset($_POST['connexion'])) {
    $user = new utilisateur($_POST['login'], $_POST['password']);
    $user->connexion();
}
if (isset($_SESSION['session'])) {
    echo '<form method="post"><button type="submit" name="deco">deconnexion</button></form>';
    if (isset($_POST['deco'])) {
        $user = new utilisateur($_SESSION['session']['prenom'], $_SESSION['session']['nom']);
        $user->deconnexion();
        echo '<script>document.location = "accueil.php"</script>';
    }
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
<form action="" method="post">
    <button name="mdp" type="submit">motde passe oublié</button>
</form>
<?php if (isset($_POST['mdp'])) {
    echo "<h4>Votre adresse email</h4><form><input type='email'>
 <button type='submit'>ok</button></form>";
} ?>

</html>

