<div class="contenaire">
    <div id="contenaire_accueil">
        <h1>Connexion</h1>
        <form action="" method="post">
            <input name="login" placeholder="Login" id="login" value="<?php if (isset($login)) echo $login ?>"
                   type="text"><br>

            <input name="password" placeholder="Password" id="password" type="password"><br>

            <button type="submit" name="connexion">Se connecter</button>

        </form>
        <form action="" method="post">
            <button name="mdp" type="submit">Mot de passe oublié</button>
        </form>
        <?php if (isset($_POST['mdp'])) {
            echo "<form method = 'post'><input name ='email' placeholder='Votre adresse email' type = 'email' ><br>
 <button name ='reinit' type = 'submit' >Ok</button ></form > ";
        }
        ?> </div>
</div>

<?php require 'includes/footer.php'; ?>


