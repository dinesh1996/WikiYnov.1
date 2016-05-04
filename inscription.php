<form action="#" method="post">
    <div><label for="login">Login:</label> <input name="login" type="text" id="login"></div>
    <div><label for="login">Password:</label><input name="password" type="password" id="password"></div>
    <div><label for="email">Email:</label><input name="email" type="email" id="email"</div>
    <div>
        <button name="inscription" type="submit">S'inscrire</button>
    </div>
</form>
<?php
session_start();
try {
    $BDD = new PDO ('mysql:host=localhost;dbname=testphp', 'root', '');
} catch (PDOException $e) {
    echo 'connexion impossible : ' . $e->getMessage();
}
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

?>