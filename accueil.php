<?php
session_start();
require 'db.class.php';
require 'mail.class.php';
require 'utilisateur.class.php';


if (isset($_POST['connexion'])) {
    $login = htmlspecialchars(trim($_POST['login']));
    $pass = htmlspecialchars(trim($_POST['password']));
    $user = new utilisateur();
    $user->setLogin($login);
    $user->setPassword($pass);
    $user->connexion();
    var_dump($user);
}
if (isset($_SESSION['session'])) {
    echo '<form method="post"><button type="submit" name="deco">deconnexion</button></form>';
    if (isset($_POST['deco'])) {
        $user = new utilisateur($_SESSION['session']['prenom'], $_SESSION['session']['nom']);
        $user->deconnexion();
        echo '<script>document.location = "accueil.php"</script>';
    }
}

if (isset ($_GET['login']))
    $login = $_GET['login'];

?>

<html>
<h1>Connection</h1>
<form action="" method="post">
    <div><input name="login" id="login" value="<?php if (isset($login)) echo $login ?>" type="text"><label for="login">Login</label>
    </div>
    <div><input name="password" id="password" type="password"><label for="password">Password</label></div>
    <div>
        <button type="submit" name="connexion">Se connecter</button>
    </div>
</form>
<form action="" method="post">
    <button name="mdp" type="submit">motde passe oublié</button>
</form>
<?php if (isset($_POST['mdp'])) {
    echo "<h4>Votre adresse email</h4><form method = 'post'><input name ='email' type = 'email' >
 <button name ='reinit' type = 'submit' > ok</button ></form > ";

}
if (isset ($_POST['reinit'])) {
    if (!empty ($_POST['email'])) {
        $user = new utilisateur();
        $user->mdpForget($_POST['email']);
    } else
        echo "<script>alert('Veuillez indiquer votre adresse mail.')</script>";
} ?>

</html>

