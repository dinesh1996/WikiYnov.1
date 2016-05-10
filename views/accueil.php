<div class="contenaire">
    <div id="contenaire_accueil">
        <h1>Connection</h1>
        <form action="" method="post">
            <div><input name="login" id="login" value="<?php if (isset($login)) echo $login ?>" type="text"><label
                    for="login">Login</label>
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
        ?> </div>
</div>

<? require 'includes/footer.php'


